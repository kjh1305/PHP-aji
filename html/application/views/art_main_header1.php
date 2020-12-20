<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!doctype html>
<html lang="zxx">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>나만의 작품 갤러리</title>
  <!-- google fonts -->
  <link href="//fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link href="//fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,400&display=swap"
    rel="stylesheet">
  <!-- google fonts -->
  <!-- Template CSS -->
  <link rel="stylesheet" href="/~sale9/my/css/my.css">
  <link href="/~sale9/my/css/styles.css" rel="stylesheet" />
  <link rel="stylesheet" href="/~sale9/my/assets1/css/style-starter.css">
  <link  href="/~sale9/my/css/fontawesome-all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/~sale9/my/css/loginstyle.css" type="text/css" media="all" />
  
		
  
  <!-- Template CSS -->
</head>

<body>
  <!--header-->
  <header id="site-header" class="fixed-top">
    <div class="container">
      <nav class="navbar navbar-expand-lg stroke">
        <h1><a class="navbar-brand mr-lg-5" href="/~sale9/art_main">
            작품 갤러리
          </a></h1>
        <!-- if logo is image enable this   
      <a class="navbar-brand" href="#index.html">
          <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
      </a> -->
        <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
          data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
          <span class="navbar-toggler-icon fa icon-close fa-times"></span>
          </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/~sale9/art_main">Home <span class="sr-only">(current)</span></a>
            </li>
            
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

          </ul>
		   
        </div>
        <div class="d-lg-block d-none">
		<?
		 
		   if(!$this->session->userdata('uid'))
            echo("<a class='btn btn-style btn-secondary' href='/~sale9/art_member_signup'>회원가입</a>");
			else
			 echo("<li class='nav-item dropdown'>
		   <a class='btn btn-style btn-secondary dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>  
         내 정보
			</a>
			 <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>	
			 
		 <a class='dropdown-item' href='/~sale9/art_member_info'>회원 수정</a>
		<div class='dropdown-divider'></div>
		
		<a class='dropdown-item' href='/~sale9/art_myjagpum'>내 작품 관리하기</a>
			
          </li>");
		  ?>
        </div>
		<div>&nbsp
		<?
		  if(!$this->session->userdata('uid'))
		  echo("<a class='btn btn-style btn-secondary' href='#exampleModal' data-toggle='modal'>로그인</a>");
          else
		  echo("<a class='btn btn-style btn-secondary' href='/~sale9/art_login/logout'>로그아웃</a>");
		  ?>
        </div>
		<div>&nbsp
		<?
		   
		   if($this->session->userdata('rank')==1)
            echo("<a class='btn btn-sm btn-primary' href='/~sale9/art_admin'>관리자</a>");			
			?>
			</div>
        <!-- toggle switch for light and dark theme -->
        <div class="mobile-position">
          <nav class="navigation">
            <div class="theme-switch-wrapper">
              <label class="theme-switch" for="checkbox">
                <input type="checkbox" id="checkbox">
                <div class="mode-container">
                  <i class="gg-sun"></i>
                  <i class="gg-moon"></i>
                </div>
              </label>
            </div>
          </nav>
        </div>
        <!-- //toggle switch for light and dark theme -->
      </nav>
    </div>
  </header>
  
  <div class="modal fade" id="exampleModal" tabindex="-1"role="dialog" aria-labelledby="exampleModalLabel" style="display:none;" aria-hidden="true">
  <div class="modal-dialog modal-sm overlay" role="document">
    <div class="modal-content wrapper">
      <div class="modal-header form-section">
        <h3 class="modal-title" id="exampleModalLabel">Login</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-light" style="text-align:center">
        <form name="form_login" method="post" action="/~sale9/art_login/check" class="singin-form">
          <div class="form-input">
		 
             <input type="text" name="uid" size="15" value="" placeholder="ID" class="form-control form-control-sm">
          </div>
		  <div style="height:10px"></div>
          <div class="form-inpunt">
          
            <input type="password" name="pwd" size="15" value="" placeholder="Password" class="form-control form-control from-control-sm">
		</div>
        </form>
      </div>
      <div class="modal-footer alert-seconday" style="text-align:center">
        <button type="button" class="btn btn-primary theme-button" id="logincheck" onclick="javascript:form_login.submit();">로그인</button>
		&nbsp;
        <button type="button" class="btn btn-light theme-button" data-dismiss="modal">닫기</button>
      </div>
    </div>
  </div>
</div>

