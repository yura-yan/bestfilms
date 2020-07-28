<?php

class Films_model extends CI_Model {
	
	public function __construct() {

		$this->load->database();

	}

	public function getFilms($slug = false, $limit, $type = 1) {

		if ($slug === false) {

			 $query = $this->db
	            ->order_by('add_date', 'desc')
	            ->where('category_id', $type)
	            ->limit($limit)
	            ->get('movie');

	         return $query->result_array();
		}

        $query = $this->db->get_where('movie', array('slug' => $slug));

		return $query->row_array();

	}
	
    public function getFilmsByRating($limit) {
        
        $query = $this->db
            ->order_by('rating', 'desc')
            ->where('category_id', 1)
            ->where('rating>', 0)
            ->limit($limit)
            ->get('movie');

        return $query->result_array();

    }

    public function getMoviesOnPage($row_count, $offset, $type = 1) {
    	     $query = $this->db
	            ->order_by('add_date', 'desc')
	            ->where('category_id', $type)
	            ->get('movie', $row_count, $offset);

	         return $query->result_array();
    }

    public function getMoviesRatingOnPage($slug = false, $row_count, $offset) {

    	if ($slug === false) {

	    	 $query = $this->db
	            ->order_by('rating', 'desc')
	            ->where('rating>', 0)
	            ->get('movie', $row_count, $offset);

	         return $query->result_array();
    	}

	        $query = $this->db
		        ->order_by('rating', 'desc')
		        ->where('rating>', 0)
		        ->get('movie');

		    return $query->result_array();
    }

    public function getMoviesForEdit($slug = false) {

		if ($slug === false) {

			 $query = $this->db
	            ->order_by('add_date', 'desc')
	            ->get('movie');

	         return $query->result_array();
		}

        $query = $this->db->get_where('movie', array('slug' => $slug));

		return $query->row_array();

	}

	public function setMovies($slug, $name, $description, $year, $rating, $producer, $poster, $playerCode, $addDate, $categoryId) {

		$data = array(
          'slug' => $slug,
          'name' => $name,
          'descriptions' => $description,
          'year' => $year,
          'rating' => $rating,
          'producer' => $producer,
          'poster' => $poster,
          'player_code' => $playerCode,
          'add_date' => $addDate,
          'category_id' => $categoryId
		);

		return $this->db->insert('movie', $data);
	}

	public function updateMovies($slug, $name, $description, $year, $rating, $producer, $poster, $playerCode, $addDate, $categoryId) {

		$data = array(
          'slug' => $slug,
          'name' => $name,
          'descriptions' => $description,
          'year' => $year,
          'rating' => $rating,
          'producer' => $producer,
          'poster' => $poster,
          'player_code' => $playerCode,
          'add_date' => $addDate,
          'category_id' => $categoryId
		);

		return $this->db->update('movie', $data, array('slug' => $slug));
	}

	public function deleteMovies($slug) {
		return $this->db->delete('movie',  array('slug' => $slug));
	}

}