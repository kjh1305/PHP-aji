<?
	class Art_admin_good_m extends CI_Model //모델 클래스 선언
	{
		public function getlist($text1,$start,$limit)
		{
			if(!$text1)
				$sql="select good.*, jagpum.name, member.name9 from good left join jagpum on good.jagpum_no=jagpum.no left join member on good.member_no=member.no9 order by no limit $start,$limit"; //select문 정의
			else
				$sql="select good.*, jagpum.name, member.name9 from good left join jagpum on good.jagpum_no=jagpum.no left join member on good.member_no=member.no9 where concat(good.no,jagpum.name,member.name9,good.member_no,good.jagpum_no) like '%$text1%' order by good.no limit $start,$limit";
			return $this->db->query($sql)->result(); //쿼리실행, 결과 리턴
		}
		
		public function rowcount($text1)
		{
			if(!$text1)
				$sql="select * from good";
			else
				$sql="select * from good where no like '%$text1%'";
			
			return $this->db->query($sql)->num_rows(); 
		}

		
		function deleterow($no)
		{
			$sql="delete from good where no=$no";
			return $this->db->query($sql);
		}
		
	}
?>