<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jtn extends CI_Controller {

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
		$this->load->model('jtn_database');
		$this->load->model('customer_database');
		$this->load->model('currency_database');
		
		//Loading url helper
		$this->load->helper('url');
	}
	 	
	public function index()
	{		
		
		$result = $this->jtn_database->jtnlist_info();
		//print_r($result);
		$data = array(
					'jtndata' => $result,
					
				);
		
		$this->load->view('jtn_list',$data);
	}
	
	public function add_jtn()
	{
		$session_data = $this->session->userdata('logged_in');
		//print_r($session_data);
		//$session_data['username'];
		
		if($this->input->post('clientname'))
		{
			
			$data = array(
						'clientname' => $this->input->post('clientname'),
						'type' => $this->input->post('type'),
						'jtn_issue_date' => $this->input->post('jtn_issue_date'),
						'jobname' => $this->input->post('jobname'),
						'job_rec_date' => $this->input->post('job_rec_date'),
						'job_due_date' => $this->input->post('job_due_date'),
						'payment_term' => $this->input->post('payment_term'),
						'unit' => $this->input->post('unit'),
						'total_pages' => $this->input->post('total_pages'),
						'project_manager' => $this->input->post('project_manager'),
						'currency' => $this->input->post('currency'),
						'jtn_document' => $this->input->post('jtn_document')						
					 );
					 
			$result_jtn = $this->jtn_database->add_jtnlist($data);
			// upload documents
				$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
			
			if($_FILES['jtn_document']['name'][0] <> "")
			{
				$pathweb=$DOCUMENT_ROOT."/commercial/uploads/operation/";
				
				for($i=0; $i<count($_FILES['jtn_document']['name']); $i++)
				{					
					$randomval = mt_rand(1,9999);
					$fileupload = $_FILES['jtn_document']['name'][$i];
					$fileupload_tmp = $_FILES['jtn_document']['tmp_name'][$i];
					$uploaddocype = $_FILES['jtn_document']['type'][$i];
					$uploaddocsize = $_FILES['jtn_document']['size'][$i];
					$uploaddocfile_namefinal = $randomval.basename($_FILES['jtn_document']['name'][$i]);
					if(file_exists($pathweb.$uploaddocfile_namefinal))
					{
						unlink($pathweb.$uploaddocfile_namefinal); 
					}
					$uploadsfinalpaths = $pathweb.$uploaddocfile_namefinal;
					if(move_uploaded_file($fileupload_tmp, $uploadsfinalpaths))
					{
						$result = $this->jtn_database->upload_documents($pathweb,$uploaddocfile_namefinal,$session_data['username'],"JTN",$result_jtn,$uploaddocype,$uploaddocsize);
					}
			
				}
			}
			
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
				$result = $this->jtn_database->jtnlist_info();
				//print_r($result);
				$data = array(
						'jtndata' => $result,
						
					);
				
				$this->load->view('jtn_list',$data);
			/* }
			else
			{
				$data = array(
			'error_message' => 'JTN No is already exist, Please try other.'
			);
				$this->load->view('add_jtn',$data);
			} */
				
		}
		else
		{	
			// JTN form		

			$result = $this->customer_database->customerlist_info();
			$resultcurrency = $this->currency_database->currencylist_info();
				//print_r($result);
				$data = array(
						'customerdata' => $result,
						'currencydata' => $resultcurrency,						
					);			
				
			$this->load->view('add_jtn',$data);
		}
				
	}
	
	
	// Edit user	
	public function edit_jtn()
	{
		
		$session_data = $this->session->userdata('logged_in');
		
		if($this->input->post('clientname'))
		{
			
			$data = array(
						'clientname' => $this->input->post('clientname'),
						'type' => $this->input->post('type'),
						'jtn_issue_date' => $this->input->post('jtn_issue_date'),
						'jobname' => $this->input->post('jobname'),
						'job_rec_date' => $this->input->post('job_rec_date'),
						'job_due_date' => $this->input->post('job_due_date'),
						'payment_term' => $this->input->post('payment_term'),
						'unit' => $this->input->post('unit'),
						'total_pages' => $this->input->post('total_pages'),
						'project_manager' => $this->input->post('project_manager'),
						'currency' => $this->input->post('currency'),
						'jtn_document' => $this->input->post('jtn_document'),
						'jtn_issue_date_hid' => $this->input->post('jtn_issue_date_hid'),
						'job_rec_date_hid' => $this->input->post('job_rec_date_hid'),
						'job_due_date_hid' => $this->input->post('job_due_date_hid'),
						'jtn_id_hid' => $this->input->post('jtn_id_hid')
						
					 );
					 
			//echo "<pre>";	
			//print_r($data);
			//die;
					 
			$result_jtn = $this->jtn_database->edit_jtnlist($data);
			
			// upload documents
			$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
			
			if(isset($_FILES['jtn_document']['name'][0]))
			{
				if($_FILES['jtn_document']['name'][0] <> "")
				{
					$pathweb=$DOCUMENT_ROOT."/commercial/uploads/operation/";
					
					for($i=0; $i<count($_FILES['jtn_document']['name']); $i++)
					{					
						$randomval = mt_rand(1,9999);
						$fileupload = $_FILES['jtn_document']['name'][$i];
						$fileupload_tmp = $_FILES['jtn_document']['tmp_name'][$i];
						$uploaddocype = $_FILES['jtn_document']['type'][$i];
						$uploaddocsize = $_FILES['jtn_document']['size'][$i];
						$uploaddocfile_namefinal = $randomval.basename($_FILES['jtn_document']['name'][$i]);
						if(file_exists($pathweb.$uploaddocfile_namefinal))
						{
							unlink($pathweb.$uploaddocfile_namefinal); 
						}
						$uploadsfinalpaths = $pathweb.$uploaddocfile_namefinal;
						if(move_uploaded_file($fileupload_tmp, $uploadsfinalpaths))
						{
							$result = $this->jtn_database->upload_documents($pathweb,$uploaddocfile_namefinal,$session_data['username'],"JTN",$result_jtn,$uploaddocype,$uploaddocsize);
						}
				
					}
				}
			}
			
			if($result_jtn != '')
			{
				$result = $this->jtn_database->jtnlist_info();
				//print_r($result);
				$data = array(
						'jtndata' => $result,
						
					);
				
				echo '<script>alert("Records has been modified successfully.");</script>';
				$this->load->view('jtn_list',$data);
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
			$jtnid = $_GET['jtnid'];			
			$result_records = $this->jtn_database->jtnlist_info_data($jtnid); 
			$result = $this->customer_database->customerlist_info();
			$resultcurrency = $this->currency_database->currencylist_info();
			$resultdocument = $this->jtn_database->documentlist_info($jtnid);
			
			//echo "<pre>";
			//print_r($resultdocument);
			 $data = array(
					'jtnrecord' => $result_records,
					'customerdata' => $result,
					'currencydata' => $resultcurrency,
					'documentdata' => $resultdocument,
					
				); 
				
			//echo "<pre>";	
			//print_r($data);
			//die;
			
			$this->load->view('edit_jtn',$data);
		}
				
	}
	
	//view JTN
	public function view_jtn()
	{
		
		if($this->input->post('clientname'))
		{
			
			$data = array(
						'clientname' => $this->input->post('clientname'),
						'type' => $this->input->post('type'),
						'jtn_issue_date' => $this->input->post('jtn_issue_date'),
						'jobname' => $this->input->post('jobname'),
						'job_rec_date' => $this->input->post('job_rec_date'),
						'job_due_date' => $this->input->post('job_due_date'),
						'payment_term' => $this->input->post('payment_term'),
						'unit' => $this->input->post('unit'),
						'total_pages' => $this->input->post('total_pages'),
						'project_manager' => $this->input->post('project_manager'),
						'currency' => $this->input->post('currency'),
						'jtn_document' => $this->input->post('jtn_document')
					 );
					 
			$result_jtn = $this->jtn_database->edit_jtnlist($data);
			
			if($result_jtn == 2)
			{
				$result = $this->jtn_database->jtnlist_info();
				//print_r($result);
				$data = array(
						'jtndata' => $result,
						
					);
				
				echo '<script>alert("Records has been modified successfully.");</script>';
				$this->load->view('jtn_list',$data);
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
			$jtnid = $_GET['jtnid'];			
			$result_records = $this->jtn_database->jtnlist_info_data($jtnid); 
			$result = $this->customer_database->customerlist_info();
			$resultcurrency = $this->currency_database->currencylist_info();
			$resultdocument = $this->jtn_database->documentlist_info($jtnid);
			
			//echo "<pre>";
			//print_r($resultdocument);
			 $data = array(
					'jtnrecord' => $result_records,
					'customerdata' => $result,
					'currencydata' => $resultcurrency,
					'documentdata' => $resultdocument,
					
				); 
			
			$this->load->view('view_jtn',$data);
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
	public function notify() {

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
				
		if($this->email->send())
		{
			$result = $this->jtn_database->jtnlist_info();
			//print_r($result);
			$data = array(
						'jtndata' => $result,
						
					);
			
			$this->load->view('jtn_list',$data);
		}
	}

	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */