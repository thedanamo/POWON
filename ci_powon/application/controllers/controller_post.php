<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controller_post extends Auth_Controller {

    public function createPost($group_id, $thread_id) {
        $data['title'] = "Create Post";
        $data['group_id'] = $group_id;
        $data['thread_id'] = $thread_id;
        $this->load->view('templates/header',$data);

        $powon_id = $this->session->userdata('powon_id');

        //create post
        $post = $this->input->post('post');

        $postData = array (
            'content' => $post,
            'author_id' => $powon_id,
            'thread_id' => $thread_id,
            //set timezone?
//          date_default_timezone_set("America/New_York");
//          echo "The time is " . date("h:i:sa");
            'date' => date("Y-m-d h:i:sa"),
        );
        $this->load->model('model_post');
        $this->model_post->insertNewPost($postData);

        redirect("controller_thread/threadPage/$thread_id/$group_id", 'refresh');
    }
}

