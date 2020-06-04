<?php 
	class Comment_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function create_comment($post_id){

			// $name = $this->input->post('name');
			// $email = $this->input->post('email');

			// if($name ===''){
			// 	$break = exolode('@',$email);
			// 	$name = $break[0];
			// } else {
			// 	$name = $this->input->post('name');
			// }

			$data = array(
				'post_id' => $post_id,
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'body' => $this->input->post('body')

			);

			return $this->db->insert('comments', $data);

		}

		public function get_comments($post_id, $offset = 0, $limit = 0){

			if($limit){
				$this->db->limit($limit, $offset);
			}

			$this->db->order_by('created_at','DESC');
			$query = $this->db->get_where('comments', array('post_id' => $post_id));

			
			return $query->result_array();

		}
	}