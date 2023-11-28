<?php

class employeesController extends CI_Controller{
    public function index() {
        $data = $this->db->query("SELECT * FROM employees")->result();
        var_dump($data);
    }
}

?>