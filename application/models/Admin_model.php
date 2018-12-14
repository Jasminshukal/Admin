<?php

class Admin_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function check_login($formData)
    {
        //print_r($formData);
        $email = $formData['username'];
        $password = md5($formData['password']);

        $this->db->where('email',$email);
        $this->db->where('password',$password);
        $query = $this->db->get('tbl_admin');

        $login_data_array = $query->result_array();
        if(!$query)
        {
            return $return_ary = array('status' => false, 'message' => 'You are not authorised to login.');
        }
        else
        {
            if ($query->num_rows() == 1)
                return $return_ary = array('status' =>true, 'data' => $login_data_array);
            else
                return $return_ary = array('status' => false, 'message' => 'You are not authorised to login.->'.$query->num_rows());
        }
    }

	function check_old_password($pass)
	{
		$this->db->where('email',$this->session->userdata('username'));
		$this->db->where('password',$pass);
		
		$user_row = $this->db->get('tbl_admin');
		
		return $user_row->num_rows();
	}

	function change_password($data)
	{
		$sql="UPDATE tbl_admin SET password='".$data['npass']."' WHERE email='".$data['email']."' AND password='".$data['opass']."'";
		$this->db->query($sql);
		return $this->db->affected_rows();
	}
}
?>