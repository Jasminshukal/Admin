<?php
class Admin extends MY_Controller
{
    function __construct()
    {
        parent:: __construct();
        //$this->load->library('form_validation');
        $this->load->model('admin_model');
    }

    public function index()
    {
        if(isset($_SESSION['username']))
            redirect(base_url('Dashboard'));
        else
            redirect(base_url('login'));
    }
    
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('id');
        redirect('login', 'refresh');    
    }
    
    public function login()
    {
        if(isset($_SESSION['username']))
            redirect(base_url('Dashboard'));

        $this->layout_view='layout/blank_layout';
        $this->view_data['title'] = "Admin Login";

        $this->form_validation->set_rules('username', 'Email', 'valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters("<div class='alert alert-danger' style='color: #D90022;'>", "</div>");
		
        if ($this->form_validation->run() == TRUE)
        {
            $form_data['username']=$this->security->xss_clean($this->input->post('username'));
            $form_data['password']=$this->security->xss_clean($this->input->post('password'));
            $check_login = $this->admin_model->check_login($form_data);
            if($check_login['status'] && isset($check_login['data']))
            {
                $this->session->set_userdata(array(
                    'username' => $check_login['data'][0]['email'],
                    'id'=>$check_login['data'][0]['id'] )
                );
                redirect(base_url('Dashboard'));
            }
            else
            {
                $this->view_data['login_error'] = array('color' =>'danger' ,'message'=> $check_login['message']);
            }
        }
    }
	
	public function ChangePassword()
    {
		$this->view_data['title'] = "Change Password";
		
		$this->view_data['message']="";
		
		if($this->input->post('change_pwd'))
		{
			if(empty($this->input->post('txt_opassword')) || empty($this->input->post('txt_npassword')) || empty($this->input->post('txt_cnpassword'))) 
			{
				$this->view_data['message']="<div class='alert alert-danger' style='color: #D90022;'>Please enter all fields.</div>";
			}
			else
			{
				if($this->input->post('txt_npassword')==$this->input->post('txt_cnpassword'))
				{
					if($this->admin_model->check_old_password(MD5($this->input->post('txt_opassword')))==1)
					{
						$data=array();
						$data['email']=$this->session->userdata('username');
						$data['npass']=MD5($this->input->post('txt_npassword'));
						$data['opass']=MD5($this->input->post('txt_opassword'));
						
						if($this->admin_model->change_password($data)==1)
						{
							$this->view_data['message']="<div class='alert alert-success' style='color: #9CE06A;'>Successfully change password.</div>";
						}
						else
						{
							$this->view_data['message']="<div class='alert alert-danger' style='color: #D90022;'>Somthing was wrong, Please try again later.</div>";
						}
					}
					else
					{
						$this->view_data['message']="<div class='alert alert-danger' style='color: #D90022;'>Please check old password.</div>";
					}
				}
				else
				{
					$this->view_data['message']="<div class='alert alert-danger' style='color: #D90022;'>New password and Confirm new password not match.</div>";
				}
			}
		}
	}
}