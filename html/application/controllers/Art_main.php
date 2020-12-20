<?
	class Art_main extends CI_Controller{	//Member클래스 선언
	
	
		function __construct()		//클래스 생성할 때 초기 설정
	{
		parent::__construct();
		$this->load->database();	//데이터 베이스 연결
		$this->load->model("art_main_m"); //모델 연결
		$this->load->helper(array("url","date"));
		date_default_timezone_set("Asia/Seoul");//지역설정
		$this->load->library("pagination"); //페이지 라이브러리

	}
	
		public function index()	 //제일 먼저 실행되는 함수
	{
		$this->lists(); //list 함수 호출
	
	}
	
		public function lists() // 리스트 함수
	{
		$base_url = "/art_main/lists/page";
		$page_segment = substr_count(substr($base_url,0,strpos($base_url,"page")), "/")+1;
		$base_url="/~sale9".$base_url;
		$config["per_page"] = 6; //페이지당 표시할 line 수
		$config["total_rows"] = $this->art_main_m->rowcount(); //전체 레코드 개수 구하기
		$config["uri_segment"] = $page_segment; //페이지가 있는 segment 위치
		$config["base_url"] = $base_url; //기본 URL
		$this->pagination->initialize($config); //pagination 설정적용

		$data["page"]=$this->uri->segment($page_segment,0); //시작위치,없으면,0
		$data["pagination"] = $this->pagination->create_links(); //페이지 소스 생성

		$start=$data["page"]; //n페이지:시작위치
		$limit=$config["per_page"]; //페이지 당 라인수
		
		$data["mrow"] = $this->art_main_m->rowmember(); //자료읽어 data배열에 저장
		$data["jrow"] = $this->art_main_m->rowjagpum(); //자료읽어 data배열에 저장 
		$data["grow"] = $this->art_main_m->rowgood();
		$data["list"] = $this->art_main_m->getlist($start,$limit); //자료읽어 data배열에 저장
		$data["member"] = $this->art_main_m->getmember();
		$data["jagga"] = $this->art_main_m->rowjagga();
		$this->load->view("art_main_header1"); //상단출력(메뉴)
		$this->load->view("art_index1",$data); //picture_list에 자료전달
		$this->load->view("art_main_footer1"); //하단출력		
	}
	
}
?>