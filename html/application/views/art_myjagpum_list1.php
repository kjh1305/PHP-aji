
<script>
				function find_text()
				{
					if(!form1.text1.value) // 값이 없는경우, 전체 자료
						form1.action="/~sale9/art_myjagpum/lists";
					else
						form1.action="/~sale9/art_myjagpum/lists/text1/"+form1.text1.value;
					form1.submit();
				}
			</script>
			<?	$tmp=$text1 ? "/text1/$text1/page/$page" : "/page/$page"; ?>
  <!-- Page Content -->
  <!-- about breadcrumb -->
  <section class="w3l-about-breadcrumb text-left">
    <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
      <div class="container">
        <h2 class="title">내 작품 </h2>
        <ul class="breadcrumbs-custom-path mt-2">
          <li>내 정보</li>
          <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span>내 작품 </li>
        </ul>
      </div>
    </div>
	<div class="demo-inner-content">
          <div class="container">

			<div class="flex-wrap search-wthree-field mt-md-5 mt-4" >
				<form action="" name="form1" method="post" class="booking-form" >
                  <div class="row book-form" >
                    <div class="form-input col-md-4 mt-md-0 mt-3" >
					 <input type="text" name="text1" value="<?=$text1?>" placeholder="작품명 입력." onKeydown="if (event.keyCode == 13) { find_text(); }" >
                    </div>
                    
                    <div class="bottom-btn col-md-4 mt-md-0 mt-3" >
                      <button class="btn btn-style btn-secondary" onClick="find_text();"><span class="fa fa-search mr-3"
                          aria-hidden="true"></span> Search</button>
                    </div>
					<div class="bottom-btn col-md-4 mt-md-0 mt-3" align="right">       
							<a href="/~sale9/art_myjagpum/add<?=$tmp?>" class="btn btn-style btn-secondary">작품추가하기</a>
					</div>
                  </div>

                </form>
				</div>

				</div>

				</div>

				
        </div>
			
  </section>
  <!-- //about breadcrumb -->
  <!--  Work gallery section -->
 <section class="grids-1 py-5">
  <div class="grids py-lg-5 py-md-4">
      <div class="container">

          <h3 class="hny-title mb-5">내 작품</h3>
		 
          <div class="row">
		   <?
	foreach($list as $row)
		{
			$no=$row->no;
		
	?>
              <div class="col-lg-4 col-md-4 col-6">
                  <div class="column">
                      <a href="/~sale9/art_myjagpum/view/no/<?=$no;?><?=$tmp?>"><img src="/~sale9/product_img/<?=$row->pic?>" alt="" class="img-fluid" style="width:100%; height:350px;"></a>
                      <div class="info">
                          <h4><a href="/~sale9/art_myjagpum/view/no/<?=$no;?><?=$tmp?>"></a><?=$row->name?></h4>
                          <p><?=$row->writeday?> </p>
						  <h5><?=$row->member_name?> 작가<h5>
                          <div class="dst-btm">
                            <h6><p><?=$row->exp?></p></h6>
							<br>
                          </div>
                      </div>
                  </div>
              </div>
			  
            <?
		}
			?>
          </div>
		  
      </div>
	  
</div></section>
  <?=$pagination?>
  </br>
  <!-- /.container -->
