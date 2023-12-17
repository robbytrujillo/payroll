<?php 

class FilterAttendanceReport extends CI_Controller {

    public function index() {
        $dataAttendanceReport["title"] = "Attendance Report";
        $this->load->view('templates_admin/header', $dataAttendanceReport);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/filterAttendanceReport');
        $this->load->view('templates_admin/footer');
    }

    public function printAttendanceReport() {
        $dataAttendanceReport["title"] = "Print Attendance Report";
        $dataAttendanceReport['attendanceReport'] = $this->db->query("SELECT * FROM attendaces")
    }
}

?>