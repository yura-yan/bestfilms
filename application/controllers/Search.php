<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
	}

	public function index() {

		$this->load->library('pagination');
		
		$offset = (int) $this->uri->segment(2);
		$p_config['base_url'] = '/search/';
		$row_count = 5;
		$count = 0;

		$this->data['title'] = 'Search';
		$this->data['totalResult'] = 0;
		

		$this->load->model('search_model');
		$this->data['search_result'] = array();
		$slug = '&';
		
        if ($this->input->post('q_search')) {
        	
             $slug = $this->input->post('q_search');
             $this->session->set_flashdata('i', $slug);
             $this->data['value'] = $slug;
		   
        } 

        if ($this->session->flashdata('i') == NULL) {

        	$slug = '&';

        } else {

           $slug = $this->session->flashdata('i');
           $this->session->set_flashdata('i', $slug);
           $this->data['value'] = $slug;

        }	

        $count = count($this->search_model->search($slug));
	    $this->data['search_result'] = $this->search_model->searchPagination($slug, $row_count, $offset);
	    $this->data['totalResult'] = $count;
        

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
		$this->load->view('search', $this->data);
		$this->load->view('templates/footer');

	}
}

 ?>