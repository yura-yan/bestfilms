<?php

class Posts_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function getPosts($slug = FALSE) {

	if ($slug === FALSE) {
		$query = $this->db->get('posts');

	    return $query->result_array();
	}

	$query = $this->db->get_where('posts', array('slug' => $slug));

	return $query->row_array();
    }

    public function setPost($slug, $title, $content) {
    	$data = array(
    		'title' => $title,
    		'text' => $content,
    		'slug' => $slug
    	);

    	return $this->db->insert('posts', $data);
     
    }

    public function updatePost($slug, $title, $content) {
    	$data = array(
           'title' => $title,
           'text' => $content,
           'slug' => $slug
    	);

    	return $this->db->update('posts', $data, array('slug' => $slug));

    }

    public function deletePost($slug) {
    	return $this->db->delete('posts', array('slug' => $slug));
    }
	
}