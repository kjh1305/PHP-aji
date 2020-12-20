<?
	class Art_admin extends CI_Controller{	//Member클래스 선언
	
	
		function __construct()		//클래스 생성할 때 초기 설정
	{
		parent::__construct();
		$this->load->database();	//데이터 베이스 연결
		$this->load->model("art_admin_m"); //모델 연결
		$this->load->helper(array("url","date"));
		date_default_timezone_set("Asia/Seoul");//지역설정

	}
	
		public function index()	 //제일 먼저 실행되는 함수
	{
		$this->lists(); //list 함수 호출
		if($this->session->userdata('rank')!=1) redirect("/~sale9/art_main");
		
	}
	
		public function lists() // 리스트 함수
	{
		$data["mrow"] = $this->art_admin_m->rowmember(); //자료읽어 data배열에 저장
		$data["jrow"] = $this->art_admin_m->rowjagpum(); //자료읽어 data배열에 저장 
		$data["grow"] = $this->art_admin_m->rowgood();
		$data["jagga"] = $this->art_admin_m->rowjagga();	

		$this->load->view("art_admin_header"); //상단출력(메뉴)
		$this->load->view("art_admin_index",$data); //picture_list에 자료전달
		$this->load->view("art_admin_footer"); //하단출력		
	}
	
}
?>