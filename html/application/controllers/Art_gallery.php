<?
	class Art_gallery extends CI_Controller{	//Member클래스 선언
		function __construct()		//클래스 생성할 때 초기 설정
	{
		parent::__construct();
		$this->load->database();	//데이터 베이스 연결
		$this->load->model("art_gallery_m"); //모델 Member_m 연결
		$this->load->helper(array("url","date")); //redirect 함수를 사용하도록 등록하기. 헬퍼
		$this->load->library("form_validation");
		$this->load->library("pagination"); //페이지 라이브러리
	}
		public function index()	 //제일 먼저 실행되는 함수
	{
			$this->lists(); //list 함수 호출	
	}
		public function lists() // 리스트 함수
	{
		$uri_array=$this->uri->uri_to_assoc(3);
		$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "";
		//$text1=urldecode($this->uri->segment(4));//URI:/member/lists/text1/값
		
		if($text1=="")
			$base_url = "/art_gallery/lists/page"; //$page_segment = 4;
		else
			$base_url = "/art_gallery/lists/text1/$text1/page"; //$page_segment = 6;
		$page_segment = substr_count(substr($base_url,0,strpos($base_url,"page")), "/")+1;
		$base_url="/~sale9".$base_url;
		
		$config["per_page"] = 9; //페이지당 표시할 line 수
		$config["total_rows"] = $this->art_gallery_m->rowcount($text1); //전체 레코드 개수 구하기
		$config["uri_segment"] = $page_segment; //페이지가 있는 segment 위치
		$config["base_url"] = $base_url; //기본 URL
		$this->pagination->initialize($config); //pagination 설정적용

		$data["page"]=$this->uri->segment($page_segment,0); //시작위치,없으면,0
		$data["pagination"] = $this->pagination->create_links(); //페이지 소스 생성

		$start=$data["page"]; //n페이지:시작위치
		$limit=$config["per_page"]; //페이지 당 라인수

		$data["text1"]=$text1; //text1 값 전달을 위한처리
		$data["list"] = $this->art_gallery_m->getlist($text1,$start,$limit); //자료읽어 data배열에 저장 
		$data["goodlist"] = $this->art_gallery_m->goodlist();
		
		$this->load->view("art_main_header1"); //상단출력(메뉴)
		$this->load->view("art_gallery_list1",$data); //member_list에 자료전달
		$this->load->view("art_main_footer1"); //하단출력
	}
	
		public function view() // 뷰 함수
	{
		$uri_array=$this->uri->uri_to_assoc(3);
		$no = array_key_exists("no",$uri_array) ? $uri_array["no"] : "";
		
		$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "";
		$page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : "";

		$data["text1"]=$text1;
		$data["page"]=$page;
		
		$data["row"] = $this->art_gallery_m->getrow($no);
		$data["list_good"] = $this->art_gallery_m->getgood();
		$data["count"] = $this->art_gallery_m->good_count($no);

		$this->load->view("art_main_header1"); //상단출력(메뉴)
		$this->load->view("art_gallery_view",$data);
		$this->load->view("art_main_footer1"); //하단출력

	}
		public function good_insert()
	{
			$no = $this->input->post("no",TRUE);
			$pumno = $this->input->post("pumno",TRUE);
			$data = array(
				"member_no" => $no,
				"jagpum_no" => $pumno
				);
			$this->art_gallery_m->insertrow($data);

			//$result = $this->art_gallery_m->countrow();
			//return $result;
	}
	
	public function good_delete(){
		$no = $this->input->post("no",TRUE);
		$pumno = $this->input->post("pumno",TRUE);
	$this->art_gallery_m->deleterow($no,$pumno); //삭제
	}
	
	
}
?>