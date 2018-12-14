<?php 

class Ajax_call extends CI_Controller
{	
	function __construct()
    {
        parent:: __construct();
        
        $this->load->model('company_model');

        $this->load->library('Excel');
    }

	//------------Company--------------

	public function get_company_list()
	{
		try
		{
			$table = 'tbl_company_details';
			$primaryKey = 'company_id';
			$cnt=0;
			$columns = array(
				array( 'db' => 'company_id', 'dt' => $cnt++, 'field' => 'company_id' , 'formatter' => function( $d, $row ) 
				{
					return "<a href='".base_url("Company/Edit/".$d)."' class='btn btn-warning btn-sm'> <i class='fa fa-pencil'></i></a>&nbsp;<a href='javascript:void(0);' class='btn btn-danger btn-sm remove_company' data-id=$d> <i class='fa fa-trash' ></i></a>&nbsp;<a href='".base_url("Company/View/".$d)."' class='btn btn-info btn-sm' data-id=$d> <i class='fa fa-eye' ></i></a>";
				}),
				array( 'db' => 'page_url', 'dt' => $cnt++, 'field' => 'page_url' , 'formatter' => function( $d, $row ) 
				{
					return "<a target='_blank' href='https://whollyticket.com/event/".$d."'>$d</a>";
				}),
				array( 'db' => 'company_name', 'dt' => $cnt++, 'field' => 'company_name' ),
				array( 'db' => 'title', 'dt' => $cnt++, 'field' => 'title' ),
				array( 'db' => 'email', 'dt' => $cnt++, 'field' => 'email' ),
				array( 'db' => 'usa_epay_id', 'dt' => $cnt++, 'field' => 'usa_epay_id' ),
				array( 'db' => 'header_color', 'dt' => $cnt++, 'field' => 'header_color' , 'formatter' => function( $d, $row ) 
				{
					return "<label>".strtoupper($d)."</label>&nbsp;<label style='width: 20px;height: 20px;margin: 0px;padding: 0px;vertical-align: middle;background-color:".$d.";'></label>";
				}),
				array( 'db' => 'created_dt', 'dt' => $cnt++, 'field' => 'created_dt' ),
				array( 'db' => 'modify_dt', 'dt' => $cnt++, 'field' => 'modify_dt' )	
			);

			/*array( 'db' => 't2_saturday', 'dt' => $cnt++, 'field' => 't2_saturday' , 'formatter' => function( $d, $row ) 
			{
				return $d==1?"YES":"NO";
			}),*/

			
			$joinQuery = "";
			$extraWhere = "";
			$groupBy = "";
			$having = "";

			require('ssp.customized.class.php' );
			echo json_encode(
				SSP::simple( $this->input->get(), $this->get_sql_details(), $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
			);
		}
		catch(Exception $e)
		{
		    echo $e->getMessage;
		}
	}

	public function remove_company()
	{
		$id=$this->input->post('id');
		
		//$status="1";
		$status=$this->company_model->remove($id);

		$arr=array();
		$arr['id']=$id;
		$arr['status']=$status;
		echo json_encode($arr);
	}

	//------------Transaction--------------

	public function get_tran_list()
	{
		try
		{
			$company_id=$this->input->get("company_id");

			$table = 'tbl_payment_details';
			$primaryKey = 'payment_id';
			$cnt=0;
			$columns = array(
				array( 'db' => 'p.name', 'dt' => $cnt++, 'field' => 'name' ),
				array( 'db' => 'p.email', 'dt' => $cnt++, 'field' => 'email' ),
				array( 'db' => 'p.description', 'dt' => $cnt++, 'field' => 'description' ),
				array( 'db' => 'p.amount', 'dt' => $cnt++, 'field' => 'amount' ),
				array( 'db' => 'p.invoice_no', 'dt' => $cnt++, 'field' => 'invoice_no' ),
				array( 'db' => 'p.auth_code', 'dt' => $cnt++, 'field' => 'auth_code' ),
				array( 'db' => 'p.ref_no', 'dt' => $cnt++, 'field' => 'ref_no' ),
				array( 'db' => 'c.company_name', 'dt' => $cnt++, 'field' => 'company_name' ),
				array( 'db' => 'p.donate_date', 'dt' => $cnt++, 'field' => 'donate_date' )
			);

			$joinQuery = " FROM tbl_payment_details p,tbl_company_details c ";
			$extraWhere = " tran_status=1 AND p.company_id=c.company_id AND p.company_id=$company_id ";
			$groupBy = "";
			$having = "";

			require('ssp.customized.class.php' );
			echo json_encode(
				SSP::simple( $this->input->get(), $this->get_sql_details(), $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
			);
		}
		catch(Exception $e)
		{
		    echo $e->getMessage;
		}
	}
	
	//------------SQL Details------

	public function get_sql_details()
	{
		$sql_details = array(
				'user' => 'root',
				'pass' => '',
				'db'   => 'beachcombers_db',
				'host' => 'localhost'
			);

		return $sql_details;
	}
}
?>