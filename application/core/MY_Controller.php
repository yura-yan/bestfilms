<?php 

class MY_Controller extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url');

		$this->data['title'] = "BestFilms - site about films!";
		$this->data['categoryId'] = NULL;
		$this->load->model('news_model');
		$this->data['news'] = $this->news_model->getNews();

		$this->load->model('films_model');
		$this->data['films'] = $this->films_model->getFilmsByRating(10);

		$this->data['loginError'] = "";
		$this->data['commentError'] = NULL;
		$this->data['value'] = NULL;
		$this->data['auth_message'] = NULL;
		$this->data['form_message'] = NULL;

		$in = $this->session->flashdata('in');
		 if($in==1)
		  {
            $this->data['loginError'] = "логин и/или пароль неверны";
		  }

	}
}

 ?>