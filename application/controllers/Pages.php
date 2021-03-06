<?php
class Pages extends CI_Controller {

	


	public function view($page = 'home'){

		 if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $this->load->helper('url');
        $this->load->database();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);

	}

	public function inventorypage(){
		$this->load->library('session');
		$this->load->model('inventory_model');
		$data['query'] = $this->inventory_model->popinventory();
		$this->load->view('templates/header-user');
		$this->load->view('pages/inventorypage', $data);
		$this->load->view('templates/footer-user');
	}

	public function addinventory(){
		$this->load->library('session');
		$this->load->model('inventory_model');
		$this->inventory_model->pushinventory();

		$data['query'] = $this->inventory_model->popinventory();
		$this->load->view('templates/header-admin');
		$this->load->view('pages/admininventorypage', $data);
		$this->load->view('templates/footer-admin');
	}

	public function process(){
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$this->load->library('session');
		// Load the model
		$this->load->model('login_model');
		// Validate the user can login
		$result = $this->login_model->validate();
		// Now we verify the result
		if(! $result){
			// If user did not validate, then show them login page again
			redirect('Pages/view');
		}else{
			// If user did validate, 
			// Send them to members area
			
			$sql = "SELECT username, password FROM admin WHERE username='$username' and password='$password'";
			$query = $this->db->query($sql);
			if ($query-> num_rows() == 1){ //Is admin
				$this->load->library('session');
		    	$this->load->view('templates/header-admin');
				redirect('Pages/admin');
				$this->load->view('templates/footer-admin');
		    } 
		    else { //Is user
		    	$this->load->library('session');
		    	$this->load->view('templates/header-user');
				redirect('Pages/user');
				$this->load->view('templates/footer-user');
		    }


		}		
	}

	public function admin(){
		$this->load->library('session');
		$this->load->database();
		$this->load->model('login_model');
		$data['query'] = $this->login_model->popadminaccount();
		$data['query2'] = $this->login_model->popuseraccount();

	 	$this->load->view('templates/header-admin');
        $this->load->view('pages/admin', $data);
        $this->load->view('templates/footer-admin');
	}

	public function addadmin(){
		$this->load->database();
		$this->load->model('admin_model');
		$this->admin_model->addadmininfo();

		$this->load->model('login_model');
		$data['query'] = $this->login_model->popadminaccount();
		$data['query2'] = $this->login_model->popuseraccount();


		$this->load->view('templates/header-admin');
        $this->load->view('pages/admin', $data);
        $this->load->view('templates/footer-admin');
	}

	public function adduser(){
		$this->load->database();
		$this->load->model('admin_model');
		$this->admin_model->adduserinfo();

		$this->load->model('login_model');
		$data['query'] = $this->login_model->popadminaccount();
		$data['query2'] = $this->login_model->popuseraccount();


		$this->load->view('templates/header-admin');
        $this->load->view('pages/admin', $data);
        $this->load->view('templates/footer-admin');
	}

	public function updateadmin(){
		$this->load->database();
		$this->load->model('admin_model');
		$this->admin_model->admininfo();

		$this->load->model('login_model');
		$data['query'] = $this->login_model->popadminaccount();
		$data['query2'] = $this->login_model->popuseraccount();


		$this->load->view('templates/header-admin');
        $this->load->view('pages/admin', $data);
        $this->load->view('templates/footer-admin');

	}

	public function updateuser(){
		$this->load->database();
		$this->load->model('admin_model');
		$this->admin_model->userinfo();

		$this->load->model('login_model');
		$data['query'] = $this->login_model->popadminaccount();
		$data['query2'] = $this->login_model->popuseraccount();


		$this->load->view('templates/header-admin');
        $this->load->view('pages/admin', $data);
        $this->load->view('templates/footer-admin');
	}

	public function deleteadmin(){
		$this->load->database();
		$this->load->model('admin_model');
		$this->admin_model->deleteadmininfo();

		$this->load->model('login_model');
		$data['query'] = $this->login_model->popadminaccount();
		$data['query2'] = $this->login_model->popuseraccount();


		$this->load->view('templates/header-admin');
        $this->load->view('pages/admin', $data);
        $this->load->view('templates/footer-admin');
	}

	public function deleteuser(){
		$this->load->database();
		$this->load->model('admin_model');
		$this->admin_model->deleteuserinfo();

		$this->load->model('login_model');
		$data['query'] = $this->login_model->popadminaccount();
		$data['query2'] = $this->login_model->popuseraccount();


		$this->load->view('templates/header-admin');
        $this->load->view('pages/admin', $data);
        $this->load->view('templates/footer-admin');				
	}

	public function user(){
		$this->load->library('session');
	 	$this->load->database();
	 	$this->load->model('inventory_model');

	 	$this->load->view('templates/header-user');
        $this->load->view('pages/user');
        $this->load->view('templates/footer-user');
	}

	public function viewOrderHistory(){
		$this->load->library('session');
		$this->load->model('inventory_model');
		$data['query'] = $this->inventory_model->poporderhistory();
		

		$this->load->view('templates/header-user');
		$this->load->view('pages/orderhistory', $data);
		$this->load->view('templates/footer-user');
	}

	public function viewAdminOrderHistory(){
		$this->load->library('session');
		$this->load->model('inventory_model');
		$data['query'] = $this->inventory_model->poporderhistory();
		
		$this->load->view('templates/header-admin');
		$this->load->view('pages/adminorderhistory', $data);
		$this->load->view('templates/footer-admin');
	}

	public function admininventorypage(){
		$this->load->library('session');
		$this->load->model('inventory_model');
		$data['query'] = $this->inventory_model->popinventory();
		$this->load->view('templates/header-admin');
		$this->load->view('pages/admininventorypage', $data);
		$this->load->view('templates/footer-admin');
	}

	public function editinventory(){
		$this->load->library('session');
		$this->load->model('inventory_model');
		$this->inventory_model->addtoinventory();

		$data['query'] = $this->inventory_model->popinventory();

		$this->load->view('templates/header-admin');
		$this->load->view('pages/admininventorypage', $data);
		$this->load->view('templates/footer-admin');
	}

	public function subfrominventory(){
		$this->load->library('session');
		$this->load->model('inventory_model');
		$this->inventory_model->subfrominv();

		$data['query'] = $this->inventory_model->popinventory();

		$this->load->view('templates/header-admin');
		$this->load->view('pages/admininventorypage', $data);
		$this->load->view('templates/footer-admin');
	}

	public function admininventoryrecordpage(){
		$this->load->library('session');
		$this->load->model('inventory_model');
		$data['query'] = $this->inventory_model->popinventoryrecord();
		$this->load->view('templates/header-admin');
		$this->load->view('pages/admininventoryrecordpage', $data);
		$this->load->view('templates/footer-admin');
	}

	public function sortdaily(){
		$this->load->database();
		$this->load->model('inventory_model');
		$data['query'] = $this->inventory_model->poporderhistorydaily();

		$this->load->view('templates/header-admin');
		$this->load->view('pages/adminorderhistory', $data);
		$this->load->view('templates/footer-admin');
	}

	public function sortdailyrecord(){
		$this->load->database();
		$this->load->model('inventory_model');
		$data['query'] = $this->inventory_model->poprecorddaily();

		$this->load->view('templates/header-admin');
		$this->load->view('pages/admininventoryrecordpage', $data);
		$this->load->view('templates/footer-admin');
	}

	public function sortmonthly(){
		$this->load->database();
		$this->load->model('inventory_model');
		$data['query'] = $this->inventory_model->poporderhistorymonthly();

		$this->load->view('templates/header-admin');
		$this->load->view('pages/adminorderhistory', $data);
		$this->load->view('templates/footer-admin');
	}

	public function sortmonthlyrecord(){
		$this->load->database();
		$this->load->model('inventory_model');
		$data['query'] = $this->inventory_model->poprecordmonthly();

		$this->load->view('templates/header-admin');
		$this->load->view('pages/admininventoryrecordpage', $data);
		$this->load->view('templates/footer-admin');
	}

	public function sortyearly(){
		$this->load->database();
		$this->load->model('inventory_model');
		$data['query'] = $this->inventory_model->poporderhistoryyearly();

		$this->load->view('templates/header-admin');
		$this->load->view('pages/adminorderhistory', $data);
		$this->load->view('templates/footer-admin');
	}

	public function sortyearlyrecord(){
		$this->load->database();
		$this->load->model('inventory_model');
		$data['query'] = $this->inventory_model->poprecordyearly();

		$this->load->view('templates/header-admin');
		$this->load->view('pages/admininventoryrecordpage', $data);
		$this->load->view('templates/footer-admin');
	
	}

	public function generateSOR(){
		$this->load->model('inventory_model');
		$data['query'] = $this->inventory_model->poporderhistory();
		$html = $this->load->view('pages/orderhistorylite', $data, true);
		$pdfFilePath = "tbhsalesorderreport.pdf";
		$this->load->library('m_pdf');
		$pdf = $this->m_pdf->load();
		$pdf->WriteHTML($html);
		$pdf->Output();
		//$pdf->Output($pdfFilePath, "D");
	}

	public function sortSOR(){
		$this->load->model('inventory_model');
		$data['query'] = json_decode($this->input->post('orderlist'), true); //Generate array from the posted info
		$html = $this->load->view('pages/sortorderhistorylite', $data, true);
		$pdfFilePath = "tbhsalesorderreport.pdf";
		$this->load->library('m_pdf');
		$pdf = $this->m_pdf->load();
		$pdf->WriteHTML($html);
		$pdf->Output();
	}

	public function sortSORrecord(){
		$this->load->model('inventory_model');
		$data['query'] = json_decode($this->input->post('orderlist'), true); //Generate array from the posted info
		$html = $this->load->view('pages/inventoryrecordlite', $data, true);
		$pdfFilePath = "tbhsalesorderreport.pdf";
		$this->load->library('m_pdf');
		$pdf = $this->m_pdf->load();
		$pdf->WriteHTML($html);
		$pdf->Output();
	}

	public function purchase(){
		$this->load->database();
		$this->load->model('inventory_model');
		$this->inventory_model->useingredients();

		$this->load->view('templates/header-user');
		$this->load->view('pages/user');
		$this->load->view('templates/footer-user');
	}
}