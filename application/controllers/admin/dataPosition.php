<?php
class DataPosition extends CI_Controller{

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

    public function _rules() {
        $this->form_validation->set_rules('name_position', 'name position', 'required');
        $this->form_validation->set_rules('basic_salary', 'basic salary', 'required');
        $this->form_validation->set_rules('transport_allowance', 'transport allowance', 'required');
        $this->form_validation->set_rules('meal_allowance', 'meal allowance', 'required');
    }
}

?>