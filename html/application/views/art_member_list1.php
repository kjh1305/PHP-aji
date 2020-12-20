
	
				<script>
				function find_text()
				{
					if(!form1.text1.value) // 값이 없는경우, 전체 자료
						form1.action="/~sale9/art_member/lists";
					else
						form1.action="/~sale9/art_member/lists/text1/"+form1.text1.value;
					form1.submit();
				}
			</script>
<?	$tmp=$text1 ? "/text1/$text1/page/$page" : "/page/$page"; ?>

  <!-- Page Content -->
  <section class="w3l-about-breadcrumb text-left">
    <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
      <div class="container">
        <h2 class="title">모든 작가보기</h2>
        <ul class="breadcrumbs-custom-path mt-2">
          <li><a href="/~sale9/art_main">home</a></li>
          <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span>모든 작가 보기 </li>
        </ul>
      </div>
    </div>
	<div class="demo-inner-content">
          <div class="container">
            <div class="banner-infhny">
			<div class="flex-wrap search-wthree-field mt-md-5 mt-4" >
				<form action="" name="form1" method="post" class="booking-form" >
                  <div class="row book-form" >
                    <div class="form-input col-md-4 mt-md-0 mt-3" >
					 <input type="text" name="text1" value="<?=$text1?>" placeholder="작가명 입력." onKeydown="if (event.keyCode == 13) { find_text(); }" >
                    </div>
                    
                    <div class="bottom-btn col-md-4 mt-md-0 mt-3" >
                      <button class="btn btn-style btn-secondary"  onClick="find_text();"><span class="fa fa-search mr-3"
                          aria-hidden="true"></span> Search</button>
                    </div>
                  </div>
                </form>
				</div>

				</div>

				</div>
				</div>
				
        </div>
			
  </section>
<section class="w3l-grids-3 py-5">
    <div class="container py-md-5">
      <div class="title-content text-left mb-lg-5 mb-4">
        <h6 class="sub-title">작가</h6>
        <h3 class="hny-title">작가들의 다른 작품도 보세요!</h3>
      </div>
	
      <div class="row bottom-ab-grids">

		
	<?
		$count = 0;
		foreach($list as $row)
		{
			$no = $row->no9;
			$rank = $row->rank9;
			
			foreach($good_count as $row1)
			{
				if($no==$row1->member_no)
				$count = $row1->c;
			}
			
			
	?>
		

 <div class="col-lg-6 subject-card mt-4">
          <div class="subject-card-header p-4">
			
				<a href="/~sale9/art_member/view/no/<?=$no;?>" class="card_title p-lg-4d-block">
			
          

              <div class="row align-items-center">
                <div class="col-sm-5 subject-img">
                  <img src="/~sale9/member_img/<?=$row->pic9;?>" class="img-fluid" style="width:100%; height:200px;"  alt="">
                </div>
                <div class="col-sm-7 subject-content mt-4">
                  <h4><?=$row->name9;?></h4>
                  <p><i class="fas fa-portrait"></i> <?=$row->c?>개의 작품</p>
                  <div class="dst-btm">
                    <h6> <?=$row->c?>개의 작품의</h6>

                    <span><i class='fas fa-heart' style="color:#FF0000;"></i> <?=$count;?></span>
                  </div>
				  
                  <p class="sub-para"><?=$row->exp9;?></p>
				  
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