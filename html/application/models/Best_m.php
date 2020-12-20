<?
	class Best_m extends CI_Model //모델 클래스 선언
	{
		public function getlist($text1,$text2,$start,$limit)
		{
			
				$sql="select product.name9 as product_name, count(jangbu.numo9) as cnumo from jangbu left join product on jangbu.product_no9=product.no9 where io9=1 and jangbu.writeday9 between'$text1' and '$text2' group by product.name9 order by jangbu.no9 limit $start,$limit"; //select문 정의
			
			return $this->db->query($sql)->result(); //쿼리실행, 결과 리턴
		}
		
		public function rowcount($text1,$text2)
		{
		
				$sql="select count(*) as c from jangbu where jangbu.writeday9 between '$text1' and '$text2'";	
			
			return $this->db->query($sql)->num_rows(); 
		}

		function getlist_product()
		{
			$sql="select * from product order by name9";
			return $this->db->query($sql)->result();
		}
	}
?>