<?
	class Art_myjagpum extends CI_Controller{	//product클래스 선언
		function __construct()		//클래스 생성할 때 초기 설정
	{
		parent::__construct();
		$this->load->database();	//데이터 베이스 연결
		$this->load->model("art_myjagpum_m"); //모델 product_m 연결
		$this->load->helper(array("url","date")); //redirect 함수를 사용하도록 등록하기. 헬퍼
		$this->load->library("form_validation");
		$this->load->library("pagination"); //페이지 라이브러리
		$this->load->library("upload"); //업로드 라이브러리
		$this->load->library("image_lib"); //이미지 라이브러리
	}
		public function index()	 //제일 먼저 실행되는 함수
	{
			$this->lists(); //list 함수 호출	
	}
		public function lists() // 리스트 함수
	{
		$uri_array=$this->uri->uri_to_assoc(3);
		$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "";
		//$text1=urldecode($this->uri->segment(4));//URI:/product/lists/text1/값
		
		if($text1=="")
			$base_url = "/art_myjagpum/lists/page"; //$page_segment = 4;
		else
			$base_url = "/art_mygpum/lists/text1/$text1/page"; //$page_segment = 6;
		$page_segment = substr_count(substr($base_url,0,strpos($base_url,"page")), "/")+1;
		$base_url="/~sale9".$base_url;
		
		$config["per_page"] = 6; //페이지당 표시할 line 수
		$config["total_rows"] = $this->art_myjagpum_m->rowcount($text1); //전체 레코드 개수 구하기
		$config["uri_segment"] = $page_segment; //페이지가 있는 segment 위치
		$config["base_url"] = $base_url; //기본 URL
		$this->pagination->initialize($config); //pagination 설정적용

		$data["page"]=$this->uri->segment($page_segment,0); //시작위치,없으면,0
		$data["pagination"] = $this->pagination->create_links(); //페이지 소스 생성

		$start=$data["page"]; //n페이지:시작위치
		$limit=$config["per_page"]; //페이지 당 라인수

		$data["text1"]=$text1; //text1 값 전달을 위한처리
		$mno=$this->session->userdata('no');
		$data["list"] = $this->art_myjagpum_m->getlist($mno,$text1,$start,$limit); //자료읽어 data배열에 저장 
		$this->load->view("art_main_header1"); //상단출력(메뉴)
		$this->load->view("art_myjagpum_list1",$data); //product_list에 자료전달
		$this->load->view("art_main_footer1"); //하단출력
	}
	public function add()
	{
			$uri_array=$this->uri->uri_to_assoc(3);
			$no = array_key_exists("no",$uri_array) ? $uri_array["no"] : "";
			$text1 = array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "";
			$page = array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : "";
			$data["page"]=$page; //시작위치,없으면,0
			$data["text1"]=$text1; //text1 값 전달을 위한처리
			$this->load->library("form_validation"); //라이브러리 추가
			$this->form_validation->set_rules("name","이름","required|max_length[20]");
			$this->form_validation->set_rules("exp","설명","required|max_length[50]");
			
			
		if($this->form_validation->run()==FALSE)//검사
		//if(!$_POST) // 목록화면의 추가 버튼을 클릭한 경우
		{
			$data["list"] = $this->art_myjagpum_m->getlist_member();
			$this->load->view("art_main_header1");
			$this->load->view("art_myjagpum_add1",$data); //입력화면포시
			$this->load->view("art_main_footer1");
		}
		else //입력화면의 저장버튼을 클릭한 경우
		{
			$data=array(
				"member_no" => $this->input->post("member_no",TRUE),
				"name" => $this->input->post("name",TRUE),
				"exp" => $this->input->post("exp",TRUE),
				"writeday" => $this->input->post("writeday",TRUE)
				);
			$picname = $this->call_upload(); //업로드 시작
			if($picname) 
				$data["pic"] = $picname; //파일이름 저장

			$result=$this->art_myjagpum_m->insertrow($data);
		
		redirect("/~sale9/art_myjagpum/lists".$text1.$page); // 목록화면 돌아가기
		}
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
		$data["row"] = $this->art_myjagpum_m->getrow($no);

		$this->load->view("art_main_header1"); //상단출력(메뉴)
		$this->load->view("art_myjagpum_view1",$data);
		$this->load->view("art_main_footer1"); //하단출력
	}

		public function del()
	{
		$uri_array=$this->uri->uri_to_assoc(3);
		$no = array_key_exists("no",$uri_array) ? $uri_array["no"] : "";
		$text1 = array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "";
		$page = array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : "";
		//$no = $this->uri->segment(4);
		$this->art_myjagpum_m->deleterow($no); //삭제
		$this->art_myjagpum_m->deletegood($no); //삭제
		redirect("/~sale9/art_myjagpum/lists".$text1.$page); // 목록화면 돌아가기
	}
		
	public function edit()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$no = array_key_exists("no",$uri_array) ? $uri_array["no"] : "";
			$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "";
			$page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : "";
			$this->load->library("form_validation"); //라이브러리 추가
			$this->form_validation->set_rules("name","이름","required|max_length[20]");
			$this->form_validation->set_rules("exp","설명","required|max_length[50]");
			$data["text1"]=$text1;
			$data["page"]=$page;
			if($this->form_validation->run()==FALSE)//검사 //수정버튼을 클릭한 경우
			//if(!$_POST) // 목록화면의 추가 버튼을 클릭한 경우
			{
				
				
				$this->load->view("art_main_header1");
				$data["row"] = $this->art_myjagpum_m->getrow($no);
				$this->load->view("art_myjagpum_view1",$data); //입력화면포시
				$this->load->view("art_main_footer1");
				
			}
			else //입력화면의 저장버튼을 클릭한 경우
			{
				
				//$data=array(입력한자료들);

				$data=array(
					"member_no" => $this->input->post("member_no",TRUE),
				"name" => $this->input->post("name",TRUE),
				"exp" => $this->input->post("exp",TRUE),
				"writeday" => $this->input->post("writeday",TRUE)
					
					);
					$picname = $this->call_upload(); //업로드 시작
			if($picname) $data["pic"] = $picname; //파일이름 저장
				$result=$this->art_myjagpum_m->updaterow($data,$no);
			
				redirect("/~sale9/art_myjagpum/lists"."/".$text1."/".$page); // 목록화면 돌아가기
			}
		}
		
		public function call_upload()
	{
			$config['upload_path'] = './product_img'; //저장할 경로
			$config['allowed_types'] ='jpg|png'; //저장할 파일 종류
			$config['overwrite'] = TRUE; //overwrite 허용
			$config['max_size'] = 100000000;
			$config['max_width'] = 10000;
			$config['max_height'] = 10000;
			$this->upload->initialize($config); //설정적용
			
			if(!$this->upload->do_upload("pic")) //업로드 시작 
				$picname=""; //실패 경우, 빈 문자열 리턴
			else
			{
				$picname=$this->upload->data("file_name");//성공 경우, 파일이름 리턴
				
				$config['image_library'] = 'gd2';
				$config['source_image'] = './product_img/' . $picname;
				$config['thumb_marker'] = '';
				$config['new_image'] = './product_img/thumb';
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width'] = 400;
				$config['height'] = 350;

				$this->image_lib->initialize($config);
				$this->image_lib->resize();
			}

			return $picname;
	}
		
}
?>