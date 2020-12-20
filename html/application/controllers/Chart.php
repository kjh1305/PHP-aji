<?
	class Chart extends CI_Controller{	//jangbuo클래스 선언
		function __construct()		//클래스 생성할 때 초기 설정
	{
		parent::__construct();
		$this->load->database();	//데이터 베이스 연결
		$this->load->model("chart_m"); //모델 jangbuo_m 연결
		$this->load->helper(array("url","date")); //redirect 함수를 사용하도록 등록하기. 헬퍼
		$this->load->library("form_validation");
		$this->load->library("pagination"); //페이지 라이브러리
		
		date_default_timezone_set("Asia/Seoul");//지역설정
		
	}
		public function index()	 //제일 먼저 실행되는 함수
	{
			$this->lists(); //list 함수 호출	
	}
		public function lists() // 리스트 함수
	{
		$uri_array=$this->uri->uri_to_assoc(3);
		$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : date("Y-m-d",strtotime("-1 month"));//1달전;
		$text2 = array_key_exists("text2",$uri_array) ? urldecode($uri_array["text2"]) : date("Y-m-d");//오늘날짜;
		
		
		$data["rowcount"] = $this->chart_m->getlist($text1,$text2);

		$data["text1"]=$text1; //text1 값 전달을 위한처리
		$data["text2"]=$text2;
		
		//$data["list_product"] = $this->chart_m->getlist_product();
		$data["list"] = $this->chart_m->getlist($text1,$text2); //자료읽어 data배열에 저장 
		$this->load->view("main_header"); //상단출력(메뉴)
		$this->load->view("chart_list",$data); //jangbuo_list에 자료전달
		$this->load->view("main_footer"); //하단출력
	}
	
	
}
?>