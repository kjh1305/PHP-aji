<script>
				

				function ajax_good(no,pumno){
					
						var rowno = no;
						var colno = pumno;
						$.ajax({
							url:"/~sale9/art_gallery/good_insert",
							type: "POST",
							data:{
								"no":rowno,
								"pumno": colno
							},
							dataType:"html",
							success:function(data){
									location.reload();
								}
						});
					}
					
				

				function ajax_gooddel(no,pumno){
					
					var rowno = no;
					var colno = pumno;
					$.ajax({
						url:"/~sale9/art_gallery/good_delete",
						type: "POST",
						data:{
							"no" :rowno,		
							"pumno": colno
						},
						dataType:"html",
								success:function(data){
									location.reload();
								}
					});
				}
</script>
 <section class="w3l-about-breadcrumb text-left">
    <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
      <div class="container">
        <h2 class="title">작품 상세 보기</h2>
        <ul class="breadcrumbs-custom-path mt-2">
          <li>home</li>
		  <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span><a href="/~sale9/art_gallery">모든 작품 보기</a> </li>
          <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span>작품 상세 보기 </li>
        </ul>
      </div>
    </div>
	<div class="demo-inner-content">
          <div class="container">
            <div class="banner-infhny">
			<div class="flex-wrap search-wthree-field mt-md-5 mt-4" >
				
				</div>

				</div>

				</div>
				</div>
				
        </div>
			
  </section>
<!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4"><?=$row->name;?></h1>

        

        <hr>

        <!-- Date/Time -->
        <p>작품 등록일 : <?=$row->writeday;?></p>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="/~sale9/product_img/<?=$row->pic;?>" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead"><?=$row->exp;?></p>


        <blockquote class="blockquote">
          <p class="mb-0"><?=$row->name9?> 님의 작품입니다.</p>
          <footer class="blockquote-footer"><?=$row->name9;?> 작가의
            <cite title="Source Title"><?=$row->name;?></cite>
          </footer>

        </blockquote>

       <img class="img-fluid rounded" src="/~sale9/product_img/thumb/<?=$row->pic;?>" alt="">

        <hr>

      

        <!-- Single Comment -->
        
	
      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header" style="color:#000000;">좋아요</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" value=" <?=$count->c;?> 개" readonly>
              <span class="input-group-append">
			 <?
			 $no=$this->session->userdata('no');
			 $pumno=$row->no;
			 
				$sw=0;
			  foreach($list_good as $row1)
			  {
				  if($no==$row1->member_no&&$pumno==$row1->jagpum_no)
				  {		
					  $sw = 1;	
					  

				  }
			  }		
			   if($sw==0)
				  {
					echo("<button type='button' class='btn btn-primary' name='good' id='good' onClick='ajax_good($no,$pumno);'><i class='far fa-heart'></i></button>");
				  }
				  else if($sw==1){			  
					  echo("<button type='button' class='btn btn-primary' name='gooddel' id='gooddel' onclick='ajax_gooddel($no,$pumno);'><i class='fas fa-heart' style='color:#FF0000;'></i> </button>");
				  }
				?>
		       </span>
            </div>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header" style="color:#000000;">작가의 다른 작품</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12">
                <ul class="list-unstyled mb-0">
                  <li>
                   <button class="btn btn-style"> <a href="/~sale9/art_member/view/no/<?=$row->no9;?>"><i class='fas fa-external-link-alt'></i> 다른 작품 보러가기</a>
				   </button>
                  </li>
                  
                </ul>
              </div>
             
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header" style="color:#000000;">작가 소개</h5>
          <div class="card-body">
             <img class="img-fluid rounded" src="/~sale9/member_img/<?=$row->pic9;?>" alt="">
			   <p class="mb-0"><?=$row->name9?></p>
			     <p class="mb-0"><?=$row->exp9?></p>
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->