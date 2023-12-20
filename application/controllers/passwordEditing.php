<?php 

class passwordEditing extends CI_Controller {

    public function index() {
        $dataPasswordEditing['title'] = "Password Editing";
        $this->load->view('templates_admin/header', $dataPasswordEditing);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('passwordEditing', $dataPasswordEditing);
        $this->load->view('templates_admin/footer');
    }
}

?>