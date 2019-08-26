<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invoice extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	 public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('invoice_database');
		$this->load->model('customer_database');
		$this->load->model('currency_database');
		$this->load->model('category_database');
		$this->load->model('title_database');
		
		//Loading url helper
		$this->load->helper('url');
	}
	 	
	public function index()
	{		
		
		 $result = $this->invoice_database->invoicelist_info();
		 $result_cust = $this->customer_database->customerlist_info();
		 //print_r($result_cust);
		$data = array(
					'invoicedata' => $result,
					'customerdata' => $result_cust,
					
				);
		
		$this->load->view('invoice_list',$data);
	}
	
	public function add_invoice()
	{
		if(isset($_GET['cid']))
		{
			$custid = $_GET['cid'];
			//$this->load->view('add_invoice',$custid);
		}
		else
		{
			$custid = '';
		}
		$session_data = $this->session->userdata('logged_in');
		//print_r($session_data);
		//$session_data['username'];
		
		if($this->input->post('po_no'))
		{
			
		
			$data = array(
						'po_no' => $this->input->post('po_no'),
						'po_date' => $this->input->post('po_date'),
						'invoice_no' => $this->input->post('invoice_no'),
						'invoice_date' => $this->input->post('invoice_date'),
						'unit' => $this->input->post('unit'),
						'unit_address' => $this->input->post('unit_address'),
						'customer_name' => $this->input->post('customer_name'),
						'customer_email' => $this->input->post('customer_email'),
						'customer_address' => $this->input->post('customer_address'),
						'consignee_address' => $this->input->post('consignee_address'),
						'title_name' => $this->input->post('title_name'),
						'category' => $this->input->post('category'),
						'jtn_no' => $this->input->post('jtn_no'),
						'currency_no' => $this->input->post('currency'),
						'activity' => $this->input->post('activity'),
						'unit_measure' => $this->input->post('unit_measure'),
						'quantity' => $this->input->post('quantity'),
						'rate' => $this->input->post('rate'),
						'total' => $this->input->post('total'),
						'final_total' => $this->input->post('final_total')						
					 );
					 
			$result_invoice_id = $this->invoice_database->add_invoicelist($data);
			
			// send Approval email with URL to account Manager
			
			// Mail function
			//Load email library
			//$this->load->library('email');

			//SMTP & mail configuration
			/* $config = array(
				'protocol'  => 'smtp',
				'smtp_host' => 'ssl://smtp.example.com',
				'smtp_port' => 465,
				'smtp_user' => 'konain.ahmad@thomsondigital.com',
				'smtp_pass' => 'P@ssw0rd',
				'mailtype'  => 'html',
				'charset'   => 'utf-8'
			);
			$this->email->initialize($config);
			$this->email->set_mailtype("html");
			$this->email->set_newline("\r\n");

			//Email content
			$htmlContent = '<h1>Sending email via SMTP server</h1>';
			$htmlContent .= '<p>This email has sent via SMTP server from CodeIgniter application.</p>';

			$this->email->to('recipient@example.com');
			$this->email->from('sender@example.com','MyWebsite');
			$this->email->subject('How to send email via SMTP server in CodeIgniter');
			$this->email->message($htmlContent);

			//Send email
			$this->email->send(); */			
			// End mail function

			
			//if($result_jtn != 2)
			//{
				$result = $this->invoice_database->invoicelist_info();
				$result_cust = $this->customer_database->customerlist_info();
				//print_r($result_cust);
				$data = array(
					'invoicedata' => $result,
					'customerdata' => $result_cust,
					
				);
		
				echo '<script>alert("Records has been added successfully.");</script>';
				$this->load->view('invoice_list',$data);					
			
				
		} else if($custid <> '')
		{
			
				$custid = $_GET['cid']; 	
				$result = $this->customer_database->customerlist_info();
				$result_d = $this->customer_database->customerlist_info_data_detail($custid);				
				$data1['customeremail'] = $result_d[0]['customer_email'];
				$data1['customer_address'] = $result_d[0]['customer_address'];
				$data1['customer_id'] = $result_d[0]['customer_id'];
				
				$data1['po_no'] = $_GET['pono'];
				$data1['po_date'] = $_GET['po_date'];
				$data1['invoice_no'] = $_GET['invoice_no'];
				$data1['invoice_date'] = $_GET['invoice_date'];
				$data1['unit'] = $_GET['unit'];
				$data1['unit_address'] = $_GET['unit_address'];
				$data1['customernames'] = $custid;				
								
				$resultcurrency = $this->currency_database->currencylist_info();
				$resultcategory = $this->category_database->categorylist_info();
				$resulttitle = $this->title_database->titlelist_info();
				$data = array(
							'customerdata' => $result,
							'currencydata' => $resultcurrency,
							'categorydata' => $resultcategory,
							'titledata' => $resulttitle,
						);						
				$newData = array_merge($data, $data1);
				
				//echo "<pre>";
				//print_r($newData);
				//die;
				 
				$this->load->view('add_invoice',$newData);
			
		}
		else
		{	
			// Invoice form		

			$result = $this->customer_database->customerlist_info();
			$resultcurrency = $this->currency_database->currencylist_info();
			$resultcategory = $this->category_database->categorylist_info();
			$resulttitle = $this->title_database->titlelist_info();
				//print_r($result);
				$data = array(
						'customerdata' => $result,
						'currencydata' => $resultcurrency,	
						'categorydata' => $resultcategory,
						'titledata' => $resulttitle,
					);			
			
			$this->load->view('add_invoice',$data);
		}
				
	}
	
	
	
	// Edit user	
	public function edit_invoice()
	{
		
		
		$session_data = $this->session->userdata('logged_in');
		
		if($this->input->post('po_no'))
		{
					
			$data = array(
						'po_no' => $this->input->post('po_no'),
						'po_date' => $this->input->post('po_date'),
						'invoice_no' => $this->input->post('invoice_no'),
						'invoice_date' => $this->input->post('invoice_date'),
						'unit' => $this->input->post('unit'),
						'unit_address' => $this->input->post('unit_address'),
						'customer_name' => $this->input->post('customer_name'),
						'customer_email' => $this->input->post('customer_email'),
						'customer_address' => $this->input->post('customer_address'),
						'consignee_address' => $this->input->post('consignee_address'),
						'title_name' => $this->input->post('title_name'),
						'category' => $this->input->post('category'),
						'jtn_no' => $this->input->post('jtn_no'),
						'currency_no' => $this->input->post('currency'),
						'activity' => $this->input->post('activity'),
						'unit_measure' => $this->input->post('unit_measure'),
						'quantity' => $this->input->post('quantity'),
						'rate' => $this->input->post('rate'),
						'total' => $this->input->post('total'),
						'final_total' => $this->input->post('final_total'),
						'hid_invoice_id' => $this->input->post('hid_invoice_id'),
						'status' => $this->input->post('status')
						
					 );
					 
			//echo "<pre>";	
			//print_r($data);
			//die;
					 
			$result_invoice = $this->invoice_database->edit_invoicelist($data);
			
			// upload documents
			
			
			if($result_invoice != '')
			{
				$result = $this->invoice_database->invoicelist_info();
				$result_cust = $this->customer_database->customerlist_info();
				//print_r($result_cust);
				$data = array(
					'invoicedata' => $result,
					'customerdata' => $result_cust,
					
				);
				
				echo '<script>alert("Records has been modified successfully.");</script>';
				$this->load->view('invoice_list',$data);
			}
			else
			{
					/* $data = array(
						'success_message' => 'Records has been modified successfully.'
					);
					$this->load->view('edit_user',$success_message); */
					//echo '<script>alert("Records has been modified successfully.");</script>';
			}
				
		}
		else
		{	
				$invoiceid = $_GET['invid'];	
				$result_d = $this->invoice_database->invoicelist_info_data($invoiceid);			
										
				$data1['invoicing_id'] = $result_d[0]['invoicing_id'];
				$data1['invoice_no'] = $result_d[0]['invoicing_no'];
				$data1['po_no'] = $result_d[0]['po_no'];				
				$data1['po_date'] = $result_d[0]['po_date'];
				$data1['invoice_date'] = $result_d[0]['invoice_date'];
				$data1['unit_name'] = $result_d[0]['unit_name'];
				$data1['unit_address'] = $result_d[0]['unit_address'];				
				$data1['client_email'] = $result_d[0]['client_email'];
				$data1['customer_address'] = $result_d[0]['customer_address'];
				$data1['consignee_address'] = $result_d[0]['consignee_address'];								
				$data1['jtn_no'] = $result_d[0]['jtn_no'];				
				$data1['total_price'] = $result_d[0]['total_price'];
				$data1['status'] = $result_d[0]['status'];
				$data1['client_name'] = $result_d[0]['client_name'];
				$data1['currency_no'] = $result_d[0]['currency_no'];
				$data1['category'] = $result_d[0]['category'];
				$data1['title_name'] = $result_d[0]['title_name'];
				
				//die("TEST");
				$result_activity = $this->invoice_database->invoiceactivity_info($invoiceid);
				$resultcust = $this->customer_database->customerlist_info();
				$resultcurrency = $this->currency_database->currencylist_info();
				$resultcategory = $this->category_database->categorylist_info();
				$resulttitle = $this->title_database->titlelist_info();
				$data = array(
							'invoiceactivitydata' => $result_activity,
							'customerdata' => $resultcust,
							'currencydata' => $resultcurrency,
							'categorydata' => $resultcategory,
							'titledata' => $resulttitle,
						);						
			/* $result_activity = $this->invoice_database->invoiceactivity_info($invoiceid);
			$resultcust = $this->customer_database->customerlist_info();
			$resultcurrency = $this->currency_database->currencylist_info();
			$resultcategory = $this->category_database->categorylist_info();
			$resulttitle = $this->title_database->titlelist_info();
			
			//echo "<pre>";
			//print_r($resultdocument);
			$data = array(
						'invoiceactivitydata' => $result_activity,
						'customerdata' => $resultcust,
						'currencydata' => $resultcurrency,	
						'categorydata' => $resultcategory,
						'titledata' => $resulttitle,
					);  */
				
			//echo "<pre>";	
			//print_r($data);
			//die;	
			
			$newData = array_merge($data, $data1);			
			$this->load->view('edit_invoice',$newData);	
		}
				
	}
	
	//view JTN
	public function view_invoice()
	{
		
		if($this->input->post('po_no'))
		{
			//				
		}
		else
		{	
			$invoiceid = $_GET['invid'];			
			$result_d = $this->invoice_database->invoicelist_info_data($invoiceid);			
										
				$data1['invoicing_id'] = $result_d[0]['invoicing_id'];
				$data1['invoice_no'] = $result_d[0]['invoicing_no'];
				$data1['po_no'] = $result_d[0]['po_no'];				
				$data1['po_date'] = $result_d[0]['po_date'];
				$data1['invoice_date'] = $result_d[0]['invoice_date'];
				$data1['unit_name'] = $result_d[0]['unit_name'];
				$data1['unit_address'] = $result_d[0]['unit_address'];				
				$data1['client_email'] = $result_d[0]['client_email'];
				$data1['customer_address'] = $result_d[0]['customer_address'];
				$data1['consignee_address'] = $result_d[0]['consignee_address'];								
				$data1['jtn_no'] = $result_d[0]['jtn_no'];				
				$data1['total_price'] = $result_d[0]['total_price'];
				$data1['status'] = $result_d[0]['status']; 
			
			$resultcust = $this->customer_database->customerlist_info();
			
			foreach($resultcust as $recordscustlist) 
			{			
				
				if($recordscustlist->customer_id == $result_d[0]['client_name'])
				{
					 $data1['client_name'] = $recordscustlist->customer_name;
				}
			}
			
			$resultcurrency = $this->currency_database->currencylist_info();
			foreach($resultcurrency as $recordcurrency) 
			{			
				
				if($recordcurrency->currency_id == $result_d[0]['currency_no'])
				{
					 $data1['currency_no'] = $recordcurrency->currency_code;
				}
			}
			
			$resultcategory = $this->category_database->categorylist_info();
			foreach($resultcategory as $recordcategory) 
			{			
				
				if($recordcategory->category_id == $result_d[0]['category'])
				{
					 $data1['category'] = $recordcategory->category_name;
				}
			}
					
			
			$resulttitle = $this->title_database->titlelist_info();
			foreach($resulttitle as $recordtitle) 
			{			
				
				if($recordtitle->title_id == $result_d[0]['title_name'])
				{
					 $data1['title_name'] = $recordtitle->title_name;
				}
			}
			
			
			$result_activity = $this->invoice_database->invoiceactivity_info($invoiceid);
			//echo "<pre>";
			//print_r($result_activity);
			//die;
			
				//print_r($result);
				$data = array(
						'invoiceactivitydata' => $result_activity,
						'customerdata' => $resultcust,
						'currencydata' => $resultcurrency,	
						'categorydata' => $resultcategory,
						'titledata' => $resulttitle,
					);			
			
			$newData = array_merge($data, $data1);
			
			$this->load->view('view_invoice',$newData);	
			
		}
				
	}
	
	public function download()
	{
		$docid = $_GET['doc'];
		$resultdoclist = $this->jtn_database->documentlist_info_data($docid);
		$document_name = $resultdoclist[0]['document_name'];
		$document_path = $resultdoclist[0]['document_path'];
		
		//print_r($resultdoclist);
		//die;
		
		ignore_user_abort(true);
		set_time_limit(0); // disable the time limit for this script
		 
		$path = $document_path; // change the path to fit your websites document structure
		 
		$dl_file = preg_replace("([^\w\s\d\-_~,;:\[\]\(\).]|[\.]{2,})", '', $document_name); // simple file name validation
		$dl_file = filter_var($dl_file, FILTER_SANITIZE_URL); // Remove (more) invalid characters
		$fullPath = $path.$dl_file;
		 
		if ($fd = fopen ($fullPath, "r")) {
			$fsize = filesize($fullPath);
			$path_parts = pathinfo($fullPath);
			$ext = strtolower($path_parts["extension"]);
			switch ($ext) {
				case "pdf":
				header("Content-type: application/pdf");
				header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a file download
				break;
				// add more headers for other content types here
				default;
				header("Content-type: application/octet-stream");
				header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
				break;
			}
			header("Content-length: $fsize");
			header("Cache-control: private"); //use this to open files directly
			while(!feof($fd)) {
				$buffer = fread($fd, 2048);
				echo $buffer;
			}
		}
		fclose ($fd);
		exit; 
		
	}
	
	// Logout from admin page
	public function delete_user() {

		$usid = $_GET['uid'];
		$result_records = $this->user_database->delete_user_data($usid);
		if($result_records ==1)
		{
			$result = $this->user_database->userlist_info();				
			$data = array(
						'userdata' => $result,
						
					);
				
			$this->load->view('user_list',$data);
		}
	}
	
	
		// Logout from admin page
	public function notifyoperation() {
					
		if($this->input->post('email_operation'))
		{
			
			$data = array(
						'email_operation' => $this->input->post('email_operation'),
						'querys' => $this->input->post('querys'),
						'requested_by' => $this->input->post('requested_by'),
						'invoice_no' => $this->input->post('invoice_no')
					 );
					 
			$result_query = $this->invoice_database->notify_operation($data);
			if($result_query)
			{
				//Send mail to 
				/* $this->load->library('email');
				$this->email->from('your@example.com', 'Your Name');
				$this->email->to('someone@example.com');
				$this->email->cc('another@another-example.com');
				$this->email->bcc('them@their-example.com');

				$this->email->subject('Email Test');
				$this->email->message('Testing the email class.');
				$this->email->send(); */
				
				$result = $this->customer_database->customerlist_info();
				$resultcurrency = $this->currency_database->currencylist_info();
				$resultcategory = $this->category_database->categorylist_info();
				$resulttitle = $this->title_database->titlelist_info();
				//print_r($result);
				$data = array(
						'customerdata' => $result,
						'currencydata' => $resultcurrency,	
						'categorydata' => $resultcategory,
						'titledata' => $resulttitle,
					);			
			
				echo '<script>alert("Request has been generated successfully.");</script>';
				$this->load->view('add_invoice',$data);
			}
			
		}
		else
		{
		
			$this->load->view('notifyoperation');
		}
		
		//Load email library
			//$this->load->library('email');

			//SMTP & mail configuration
			/* $config = array(
				'protocol'  => 'smtp',
				'smtp_host' => 'ssl://smtp.example.com',
				'smtp_port' => 465,
				'smtp_user' => 'konain.ahmad@thomsondigital.com',
				'smtp_pass' => 'P@ssw0rd',
				'mailtype'  => 'html',
				'charset'   => 'utf-8'
			);
			$this->email->initialize($config);
			$this->email->set_mailtype("html");
			$this->email->set_newline("\r\n");

			//Email content
			$htmlContent = '<h1>Sending email via SMTP server</h1>';
			$htmlContent .= '<p>This email has sent via SMTP server from CodeIgniter application.</p>';

			$this->email->to('recipient@example.com');
			$this->email->from('sender@example.com','MyWebsite');
			$this->email->subject('How to send email via SMTP server in CodeIgniter');
			$this->email->message($htmlContent);

			//Send email
			$this->email->send(); */

				/* $this->load->library('email');
				$this->email->from('your@example.com', 'Your Name');
				$this->email->to('someone@example.com');
				$this->email->cc('another@another-example.com');
				$this->email->bcc('them@their-example.com');

				$this->email->subject('Email Test');
				$this->email->message('Testing the email class.');
				$this->email->send(); */
				
		/* if($this->email->send())
		{
			$result = $this->jtn_database->jtnlist_info();
			//print_r($result);
			$data = array(
						'jtndata' => $result,
						
					);
			
			$this->load->view('jtn_list',$data);
		} */
	}

	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */