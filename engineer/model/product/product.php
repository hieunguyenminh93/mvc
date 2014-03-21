<?php
	class ModelProductProduct extends Model{
		public function getProduct($id) {
			$sql = "select * from product pr inner join category ca on pr.product_category = ca.category_id where pr.product_id = $id order by pr.product_category";
			$data = $this->db->query($sql);
			return $data->rows;
		}
		public function getProducts() {
			$sql = "select * from product pr inner join category ca on pr.product_category = ca.category_id order by pr.product_category";
			$data = $this->db->query($sql);
			return $data->rows;
		}
	}
?>