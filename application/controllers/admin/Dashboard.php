<?php

class Dashboard extends CI_Controller{
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