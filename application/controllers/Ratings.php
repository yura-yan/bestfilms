<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ratings extends MY_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function view(){
		$this->load->library('pagination');

		$offset = (int) $this->uri->segment(3);
        $row_count = 9;
		$count = 0;
        
        $count = count($this->films_model->getMoviesRatingOnPage(null, false, false));
        $p_config['base_url'] = '/ratings/view/';
		$this->data['title'] = "Рейтинг фильмов";
		$this->data['films_rating'] = $this->films_model->getMoviesRatingOnPage(false, $row_count, $offset);

		// pagination config
		$p_config['total_rows'] = $count;
		$p_config['per_page'] = $row_count;

		// Pagination style
		$p_config['full_tag_open'] = "<ul class='pagination'>";
		$p_config['full_tag_close'] ="</ul>";
		$p_config['num_tag_open'] = '<li>';
		$p_config['num_tag_close'] = '</li>';
		$p_config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$p_config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$p_config['next_tag_open'] = "<li>";
		$p_config['next_tagl_close'] = "</li>";
		$p_config['prev_tag_open'] = "<li>";
		$p_config['prev_tagl_close'] = "</li>";
		$p_config['first_tag_open'] = "<li>";
		$p_config['first_tagl_close'] = "</li>";
		$p_config['last_tag_open'] = "<li>";
		$p_config['last_tagl_close'] = "</li>";

		// pagination init
		$this->pagination->initialize($p_config);

		$this->data['pagination'] = $this->pagination->create_links();
		
		$this->load->view('templates/header', $this->data);
		$this->load->view('movies/rating', $this->data);
		$this->load->view('templates/footer');
	}
}