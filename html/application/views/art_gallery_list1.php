<script>
				function find_text()
				{
					if(!form1.text1.value) // 값이 없는경우, 전체 자료
						form1.action="/~sale9/art_gallery/lists";
					else
						form1.action="/~sale9/art_gallery/lists/text1/"+form1.text1.value;
					form1.submit();
				}
			</script>
			
<?	$tmp=$text1 ? "/text1/$text1/page/$page" : "/page/$page"; ?>

  <!-- Page Content -->
  <section class="w3l-about-breadcrumb text-left">
    <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
      <div class="container">
        <h2 class="title">모든 작품 보기</h2>
        <ul class="breadcrumbs-custom-path mt-2">
          <li><a href="/~sale9/art_main">home</a></li>
          <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span>모든 작품 보기 </li>
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
					 <input type="text" name="text1" value="<?=$text1?>" placeholder="작품명 or 작가명 입력." onKeydown="if (event.keyCode == 13) { find_text(); }" >
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


<section class="locations-1" id="locations">
    <div class="locations py-5">
        <div class="container py-lg-5 py-md-4 py-2">
            <div class="row">
			<?
		foreach($list as $row)
		{
			$no = $row->no;
			$c=0;
			foreach($goodlist as $row1)
			{
				if($row->no==$row1->jagpum_no)
				{
					$c=$row1->c;
				}
			}
	?>
                <div class="col-lg-4 col-md-6 listing-img">
                    <a href="/~sale9/art_gallery/view/no/<?=$no;?><?=$tmp?>">
                        <div class="box16">
                            
                            <img class="img-fluid" src="/~sale9/product_img/<?=$row->pic?>" style="width:100%; height:400px" alt="">
                            
                        </div>
                    </a>
                    <div class="listing-details blog-details align-self">
                        <h4 class="user_title agent">
                            <a href="/~sale9/art_gallery/view/no/<?=$no;?><?=$tmp?>"></a><?=$row->name?>
                        </h4>
                        <p class="user_position"><?=$row->writeday;?></p>
                        <ul class="mt-3 estate-info">
                            <li><span class="fas fa-heart" style="color:#FF0000;"></span>&nbsp;<span style="font-size:20px;"><?=$c;?></span></li>
                        </ul>
                        <div class="author align-items-center mt-4">
                            <a href="#img" class="comment-img">
                                <img src="/~sale9/member_img/<?=$row->pic9?>" alt="" class="img-fluid">
                            </a>
                            <ul class="blog-meta">
                                <li>
                                    <a href="/~sale9/art_member/view/no/<?=$row->no9;?>"><?=$row->name9;?> </a>
                                </li>
                                <li class="meta-item blog-lesson">
                                    <span class="meta-value" style="font-size:13px;"> <?=$row->exp9;?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
				
				<?
		}	 
	 ?>
			</div>
		</div>
    </div>
</section>
    <!-- /.row -->
<?=$pagination?>
  </div>
  <!-- /.container -->
  
