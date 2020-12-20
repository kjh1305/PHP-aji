<?
	class Art_gallery_m extends CI_Model //모델 클래스 선언
	{
		public function getlist($text1,$start,$limit)
		{
			if(!$text1)
				$sql="select jagpum.*,member.* from jagpum left join member on jagpum.member_no=member.no9 order by no desc limit $start,$limit"; //select문 정의
			else
				$sql="select jagpum.*,member.* from jagpum left join member on jagpum.member_no=member.no9 where concat(jagpum.name,member.name9) like '%$text1%' order by jagpum.name limit $start,$limit";
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
		public function rowcountjagpum($no)
		{
				$sql="select jagpum.* from jagpum left join member on
			jagpum.member_no=member.no9 where jagpum.member_no=$no";
			
			return $this->db->query($sql)->num_rows(); 
		}

		function getrow($no)
		{
			$sql="select jagpum.*, member.* from jagpum left join member on jagpum.member_no=member.no9 where jagpum.no=$no";
			return $this->db->query($sql)->row();
		}
		
		function insertrow($row)
		{
			return $this->db->insert("good",$row);
		}
		function getgood()
		{
			$sql="select member_no,jagpum_no from good";
			return $this->db->query($sql)->result();
		}
		
		function deleterow($no,$pumno)
		{
			$sql="delete from good where member_no=$no and jagpum_no=$pumno";
			return $this->db->query($sql);
		}
		function good_count($no)
		{
			$sql="select ifnull(count(jagpum_no),0) as c from good where jagpum_no=$no";
			
			return $this->db->query($sql)->row();
		}
		function goodlist()
		{
			$sql="select jagpum_no,count(*) as c from good group by jagpum_no";
			return $this->db->query($sql)->result();
		}
		


	}
?>