<?
	class Ajipic_m extends CI_Model //모델 클래스 선언
	{
		public function getlist()
		{
			$sql="select * from aji order by no"; //select문 정의
			return $this->db->query($sql)->result(); //쿼리실행, 결과 리턴
		}
		

		function countrow()
		{
			$sql="select aji_no,count(*) as c from tupyo group by aji_no order by c desc limit 3";
			return $this->db->query($sql)->result();
		}
		
		function rowc()
		{
			$sql="select aji.name,count(tupyo.aji_no) as c from aji left join tupyo on aji.no = tupyo.aji_no where 1 GROUP BY aji.no order by aji.no";
			return $this->db->query($sql)->result();
		}
		
	}
?>