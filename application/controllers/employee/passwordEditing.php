<?php 

class passwordEditing extends CI_Controller {

    public function index() {
        $dataPasswordEditing['title'] = "Password Editing";
        $this->load->view('templates_employee/header', $dataPasswordEditing);
        $this->load->view('templates_employee/sidebar');
        $this->load->view('employee/passwordEditing', $dataPasswordEditing);
        $this->load->view('templates_employee/footer');
    }

    public function passwordEditingAction() {
        $newPassword = $this->input->post('newPassword');
        $confirmPassword = $this->input->post('confirmPassword');

        $this->form_validation->set_rules('newPassword', 'New Password', 'required|matches[confirmPassword]');
        $this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'required');

        if ($this->form_validation->run() != FALSE) {
            $dataPasswordEditing = array('password' => md5($newPassword));

            $id = array('id_employee' => $this->session->userdata('id_employee'));

            $this->payrollModel->update_data('employees', $dataPasswordEditing, $id);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Update Password Success!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('Welcome');
        }
        else {
            $dataPasswordEditing['title'] = "Password Editing";
            $this->load->view('templates_employee/header', $dataPasswordEditing);
            $this->load->view('templates_employee/sidebar');
            $this->load->view('employee/passwordEditing', $dataPasswordEditing);
            $this->load->view('templates_employee/footer');
            }
         }
}

?>