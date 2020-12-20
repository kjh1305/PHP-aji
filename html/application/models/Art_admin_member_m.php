<?
	class Art_admin_member_m extends CI_Model //모델 클래스 선언
	{
		public function getlist($text1,$start,$limit)
		{
			if(!$text1)
			$sql="select * from member where rank9=0 order by no9 limit $start,$limit"; //select문 정의
			else
				$sql="select * from member where rank9=0 and name9 like '%$text1%' order by name9 limit $start,$limit";
			return $this->db->query($sql)->result(); //쿼리실행, 결과 리턴
		}
		
		public function rowcount($text1)
		{
			if(!$text1)
				$sql="select * from member";
			else
				$sql="select * from member where name9 like '%$text1%'";
			
			return $this->db->query($sql)->num_rows(); 
		}

		function getrow($no)
		{
			$sql="select * from member where no9=$no";
			return $this->db->query($sql)->row();
		}
		function deleterow($no)
		{
			$sql="delete from member where no9=$no";
			return $this->db->query($sql);
		}
		
		function insertrow($row)
		{
			return $this->db->insert("member",$row);
		}
		function updaterow($row,$no)
		{
			$where=array("no9"=>$no);
			return $this->db->update("member",$row,$where);
		}
		function check($str)
		{
			$sql="select uid9 from member where uid9='$str'";
			return $this->db->query($sql)->row();
		}
	}
?>