<?php
 class Posts extends CI_Controller{
  public function index(){
    $this->output->cache(0);; //clear all cache
     
  		$data['title'] = 'Latest Posts';
  		$data['posts'] = $this->post_model->get_posts();

  		$this->load->view('templates/header');
  		$this->load->view('posts/index', $data);
  		$this->load->view('templates/footer');

  }

  public function view($slug = NULL, $offset = 0){  //this method displays a page with one post and its comments

        $this->config->load('bootstrap-pagination');
         $config = $this->config->item('pagination');

        $config['base_url'] = base_url().'posts/'.$slug.'/';
        $config['total_rows'] = $this->db->count_all('comments');
        $config['per_page'] = 3;

       
    $this->pagination->initialize($config);

    

  	$data['post'] =$this->post_model->get_posts($slug);
    $post_id = $data['post']['id'];

    $data['comments'] = $this->comment_model->get_comments($post_id, $offset, $config['per_page']);

  	if(empty($data['post'])){
  		show_404();
  	}

  	$data['title'] = $data['post']['title'];

  		$this->load->view('templates/header');
  		$this->load->view('posts/view',$data);
  		$this->load->view('templates/footer');
  }
 }