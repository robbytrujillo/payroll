<?php 

class passwordEditing extends CI_Controller {

    public function index() {
        $dataPasswordEditing['title'] = "Password Editing";
        $this->load->view('templates_admin/header', $dataPasswordEditing);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('passwordEditing', $dataPasswordEditing);
        $this->load->view('templates_admin/footer');
    }

    public function passwordEditingAction() {
        $newPassword = $this->input->post('newPassword');
        $confirmPassword = $this->input->post('confirmPassword');

        $this->form_validation->set_rules('newPassword', 'New Password', 'required|matches[confirmPassword]');
        $this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            
        }

    }
}

?>