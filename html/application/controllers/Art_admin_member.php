<?
	class Art_admin_member extends CI_Controller{	//Member클래스 선언
		function __construct()		//클래스 생성할 때 초기 설정
	{
		parent::__construct();
		$this->load->database();	//데이터 베이스 연결
		$this->load->model("art_admin_member_m"); //모델 Member_m 연결
		$this->load->helper(array("url","date")); //redirect 함수를 사용하도록 등록하기. 헬퍼
		$this->load->library("form_validation");
		$this->load->library("pagination"); //페이지 라이브러리
		$this->load->library("upload"); //업로드 라이브러리
		$this->load->library("image_lib"); //이미지 라이브러리
	}
		public function index()	 //제일 먼저 실행되는 함수
	{
			if($this->session->userdata('rank')!=1) redirect("/~sale9/art_main");
			$this->lists(); //list 함수 호출	
	}
		public function lists() // 리스트 함수
	{
		$uri_array=$this->uri->uri_to_assoc(3);
		$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "";
		//$text1=urldecode($this->uri->segment(4));//URI:/member/lists/text1/값
		
		if($text1=="")
			$base_url = "/art_admin_member/lists/page"; //$page_segment = 4;
		else
			$base_url = "/art_admin_member/lists/text1/$text1/page"; //$page_segment = 6;
		$page_segment = substr_count(substr($base_url,0,strpos($base_url,"page")), "/")+1;
		$base_url="/~sale9".$base_url;
		
		$config["per_page"] = 5; //페이지당 표시할 line 수
		$config["total_rows"] = $this->art_admin_member_m->rowcount($text1); //전체 레코드 개수 구하기
		$config["uri_segment"] = $page_segment; //페이지가 있는 segment 위치
		$config["base_url"] = $base_url; //기본 URL
		$this->pagination->initialize($config); //pagination 설정적용

		$data["page"]=$this->uri->segment($page_segment,0); //시작위치,없으면,0
		$data["pagination"] = $this->pagination->create_links(); //페이지 소스 생성

		$start=$data["page"]; //n페이지:시작위치
		$limit=$config["per_page"]; //페이지 당 라인수

		$data["text1"]=$text1; //text1 값 전달을 위한처리
		$data["list"] = $this->art_admin_member_m->getlist($text1,$start,$limit); //자료읽어 data배열에 저장 
		$this->load->view("art_admin_header"); //상단출력(메뉴)
		$this->load->view("art_admin_member_list",$data); //member_list에 자료전달
		$this->load->view("art_admin_footer"); //하단출력
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
		$data["row"] = $this->art_admin_member_m->getrow($no);

		$this->load->view("art_admin_header"); //상단출력(메뉴)
		$this->load->view("art_admin_member_view",$data);
		$this->load->view("art_admin_footer"); //하단출력
	}
		public function del()
	{
		$uri_array=$this->uri->uri_to_assoc(3);
		$no = array_key_exists("no",$uri_array) ? $uri_array["no"] : "";
		$text1 = array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "";
		$page = array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : "";
		//$no = $this->uri->segment(4);
		$this->art_admin_member_m->deleterow($no); //삭제
		redirect("/~sale9/art_admin_member/lists".$text1.$page); // 목록화면 돌아가기
	}
		public function add()
	{
			$uri_array=$this->uri->uri_to_assoc(3);
			$no = array_key_exists("no",$uri_array) ? $uri_array["no"] : "";
			$text1 = array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "";
			$page = array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : "";

			$this->load->library("form_validation"); //라이브러리 추가
			$this->form_validation->set_rules("name","이름","required|max_length[20]");
			$this->form_validation->set_rules("uid","아이디","required|max_length[20]|callback_uid_check");
			$this->form_validation->set_rules("pwd","암호","required|max_length[20]");
			$this->form_validation->set_rules("repwd","암호확인","required|max_length[20]|matches[pwd]");
			$this->form_validation->set_rules("tel","전화번호","required|min_length[11]|max_length[11]");
			$this->form_validation->set_rules("exp","소개","required|max_length[50]");
		if($this->form_validation->run()==FALSE)//검사
		//if(!$_POST) // 목록화면의 추가 버튼을 클릭한 경우
		{
			$this->load->view("art_admin_header");
			$this->load->view("art_admin_member_add"); //입력화면포시
			$this->load->view("art_admin_footer");
		}
		else //입력화면의 저장버튼을 클릭한 경우
		{
			$data=array(
				"name9" => $this->input->post("name",TRUE),
				"uid9" => $this->input->post("uid",TRUE),
				"pwd9" => $this->input->post("pwd",TRUE),
				"tel9" => $this->input->post("tel",TRUE),
				"exp9" => $this->input->post("exp",TRUE),
				"rank9" => $this->input->post("rank",TRUE)
				);
			$picname = $this->call_upload(); //업로드 시작
			if($picname) 
				$data["pic9"] = $picname; //파일이름 저장
			$this->art_admin_member_m->insertrow($data);
		
		redirect("/~sale9/art_admin_member/lists".$text1.$page); // 목록화면 돌아가기
		}

		
	}
	public function edit()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$no = array_key_exists("no",$uri_array) ? $uri_array["no"] : "";
			$text1 = array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "";
			$page = array_key_exists("page",$uri_array) ? "/page/".urldecode($uri_array["page"]) : "";
			$this->load->library("form_validation"); //라이브러리 추가
			$this->form_validation->set_rules("name","이름","required|max_length[20]");
			$this->form_validation->set_rules("uid","아이디","required|max_length[20]");
			$this->form_validation->set_rules("pwd","암호","required|max_length[20]");
			$this->form_validation->set_rules("repwd","암호확인","required|max_length[20]|matches[pwd]");
			$this->form_validation->set_rules("tel","전화번호","required|min_length[11]|max_length[11]");
			$this->form_validation->set_rules("exp","소개","required|max_length[50]");

			if($this->form_validation->run()==FALSE)//검사 //수정버튼을 클릭한 경우
			//if(!$_POST) // 목록화면의 추가 버튼을 클릭한 경우
			{
				$this->load->view("art_admin_header");
				$data["row"] = $this->art_admin_member_m->getrow($no);
				$this->load->view("art_admin_member_edit",$data); //입력화면포시
				$this->load->view("art_admin_footer");
			}
			else //입력화면의 저장버튼을 클릭한 경우
			{
				$data=array(
					"name9" => $this->input->post("name",TRUE),
				"uid9" => $this->input->post("uid",TRUE),
				"pwd9" => $this->input->post("pwd",TRUE),
				"tel9" => $this->input->post("tel",TRUE),
				"exp9" => $this->input->post("exp",TRUE),
				"rank9" => $this->input->post("rank",TRUE)
					);
				$picname = $this->call_upload(); //업로드 시작
			if($picname) 
				$data["pic9"] = $picname; //파일이름 저장
				$this->art_admin_member_m->updaterow($data,$no);
			
				redirect("/~sale9/art_admin_member/lists".$text1.$page); // 목록화면 돌아가기
			}
		}
		public function uid_check($str)
        {
				$result=$this->art_admin_member_m->check($str);
                if ($result)
                {
                        $this->form_validation->set_message('uid_check', $str.' 는 중복된 아이디입니다.');
                        return FALSE;
                }
                else
                {
                        return TRUE;
                }
        }
	
	public function call_upload()
	{
			$config['upload_path'] = './member_img'; //저장할 경로
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
				$config['source_image'] = './member_img/' . $picname;
				$config['thumb_marker'] = '';
				$config['new_image'] = './member_img/thumb';
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width'] = 350;
				$config['height'] = 300;

				$this->image_lib->initialize($config);
				$this->image_lib->resize();
			}

			return $picname;
	}	
}
?>