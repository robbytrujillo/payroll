<?php
class DataPosition extends CI_Controller{

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
        $dataPosition['title'] = "Position";
        $dataPosition['position'] = $this->payrollModel->get_data('position')
            ->result();
        $this->load->view('templates_admin/header', $dataPosition);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataPosition', $dataPosition);
        $this->load->view('templates_admin/footer');
    }

    public function addData() {
        $dataPosition['title'] = "Add Data Position";
        $this->load->view('templates_admin/header', $dataPosition);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/addDataPosition', $dataPosition);
        $this->load->view('templates_admin/footer');
    }

    public function addDataAction() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->addData();
        } else {
            $name_position = $this->input->post('name_position');
            $basic_salary = $this->input->post('basic_salary');
            $transport_allowance = $this->input->post('transport_allowance');
            $meal_allowance = $this->input->post('meal_allowance');

            $data = array(
                'name_position' => $name_position,
                'basic_salary' => $basic_salary,
                'transport_allowance' => $transport_allowance,
                'meal_allowance' => $meal_allowance,
            ); 

            $this->payrollModel->insert_data($data, 'position');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Add Data Success!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
            </button>
          </div>');
          redirect('admin/dataPosition');
        }
    }

    public function updateData($id) {
            
        $dataPosition['position']  = $this->db->query("SELECT * FROM position WHERE id_position = '$id'")->result();
        $dataPosition['title'] = "Update Data Position";
        $this->load->view('templates_admin/header', $dataPosition);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/updateDataPosition', $dataPosition);
        $this->load->view('templates_admin/footer');
    }

    public function updateDataAction() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->updateData();
        } else {
            $id                     = $this->input->post('id_position');
            $name_position          = $this->input->post('name_position');
            $basic_salary           = $this->input->post('basic_salary');
            $transport_allowance    = $this->input->post('transport_allowance');
            $meal_allowance         = $this->input->post('meal_allowance');

            $data = array(
                'name_position' => $name_position,
                'basic_salary' => $basic_salary,
                'transport_allowance' => $transport_allowance,
                'meal_allowance' => $meal_allowance,
            ); 

            $where = array('id_position' => $id);

            $this->payrollModel->update_data('position', $data, $where);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Update Data Success!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
            </button>
          </div>');
          redirect('admin/dataPosition');
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('name_position', 'name position', 'required');
        $this->form_validation->set_rules('basic_salary', 'basic salary', 'required');
        $this->form_validation->set_rules('transport_allowance', 'transport allowance', 'required');
        $this->form_validation->set_rules('meal_allowance', 'meal allowance', 'required');
    }

    public function deleteData($id) {
        $where = array ('id_position' => $id);
        $this->payrollModel->delete_data($where, 'position');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Delete Data Success!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
            </button>
          </div>');
          redirect('admin/dataPosition');
    }
}

?>