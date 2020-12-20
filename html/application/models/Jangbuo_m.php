<?
	class Jangbuo_m extends CI_Model //모델 클래스 선언
	{
		public function getlist($text1,$start,$limit)
		{
			
				$sql="select jangbu.*, product.name9 as product_name from jangbu left join product on jangbu.product_no9=product.no9 where jangbu.io9=1 and jangbu.writeday9='$text1' order by jangbu.no9 limit $start,$limit"; //select문 정의
			return $this->db->query($sql)->result(); //쿼리실행, 결과 리턴
		}
		
		public function rowcount($text1)
		{
			$sql="select * from jangbu where io9=1 and jangbu.writeday9='$text1'";	
			return $this->db->query($sql)->num_rows(); 
		}

		function getrow($no)
		{
			$sql="select jangbu.*, product.name9 as product_name from jangbu left join product on 
			jangbu.product_no9=product.no9 where jangbu.no9=$no";
			return $this->db->query($sql)->row();
		}
		function deleterow($no)
		{
			$sql="delete from jangbu where no9=$no";
			return $this->db->query($sql);
		}
		
		function insertrow($row)
		{
			return $this->db->insert("jangbu",$row);
		}
		function updaterow($row,$no)
		{
			$where=array("no9"=>$no);
			return $this->db->update("jangbu",$row,$where);
		}
		function getlist_product()
		{
			$sql="select * from product order by name9";
			return $this->db->query($sql)->result();
		}
	}
?>