<?
	class Art_main_m extends CI_Model //모델 클래스 선언
	{
		public function getlist($start,$limit)
		{
			$sql="select jagpum.*, count(good.jagpum_no) as c from jagpum left join good on jagpum.no=good.jagpum_no group by jagpum.no order by c desc  limit $start,$limit"; //select문 정의
			return $this->db->query($sql)->result(); //쿼리실행, 결과 리턴
		}
		public function rowcount()
		{
				$sql="select * from jagpum";
			
			return $this->db->query($sql)->num_rows(); 
		}
		public function getmember()
		{
			$sql="select no9,name9 from member"; //select문 정의
			return $this->db->query($sql)->result(); //쿼리실행, 결과 리턴
		}
		function rowmember()
		{
			$sql="select count(*) as cm from member"; //select문 정의
			return $this->db->query($sql)->row(); //쿼리실행, 결과 리턴
		}
		

		function rowjagpum()
		{
			$sql="select count(*) as cj from jagpum";
			return $this->db->query($sql)->row();
		}
		function rowgood()
		{
			$sql="select count(*) as cg from good";
			return $this->db->query($sql)->row();
		}
		function rowjagga()
		{
			$sql="select member.*, count(jagpum.member_no) as c from member right join jagpum on member.no9=jagpum.member_no GROUP by jagpum.member_no";
			return $this->db->query($sql)->num_rows();
		}
		
	}

?>