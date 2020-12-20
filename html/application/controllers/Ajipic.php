<?
	class Ajipic extends CI_Controller{	//picture클래스 선언
		function __construct()		//클래스 생성할 때 초기 설정
	{
		parent::__construct();
		$this->load->database();	//데이터 베이스 연결
		$this->load->model("ajipic_m"); //모델 picture_m 연결
		$this->load->helper(array("url","date")); //redirect 함수를 사용하도록 등록하기. 헬퍼
		$this->load->library("form_validation");
		$this->load->library("pagination"); //페이지 라이브러리
		$this->load->library("upload"); //업로드 라이브러리
	}
		public function index()	 //제일 먼저 실행되는 함수
	{
			$this->lists(); //list 함수 호출	
	}
		public function lists() // 리스트 함수
	{
		
		$data["list"] = $this->picture_m->getlist(); //자료읽어 data배열에 저장 
		$this->load->view("main_header"); //상단출력(메뉴)
		$this->load->view("picture_list",$data); //picture_list에 자료전달
		$this->load->view("main_footer"); //하단출력
	}

	/*
		public function zoom()
	{
			$uri_array=$this->uri->uri_to_assoc(3);
			$data["iname"] = array_key_exists("iname",$uri_array) ? urldecode($uri_array["iname"]) : "";
			$data["pname"] = array_key_exists("pname",$uri_array) ? urldecode($uri_array["pname"]) : "";

			$this->load->view("main_header_nomenu");
			$this->load->view("picture_zoom",$data);
			$this->load->view("main_footer");
	}
		
	*/
}
?>