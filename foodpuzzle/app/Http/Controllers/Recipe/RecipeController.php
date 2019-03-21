<?php
/**
 * Created by PhpStorm.
 * User: bheftye
 * Date: 3/5/19
 * Time: 18:43
 */

namespace App\Http\Controllers\Recipe;

use App\Favorite;
use App\Food;
use App\Http\Controllers\Controller;
use App\Ingredient;
use App\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Webpatser\Uuid\Uuid;

class RecipeController extends Controller
{
    /**
     * @param $uuid
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function favorite($uuid){
        $recipe = Recipe::where(['uuid' => $uuid])->first();
        if (!empty($recipe)){
            $favorite = Favorite::where(['r_id' => $recipe->id, 'u_id' => Auth::user()->id])->first();
            if(!empty($favorite)) { //delete favourite
                DB::table('favorites')->where(['u_id' => Auth::user()->id, 'r_id' => $recipe->id])->delete();
                return redirect()->back();
            }
            else { //prepare to be favourite
                $favorite = new Favorite();
                $favorite->r_id = $recipe->id;
                $favorite->u_id = Auth::user()->id;
                if($favorite->save()){
                    return redirect()->back();
                } else {
                    Log::error($favorite->errors);
                    return redirect()->back();
                }
            }    
            
        } else {
            throw new NotFoundHttpException();
        }
    }
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function create(Request $request){
        $params = $request->only(self::attributes());
        $params['steps'] = htmlspecialchars($params['steps']);

        $validator = $this->validator($params);
        $ingredients = $params['ingredient'];
        $ingredientsS = $params['ingredientS'];
        $quantities = $params ['quantity'];

        $ingredientValidation =
            count($ingredients) === count($ingredientsS) &&
            count($ingredients) === count($ingredientsS);

        if ($validator->fails() || !$ingredientValidation){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //file upload
        try{
            $filePath = $request->file('file')->store('public');
            $recipe = new Recipe($params);
            $recipe->uuid = Uuid::generate();
            $recipe->img_file = $filePath;
            $recipe->u_id = Auth::user()->id;
            $recipe->vegan = $request->has('vegan')? true:false;
            $recipe->save();

            for($i = 0; $i < count($ingredients); $i++)
            {
                $foodParams = [
                    'enname' => $ingredients[$i],
                    'svname' => $ingredientsS[$i]
                ];
                $food = new Food($foodParams);
                if (!$food->save()){
                    Log::error($food->errors);
                }
                $ingredientParams = [
                    'f_id' => $food->id,
                    'r_id' => $recipe->id,
                    'quantity' => $quantities[$i]
                ];
                $ingredient = new Ingredient($ingredientParams);
                if(!$ingredient->save()){
                    Log::error($ingredient->errors);
                };
            }
        } catch (\Exception $exception){
            Log::error($exception);
            if(isset($filePath))
                Storage::delete($filePath);
            return redirect()->back()->withInput();
        }

        return redirect('/');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'rname' => ['required', 'string', 'max:255'],
            'steps' => ['required', 'string'],
            'calories' => ['numeric'],
            'fat' => ['numeric'],
            'carbohydrate' => ['numeric'],
            'protein' => ['numeric'],
            'sugar' => ['numeric'],
            'file' => ['required','image', 'max:1000'],
            'link' => ['string'],
            'ingredient.*' => ['string'],
            'ingredientS.*' => ['string'],
            'quantity.*' => ['string']

        ]);
    }

    /**
     * Fillable attributes.
     * @return array
     */
    private function attributes(){
        return [
            'rname',
            'steps',
            'calories',
            'fat',
            'carbohydrate',
            'protein',
            'sugar',
            'vegan',
            'file',
            'ingredient',
            'ingredientS',
            'quantity',
            'link'
        ];
    }

}