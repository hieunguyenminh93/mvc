<?php
	class Customer{
		private $customer_id;
		private $firstname;
		private $lastname;
		private $email;
		private $birthday;
		private $passwd;
		
		public function __construct($registry){
			$this->db = $registry->get('db');
			$this->request = $registry->get('request');
			$this->session = $registry->get('session');
				if(isset($this->session->data['customer_id'])){
					$sql = "select * from customer where customer_id = ".(int)$this->session->data['customer_id'];
					$result = $this->db->query($sql);
					
					
					if ($result){
						$this->customer_id = $result->row['customer_id'];
						$this->firstname = $result->row['customer_firstname'];
						$this->lastname = $result->row['customer_lastname'];
						$this->birthday = $result->row['customer_brithday'];
						$this->email = $result->row['customer_email'];
					}
				}else{
					
				}
		}
		
		public function login($cusomer_id,$customer_passwd){
			if (isset($cusomer_id)&&isset($customer_passwd)){
				$sql = "select * from customer where customer_id = $cusomer_id and customer_passord = $customer_passwd";
				$result = $this->db->query($sql);
				if($result->num_rows == 1){
					$this->session->data['customer_id'] = $result->rows['customer_id'];
					
				}
			}
		}
		public function logout(){
			
		}
	}
?>