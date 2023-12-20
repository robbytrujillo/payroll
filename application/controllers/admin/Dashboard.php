<?php

class Dashboard extends CI_Controller{

    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('access_right') != '1') {
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
        // echo "Hello World";
        $data['title'] = "Dashboard";
        $employee = $this->db->query("SELECT * FROM employees");
        $data['employee'] = $employee->num_rows();

        $admin = $this->db->query("SELECT * FROM employees WHERE position = 'Admin'");
        $data['admin'] = $admin->num_rows();
        
        $position = $this->db->query("SELECT * FROM position");
        $data['position'] = $position->num_rows();
       
        $attendaces = $this->db->query("SELECT * FROM attendaces");
        $data['attendaces'] = $attendaces->num_rows();


        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates_admin/footer');
    }
}

?>