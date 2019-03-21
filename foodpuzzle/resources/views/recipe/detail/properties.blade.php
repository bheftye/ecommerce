<div class="col-12">
    <h5><u>Nutritional Properties</u></h5>
    <table class="table table-striped mt-2">
        <thead>
        <tr>
            <th>Property</th>
            <th>Amount</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Calories</td>
            <td>{{$recipe->calories}} kcal</td>
        </tr>
        <tr>
            <td>Fat</td>
            <td>{{$recipe->fat}} %</td>
        </tr>
        <tr>
            <td>Protein</td>
            <td>{{$recipe->protein}} %</td>
        </tr>
        <tr>
            <td>Carbohydrate</td>
            <td>{{$recipe->carbohydrate}} grams</td>
        </tr>
        <tr>
            <td>Sugar</td>
            <td>{{$recipe->sugar}} grams</td>
        </tr>
        </tbody>
    </table>
</div>
