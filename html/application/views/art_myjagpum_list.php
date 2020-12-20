
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
  <!-- Page Content -->
  <div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
      <h1 class="display-3">내 작품 전시관</h1>
      <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
      <a href="#" class="btn btn-primary btn-lg">Call to action!</a>
    </header>

<form name="form1" action="" method="post">
    <div class="row">
        <div class="col-3" align="left">            
           <div class="input-group  input-group-sm">
    <div class="input-group-prepend">
        <span class="input-group-text">작품 이름</span>
    </div>
    <input type="text" name="text1" value="<?=$text1?>" class="form-control" onKeydown="if (event.keyCode == 13) { find_text(); }" >
    <div class="input-group-append">
        <button class="btn  btn-sm mycolor1" type="button" onClick="find_text();">검색</button>
    </div>
</div>
        </div>
        <div class="col-9" align="right">       
		<?	$tmp=$text1 ? "/text1/$text1/page/$page" : "/page/$page"; ?>
             <a href="/~sale9/art_myjagpum/add<?=$tmp?>" class="btn btn-sm mycolor1">추가</a>
        </div>
    </div>
</form>
<br>

		
    <!-- Page Features -->
    <div class="row text-center">
	<?
	foreach($list as $row)
		{
			$no=$row->no;
		
	?>
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100">
          <img class="card-img-top" src="/~sale9/product_img/<?=$row->pic?>" alt="">
          <div class="card-body">
            <h4 class="card-title"><?=$row->name?></h4>
            <p class="card-text"><?=$row->exp?></p>
          </div>
          <div class="card-footer">
            <a href="/~sale9/art_myjagpum/view/no/<?=$no;?><?=$tmp?>" class="btn btn-primary">작품 보기</a>
          </div>
        </div>
      </div>
<?
}
?>
    </div>
    <!-- /.row -->

  </div>
  <?=$pagination?>
  <!-- /.container -->
