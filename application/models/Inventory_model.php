<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventory_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	public function useingredients(){
		$orderlist = json_decode($this->input->post('orderlist'), true);
		$this->load->library('session');
		$name;
		$minuser = 0;
		$price;
		$username = $this->session->userdata('username');

		foreach($orderlist as $key => $value){
			if ($value['ProductName'] == 'Beefy Burger'){
				$name = $value['ProductName'];
				$minuser = $value['Quantity'];
				$price = $value['Price'];
				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Big Bun'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Beef Patty'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Coleslaw'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Lettuce'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Tomato Pack'";
				$query = $this->db->query($sql);

				$sql = "INSERT into orderhistory(pname, quantity, price, date, time, username) values('$name', $minuser, $price, CURRENT_DATE, CURRENT_TIMESTAMP, '$username')";
				$query = $this->db->query($sql);



				

			} else if ($value['ProductName'] == 'Double Beefy Burger'){
				$name = $value['ProductName'];
				$minuser = $value['Quantity'];
				$price = $value['Price'];
				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Big Bun'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser*2 where itemname='Beef Patty'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Coleslaw'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser*2 where itemname='Lettuce'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser*2 where itemname='Tomato Pack'";
				$query = $this->db->query($sql);

				$sql = "INSERT into orderhistory(pname, quantity, price, date, time, username) values('$name', $minuser, $price, CURRENT_DATE, CURRENT_TIMESTAMP, '$username')";
				$query = $this->db->query($sql);
			} else if ($value['ProductName'] == 'Triply Beefy Burger'){
				$name = $value['ProductName'];
				$minuser = $value['Quantity'];
				$price = $value['Price'];
				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser*2 where itemname='Big Bun'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser*3 where itemname='Beef Patty'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Coleslaw'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser*3 where itemname='Lettuce'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser*3 where itemname='Tomato Pack'";
				$query = $this->db->query($sql);

				$sql = "INSERT into orderhistory(pname, quantity, price, date, time, username) values('$name', $minuser, $price, CURRENT_DATE, CURRENT_TIMESTAMP, '$username')";
				$query = $this->db->query($sql);
			} else if ($value['ProductName'] == 'Cheesy Beefy Burger'){
				$name = $value['ProductName'];
				$minuser = $value['Quantity'];
				$price = $value['Price'];
				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Big Bun'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Beef Patty'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Coleslaw'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Lettuce'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Tomato Pack'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Cheese'";
				$query = $this->db->query($sql);

				$sql = "INSERT into orderhistory(pname, quantity, price, date, time, username) values('$name', $minuser, $price, CURRENT_DATE, CURRENT_TIMESTAMP, '$username')";
				$query = $this->db->query($sql);
			} else if ($value['ProductName'] == 'Cheesy Doubly Burger'){
				$name = $value['ProductName'];
				$minuser = $value['Quantity'];
				$price = $value['Price'];
				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Big Bun'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser*2 where itemname='Beef Patty'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Coleslaw'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser*2 where itemname='Lettuce'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser*2 where itemname='Tomato Pack'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser*2 where itemname='Cheese'";
				$query = $this->db->query($sql);

				$sql = "INSERT into orderhistory(pname, quantity, price, date, time, username) values('$name', $minuser, $price, CURRENT_DATE, CURRENT_TIMESTAMP, '$username')";
				$query = $this->db->query($sql);
			} else if ($value['ProductName'] == 'Burger++'){
				$name = $value['ProductName'];
				$minuser = $value['Quantity'];
				$price = $value['Price'];
				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Big Bun'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Beef Patty'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Coleslaw'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser*2 where itemname='Lettuce'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Tomato Pack'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Cheese'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Pineapple Pack'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Bacon'";
				$query = $this->db->query($sql);

				$sql = "INSERT into orderhistory(pname, quantity, price, date, time, username) values('$name', $minuser, $price, CURRENT_DATE, CURRENT_TIMESTAMP, '$username')";
				$query = $this->db->query($sql);
			} else if ($value['ProductName'] == 'Burger--'){
				$name = $value['ProductName'];
				$minuser = $value['Quantity'];
				$price = $value['Price'];
				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Small Bun'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Beef Patty'";
				$query = $this->db->query($sql);
			} else if ($value['ProductName'] == 'Chiky Burger'){
				$name = $value['ProductName'];
				$minuser = $value['Quantity'];
				$price = $value['Price'];
				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Big Bun'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Chicken Patty'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Big Bun'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Coleslaw'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser*2 where itemname='Lettuce'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Pineapple Pack'";
				$query = $this->db->query($sql);

				$sql = "INSERT into orderhistory(pname, quantity, price, date, time, username) values('$name', $minuser, $price, CURRENT_DATE, CURRENT_TIMESTAMP, '$username')";
				$query = $this->db->query($sql);
			} else if ($value['ProductName'] == 'Veg-eta Burger'){
				$name = $value['ProductName'];
				$minuser = $value['Quantity'];
				$price = $value['Price'];
				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Big Bun'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Mushroom Patty'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Lettuce'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Tomato Pack'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Cheese'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Mushroom Pack'";
				$query = $this->db->query($sql);

				$sql = "INSERT into orderhistory(pname, quantity, price, date, time, username) values('$name', $minuser, $price, CURRENT_DATE, CURRENT_TIMESTAMP, '$username')";
				$query = $this->db->query($sql);
			} else if ($value['ProductName'] == 'Hotspot Burger'){
				$name = $value['ProductName'];
				$minuser = $value['Quantity'];
				$price = $value['Price'];
				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Big Bun'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Beef Patty'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Jalapeno Pepper Pack'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser*2 where itemname='Lettuce'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser*2 where itemname='Tomato Pack'";
				$query = $this->db->query($sql);

				$sql = "INSERT into orderhistory(pname, quantity, price, date, time, username) values('$name', $minuser, $price, CURRENT_DATE, CURRENT_TIMESTAMP, '$username')";
				$query = $this->db->query($sql);

			} else if ($value['ProductName'] == 'Fries'){
				$name = $value['ProductName'];
				$minuser = $value['Quantity'];
				$price = $value['Price'];
				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser*1 where itemname='Fries Pack'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser*1 where itemname='Cheese Sauce Pack'";
				$query = $this->db->query($sql);

				$sql = "INSERT into orderhistory(pname, quantity, price, date, time, username) values('$name', $minuser, $price, CURRENT_DATE, CURRENT_TIMESTAMP, '$username')";
				$query = $this->db->query($sql);
			} else if ($value['ProductName'] == 'Nachos'){
				$name = $value['ProductName'];
				$minuser = $value['Quantity'];
				$price = $value['Price'];
				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser*1 where itemname='Nachos Pack'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser*1 where itemname='Chili con carne pack'";
				$query = $this->db->query($sql);

				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser*2 where itemname='Cheese Sauce Pack'";
				$query = $this->db->query($sql);

				$sql = "INSERT into orderhistory(pname, quantity, price, date, time, username) values('$name', $minuser, $price, CURRENT_DATE, CURRENT_TIMESTAMP, '$username')";
				$query = $this->db->query($sql);

			} else if($value['ProductName'] == 'Drinks'){
				$name = $value['ProductName'];
				$minuser = $value['Quantity'];
				$price = $value['Price'];
				$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='Drinks'";
				$query = $this->db->query($sql);

				$sql = "INSERT into orderhistory(pname, quantity, price, date, time, username) values('$name', $minuser, $price, CURRENT_DATE, CURRENT_TIMESTAMP, '$username')";
				$query = $this->db->query($sql);
			}
		}
		

		

	}

	public function pushinventory(){
		$invname = $this->input->post('invname');
		$invqty = $this->input->post('invqty');
		$invclass = $this->input->post('invclass');
		$username = $this->session->userdata('username');

		$sql = "INSERT into inventory(itemname, itemcount, classification) values('$invname', $invqty, 1)";
		$query = $this->db->query($sql);

		$sql = "INSERT into invhistory(itemname, username, date, time, quantity) values('$invname', '$username', CURRENT_DATE, CURRENT_TIMESTAMP, $invqty)";
		$query = $this->db->query($sql);



	}
	
	public function popinventory(){
		
		$query = $this->db->select('itemcount, itemname')->from('inventory')->get();
   		return $query->result_array(); 	
	}

	public function addtoinventory(){
		$adder = $this->input->post('addqty');
		$itemname = $this->input->post('itemname');
		$username = $this->session->userdata('username');

		$sql = "UPDATE inventory SET itemcount=itemcount+$adder where itemname='$itemname'"; //Update inventory table
		$query = $this->db->query($sql);

		$sql = "INSERT into invhistory(itemname, username, date, time, quantity) values('$itemname', '$username', CURRENT_DATE, CURRENT_TIMESTAMP, $adder)";
		$query = $this->db->query($sql);
	}

	public function subfrominv(){
		$minuser = $this->input->post('subqty');
		$itemname = $this->input->post('itemnamesub');
		$username = $this->session->userdata('username');

		$sql = "UPDATE inventory SET itemcount=itemcount-$minuser where itemname='$itemname'"; //Update inventory table
		$query = $this->db->query($sql);

		$sql = "INSERT into invhistory(itemname, username, date, time, quantityminus) values('$itemname', '$username', CURRENT_DATE, CURRENT_TIMESTAMP, $minuser)";
		$query = $this->db->query($sql);
	}


	public function popinventoryrecord(){
		$query = $this->db->select('*')->from('invhistory')->get();
		return $query->result_array();
	}

	public function poporderhistory(){
		$query = $this->db->select('date, time, pname, quantity, price, username')->from('orderhistory')->get();
   		return $query->result_array(); 	
	}


	public function poporderhistorydaily(){
		$day = $this->input->post('daychange');
		$where = "EXTRACT(day FROM date)=$day";
		$query = $this->db->select('*')->from('orderhistory')->where($where)->get();
		return $query->result_array();
	}

	public function poprecorddaily(){
		$day = $this->input->post('daychange');
		$where = "EXTRACT(day FROM date)=$day";
		$query = $this->db->select('*')->from('invhistory')->where($where)->get();
		return $query->result_array();
	}

	public function poporderhistorymonthly(){
		$month = $this->input->post('monthchange');
		$where = "EXTRACT(month FROM date)=$month";
		$query = $this->db->select('*')->from('orderhistory')->where($where)->get();
		return $query->result_array();
	}

	public function poprecordmonthly(){
		$month = $this->input->post('monthchange');
		$where = "EXTRACT(month FROM date)=$month";
		$query = $this->db->select('*')->from('invhistory')->where($where)->get();
		return $query->result_array();
	}


	public function poporderhistoryyearly(){
		$year = $this->input->post('yearchange');
		$where = "EXTRACT(year FROM date)=$year";
		$query = $this->db->select('*')->from('orderhistory')->where($where)->get();
		return $query->result_array();
	}

	public function poprecordyearly(){
		$year = $this->input->post('yearchange');
		$where = "EXTRACT(year FROM date)=$year";
		$query = $this->db->select('*')->from('invhistory')->where($where)->get();
		return $query->result_array();
	}

	public function poporderlist(){
		$query = $this->db->select('*')->from('OrderList')->get();
		return $query->result_array();
	}

	public function pushburger(){
		$this->db->query('insert into "OrderList" select "ProductName", 1, "Price", "id" from "Inventory" where id=1');


		$this -> db -> select('*');
	    $this -> db -> from('OrderList');
	    $query = $this -> db -> get();
	    return $query->result();
	}
}



