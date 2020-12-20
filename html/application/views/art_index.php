

  <!-- Page Content -->
  <div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
      <h1 class="display-3">작품전시관 입니다.</h1>
      <p class="lead">환영합니다. 개인의 작품들을 전시하고 좋아요를 받아보세요 !!!</p>

    </header>

    <!-- Page Features -->
	<div>
	<h3 class="lead">BEST</h3>
	</div>
    <div class="row text-center">
	
	<?
		foreach($list as $row)
		{
			foreach($member as $row1)
			{
				if($row1->no9==$row->member_no)
				
				$member_name=$row1->name9;

			}
		
	?>
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100">
          <img class="card-img-top" src="/~sale9/product_img/<?=$row->pic;?>" alt="">
          <div class="card-body">
            <h4 class="card-title"><?=$row->name;?></h4>
            <p class="card-text"><?=$row->exp;?></p>
          </div>
          <div class="card-footer">
		  <div><i class='fas fa-heart' style="color:#FF0000;"></i>  <?=$row->c;?></div>
		  <?if(!$this->session->userdata('uid'))
				echo("<a href='#exampleModal' data-toggle='modal' class='btn btn-primary'>$member_name 작품 보기</a>");
			else
				echo("<a href='/~sale9/art_gallery/view/no/$row->no' class='btn btn-primary'>$member_name 작품 보기</a>");
		?>
          </div>
        </div>
      </div>
		
      <?
			
		}	  
	  ?>

    </div>
    <!-- /.row -->
<?=$pagination?>
  </div>
  <!-- /.container -->
