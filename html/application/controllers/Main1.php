<?
	class Main1 extends CI_Controller{	//Member클래스 선언
		
		function __construct()		//클래스 생성할 때 초기 설정
	{
		parent::__construct();
		$this->load->database();	//데이터 베이스 연결
		$this->load->model("ajipic_m"); //모델 picture_m 연결
		$this->load->helper(array("url","date"));
		date_default_timezone_set("Asia/Seoul");//지역설정

	}
		public function index()	 //제일 먼저 실행되는 함수
	{
		$this->lists(); //list 함수 호출
		$this->load->view("main_header1"); //상단출력(메뉴)
		$this->load->view("main_footer1"); //하단출력
	}
	public function lists() // 리스트 함수
	{
		$data["list"] = $this->ajipic_m->getlist(); //자료읽어 data배열에 저장
		//$data["list"] = $this->chart_m->getlist($text1,$text2); //자료읽어 data배열에 저장 
		$data["list_count"] = $this->ajipic_m->countrow();
		$data["list_rowc"] = $this->ajipic_m->rowc();
		$this->load->view("main_header1"); //상단출력(메뉴)
		$this->load->view("index1",$data); //picture_list에 자료전달
		$this->load->view("main_footer"); //하단출력

		
				
	}
}
?>