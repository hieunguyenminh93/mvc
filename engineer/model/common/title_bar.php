<?php
	class ModelCommonTitleBar extends Model{
		public function getButtons(){
			$sql = "select menu_href, menu_name from menu where menu_setting = 1";
			$result = $this->db->query($sql);
			return $result->rows;
			
		}
	}
?>