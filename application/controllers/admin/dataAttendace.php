<?php 

class DataAttendace extends CI_Controller{

    public function index() {
        $dataAttendace['title'] = "Data Attendace";
        // $dataAttendace['position'] = $this->payrollModel->get_data('position')
        //     ->result();
        $dataAttendace['attendace'] = $this->db->query("SELECT attendaces.*, employees.name_employee, employees.gender, employees.name_position
            FROM attendaces 
            INNER JOIN employees ON attendaces.nik = employees.nik
            INNER JOIN position ON employees.position = position.name_position
            WHERE 
            ");
        $this->load->view('templates_admin/header', $dataAttendace);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataAttendace', $dataAttendace);
        $this->load->view('templates_admin/footer');
    }
}
?>