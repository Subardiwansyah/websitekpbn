<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('Login_model');
	}

	function index()
	{
		$is_login = $this->session->userdata('logged_in') ? $this->session->userdata('logged_in') : 0;

		if($is_login == 0)
		{
			$this->load->view('login_view');
		}
		else
		{
			redirect('');
		}
	}

	function do_login()
	{
		date_default_timezone_set('Asia/Jakarta');

		$username = $this->input->post('t_username') ? $this->input->post('t_username') : '';
		$password = $this->input->post('t_password') ? $this->input->post('t_password') : '';

		if ($username == '')
		{
			redirect ('login');
		}
		else if ($password == '')
		{
			redirect ('login');
		}
		else
		{
			$do_login = $this->Login_model->do_login($username, $password);

			if ($do_login == 1)
			{
				$data_user = $this->Login_model->get_data_user($username);

				$user_news = isset($data_user['user_news']) ? $data_user['user_news'] : 0;
				$user_fullname = isset($data_user['user_fullname']) ? $data_user['user_fullname'] : NULL;
				

				$data_session = array(
					'logged_in' => 1,
					'user_news' => $user_news,
					'user_fullname' => $user_fullname,
				);

				$this->session->set_userdata($data_session);

				echo json_encode(array('status'=>$data_session, 'content'=> 'Login berhasil', 'id_level'=>0));
			}
			else if ($do_login == 2)
			{
				echo json_encode(array('status'=>'failed', 'content'=> 'Akun sudah tidak aktif', 'id_level'=>0));
			}
			else
			{
				echo json_encode(array('status'=>'failed', 'content'=> 'Username atau password salah', 'id_level'=>0));
			}
		}
	}

	function do_logout()
	{
		$this->session->set_userdata('logged_in', 0);
		$this->session->sess_destroy();
		redirect(base_url());
	}
}