<?php 

class DataAttendace extends CI_Controller{

    public function index() {
        $dataAttendace['title'] = "Data Attendace";
        // $dataAttendace['position'] = $this->payrollModel->get_data('position')
        //     ->result();
        $this->load->view('templates_admin/header', $dataAttendace);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataAttendace', $dataAttendace);
        $this->load->view('templates_admin/footer');
    }
}
?>