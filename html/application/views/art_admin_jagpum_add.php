
    
		    
		
							
                

		        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
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
   
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4" style="font-szie:100px;">작품관리</h1>
                      
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                작품추가 테이블
								
                            </div>
                            

    <div class="online-w3l-form">
 
      <div class="appointment-w3">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="main">
            <div class="form-left-w3l">
              <input type="text" class="top-up" name="name" value="<?=set_value("name");?>" placeholder="작품이름" required="">
			  <?if(form_error("name")==true) echo form_error("name");?>
            </div>
            <div class="form-right-w3ls ">
			<?$today=date("Y-m-d");?>
              <input type="text" class="top-up" name="writeday" value=<?=$today?> required="" readonly>
              <div class="clearfix"></div>
            </div>
          </div>
          
          <div class="main">
            
            <div class="form-right-w3ls">
			  <select name="member_no" class="form-control buttom">
					<option value="">작가선택</option>
						<?
							$member_no=set_value("member_no");
							foreach ($list as $row)
							{
								if($row->no9==$member_no)
									echo("<option value='$row->no9' selected>$row->name9</option>");
								else
									echo("<option value='$row->no9' >$row->name9</option>");
							}
						?>
						</select>
						<?if(form_error("member_no")==TRUE) echo form_error("member_no");?>

              <div class="clearfix"></div>
            </div>
          </div>

          <div class="form-control-w3l">
            <textarea name="exp" placeholder="소개...30자 이내로 쓰시오."><?=set_value("exp");?></textarea>
          </div>
		  <div class="form-control-w3l" style="text-align:center;">
            <input class="form-control py-5" id="image" name="pic" type="file"
												value="" size="20" maxlength="20" accept="image/*" onchange="previewImage(this)" 
												style="display:none;"/>
												<input type='text' name='file2' id='file2' style='display: none;'> 
												<img src='/../~sale9/member_img/default' width="100" class="img-fluid img-thumbnail" border='0' onclick='document.all.image.click(); document.all.file2.value=document.all.image.value'>
												<br>
											
												<p style="color:white;">업로드 될 사진</p>
												<div id="preview"></div>
          </div>
          <div class="btnn">
            <input type="submit" value="추가하기">
          </div>
        </form>
      </div>
    </div>

                            </div>
                        </div>
                    
                </main>
               
			