<?
	class Art_member_m extends CI_Model //모델 클래스 선언
	{
		public function getlist($text1,$start,$limit)
		{
			if(!$text1)
			$sql="select member.*, count(jagpum.member_no) as c from member right join jagpum on member.no9=jagpum.member_no GROUP by jagpum.member_no limit $start,$limit"; //select문 정의
			else
				$sql="select member.*, count(jagpum.member_no) as c from member left join jagpum on member.no9=jagpum.member_no GROUP by jagpum.member_no having name9 like '%$text1%' order by name9 limit $start,$limit";
			return $this->db->query($sql)->result(); //쿼리실행, 결과 리턴
		}
		
		public function rowcount($text1)
		{
			if(!$text1)
				$sql="select member.*, count(jagpum.member_no) as c from member left join jagpum on member.no9=jagpum.member_no GROUP by jagpum.member_no";
			else
				$sql="select member.*, count(jagpum.member_no) as c from member left join jagpum on member.no9=jagpum.member_no GROUP by jagpum.member_no having name9 like '%$text1%'";
			
			return $this->db->query($sql)->num_rows(); 
		}
		public function rowcountjagpum($no)
		{
				$sql="select jagpum.* from jagpum left join member on
			jagpum.member_no=member.no9 where jagpum.member_no=$no";
			
			return $this->db->query($sql)->num_rows(); 
		}

		function getrow($no,$start,$limit)
		{
			$sql="select jagpum.* ,member.name9 as member_name from jagpum left join member on
			jagpum.member_no=member.no9 where jagpum.member_no=$no limit $start,$limit";
			return $this->db->query($sql)->result();
		}
		function rowmember($no)
		{
			$sql="select * from member where no9=$no";
			return $this->db->query($sql)->result();
		}
		public function jagpumcount($no)
		{
			$sql="select jagpum.* from jagpum left join member on
			jagpum.member_no=member.no9 where jagpum.member_no=$no";
			
			return $this->db->query($sql)->num_rows(); 
		}

		public function membergood()
		{
			$sql="select jagpum.member_no, count(good.no) as c from jagpum left join good on jagpum.no=good.jagpum_no GROUP by jagpum.member_no";

			return $this->db->query($sql)->result();
		}
	}
?>