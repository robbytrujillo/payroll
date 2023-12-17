<?php 

class SalarySlip extends CI_Controller {

    public function index() {
        $dataSalarySlip['title'] = "Employee Salary Slip";
        $dataSalarySlip['employee'] = $this->payrollModel->get_data('employees')->result();
        
    }
}

?>
