<?
	class Art_member_signup_m extends CI_Model //모델 클래스 선언
	{
		function insertrow($row)
		{
			return $this->db->insert("member",$row);
		}
		
		function check($str)
		{
			$sql="select uid9 from member where uid9='$str'";
			return $this->db->query($sql)->row();
		}
	}
?>