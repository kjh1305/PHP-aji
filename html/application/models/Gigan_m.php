<?
	class Gigan_m extends CI_Model //모델 클래스 선언
	{
		public function getlist($text1,$text2,$text3,$start,$limit)
		{
			if($text3=="0")
				$sql="select jangbu.*, product.name9 as product_name from jangbu left join product on jangbu.product_no9=product.no9 where jangbu.writeday9 between'$text1' and '$text2' order by jangbu.no9 limit $start,$limit"; //select문 정의
			else
				$sql="select jangbu.*, product.name9 as product_name from jangbu left join product on jangbu.product_no9=product.no9 where jangbu.writeday9 between'$text1'and'$text2'and  jangbu.product_no9=$text3 order by jangbu.no9 limit $start,$limit"; //select문 정의
			return $this->db->query($sql)->result(); //쿼리실행, 결과 리턴
		}
		
		public function rowcount($text1,$text2,$text3)
		{
			if($text3=="0")
				$sql="select * from jangbu where jangbu.writeday9 between'$text1' and '$text2'";	
			else
				$sql="select * from jangbu where jangbu.writeday9 between'$text1' and '$text2'and jangbu.product_no9=$text3";
			return $this->db->query($sql)->num_rows(); 
		}

		function getlist_product()
		{
			$sql="select * from product order by name9";
			return $this->db->query($sql)->result();
		}

		public function getlist_all($text1,$text2,$text3)
		{
			if($text3=="0")
				$sql="select jangbu.*, product.name9 as product_name from jangbu left join product on jangbu.product_no9=product.no9 where jangbu.writeday9 between'$text1' and '$text2' order by jangbu.no9"; //select문 정의
			else
				$sql="select jangbu.*, product.name9 as product_name from jangbu left join product on jangbu.product_no9=product.no9 where jangbu.writeday9 between'$text1'and'$text2'and  jangbu.product_no9=$text3 order by jangbu.no9"; //select문 정의
			return $this->db->query($sql)->result(); //쿼리실행, 결과 리턴
		}
	}
?>