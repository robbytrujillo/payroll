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
        
        if ((isset($_GET['month']) && $_GET['month']!='') && (isset($_GET['year']) && $_GET['year']!='')) {
            $month = $_GET['month'];
            $year = $_GET['year'];
            $monthyear = $month.$year;
        } else {
            $month = date('m');
            $year = date('Y');
            $monthyear = $month.$year;
        }
        
        $dataAttendanceReport['attendanceReport'] = $this->db->query("SELECT * FROM attendaces 
            WHERE month = '$monthyear' ORDER BY name_employee ASC")->result();
        
        $this->load->view('templates_admin/header', $dataAttendanceReport);
        $this->load->view('admin/printAttendanceReport');
    }
}

?>