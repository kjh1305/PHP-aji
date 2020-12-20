<?
	class Chart_m extends CI_Model //모델 클래스 선언
	{
		public function getlist($text1,$text2)
		{
			
				$sql="select gubun.name9 as gubun_name, count(jangbu.numo9) as cnumo from (gubun right join product on gubun.no9=product.gubun_no9) right join jangbu on product.no9=jangbu.product_no9 where io9=1 and jangbu.writeday9 between '$text1' and '$text2' group by gubun.name9 order by cnumo desc limit 14"; //select문 정의
			
			return $this->db->query($sql)->result(); //쿼리실행, 결과 리턴
		}
		
		public function rowcount($text1,$text2)
		{
				$sql="select gubun.name9 as gubun_name, count(jangbu.numo9) as cnumo from(gubun right join product on gubun.no9=product.gubun_no9) right join jangbu on product.no9=jangbu.product_no9 where jangbu.writeday9 between '$text1' and '$text2' group by gubun.name9 limit 10";	
			
			return $this->db->query($sql)->num_rows(); 
		}
		
		
	}
?>