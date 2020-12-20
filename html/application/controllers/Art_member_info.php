<?
	class Art_member_info extends CI_Controller{	//gubun클래스 선언
		function __construct()		//클래스 생성할 때 초기 설정
	{
		parent::__construct();
		$this->load->database();	//데이터 베이스 연결
		$this->load->model("art_member_info_m"); //모델 gubun_m 연결
		$this->load->helper(array("url","date")); //redirect 함수를 사용하도록 등록하기. 헬퍼
		$this->load->library("form_validation");
		$this->load->library("pagination"); //페이지 라이브러리
		$this->load->library("upload"); //업로드 라이브러리
		$this->load->library("image_lib"); //이미지 라이브러리
	}

	
		public function index()	 //제일 먼저 실행되는 함수
	{
			$this->view(); //list 함수 호출	
	}
	
		
		public function view() // 뷰 함수
	{
		
		$no=$this->session->userdata('no');		
		$data["row"] = $this->art_member_info_m->getrow($no);

		$this->load->view("art_main_header1"); //상단출력(메뉴)
		$this->load->view("art_member_info",$data);
		$this->load->view("art_main_footer1"); //하단출력
		
		
	}
	
	public function edit()
	{
		$no=$this->session->userdata('no');		
		$data["row"] = $this->art_member_info_m->getrow($no);	
		$this->form_validation->set_rules("name","이름","required|max_length[20]");
		//$this->form_validation->set_rules("uid","아이디","required|max_length[20]");
		$this->form_validation->set_rules("pwd","비밀번호","required|max_length[20]");
		$this->form_validation->set_rules("repwd","비밀번호","required|max_length[20]|matches[pwd]");
		$this->form_validation->set_rules("tel","전화번호","required|max_length[11]");
		$this->form_validation->set_rules("exp","소개","required|max_length[50]");

		if($this->form_validation->run()==FALSE)//검사
		{
			$this->load->view("art_main_header1");
			$this->load->view("art_member_info",$data); //입력화면표시
			$this->load->view("art_main_footer1");
		}
		else //입력화면의 저장버튼을 클릭한 경우
		{
			$data=array(
				"name9" => $this->input->post("name",TRUE),
				"uid9" => $this->input->post("uid",TRUE),	
				"pwd9" => $this->input->post("pwd",TRUE),
				"tel9" => $this->input->post("tel",TRUE),
				"exp9" => $this->input->post("exp",TRUE)
				);

			$picname = $this->call_upload(); //업로드 시작
			if($picname) $data["pic9"] = $picname; //파일이름 저장
			
			$this->art_member_info_m->updaterow($data,$no);
		
		redirect("/~sale9/art_main"); // 목록화면 돌아가기
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