<?php
class Dashboard extends MY_Controller
{
    function __construct()
    {
        parent:: __construct();        
        
    }

	public function index()
    {
        $this->view_data['title'] = 'Dashboard';
        $this->view_data['page_name'] = 'dashboard';
		
		$this->view_data['total_company'] = "15K";
    }
} 
?>