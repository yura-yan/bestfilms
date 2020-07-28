<?php

class Comments_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function getComments($movie_id, $limit){

		$query = $this->db
		    ->where('movie_id', $movie_id)
		    ->limit($limit)
		    ->get('comments');

		return $query->result_array();
	}

	public function setComments($user_id, $movie_id, $comment_text) {
    	$data = array(
    		'user_id' => $user_id,
    		'movie_id' => $movie_id,
    		'comment_text' => $comment_text
    	);

    	return $this->db->insert('comments', $data);
     
    }
}
