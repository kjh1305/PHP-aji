<!DOCTYPE html>
<html lang="ko">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>작품 갤러리</title>

<!-- Favicon-->
       
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/~sale9/my/css/styles.css" rel="stylesheet" />
		

		<script src="/~sale9/my/js/popper.min.js"></script>


		<script src="/~sale9/my/js/moment-with-locales.min.js"></script>
			
		<link  href="/~sale9/my/css/bootstrap-datetimepicker.css" rel="stylesheet">
		<link  href="/~sale9/my/css/fontawesome-all.min.css" rel="stylesheet">

		<script src="my/js/utils.js"></script>
  <!-- Bootstrap core CSS -->
  <link href="/~sale9/my/js/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="/~sale9/my/css/heroic-features.css" rel="stylesheet">
  <link href="/~sale9/my/css/my.css" rel="stylesheet">
		
</head>
<script>

</script>
<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/~sale9/art_main">작품 갤러리</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown"> <!--navbarResponsive-->
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
	
            <a class="nav-link" href="/~sale9/art_main">Home
              <span class="sr-only">(current)</span>
            </a> 
          </li>
		 <li class="nav-item dropdown">
		   <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  
         보기
			</a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	<?
		if(!$this->session->userdata('uid'))
		 echo("<a class='dropdown-item' href='#exampleModal' data-toggle='modal'>모든작품보기</a>
		<div class='dropdown-divider'></div>
		 <a class='dropdown-item' href='#exampleModal' data-toggle='modal'>작가들의 작품보기</a>");
		else
        echo("<a class='dropdown-item' href='/~sale9/art_gallery'>모든작품보기</a>
		<div class='dropdown-divider'></div>
		 <a class='dropdown-item' href='/~sale9/art_member'>모든작가보기</a>");
    ?>
	</div>
		</li>
           
          <li class="nav-item">
		  <?
		 
		   if(!$this->session->userdata('uid'))
            echo("<a class='nav-link' href='/~sale9/art_member_signup'>회원가입</a>");
			else
			 echo("<li class='nav-item dropdown'>
		   <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>  
         내 정보
			</a>
			 <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>	
			 
		 <a class='dropdown-item' href='/~sale9/art_member_info'>회원 수정</a>
		<div class='dropdown-divider'></div>
		
		<a class='dropdown-item' href='/~sale9/art_myjagpum'>내 작품 관리하기</a>
			
          </li>");
		  ?>
		  <li class="nav-item">
		  <?
		  if(!$this->session->userdata('uid'))
		  echo("<a class='nav-link' href='#exampleModal' data-toggle='modal'>로그인</a>");
          else
		  echo("<a class='nav-link' href='/~sale9/art_login/logout'>로그아웃</a>");
		  ?>
		   </li>
		   <li class="nav-item">
		   <?
		   
		   if($this->session->userdata('rank')==1)
            echo("<a class='nav-link' href='/~sale9/art_admin'>관리자</a>");			
			?>
          </li>
        </ul>
      </div>
    </div>
  </nav>
	

  <div class="modal fade" id="exampleModal" tabindex="-1"role="dialog" aria-labelledby="exampleModalLabel" style="display:none;" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header mycolor1">
        <h4 class="modal-title" id="exampleModalLabel">로그인</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-light" style="text-align:center">
        <form name="form_login" method="post" action="art_login/check">
          <div class="form-inline">
		  아이디 : &nbsp;&nbsp;
             <input type="text" name="uid" size="15" value="" class="form-control form-control-sm">
          </div>
		  <div style="height:10px"></div>
          <div class="form-inline">
            암 &nbsp;&nbsp; 호 : &nbsp;&nbsp;
            <input type="password" name="pwd" size="15" value="" class="form-control form-control from-control-sm">
		</div>
        </form>
      </div>
      <div class="modal-footer alert-seconday" style="text-align:center">
        <button type="button" class="btn btn-secondary" id="logincheck" onclick="javascript:form_login.submit();">확인</button>
        <button type="button" class="btn btn-light" data-dismiss="modal">닫기</button>
      </div>
    </div>
  </div>
</div>
