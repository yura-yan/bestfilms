<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends MY_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){

		$this->load->library('email');

		$this->data['title'] = 'Контакты';
		$this->data['formResult'] = NULL;

		if ($this->input->post('name') && $this->input->post('email') && $this->input->post('text')) {
			$this->email->to('yurapetrosyan93@gmail.com');
			$this->email->from($this->input->post('email'), $this->input->post('name'));
			$this->email->subject('BestFilm form');
			$this->email->message($this->input->post('text'));
			$this->email->send();
			$this->data['formResult'] = 'Form received';
		}

		$this->load->view('templates/header', $this->data);
		$this->load->view('contacts', $this->data);
		$this->load->view('templates/footer');
	}
}