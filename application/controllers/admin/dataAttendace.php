<?php 

class DataAttendace extends CI_Controller{

    public function index() {
        $dataAttendace['title'] = "Data Attendace";
        // $dataAttendace['position'] = $this->payrollModel->get_data('position')
        //     ->result();
        
        
    if ((isset($_GET['month']) && $_GET['month']!='') && (isset($_GET['year']) && $_GET['year']!='')) {
        $month = $_GET['month'];
        $year = $_GET['year'];
        $monthyear = $month.$year;
    } else {
        $month = date('m');
        $year = date('Y');
        $monthyear = $month.$year;
    }


        $dataAttendace['attendaces'] = $this->db->query("SELECT attendaces.*, employees.name_employee, employees.gender, employees.position
            FROM attendaces 
            INNER JOIN employees ON attendaces.nik = employees.nik
            INNER JOIN position ON employees.position = position.name_position
            WHERE attendaces.month = '$monthyear'
            ORDER BY employees.name_employee ASC")->result();
            // var_dump($dataAttendace1);
            // die();

        $this->load->view('templates_admin/header', $dataAttendace);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataAttendace', $dataAttendace);
        $this->load->view('templates_admin/footer');
    }
}
?>