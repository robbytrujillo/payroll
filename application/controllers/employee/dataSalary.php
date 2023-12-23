<?php

class DataSalary extends CI_Controller{

    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('access_right') != '2') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>you are not Login yet!</strong>
                	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
				redirect('Welcome');
        }
    }
    public function index(){
        $data['title'] = "Data Salary";
        $nik = $this->session->userdata('nik');
        $data['salary_cut1'] = $this->payrollModel->get_data('salary_cuts')->result();
        $data['salary'] = $this->db->query("SELECT employees.name_employee, employees.nik, 
            position.basic_salary, position.transport_allowance, position.meal_allowance, 
            attendaces.alpha, attendaces.month, attendaces.id_attendance FROM employees 
            INNER JOIN attendaces ON attendaces.nik = employees.nik 
            INNER JOIN position ON position.name_position = employees.position
            WHERE attendaces.nik = '$nik'
            ORDER BY attendaces.month DESC")->result();
        $this->load->view('templates_employee/header', $data);
        $this->load->view('templates_employee/sidebar');
        $this->load->view('employee/dataSalary', $data);
        $this->load->view('templates_employee/footer');
    }

    public function printSlip($id) {
        $data['title'] = "Print Salary Slip";
        $data['salary_cut'] = $this->payrollModel->get_data('salary_cuts')->result();
        
        $data['print_slip'] = $this->db->query("SELECT employees.nik, employees.name_employee, 
                position.name_position, position.basic_salary, position.transport_allowance, position.meal_allowance,
                attendaces.alpha, attendaces.month FROM employees INNER JOIN attendaces ON attendaces.nik = employees.nik
                INNER JOIN position ON position.name_position = employees.position WHERE attendaces.id_attendance = '$id' 
                ")->result();
                // var_dump($data);
                // die();
        $this->load->view('templates_employee/header', $data);
        $this->load->view('employee/printSalarySlip', $data);
    }
}

?>