<?
	class Art_login extends CI_Controller{	//jangbuo클래스 선언
		function __construct()		//클래스 생성할 때 초기 설정
	{
		parent::__construct();
		$this->load->database();	//데이터 베이스 연결
		$this->load->model("login_m"); //모델 jangbuo_m 연결
		$this->load->helper(array("url","date")); //redirect 함수를 사용하도록 등록하기. 헬퍼
		
	}
		public function index()	 //제일 먼저 실행되는 함수
	{
			
	}
	
	public function check(){
		$uid=$this->input->post("uid",TRUE);
		$pwd=$this->input->post("pwd",TRUE);

		$row=$this->login_m->getrow($uid,$pwd);
		if($row){
			$data=array(
				"uid"=>$row->uid9,
				"no"=>$row->no9,
				"rank"=>$row->rank9
	);
			$this->session->set_userdata($data);
			redirect("/~sale9/art_main");
	}
		
			$this->load->view("art_login_failed"); //상단출력(메뉴)
			
	}

	public function logout()
	{
		$data = array('uid','no','rank');
		$this->session->unset_userdata($data);

		
		redirect("/~sale9/art_main");
	}
	
}
?>