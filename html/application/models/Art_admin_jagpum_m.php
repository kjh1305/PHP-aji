<?
	class Art_admin_jagpum_m extends CI_Model //모델 클래스 선언
	{
		public function getlist($text1,$start,$limit)
		{
			if(!$text1)
				$sql="select jagpum.*, member.name9 as member_name from jagpum left join member on jagpum.member_no=member.no9 order by no limit $start,$limit"; //select문 정의
			else
				$sql="select jagpum.*, member.name9 as member_name from jagpum left join member on 
				jagpum.member_no=member.no9 where name like '%$text1%' order by name limit $start,$limit";
			return $this->db->query($sql)->result(); //쿼리실행, 결과 리턴
		}
		
		public function rowcount($text1)
		{
			if(!$text1)
				$sql="select * from jagpum";
			else
				$sql="select * from jagpum where name like '%$text1%'";
			
			return $this->db->query($sql)->num_rows(); 
		}

		function getrow($no)
		{
			$sql="select jagpum.*, member.name9 as member_name from jagpum left join member on 
			jagpum.member_no=member.no9 where jagpum.no=$no";
			return $this->db->query($sql)->row();
		}
		function deleterow($no)
		{
			$sql="delete from jagpum where no=$no";
			return $this->db->query($sql);
		}
		function deletegood($no)
		{
			$sql="delete from good where jagpum_no=$no";
			return $this->db->query($sql);
		}
		
		function insertrow($row)
		{
			return $this->db->insert("jagpum",$row);
		}
		function updaterow($row,$no)
		{
			$where=array("no"=>$no);
			return $this->db->update("jagpum",$row,$where);
		}
		function getlist_member()
		{
			$sql="select * from member order by name9";
			return $this->db->query($sql)->result();
		}
		
	}
?>