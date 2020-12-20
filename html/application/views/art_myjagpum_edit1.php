<script>
	
	function previewImage(f){

	var file = f.files;

	// 확장자 체크
	if(!/\.(gif|jpg|jpeg|png)$/i.test(file[0].name)){
		alert('gif, jpg, png 파일만 선택해 주세요.\n\n현재 파일 : ' + file[0].name);

		// 선택한 파일 초기화
		f.outerHTML = f.outerHTML;

		document.getElementById('preview').innerHTML = '';

	}
	else {

		// FileReader 객체 사용
		var reader = new FileReader();

		// 파일 읽기가 완료되었을때 실행
		reader.onload = function(rst){
			document.getElementById('preview').innerHTML = '<img src="' + rst.target.result + '" class="img-fluid img-thumbnail">';
		}

		// 파일을 읽는다
		reader.readAsDataURL(file[0]);

	}
}

</script>
  <?$member_no=$this->session->userdata('no');?>
<?$no=$row->no?>
<?$tmp = $text1 ? "/no/$no/text1/$text1/page/$page" : "/no/$no/page/$page"; ?>

<section class="w3l-about-breadcrumb text-left">
    <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
      <div class="container">
        <h2 class="title">내 작품 관리</h2>
        <ul class="breadcrumbs-custom-path mt-2">
          <li>내 정보</li>
          <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> <a href="/~sale9/art_myjagpum">내 작품</a></li>
		  <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> 내 작품 관리</li>
        </ul>
      </div>
    </div>	
  </section>
  

           <!-- contact-form -->
<section class="w3l-contact" id="contact">
  <div class="contact-infubd py-5">
    <div class="container py-lg-3">
      <div class="contact-grids row">
        <div class="col-lg-6 contact-left">
          <div class="partners">
            <div class="cont-details">
			<?
			if($row->pic) //이미지가 있는 경우
				echo("<img src='/../~sale9/product_img/$row->pic' width='200' class='img-fluid img-thumbnail'>");
			else //이미지가 없는 경우
				echo("<img src='' width='200' class='img-fluid img-thumbnail'>");
		?>
              <h6>파일명:</h6>
              <p class="mt-3 mb-4"><?=$row->pic;?></p>
            </div>
			<?echo $tmp?>
            <div class="hours">
			<h6 class="mt-4">번호:</h6>
              <p> <?=$row->no;?></p>
			<h6 class="mt-4">작품명:</h6>
              <p> <?=$row->name;?></p>
              <h6 class="mt-4">작가명:</h6>
              <p> <?=$row->member_name;?></p>
              <h6 class="mt-4">설명:</h6>
              <p> <?=$row->exp;?></p>
              <h6 class="mt-4">등록날짜:</h6>
              <p class="margin-top"><?=$row->writeday;?></p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 mt-lg-0 mt-5 contact-right">
          <form name="form1" action="/~sale9/art_myjagpum/edit<?=$tmp ?>" method="post" class="signin-form"  enctype="multipart/form-data">
            <div class="input-grids">
              <div class="form-group">
              번호  <input type="text" name="no" id="w3lName" value="<?=$no;?>" class="contact-input" readonly/>
              </div>
              <div class="form-group">
               작품명 <input type="text" name="name" id="w3lSender" value="<?=$row->name;?>"class="contact-input" required="" />
			   <?if(form_error("name")==true) echo form_error("name");?>
              </div>
			  <div class="form-group">
                작가번호 <input type="text" name="member_no" id="w3lSubect" value="<?=$row->member_no;?>" class="contact-input" readonly/>
              </div>
              <div class="form-group">
                작가명 <input type="text" name="member_name" id="w3lSubect" value="<?=$row->member_name;?>" class="contact-input" readonly />
              </div>
			  <div class="form-group">
			  <?$today=date("Y-m-d");?>
                등록 날짜 <input type="text" name="writeday" id="w3lSubect" value="<?=$today?>" class="contact-input" />
              </div>
            </div>
            <div class="form-group">
              설명 <textarea name="exp" id="w3lMessage" placeholder="50자 이내로 입력하세요." required=""><?=$row->exp;?></textarea>
			   <?if(form_error("exp")==true) echo form_error("exp");?>
            </div>
			<div class="form-group" style="text-align:center;">
								<input class="form-control py-5 fileimage" id="image" name="pic" type="file"
												value="<?=$row->pic;?>" size="20" maxlength="20" accept="image/*" onchange="previewImage(this)" style="display:none;"/>
												<input type='text' name='file2' id='file2' style='display: none;'> 
												<img src='/../~sale9/product_img/<?=$row->pic;?>' width="100" class="img-fluid img-thumbnail" border='0' onclick='document.all.image.click(); document.all.file2.value=document.all.image.value'>
												<br>
						변경할 이미지
				<div id="preview"></div>
			</div>
            <div class="text-center">
              <button class="btn btn-style btn-primary">수정하기</button>
			  <a href="/~sale9/art_myjagpum/del<?=$tmp ?>" class="btn btn-style btn-primary">삭제하기</a>
            </div>
          </form>
        </div>

      </div>
      
</section>
<!-- /contact-form -->

               
