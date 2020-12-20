<?
	class Bestmon_m extends CI_Model //모델 클래스 선언
	{
		public function getlist($text1,$start,$limit)
		{
				$sql="select product.name9 as product_name, sum(if(month(jangbu.writeday9)=1,jangbu.numo9,0)) as s1, sum(if(month(jangbu.writeday9)=2,jangbu.numo9,0)) as s2, sum(if(month(jangbu.writeday9)=3,jangbu.numo9,0)) as s3, sum(if(month(jangbu.writeday9)=4,jangbu.numo9,0)) as s4, sum(if(month(jangbu.writeday9)=5,jangbu.numo9,0)) as s5, sum(if(month(jangbu.writeday9)=6,jangbu.numo9,0)) as s6, sum(if(month(jangbu.writeday9)=7,jangbu.numo9,0)) as s7, sum(if(month(jangbu.writeday9)=8,jangbu.numo9,0)) as s8, sum(if(month(jangbu.writeday9)=9,jangbu.numo9,0)) as s9, sum(if(month(jangbu.writeday9)=10,jangbu.numo9,0)) as s10, sum(if(month(jangbu.writeday9)=11,jangbu.numo9,0)) as s11, sum(if(month(jangbu.writeday9)=12,jangbu.numo9,0)) as s12 from jangbu left join product on jangbu.product_no9=product.no9 where year(jangbu.writeday9)=$text1 group by jangbu.product_no9 order by product.name9 limit $start,$limit"; //select문 정의
			
			return $this->db->query($sql)->result(); //쿼리실행, 결과 리턴
		}
	
		public function rowcount($text1)
		{
		
				$sql="select product_no9 from jangbu where year(writeday9)=$text1 group by product_no9";	
			
			return $this->db->query($sql)->num_rows(); 
		}
		
		function getlist_product()
		{
			$sql="select * from product order by name9";
			return $this->db->query($sql)->result();
		}
	}
?>