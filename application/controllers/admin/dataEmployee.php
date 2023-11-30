<?php

class DataEmployee extends CI_Controller{
    public function index() {
        // $data = $this->db->query("SELECT * FROM employees")->result();
        // var_dump($data);

        $dataEmployee['title'] = "Employees";
        $dataEmployee['employees'] = $this->payrollModel->get_data('employees')->result();
        $this->load->view('templates_admin/header', $dataEmployee);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataEmployee', $dataEmployee);
        $this->load->view('templates_admin/footer');

    }

    public function addData() {
        $dataEmployee['title'] = "Add Employee";
        $dataEmployee['position'] = $this->payrollModel->get_data('position')->result();
        $this->load->view('templates_admin/header', $dataEmployee);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/AddDataEmployee', $dataEmployee);
        $this->load->view('templates_admin/footer');
    }

    public function addDataAction() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->addData();
        } else {
            $nik = $this->input->post('nik');
            $name_employee = $this->input->post('name_employee');
            $gender = $this->input->post('gender');
            $position = $this->input->post('position');
            $date_join = $this->input->post('date_join');
            $status = $this->input->post('status');
            $photo = $_FILES ['photo'].['name'] ;

            if ($photo=''){
            }else{
                $config ['upload_path'] = './assets/photo';
                $config ['allowed_types'] = 'jpg|jpeg|png|tiff';
                $this->load->library ('upload',$config);
                if (!$this->upload->do_upload('photo')){
                    echo "Upload Photo Failed!";
                } else {
                    $photo = $this->upload->data('file_name');
                }
            }

             $data = array(
            'nik'            => $nik,
            'name_employee'  => $name_employee,
            'gender'         => $gender,
            'position'       => $position,
            'date_join'      => $date_join,
            'status'         => $status,
            'photo'          => $photo,
            );

            $this->payrollModel->insert_data($data, 'employees');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Add Data Success!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/dataEmployee');
            }
}

public function updateData($id) {
    $where = array('id_employee' => $id);
    $dataEmployee['title'] = 'Update';
}

public function _rules() {
    $this->form_validation->set_rules('nik', 'nik', 'required');
    $this->form_validation->set_rules('name_employee', 'name employee', 'required');
    $this->form_validation->set_rules('gender', 'gender', 'required');
    $this->form_validation->set_rules('date_join', 'Date Join', 'required');
    $this->form_validation->set_rules('position', 'Position', 'required');
    $this->form_validation->set_rules('status', 'Status', 'required');
}
}
?>