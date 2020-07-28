<?php

class Search_model extends CI_Model{

	public function search($q){
		$search_arr = array(
            'name' => $q,
            'descriptions' => $q,
            'slug' => $q 
		);

		$query = $this->db
		    ->or_like($search_arr)
		    ->limit(100)
		    ->get('movie');

	    //echo $this->db->last_query();

		return $query->result_array();
	}

	public function searchPagination($q, $row_count, $offset){
		$search_arr = array(
            'name' => $q,
            'descriptions' => $q,
            'slug' => $q 
		);

		$query = $this->db
		    ->or_like($search_arr)
		    //->limit(100)
		    ->get('movie', $row_count, $offset);

	    //echo $this->db->last_query();

		return $query->result_array();
	}
    
}