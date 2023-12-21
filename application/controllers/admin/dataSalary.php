<?php

class DataSalary extends CI_Controller{

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
    
    public function index() {
        $dataSalary['title'] = "Data Employee Salary";

        if ((isset($_GET['month']) && $_GET['month']!='') && (isset($_GET['year']) && $_GET['year']!='')) {
            $month = $_GET['month'];
            $year = $_GET['year'];
            $monthyear = $month.$year;
        } else {
            $month = date('m');
            $year = date('Y');
            $monthyear = $month.$year;
        }

        $dataSalary['piece'] = $this->payrollModel->get_data('salary_cuts')
            ->result();

        $dataSalary['salary'] = $this->db->query("SELECT employees.nik, 
            employees.name_employee, employees.gender, position.name_position, 
            position.basic_salary, position.transport_allowance, position.meal_allowance,
            attendaces.alpha FROM employees INNER JOIN attendaces ON attendaces.nik = 
            employees.nik INNER JOIN position ON position.name_position = employees.position
            WHERE attendaces.month = '$monthyear' ORDER BY employees.name_employee ASC")->result();
        $this->load->view('templates_admin/header', $dataSalary);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataSalary', $dataSalary);
        $this->load->view('templates_admin/footer');
    }

    public function printSalary() {
        $dataSalary['title'] = "Print Data Employee Salary";

        if ((isset($_GET['month']) && $_GET['month']!='') && (isset($_GET['year']) && $_GET['year']!='')) {
            $month = $_GET['month'];
            $year = $_GET['year'];
            $monthyear = $month.$year;
        } else {
            $month = date('m');
            $year = date('Y');
            $monthyear = $month.$year;
        }

        $dataSalary['piece'] = $this->payrollModel->get_data('salary_cuts')
            ->result();

        $dataSalary['printSalary'] = $this->db->query("SELECT employees.nik, 
            employees.name_employee, employees.gender, position.name_position, 
            position.basic_salary, position.transport_allowance, position.meal_allowance,
            attendaces.alpha FROM employees INNER JOIN attendaces ON attendaces.nik = 
            employees.nik INNER JOIN position ON position.name_position = employees.position
            WHERE attendaces.month = '$monthyear' ORDER BY employees.name_employee ASC")->result();
        $this->load->view('templates_admin/header', $dataSalary);
        $this->load->view('admin/printSalary', $dataSalary);
    }

}


?>