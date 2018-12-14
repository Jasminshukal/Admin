<?php
class MY_Controller extends CI_Controller
{
	protected $userdata=NULL;
	protected $content_view="";
	protected $layout_view="layout/default";
	protected $view_data="";
	protected $timezone =''; 
	//protected $page_render =TRUE;

	public function __construct()
	{
		parent:: __construct();
		//$this->load->database();

		ini_set('memory_limit', '-1');
		set_time_limit(0);
        
        if($this->session->userdata('client_id')!='') 
        {
           $this->client_id =$this->session->userdata('client_id');
           $this->role =$this->session->userdata('role');
           $this->org_id =$this->session->userdata('org_id');
        }
        if($this->session->userdata('timezone')!='')
        {
        	$this->timezone = $this->session->userdata('timezone');
        	date_default_timezone_set($this->session->userdata('timezone'));
        }
	}

	public function _output()
	{

		// content_view = ComapnyList/newpage		

		//echo $this->content_view;	

		if ($this->content_view !== FALSE && empty($this->content_view))
			$this->content_view = $this->router->class .'/'. $this->router->method;		

		// selecting view and make data
		//echo " URL ". APPPATH. 'views/'.$this->content_view.EXT;
		//print_r($this->view_data);

		$content_data = file_exists(APPPATH. 'views/'.$this->content_view.EXT) ? $this->load->view($this->content_view,$this->view_data,TRUE):FALSE;

		// put data into the layout

		if($content_data)
		{
			//echo $this->layout_view;
			//echo $content_data;	
			echo $this->load->view($this->layout_view,array("data" => $content_data),TRUE);
		}
		else
		{
			echo "file does not exists";
		}
	}
}
?>