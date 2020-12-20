<?
	class Tupyo_m extends CI_Model //모델 클래스 선언
	{
		public function getlist($text1,$start,$limit)
		{
			if(!$text1)
			$sql="select * from aji order by no limit $start,$limit"; //select문 정의
			else
				$sql="select * from aji where name like '%$text1%' order by no limit $start,$limit";
			return $this->db->query($sql)->result(); //쿼리실행, 결과 리턴
		}
		
		public function rowcount($text1)
		{
			if(!$text1)
				$sql="select * from aji";
			else
				$sql="select * from aji where name like '%$text1%'";
			
			return $this->db->query($sql)->num_rows(); 
		}

		function getrow($no)
		{
			$sql="select * from aji where no=$no";
			return $this->db->query($sql)->row();
		}
		function insertrow($row)
		{
			return $this->db->insert("tupyo",$row);
		}
		
		function countrow()
		{
			$sql="select aji_no,count(*) as c from tupyo group by aji_no";
			return $this->db->query($sql)->result();
		}
		
		function deleterow($no)
		{
			$sql="delete from tupyo where no=$no";
			return $this->db->query($sql);
		}
		
	}
?>