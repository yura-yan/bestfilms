<?php

defined('BASEPATH') OR exit("No direct script access allowed");

class Movies extends MY_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->helper('url');
	}

	public function type($slug = NULL){
		$this->load->library('pagination');
		$this->data['movies_data'] = null;

		$offset = (int) $this->uri->segment(4);

		$row_count = 5;

		$count = 0;

		if ($slug == "films") {
			$count = count($this->films_model->getFilms($slug = false, 25, 1));
			$p_config['base_url'] = '/movies/type/films/';
			$this->data['title'] = "Фильмы";
			$this->data['movies_data'] = $this->films_model->getMoviesOnPage($row_count, $offset, 1);
		}
		if ($slug == "serials") {
			$count = count($this->films_model->getFilms($slug = false, 25, 2));
			$p_config['base_url'] = '/movies/type/serials/';
			$this->data['title'] = "Сериалы";
			$this->data['movies_data'] = $this->films_model->getMoviesOnPage($row_count, $offset, 2);
		}
		if (empty($this->data['movies_data'])) {
			show_404();
		}

		// Pagination config
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

		// Pagination init
		$this->pagination->initialize($p_config);

		$this->data['pagination'] = $this->pagination->create_links();


		$this->load->view('templates/header', $this->data);
		$this->load->view('movies/type', $this->data);
		$this->load->view('templates/footer');
	}

	public function view($slug = NULL){
	//	$this->load->model('films_model');
		$movie_slug = $this->films_model->getFilms($slug,false,false);

		if (empty($movie_slug)) {
			show_404();
		}

		$this->load->model('comments_model');
		$this->data['comments'] = $this->comments_model->getComments($movie_slug['id'], 100);

		$this->data['title'] = $movie_slug['name'];
		$this->data['descriptions'] = $movie_slug['descriptions'];
		$this->data['year'] = $movie_slug['year'];
		$this->data['rating'] = $movie_slug['rating'];
		$this->data['producer'] = $movie_slug['producer'];
		$this->data['playerCode'] = $movie_slug['player_code'];
		$this->data['categoryId'] = $movie_slug['category_id'];
		$this->data['movie_id'] = $movie_slug['id'];
		$this->data['slug'] = $movie_slug['slug'];

		$is = $this->session->flashdata('is');
		 if($is==1)
		  {
           $this->data['commentError'] = "Для добавления комментарии необходимо войти в свой аккаунт";
		  }
		

		$this->load->view('templates/header', $this->data);
		$this->load->view('movies/view', $this->data);
		$this->load->view('templates/footer');
	}

	public function createComment($slug) {

	$movie_slug = $this->films_model->getFilms($slug,false,false);
	$this->data['slug'] = $movie_slug['slug'];

	$this->load->model('comments_model');

	if (!$this->dx_auth->is_logged_in()) {
        
		$this->session->set_flashdata('is',1);
        redirect('/movies/view/'.$this->data['slug'], 'location');

	}

    if ($this->input->post('user_id') && $this->input->post('movie_id') && $this->input->post('comment_text')) {
        
      $user_id = $this->input->post('user_id');
      $movie_id = $this->input->post('movie_id');
      $comment_text = $this->input->post('comment_text');
      
      $comment_textF = htmlspecialchars(mb_strtolower(trim($comment_text)), ENT_QUOTES, 'UTF-8'); 
      
         if ($this->comments_model->setComments($user_id, $movie_id, $comment_textF)) {
              
              redirect('/movies/view/'.$this->data['slug'], 'location');
       }

     } else {

     	redirect('/movies/view/'.$this->data['slug'], 'location');
     }
     
   }

   public function moviesForEdit(){

   	if (!$this->dx_auth->is_admin()) {
     
      $this->load->helper('url_helper');
      redirect('/', 'location');
    }

    $this->data['title'] = "All movies";
    $this->data['movies'] = $this->films_model->getMoviesForEdit();

   	$this->load->view('templates/header', $this->data);
   	$this->load->view('movies/movies', $this->data);
   	$this->load->view('templates/footer');
   }

   public function create(){

   	 if (!$this->dx_auth->is_admin()) {
      show_404();
    }

    $this->data['title'] = "add movies";

    if ($this->input->post('slug') && $this->input->post('name') && $this->input->post('description') && $this->input->post('year') && $this->input->post('rating') && $this->input->post('producer') && $this->input->post('poster') && $this->input->post('playerCode') && $this->input->post('addDate') && $this->input->post('categoryId')) {
        
      $slug = $this->input->post('slug');
      $name = $this->input->post('name');
      $description = $this->input->post('description');
      $year = $this->input->post('year');
      $rating = $this->input->post('rating');
      $producer = $this->input->post('producer');
      $poster = $this->input->post('poster');
      $playerCode = $this->input->post('playerCode');
      $addDate = $this->input->post('addDate');
      $categoryId = $this->input->post('categoryId');
      
      
         if ($this->films_model->setMovies($slug, $name, $description, $year, $rating, $producer, $poster, $playerCode, $addDate, $categoryId)) {
              $this->load->view('templates/header', $this->data);
              $this->load->view('movies/success', $this->data);
              $this->load->view('templates/footer');
       }

     } else {
         $this->load->view('templates/header', $this->data);
         $this->load->view('movies/create', $this->data);
         $this->load->view('templates/footer');
     }
   }

   public function edit($slug = NULL){

   	 if (!$this->dx_auth->is_admin()) {
      show_404();
    }

    $this->data['title'] = "edit movie";
    $this->data['movie_item'] = $this->films_model->getMoviesForEdit($slug);
    $this->data['slug'] = $this->data['movie_item']['slug'];
    $this->data['name'] = $this->data['movie_item']['name'];
    $this->data['description'] = $this->data['movie_item']['descriptions'];
    $this->data['year'] = $this->data['movie_item']['year'];
    $this->data['rating'] = $this->data['movie_item']['rating'];
    $this->data['producer'] = $this->data['movie_item']['producer'];
    $this->data['poster'] = $this->data['movie_item']['poster'];
    $this->data['playerCode'] = $this->data['movie_item']['player_code'];
    $this->data['addDate'] = $this->data['movie_item']['add_date'];
    $this->data['categoryId'] = $this->data['movie_item']['category_id'];
   

    if ($this->input->post('slug') && $this->input->post('name') && $this->input->post('description') && $this->input->post('year') && $this->input->post('rating') && $this->input->post('producer') && $this->input->post('poster') && $this->input->post('playerCode') && $this->input->post('addDate') && $this->input->post('categoryId')) {
        
      $slug = $this->input->post('slug');
      $name = $this->input->post('name');
      $description = $this->input->post('description');
      $year = $this->input->post('year');
      $rating = $this->input->post('rating');
      $producer = $this->input->post('producer');
      $poster = $this->input->post('poster');
      $playerCode = $this->input->post('playerCode');
      $addDate = $this->input->post('addDate');
      $categoryId = $this->input->post('categoryId');
      
      
     if ($this->films_model->updateMovies($slug, $name, $description, $year, $rating, $producer, $poster, $playerCode, $addDate, $categoryId)) {
        echo "The movie edit successfuly";
      }

    } else if (empty($this->data['movie_item'])) {
      show_404();
    }


    $this->load->view('templates/header', $this->data);
    $this->load->view('movies/edit', $this->data);
    $this->load->view('templates/footer');

   }

   public function delete($slug = NULL) {

     if (!$this->dx_auth->is_admin()) {
      show_404();
    }
   
    $this->data['movie_delete'] = $this->films_model->getMoviesForEdit($slug);

    if (empty($this->data['movie_delete'])) {
      show_404();
    }

    $this->data['title'] = "delete movie";
    $this->data['result'] = "Failed to delete ".$this->data['movie_delete']['name'];

    if ($this->films_model->deleteMovies($slug)) {
      $this->data['result'] = $this->data['movie_delete']['name']." successfuly deleted";
    }

    $this->load->view('templates/header', $this->data);
    $this->load->view('movies/delete', $this->data);
    $this->load->view('templates/footer');

   }

}
