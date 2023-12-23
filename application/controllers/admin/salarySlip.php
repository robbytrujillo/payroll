<?php 

class SalarySlip extends CI_Controller {

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
        $dataSalarySlip['title'] = "Filter Employee Salary Slip";
        $dataSalarySlip['employee'] = $this->payrollModel->get_data('employees')->result();
        $this->load->view('templates_admin/header', $dataSalarySlip);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/filterSalarySlip', $dataSalarySlip);
        $this->load->view('templates_admin/footer');
    }

    public function printSalarySlip() {
        $dataSalarySlip['title'] = "Print Salary Slip";

        $dataSalarySlip['salary_cut'] = $this->payrollModel->get_data('salary_cuts')->result();
        $name = $this->input->post('name_employee');
        $month = $this->input->post('month');
        $year = $this->input->post('year');
        $monthyear = $month.$year;
        
        $dataSalarySlip['print_slip'] = $this->db->query("SELECT employees.nik, employees.name_employee, 
                position.name_position, position.basic_salary, position.transport_allowance, position.meal_allowance,
                attendaces.alpha FROM employees INNER JOIN attendaces ON attendaces.nik = employees.nik
                INNER JOIN position ON position.name_position = employees.position WHERE attendaces.month = '$monthyear' 
                AND attendaces.name_employee = '$name'")->result();
        $this->load->view('templates_admin/header', $dataSalarySlip);
        $this->load->view('admin/printSalarySlip', $dataSalarySlip);
    }
}

?>
