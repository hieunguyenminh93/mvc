<?php
	class ModelCommonHeader extends Model{
		
		public function getLinks(){
			/*
			 * @return array
			 */
			//TODO get meta to show return array;
			$data = array();
			$sql = "select href,rel,type from header_link hl left join setting st on hl.setting = st.setting_id where st.isuse = 1";
			$link = $this->db->query($sql);
			if($link->num_rows == 1){
				$data[0] = $link->row;
				
			}elseif($link->num_rows > 1){
				foreach ($link->rows as $key => $value){
					$data[$key] = $value;
				}
				
			}
			//print_r($data);
			return $data;
		}
		public function getScripts(){
			$data = array();
			$sql = $sql = "select src,type from header_script hl left join setting st on hl.setting = st.setting_id where st.isuse = 1";
			$result = $this->db->query($sql);
			if($result->num_rows ==1 ){
				$data[0] = $result->row;
			}elseif ($result->num_rows > 1){
				$data = $result->rows;
			}
			return $data;
		}
		public function getMetas(){
			
		}
	}
?>