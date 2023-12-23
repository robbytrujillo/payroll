<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->_rules();

		if ($this->form_validation->run()==FALSE) {
			$data['title'] = "Form Login";
			$this->load->view('templates_admin/header', $data);
			$this->load->view('formLogin');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$cek = $this->payrollModel->cek_login($username, $password);

			if ($cek == FALSE) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Username or password failed!</strong>
                	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
				redirect('Welcome');
			} else {
				$this->session->set_userdata('access_right', $cek->access_right);
				$this->session->set_userdata('name_employee', $cek->name_employee);
				$this->session->set_userdata('photo', $cek->photo);
				$this->session->set_userdata('id_employee', $cek->id_employee);
				$this->session->set_userdata('nik', $cek->nik);
				switch ($cek->access_right) {
					case 1 : redirect('admin/Dashboard');
							 break;
					case 2 : redirect('employee/Dashboard');
							 break;
					default:
							 break;
				}
			}
		}
	}	

	public function _rules(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('Welcome');
	}
}
