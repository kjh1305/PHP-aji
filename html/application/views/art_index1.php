
<!--banner-slider-->
  <!-- main-slider -->
  <section class="w3l-main-slider" id="home">
    <div class="banner-content">
      <div id="demo-1"
        data-zs-src='["/~sale9/my/img/bg23.jpg", "/~sale9/my/img/bg24.jpg","/~sale9/my/img/bg25.jpg", "/~sale9/my/img/bg27.jpg"]'
        data-zs-overlay="dots">
        <div class="demo-inner-content">
          <div class="container">
            <div class="banner-infhny">
              <h3>당신의 작품을 기다리고 있습니다.</h3>
              <h6 class="mb-3">작품을 올리고 좋아요를 받아보세요.</h6>
              <div class="flex-wrap search-wthree-field mt-md-5 mt-4">
                <form action="#" method="post" class="booking-form">
                  <div class="row book-form">
                    <div class="form-input col-md-4 mt-md-0 mt-3">

                      
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /main-slider -->
  <!-- //banner-slider-->

  <!--/grids-->
  <section class="w3l-grids-3 py-5">
    <div class="container py-md-5">
      <div class="title-content text-left mb-lg-5 mb-4">
        <h6 class="sub-title">좋아요</h6>
        <h3 class="hny-title">인기많은 작품들</h3>
      </div>
	
      <div class="row bottom-ab-grids">
	    <?
		foreach($list as $row)
		{
			foreach($member as $row1)
			{
				if($row1->no9==$row->member_no)
				
				$member_name=$row1->name9;

			}
		
	?>
  <!--/row-grids-->

        <div class="col-lg-6 subject-card mt-4">
          <div class="subject-card-header p-4">
			<?
			if(!$this->session->userdata('uid'))
				echo("<a href='#exampleModal' data-toggle='modal' class='card_title p-lg-4d-block'>");
			else
				echo("<a href='/~sale9/art_gallery/view/no/$row->no' class='card_title p-lg-4d-block'>");
			?>
          

              <div class="row align-items-center">
                <div class="col-sm-5 subject-img">
                  <img src="/~sale9/product_img/<?=$row->pic;?>" class="img-fluid" style="width:100%; height:270px;"  alt="">
                </div>
                <div class="col-sm-7 subject-content mt-4">
                  <h4><?=$row->name;?>&nbsp<<?=$member_name;?>></h4>
                  <p><?=$row->writeday;?></p>
                  <div class="dst-btm">
                    <h6> <i class='fas fa-heart' style="color:#FF0000;"></i> </h6>
                    <span><?=$row->c;?></span>
                  </div>
				  
                  <p class="sub-para text-size1"><?=$row->exp;?></p>
				  
                </div>
              </div>
            </a>
          </div>
        </div>
       
          <!--//row-grids-->
		  <?
		}	  
	  ?>

      </div>

    </div>
	<?=$pagination?>
  </section>
  <!--//grids-->
  <!-- stats -->
  <section class="w3l-stats py-5" id="stats">
    <div class="gallery-inner container py-lg-0 py-3">
      <div class="row stats-con pb-lg-3">
        <div class="col-lg-3 col-6 stats_info counter_grid">
          <p class="counter"> <?=$mrow->cm;?></p>
          <h4>회원수</h4>
        </div>
        <div class="col-lg-3 col-6 stats_info counter_grid1">
          <p class="counter"> <?=$jrow->cj;?></p>
          <h4>작품수</h4>
        </div>
        <div class="col-lg-3 col-6 stats_info counter_grid mt-lg-0 mt-5">
          <p class="counter"><?=$grow->cg;?></p>
          <h4>좋아요수</h4>
        </div>
		 <div class="col-lg-3 col-6 stats_info counter_grid mt-lg-0 mt-5">
          <p class="counter"><?=$jagga;?></p>
          <h4>작가수</h4>
        </div>
        
      </div>
    </div>
  </section>
  <!-- //stats -->
  <!--/-->
  
  <!-- //stats -->
  <!--/w3l-bottom-->
  <section class="w3l-bottom py-5">
    <div class="container py-md-4 py-3 text-center">
      <div class="row my-lg-4 mt-4">
        <div class="col-lg-9 col-md-10 ml-auto">
          <div class="bottom-info ml-auto">
            <div class="header-section text-left">
              <h3 class="hny-title two">지금 바로 작품을 올려보세요.</h3>
              <p class="mt-3 pr-lg-5">개인의 작품을 올리고 좋아요를 받아보세요!!!</p>
			  <?
		if(!$this->session->userdata('uid'))
		 echo("<a href='#exampleModal' data-toggle='modal' class='btn btn-style btn-secondary mt-5'>모든 작품 보러가기</a>");
		else
         echo(" <a href='/~sale9/art_gallery' class='btn btn-style btn-secondary mt-5'>모든 작품 보러가기</a>");
    ?>
			
             
            </div>
           

          </div>
        </div>
      </div>
    </div>
  </section>
  <!--//w3l-bottom-->
  
  

  <!--/w3l-footer-29-main-->