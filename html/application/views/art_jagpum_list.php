
<!--<link rel="stylesheet" href="/~sale9/my/art_assets/css/main.css" />-->
  <!-- Page Content -->
  <section class="w3l-about-breadcrumb text-left">
    <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
      <div class="container">
        <h2 class="title">작가 갤러리</h2>
        <ul class="breadcrumbs-custom-path mt-2">
          <li><a href="/~sale9/art_main">home</a></li>
          <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span>모든 작품 보기</li>
		  <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span>작가 갤러리 </li>
        </ul>
      </div>
    </div>
	
			
  </section>
		<!-- Wrapper -->

			<div id="wrapper">
						<?
							foreach($member as $row1){
							$member_name = $row1->name9;
							$pic = $row1->pic9;
							$exp = $row1->exp9;
							}
						?>	
					
				<!-- Main -->
				<section class="w3l-team" id="team">
    <div class="team-block py-5">
      <div class="container py-lg-5">
        <div class="title-content text-center mb-lg-3 mb-4">
          <h6 class="sub-title">작가 갤러리</h6>
          <h3 class="hny-title"><?=$member_name;?></h3>
        </div>
        <div class="row">
          <div class="col-lg-3 col-1 mt-lg-1 mt-1 col-center">
            <div class="box16">
             <img src="/~sale9/member_img/<?=$pic;?>" alt="" class="img-fluid"/>
              <div class="box-content">
                <h3 class="title"><a href="/~sale9/art_member/view/no/<?=$no?>"><?=$member_name;?></a></h3>
                <span class="post"><?=$jagpumcount;?>개의 작품</span>
                <ul class="social">
                  <li>
                    <a href="https://cokes.tistory.com/" class="facebook">
                      <span><i class="fa fa-at"></i></span>
                    </a>
                  </li>
                 
                </ul>
              </div>
            </div>
          </div>
         
          </div>
          
          </div>
          
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- //team -->

		

<!-- //content-6-->
						
<section class="w3l-grids1">
  <div class="hny-three-grids py-5">
    <div class="container py-lg-5">
      <div class="row">
	  <?
							$i=0;
							foreach($list as $row)
							{
								$iname=$row->pic ? $row->pic : "";
								$pname=$row->name;
								$pexp=$row->exp;
								$i++;
							?>
        <div class="col-md-4 col-sm-6 mt-0 grids5-info">
          <a href="/~sale9/art_gallery/view/no/<?=$row->no?>"><img src="/~sale9/product_img/<?=$row->pic;?>" class="img-fluid" alt="" style="height:400px;"></a>
          <h5><?=$member_name;?></h5>
          <h4><a href="/~sale9/art_gallery/view/no/<?=$row->no?>"><?=$row->name?></a></h4>
          <p><?=$pexp?></p>
        </div>
		
							<?
							}	
							?>
    </div>
      </div>
		
	
  </div>
 
</section>

<?=$pagination?>
<br>
<?
	$good=0;
	foreach($good_count as $row2)
	{
		if($row2->member_no==$no){
		$good=$row2->c;
		}
	}
?>
  <!-- stats -->
  <section class="w3l-statshny py-5" id="stats">
    <div class="container py-lg-5 py-md-4">
      <div class="w3-stats-inner-info">
        <div class="row">
          <div class="col-lg-4 col-6 stats_info counter_grid text-left">
            <span class="fa fa-heart"></span>
            <p class="counter"><?=$good;?></p>
            <h4>좋아요</h4>
          </div>
          <div class="col-lg-4 col-6 stats_info counter_grid1 text-left">
            <span class="fa fa-camera"></span>
            <p class="counter"><?=$jagpumcount;?></p>
            <h4>작품</h4>
          </div>
          
        </div>
      </div>
    </div>
  </section>
		
		<!-- Scripts -->
			<script src="/~sale9/my/art_assets/js/jquery.min.js"></script>
			<script src="/~sale9/my/art_assets/js/jquery.poptrox.min.js"></script>
			<script src="/~sale9/my/art_assets/js/skel.min.js"></script>
			<script src="/~sale9/my/art_assets/js/main.js"></script>

		
	