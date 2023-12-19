<?php 

class SalarySlip extends CI_Controller {

    public function index() {
        $dataSalarySlip['title'] = "Filter Employee Salary Slip";
        $dataSalarySlip['employee'] = $this->payrollModel->get_data('employees')->result();
        $this->load->view('templates_admin/header', $dataSalarySlip);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/filterSalarySlip', $dataSalarySlip);
        $this->load->view('templates_admin/footer');
    }

    public function printSalarySlip() {
        $dataSalarySlip['title'] = "Print Salary Slip";
        $this->load->view('templates_admin/header', $dataSalarySlip);
        $this->load->view('admin/printSalarySlip', $dataSalarySlip);
    }
}

?>
