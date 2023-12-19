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
        $name = $this->input->post('name_employee');
        $month = $this->input->post('month');
        $year = $this->input->post('year');
        $monthyear = $month.$year;
        
        $dataSalarySlip['print_slip'] = $this->db->query("SELECT employees.nik, employees.name_employee, 
                position.name_position, position.basic_salary, position.transport_allowance, position.meal_allowance,
                attendaces.alpha FROM employees INNER JOIN attendaces ON attendaces.nik = employees.nik
                INNER JOIN position ON position.name_position = employees.position WHERE attendaces.month = '$monthyear' 
                AND attendaces.name_employee = '$name'")->result();
                // var_dump($slip);
                // die();
        $this->load->view('templates_admin/header', $dataSalarySlip);
        $this->load->view('admin/printSalarySlip', $dataSalarySlip);
    }
}

?>
