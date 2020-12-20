<?
	class Art_member_info_m extends CI_Model //모델 클래스 선언
	{
		
		
		public function getrow($no)
		{
			$sql="select * from member where no9=$no"; //select문 정의
			return $this->db->query($sql)->row(); //쿼리실행, 결과 리턴
		}
		/*
		public function rowcount($text1)
		{
			if(!$text1)
				$sql="select * from gubun";
			else
				$sql="select * from gubun where name9 like '%$text1%'";
			
			return $this->db->query($sql)->num_rows(); 
		}

		function getrow($no)
		{
			$sql="select * from gubun where no9=$no";
			return $this->db->query($sql)->row();
		}
		*/
		
		function updaterow($row,$no)
		{
			$where=array("no9"=>$no);
			return $this->db->update("member",$row,$where);
		}
		
	}
?>