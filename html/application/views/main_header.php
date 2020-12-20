<!DOCTYPE html>
<html lang="kr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>판매관리</title>
    <link   href="/~sale9/my/css/bootstrap.min.css" rel="stylesheet">
	<link  href="/~sale9/my/css/my.css" rel="stylesheet">
    <script src="/~sale9/my/js/jquery-3.3.1.min.js"></script>
    <script src="/~sale9/my/js/popper.min.js"></script>
    <script src="/~sale9/my/js/bootstrap.min.js"></script>

	<script src="/~sale9/my/js/moment-with-locales.min.js"></script>
	<script src="/~sale9/my/js/bootstrap-datetimepicker.js"></script>
	
	
	<link  href="/~sale9/my/css/bootstrap-datetimepicker.css" rel="stylesheet">
	<link  href="/~sale9/my/css/fontawesome-all.min.css" rel="stylesheet">
	
	

</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/~sale9">판매관리</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mr-auto">
          
		  <li class="nav-item">
	  <a class="nav-link" href="/~sale9/jangbui">매입</a>
			</li>
			 
			  <li class="nav-item">
	  <a class="nav-link" href="/~sale9/jangbuo">매출</a>
			</li>
		  
		  <li class="nav-item">
	  <a class="nav-link" href="/~sale9/gigan">기간조회</a>
			</li>
		
		<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  
         통계
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="/~sale9/best">Best제품</a>
        <a class="dropdown-item" href="/~sale9/bestmon">월별제품별현황</a>
        <a class="dropdown-item" href="/~sale9/chart">종류별분포도</a>
    </div>
		</li>

	<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  
         기초정보
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="/~sale9/gubun">구분</a>
		<a class="dropdown-item" href="/~sale9/product">제품</a>
		<?
		if($this->session->userdata('rank')==1)
		echo("<div class='dropdown-divider'></div> <!--구분선--> 
        <a class='dropdown-item' href='/~sale9/member'>사용자</a>");
		
		?>
    </div>
			</li>
			<li class="nav-item"><a class="nav-link" href="/~sale9/picture">사진</a></li>
			<li class="nav-item"><a class="nav-link" href="/~sale9/ajax">Ajax</a></li>
			<li class="nav-item"><a class="nav-link" href="/~sale9/main1">개별프로젝트</a></li>
			<li class="nav-item"><a class="nav-link" href="/~sale9/art_main">지정과제</a></li>
        </ul>
		<?
		if(!$this->session->userdata('uid'))
		echo("<a href='#exampleModal' data-toggle='modal' class='btn btn-sm btn-outline-secondary btn-dark'>로그인</a>");
		else
		echo("<a href='/~sale9/login/logout' class='btn btn-sm btn-outline-secondary btn-dark'>로그아웃</a>");
	?>
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
        <form name="form_login" method="post" action="login/check">
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
        <button type="button" class="btn btn-secondary" onclick="javascript:form_login.submit();">확인</button>
        <button type="button" class="btn btn-light" data-dismiss="modal">닫기</button>
      </div>
    </div>
  </div>
</div>

<div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-interval="5000">
      <img src="/my/img/main1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" data-interval="2000">
      <img src="/my/img/main2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="/my/img/main3.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>