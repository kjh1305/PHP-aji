		    
		
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">회원관리</h1>
                      
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                회원수정 테이블
								
                            </div>
                            <div class="card-body">
							
                
		<link href="css/styles.css" rel="stylesheet" />
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


        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">수정하기</h3></div>
                                    <div class="card-body">
									<div  style="text-align:center;">
									<span class="avatar"><img src="/~sale9/member_img/<?=$row->pic9;?>"alt="" /></span>
									</div>
                                        <form  method="post" action=""	enctype="multipart/form-data">
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">이름</label>
                                                        <input class="form-control py-4" id="inputFirstName" name="name" type="text" value="<?=$row->name9;?>" placeholder="이름을 입력하세요." />
														 <?if(form_error("name")==true) echo form_error("name");?>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">User ID</label>
                                                <input class="form-control py-4" id="inputEmailAddress" name="uid" type="text" value="<?=$row->uid9;;?>"  placeholder="ID를 입력하세요." />
												 <?if(form_error("uid")==true) echo form_error("uid");?>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputPassword">Password</label>
                                                        <input class="form-control py-4" id="inputPassword" name="pwd" type="password" 
														value="<?=$row->pwd9;;?>"placeholder="비밀번호를 입력하세요." />
														 <?if(form_error("pwd")==true) echo form_error("pwd");?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                                        <input class="form-control py-4" id="inputConfirmPassword" name="repwd" 
														value="<?=$row->pwd9;?>"type="password" placeholder="한번 더 입력하세요." />
														 <?if(form_error("repwd")==true) echo form_error("repwd");?>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Tel</label>
                                                <input class="form-control py-4" id="inputEmailAddress" name="tel" type="text" 
												value="<?=$row->tel9;;?>"placeholder="-빼고 입력하세요. 예) 01012341234" />
												 <?if(form_error("tel")==true) echo form_error("tel");?>
                                            </div>
											<div class="form-group">
                                                <label class="small mb-1" for="inputExp">Exp</label>
                                                <input class="form-control py-4" id="inputExp" name="exp" type="text" 
												value="<?=$row->exp9;?>"  placeholder="간단하게 30자이내로 입력하세요." />
												 <?if(form_error("exp")==true) echo form_error("exp");?>
                                            </div>

											<label class="small mb-1" for="inputExp">Rank</label>
											<div class="form-group">
													<div class="btn-group" data-toggle="buttons">
													
	<?	
		if($row->rank9==0){
			echo("<label class='btn btn-primary'>
			<input  type='radio' name='rank' class='form-control form-control-sm mr0' value='0' style='display:none;' checked > 직원
			</label>
			<label class='btn btn-primary'>
			<input  type='radio' name='rank' class='form-control form-control-sm mr0' value='1' style='display:none;'> 관리자
			</label>");
		}
		else
		{	echo("<label class='btn btn-primary'>
			<input  type='radio' name='rank' class='form-control form-control-sm mr0' value='0'  style='display:none;'> 직원
			</label>
			<label class='btn btn-primary'>
			<input  type='radio' name='rank' class='form-control form-control-sm mr0' value='1' style='display:none;' checked> 관리자
			</label>");
		}
	?>
													</div>
											</div>
											<div class="form-group"  style="text-align:center;">
											 <label class="small mb-1" for="inputpicture">사진</label><br>
											<input class="form-control py-5" id="image" name="pic" type="file"
												value="" size="20" maxlength="20" accept="image/*" onchange="previewImage(this)" 
												style="display:none;"/>
												<input type='text' name='file2' id='file2' style='display: none;'> 
												<img src='/../~sale9/member_img/default' width="100" class="img-fluid img-thumbnail" border='0' onclick='document.all.image.click(); document.all.file2.value=document.all.image.value'>
												<br>
												</div>	
												<p  style="text-align:center;">업로드 될 사진</p>
												<div id="preview"  style="text-align:center;"></div>
                                            <div class="form-group mt-4 mb-0">
											<input type="submit" class="btn btn-primary btn-block" value="추가하기"/>
											</div>
                                        </form>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <br>
			<br>
        </div>
        <!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>

                </div>
            
			
                            </div>
                        </div>
                    
                </main>
               
			