<?php
	/**
	 * 
	 */
	class Movie
	{
		public $id;
		public $name;
		public $year;
		public $genre;
		public $rating;

		public function __construct($attributes) {
		    $this->id = $attributes['id'];
		    $this->name = $attributes['name'];
		    $this->year = $attributes['year'];
		    $this->rating = $attributes['rating'];
		    $this->genre = self::getGenre($attributes['genre']);
		}


		public static function getGenre($id){
			return Genre::findGenre($id);
		}

	}

?>