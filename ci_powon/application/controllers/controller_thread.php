<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controller_thread extends Auth_Controller {

    public function createThreadPage($group_id) {
        $data['title'] = "Create Thread";
        $data['group_id'] = $group_id;
        $this->load->view('templates/header',$data);
        $this->load->view('view_create_thread',$data);
        $this->load->view('templates/footer');
    }

    public function createThread($group_id) {
        $data['title'] = "Threads";
        $data['group_id'] = $group_id;
        $this->load->view('templates/header',$data);

        $name = $this->input->post('name');
        $powon_id = $this->session->userdata('powon_id');

        //create new thread and add it to thread table
        $threadData = array (
            //spelling mistake in db for thread_name
            'name' => $name,
            // should be renamed to author id?
            'author_id' => $powon_id,
            'group_id' => $group_id,
        );
        $this->load->model('model_thread');
        $thread_id = $this->model_thread->insertNewThread($threadData);

        //create post and add it as the first post in thread
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

    public function threadPage($thread_id, $group_id) {

        $this->load->model('model_thread');
        $this->load->model('model_post');

        $data['threadInfo'] = $this -> model_thread -> getThreadInfo($thread_id);
        //$data['groupMemberInfo'] = $this -> model_group ->  getAllGroupMembers($group_id);

        //$data['title'] =  'Threads(To be replaced with Actual thread name!)';

        $text = $this -> model_thread -> getThreadName($thread_id);
        foreach($text as $row)
            $threadName = $row->name;

        $data['title'] = $threadName;
        $data['group_id'] = $group_id;
        $data['thread_id'] = $thread_id;
        $data['postInfo'] = $this -> model_post -> getAllThreadPosts($thread_id);

        $this->load->view('templates/header',$data);
        $this->load->view('view_thread');
        $this->load->view('templates/footer');
    }
}

