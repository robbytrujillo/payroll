<?php 

class SalaryCuts extends CI_Controller {
    public function index() {
        $dataSalaryCuts['title'] = "Salary Cuts Setting";
        $dataSalaryCuts['salary_cuts'] = $this->payrollModel->
            get_data('salary_cuts')->result();

            $this->load->view('templates_admin/header', $dataSalaryCuts);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/salaryCuts', $dataSalaryCuts);
            $this->load->view('templates_admin/footer');
    }
}

?>