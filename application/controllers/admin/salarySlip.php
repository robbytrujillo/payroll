<?php 

class SalarySlip extends CI_Controller {

    public function index() {
        $dataSalarySlip['title'] = "Employee Salary Slip";
        $dataSalarySlip['employee'] = $this->payrollModel->get_data('employees')->result();
        $this->load->view('templates_admin/header', $dataSalarySlip);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/salarySlip');
        $this->load->view('templates_admin/footer');
    }
}

?>
