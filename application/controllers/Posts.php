<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends MY_Controller {

   public function __construct() {
     parent::__construct();
     $this->load->model('posts_model');
   }

   public function index() {

    if (!$this->dx_auth->is_admin()) {
      show_404();
    }

   	$this->data['title'] = "Posts";
   	$this->data['posts'] = $this->posts_model->getPosts();

   	$this->load->view('templates/header', $this->data);
   	$this->load->view('posts/index', $this->data);
   	$this->load->view('templates/footer');
   }

   public function view($slug = NULL) {
   	$this->data['posts_item'] = $this->posts_model->getPosts($slug);

   	if (empty($this->data['posts_item'])) {
   		show_404();
   	}

    $this->data['title'] = $this->data['posts_item']['title'];
    $this->data['content'] = $this->data['posts_item']['text'];

   	$this->load->view('templates/header', $this->data);
   	$this->load->view('posts/view', $this->data);
   	$this->load->view('templates/footer');
   }

   public function create($slug = NULL) {

     if (!$this->dx_auth->is_admin()) {
      show_404();
    }

    $this->data['title'] = "add post";
    
    if ($this->input->post('slug') && $this->input->post('title') && $this->input->post('text')) {
    	$slug = $this->input->post('slug');
    	$title = $this->input->post('title');
    	$content = $this->input->post('text');
    	$slugF = htmlspecialchars(mb_strtolower(trim($slug)), ENT_QUOTES, 'UTF-8');
    	$titleF = htmlspecialchars(mb_strtolower(trim($title)), ENT_QUOTES, 'UTF-8');
    	$contentF = htmlspecialchars(mb_strtolower(trim($content)), ENT_QUOTES, 'UTF-8');

    	if ($this->posts_model->setPost($slugF, $titleF, $contentF)) {
    		$this->load->view('templates/header', $this->data);
    		$this->load->view('posts/success', $this->data);
    		$this->load->view('templates/footer');
    	}
    } else {
    	$this->load->view('templates/header', $this->data);
    	$this->load->view('posts/create', $this->data);
    	$this->load->view('templates/footer');
    }
   }

   public function edit($slug = NULL) {

     if (!$this->dx_auth->is_admin()) {
      show_404();
    }

   	$this->data['title'] = "edit posts";
   	$this->data['posts_item'] = $this->posts_model->getPosts($slug);
    $this->data['title_posts'] = $this->data['posts_item']['title'];
    $this->data['content_posts'] = $this->data['posts_item']['text'];
    $this->data['slug_posts'] = $this->data['posts_item']['slug'];

    if ($this->input->post('slug') && $this->input->post('title') && $this->input->post('text')) {
    	$slug = $this->input->post('slug');
    	$title = $this->input->post('title');
    	$content = $this->input->post('text');

    	$slugF = htmlspecialchars(mb_strtolower(trim($slug)), ENT_QUOTES, 'UTF-8');
    	$titleF = htmlspecialchars(mb_strtolower(trim($title)), ENT_QUOTES, 'UTF-8');
    	$contentF = htmlspecialchars(mb_strtolower(trim($content)), ENT_QUOTES, 'UTF-8');

    	if ($this->posts_model->updatePost($slugF, $titleF, $contentF)) {
    		echo "The post was successfuly edited";
    	} 	
    } elseif (empty($this->data['posts_item'])) {
    	show_404();
    }

    $this->load->view('templates/header', $this->data);
    $this->load->view('posts/edit', $this->data);
    $this->load->view('templates/footer');
   

   }

   public function delete($slug = NULL) {

     if (!$this->dx_auth->is_admin()) {
      show_404();
    }

   	$this->data['post_delete'] = $this->posts_model->getPosts($slug);

   	if (empty($this->data['post_delete'])) {
   		show_404();
   	}

   	$this->data['title'] = "delete news";
   	$this->data['result'] = "Failed to delete ".$this->data['post_delete']['title'];

   	if ($this->posts_model->deletePost($slug)) {
   		$this->data['result'] = $this->data['post_delete']['title']." successfuly deleted";
   	}

   	$this->load->view('templates/header', $this->data);
   	$this->load->view('posts/delete', $this->data);
   	$this->load->view('templates/footer');

   }

}

