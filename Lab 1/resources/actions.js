  $('#form-movie').submit(
    function (event){
    var name = $('#name').val();
    var year = $('#year').val();
    var genre = $('#genre').val();
    var rating = $('#rating').val();
    //Data validation.

    var validation = true;

    if (name.length == 0){
    	validation = false;
    }

    if (year.length == 0){
    	validation = false;
    }

    if (genre.length == 0){
    	validation = false;
    }

    if (rating.length == 0 && rating >= 1 && rating <= 10){
    	validaion = false;
    }

    console.log(validation);

    if (!validation){
    	event.preventDefault();
    }
    return true;
  });
