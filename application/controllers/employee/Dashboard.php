<?php

class Dashboard extends CI_Controller{

    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('access_right') != '2') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>you are not Login yet!</strong>
                	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
				redirect('Welcome');
        }
    }
    public function index(){
        $data['title'] = "Dashboard";
        $id = $this->session->userdata('id_employee');
        $data['employee'] = $this->db->query("SELECT * FROM employees WHERE id_employee = $id ")->result();
        $this->load->view('templates_employee/header', $data);
        $this->load->view('templates_employee/sidebar');
        $this->load->view('employee/dashboard', $data);
        $this->load->view('templates_employee/footer');
    }
}

?>