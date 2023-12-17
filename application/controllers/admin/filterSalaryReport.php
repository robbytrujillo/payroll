<?php 

class FilterSalaryReport extends CI_Controller{
    public function index() {
        $dataSalaryReport['title'] = "Employee Salary Report";
        $this->load->view('templates_admin/header', $dataSalaryReport);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/filterSalaryReport');
        $this->load->view('templates_admin/footer');
    }

    public function printSalaryReport() {
        $dataSalaryReport['title'] = "Print Data Employee Salary";

        if ((isset($_GET['month']) && $_GET['month']!='') && (isset($_GET['year']) && $_GET['year']!='')) {
            $month = $_GET['month'];
            $year = $_GET['year'];
            $monthyear = $month.$year;
        } else {
            $month = date('m');
            $year = date('Y');
            $monthyear = $month.$year;
        }

        $dataSalaryReport['piece'] = $this->payrollModel->get_data('salary_cuts')
            ->result();

        $dataSalaryReport['printSalary'] = $this->db->query("SELECT employees.nik, 
            employees.name_employee, employees.gender, position.name_position, 
            position.basic_salary, position.transport_allowance, position.meal_allowance,
            attendaces.alpha FROM employees INNER JOIN attendaces ON attendaces.nik = 
            employees.nik INNER JOIN position ON position.name_position = employees.position
            WHERE attendaces.month = '$monthyear' ORDER BY employees.name_employee ASC")->result();
        $this->load->view('templates_admin/header', $dataSalaryReport);
        $this->load->view('admin/printSalary', $dataSalaryReport);
    }
}


?>