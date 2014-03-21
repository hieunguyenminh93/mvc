<?php
	class ModelAboutAbout extends Model{
		public function getInformation(){
			$sql = "select * from information inner join setting on information_setting =setting_id where isuse = 1";
			$result = $this->db->query($sql);
			//print_r($result);
			return $result->row; 
		}	
	}
?>