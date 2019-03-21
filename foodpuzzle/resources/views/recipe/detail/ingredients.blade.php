<div class="col-12">
    <h5><u>Ingredients</u></h5>
    <table class="table table-striped mt-2">
        <thead>
        <tr>
            <th>English name</th>
            <th>Swedish name</th>
            <th>Quantity</th>
        </tr>
        </thead>
        <tbody>
        @foreach($recipe->ingredients as $ingredient)
            <tr>
                <td>{{$ingredient->food->enname}}</td>
                <td>{{$ingredient->food->svname}}</td>
                <td>{{$ingredient->quantity}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
