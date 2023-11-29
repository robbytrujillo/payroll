<?php

class DataEmployee extends CI_Controller{
    public function index() {
        // $data = $this->db->query("SELECT * FROM employees")->result();
        // var_dump($data);

        $dataEmployee['title'] = "Employees";
        $dataEmployee['employees'] = $this->payrollModel->get_data('employees')->result();
        $this->load->view('templates_admin/header', $dataEmployee);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataEmployee', $dataEmployee);
        $this->load->view('templates_admin/footer');

    }
}

?>