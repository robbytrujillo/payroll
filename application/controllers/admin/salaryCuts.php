<?php 

class SalaryCuts extends CI_Controller {
    
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
        $dataSalaryCuts['title'] = "Salary Cuts Setting";
        $dataSalaryCuts['salary_cuts'] = $this->payrollModel->
            get_data('salary_cuts')->result();

            $this->load->view('templates_admin/header', $dataSalaryCuts);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/salaryCuts', $dataSalaryCuts);
            $this->load->view('templates_admin/footer');
    }
    
    public function addData() {
        $dataSalaryCuts['title'] = "Add Salary Cuts";
            $this->load->view('templates_admin/header', $dataSalaryCuts);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/addSalaryCuts', $dataSalaryCuts);
            $this->load->view('templates_admin/footer');
    }

    public function addDataAction() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->addData();
        } else {
            $piece = $this->input->post('piece');
            $number_of_pieces = $this->input->post('number_of_pieces');

            $data = array (
                'piece' => $piece,
                'number_of_pieces' => $number_of_pieces
            );

            $this->payrollModel->insert_data($data, 'salary_cuts');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Add Data Success!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
            </button>
          </div>');
          redirect('admin/salaryCuts');
        }
    }
    
    public function updateData($id) {
        $where = array ('id'=>$id);
        $dataSalaryCuts['title'] = "Update Salary Cuts";
        $dataSalaryCuts['salary_cuts']  = $this->db->query("SELECT * FROM salary_cuts WHERE id = '$id'")->result();
        $this->load->view('templates_admin/header', $dataSalaryCuts);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/updateSalaryCuts', $dataSalaryCuts);
        $this->load->view('templates_admin/footer');
    }

    public function updateDataAction() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->updateData();
        } else {
            $id = $this->input->post('id');
            $piece = $this->input->post('piece');
            $number_of_pieces = $this->input->post('number_of_pieces');

            $data = array (
                'piece' => $piece,
                'number_of_pieces' => $number_of_pieces
            );

            $where = array(
                'id' => $id
            );

            $this->payrollModel->update_data('salary_cuts', $data, $where);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Update Data Success!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
            </button>
          </div>');
          redirect('admin/salaryCuts');
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('piece', 'pieces', 'required');
        $this->form_validation->set_rules('number_of_pieces', 'number of pieces', 'required');
    }

    public function deleteData($id) {
        $where = array ('id' => $id);
        $this->payrollModel->delete_data($where, 'salary_cuts');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Delete Data Success!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
            </button>
          </div>');
          redirect('admin/salaryCuts');
    }

}

?>