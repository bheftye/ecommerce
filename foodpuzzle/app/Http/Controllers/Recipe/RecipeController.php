<?php
/**
 * Created by PhpStorm.
 * User: bheftye
 * Date: 3/5/19
 * Time: 18:43
 */

namespace App\Http\Controllers\Recipe;

use App\Http\Controllers\Controller;
use App\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Webpatser\Uuid\Uuid;

class RecipeController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function create(Request $request){
        $params = $request->only(self::attributes());
        $validator = $this->validator($params);
        if ($validator->fails()){
            return redirect('recipe/create')->withErrors($validator)->withInput();
        }
        //file upload
        try{
            $filePath = $request->file('file')->store('recipes');
            $recipe = new Recipe($params);
            $recipe->uuid = Uuid::generate();
            $recipe->img_file = $filePath;
            $recipe->u_id = 1;
            $recipe->vegan = $request->has('vegan')? true:false;
            $recipe->save();
        } catch (\Exception $exception){
            Log::error($exception);
            if(isset($filePath))
                Storage::delete($filePath);
            return redirect('recipe/create')->withInput();
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
            'vegan' => ['numeric'],
            'file' => ['required','image', 'max:1000']

        ]);
    }

    /**
     * Fillable attributes.
     * @return array
     */
    private function attributes(){
        return [
            'rname', 'steps', 'calories', 'fat', 'carbohydrate', 'protein', 'sugar', 'vegan', 'file'
        ];
    }

}