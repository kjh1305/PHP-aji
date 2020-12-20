<?
	class Main extends CI_Controller{	//Member클래스 선언
		public function index()	 //제일 먼저 실행되는 함수
	{
		$this->load->view("main_header"); //상단출력(메뉴)
		$this->load->view("main_footer"); //하단출력
	}
}
?>