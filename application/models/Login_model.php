<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model Extends CI_model
{
	function do_login($U, $P)
	{
		$result = 1;

		$username = $this->security->xss_clean($U);
		$password = $this->security->xss_clean($P);
		$acakadut = "kunirparut";
		$userpass = md5($acakadut.md5($password).$acakadut);
		if ($U)
		{
			$this->db->select('u.*');
			$this->db->from('user2 u');
			$this->db->where('u.user_login', $username);
			$this->db->where('u.user_password',$userpass);

			$query = $this->db->get();

			if ($query->num_rows() == 1)
			{
				foreach ($query->result() as $row)
				{
					if($row->user_is_active == 1)
					{
						$result = 1;
					}
					else
					{
						$result = 2;
					}
				}
			}
			else
			{
				$result = 3;
			}
		}

		return $result;
	}

	function get_data_user($username)
  {
		$this->db->select('
			*
		');
		$this->db->from('user2 u');
		$this->db->where('u.user_login', $username);

    $result = $this->db->get();

    return $result->row_array();
  }
}