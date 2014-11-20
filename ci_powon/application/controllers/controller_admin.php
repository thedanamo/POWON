<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controller_admin extends CI_Controller {

    public function editDeleteMembersPage() {

        $this->load->model('model_member');
        $data['title'] = "Edit/Delete Members";
        $data['result'] = $this->model_member->getAllMembers();

        $this->load->view('templates/header',$data);
        $this->load->view('view_edit_delete_member',$data);
        $this->load->view('templates/footer');

    }

    public function updateMemberPrivilegeStatus($powon_id) {

        $this->load->model('model_admin');
        $privilege = $this -> input -> post('privilege');
        $status = $this -> input -> post('status');

        $updateInfo = array(
            'privilege' => $privilege,
            'status' => $status
        );

        $this->model_admin->updateMemberPrivilegeStatus($updateInfo,$powon_id);
        redirect('controller_admin/editDeleteMembersPage', 'refresh');
    }

    public function deleteMember($powon_id) {

        $this -> load-> model("model_admin");

        $memberData = array (
            'powon_id' => $powon_id
        );

        $this->model_admin->deleteMember($memberData);
        redirect('controller_admin/editDeleteMembersPage', 'refresh');
    }

    public function createPublicPostPage() {

        $data['title'] = "Create Public Post";

        $this->load->view('templates/header',$data);
        $this->load->view('view_create_public_post',$data);
        $this->load->view('templates/footer');
    }

    public function createPublicPost() {

        $this->load->model('model_admin');
        $content = $this->input->post('content');
        $admin_id = $this->session->userdata('powon_id');

        date_default_timezone_set('America/Montreal');
        $currentDateTime = date("Y-m-d H:i:s");

        $postData = array (
            'content' => $content,
            'admin_id' => $admin_id,
            'date' => $currentDateTime
        );

        $this->model_admin->insertNewPublicPost($postData);
        redirect("controller_main/homePage", 'refresh');
    }

}

