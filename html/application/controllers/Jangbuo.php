<?
	class Jangbuo extends CI_Controller{	//jangbuo클래스 선언
		function __construct()		//클래스 생성할 때 초기 설정
	{
		parent::__construct();
		$this->load->database();	//데이터 베이스 연결
		$this->load->model("jangbuo_m"); //모델 jangbuo_m 연결
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
		$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : $today=date("Y-m-d");//오늘날짜;
		
		$base_url = "/jangbuo/lists/text1/$text1/page"; //$page_segment = 6;

		$page_segment = substr_count(substr($base_url,0,strpos($base_url,"page")), "/")+1;
		$base_url="/~sale9".$base_url;
		
		$config["per_page"] = 5; //페이지당 표시할 line 수
		$config["total_rows"] = $this->jangbuo_m->rowcount($text1); //전체 레코드 개수 구하기
		$config["uri_segment"] = $page_segment; //페이지가 있는 segment 위치
		$config["base_url"] = $base_url; //기본 URL
		$this->pagination->initialize($config); //pagination 설정적용

		$data["page"]=$this->uri->segment($page_segment,0); //시작위치,없으면,0
		$data["pagination"] = $this->pagination->create_links(); //페이지 소스 생성

		$start=$data["page"]; //n페이지:시작위치
		$limit=$config["per_page"]; //페이지 당 라인수

		$data["text1"]=$text1; //text1 값 전달을 위한처리
		$data["list"] = $this->jangbuo_m->getlist($text1,$start,$limit); //자료읽어 data배열에 저장 
		$this->load->view("main_header"); //상단출력(메뉴)
		$this->load->view("jangbuo_list",$data); //jangbuo_list에 자료전달
		$this->load->view("main_footer"); //하단출력
	}
		public function view() // 뷰 함수
	{
		$uri_array=$this->uri->uri_to_assoc(3);
		$no = array_key_exists("no",$uri_array) ? $uri_array["no"] : "";
		//$no = $this->uri->segment(4);
		$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "";
		$page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : "";

		$data["text1"]=$text1;
		$data["page"]=$page;
		$data["row"] = $this->jangbuo_m->getrow($no);

		$this->load->view("main_header"); //상단출력(메뉴)
		$this->load->view("jangbuo_view",$data);
		$this->load->view("main_footer"); //하단출력
	}
		public function del()
	{
		$uri_array=$this->uri->uri_to_assoc(3);
		$no = array_key_exists("no",$uri_array) ? $uri_array["no"] : "";
		$text1 = array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "";
		$page = array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : "";
		//$no = $this->uri->segment(4);
		$this->jangbuo_m->deleterow($no); //삭제
		redirect("/~sale9/jangbuo/lists".$text1.$page); // 목록화면 돌아가기
	}
		public function add()
	{
			$uri_array=$this->uri->uri_to_assoc(3);
			$no = array_key_exists("no",$uri_array) ? $uri_array["no"] : "";
			$text1 = array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "";
			$page = array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : "";

			$this->load->library("form_validation"); //라이브러리 추가

			$this->form_validation->set_rules("writeday","날짜","required");
			$this->form_validation->set_rules("product_no","제품명","required");
			
		if($this->form_validation->run()==FALSE)//검사
		//if(!$_POST) // 목록화면의 추가 버튼을 클릭한 경우
		{
			$data["list"] = $this->jangbuo_m->getlist_product();
			$this->load->view("main_header");
			$this->load->view("jangbuo_add",$data); //입력화면포시
			$this->load->view("main_footer");
		}
		else //입력화면의 저장버튼을 클릭한 경우
		{

			$data=array(
				"io9"	=> 1,
				"writeday9" => $this->input->post("writeday",TRUE),
				"product_no9" => $this->input->post("product_no",TRUE),
				"price9" => $this->input->post("price",TRUE),
				"numi9" => 0,
				"numo9" => $this->input->post("numo",TRUE),
				"prices9" => $this->input->post("prices",TRUE),
				"bigo9" => $this->input->post("bigo",TRUE)
				);
		
			$result=$this->jangbuo_m->insertrow($data);
		
		redirect("/~sale9/jangbuo/lists".$text1.$page); // 목록화면 돌아가기
		}

		
	}
	public function edit()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$no = array_key_exists("no",$uri_array) ? $uri_array["no"] : "";
			$text1 = array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "";
			$page = array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : "";
			$this->load->library("form_validation"); //라이브러리 추가
			$this->form_validation->set_rules("writeday","날짜","required");
			$this->form_validation->set_rules("product_no","제품명","required");
			if($this->form_validation->run()==FALSE)//검사 //수정버튼을 클릭한 경우
			//if(!$_POST) // 목록화면의 추가 버튼을 클릭한 경우
			{
				$data["list"] = $this->jangbuo_m->getlist_product();
				$this->load->view("main_header");
				$data["row"] = $this->jangbuo_m->getrow($no);
				$this->load->view("jangbuo_edit",$data); //입력화면포시
				$this->load->view("main_footer");
			}
			else //입력화면의 저장버튼을 클릭한 경우
			{
				
				//$data=array(입력한자료들);

				$data=array(
					"io9"	=> 1,
				"writeday9" => $this->input->post("writeday",TRUE),
				"product_no9" => $this->input->post("product_no",TRUE),
				"price9" => $this->input->post("price",TRUE),
				"numi9" => 0,
				"numo9" => $this->input->post("numo",TRUE),
				"prices9" => $this->input->post("prices",TRUE),
				"bigo9" => $this->input->post("bigo",TRUE)
					);
				
				$result=$this->jangbuo_m->updaterow($data,$no);
			
				redirect("/~sale9/jangbuo/lists".$text1.$page); // 목록화면 돌아가기
			}
		}
		public function call_upload()
	{
			$config['upload_path'] = './jangbuo_img'; //저장할 경로
			$config['allowed_types'] ='jpg'; //저장할 파일 종류
			$config['overwrite'] = TRUE; //overwrite 허용
			$this->upload->initialize($config); //설정적용
			
			if(!$this->upload->do_upload("pic")) //업로드 시작 
				$picname="error"; //실패 경우, 빈 문자열 리턴
			else
				$picname=$this->upload->data("file_name"); //성공 경우, 파일이름 리턴
			return $picname;
	}
		
}
?>