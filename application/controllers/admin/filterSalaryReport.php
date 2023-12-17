<?php 

class FilterSalaryReport extends CI_Controller{
    public function index() {
        $dataSalaryReport['title'] = "Employee Salary Report";
        $this->load->view('templates_admin/header', $dataSalaryReport);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/filterSalaryReport');
        $this->load->view('templates_admin/footer');
    }
}


?>