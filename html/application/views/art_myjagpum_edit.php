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
<br>
		 <div class="alert mycolor1" role="alert">제품</div> <!-- 제목 -->

		<form name="form1" method="post" action="" enctype="multipart/form-data" class="form-inline">
	
<table class="table table-bordered table-sm mymargin5">
<tr>
<?$member_no=$no=$this->session->userdata('no');?>
    <td width="20%" class="mycolor2" style="vertical-align:middle">작가 번호</td>
    <td width="80%" align="left"><input  type="text" name="member_no" value="<?=$member_no;?>"
                         class="form-control form-control-sm" size="5" maxlength="5" readonly></td>
</tr>
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle">작가명</td>
		<td width="80%" align="left">
			<div class="form-inline">
				<input  type="text" name="member_name" value="<?=$row->member_name;?>"
                         class="form-control form-control-sm" size="20" maxlength="20" disabled>
						
			</div>
						
		</td>
</tr>
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 작품명
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <input  type="text" name="name" value="<?=$row->name;;?>"
                         class="form-control form-control-sm" size="40" maxlength="40">
						 <?if(form_error("name")==true) echo form_error("name");?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 작품 설명
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <textarea name="exp" class="form-control from-control-sm" cols="40" rows="10" placeholder="255자 이내로 작성하세요"><?=$row->exp;?></textarea>
						 <?if(form_error("exp")==true) echo form_error("exp");?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle">
         날짜
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
		<?$today=date("Y-m-d");?>
            <input  type="text" name="writeday" value="<?=$today;?>"
                         class="form-control form-control-sm" size="20" maxlength="20" readonly>
						
        </div>
    </td>
</tr>

<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle">
         사진
    </td>
	
                  <td width="80%" align="left">
				   <label class="small mb-1" for="inputpicture">현재 사진</label> : <?=$row->pic;?><br>
											<input class="form-control py-5 fileimage" id="image" name="pic" type="file"
												value="<?=$row->pic;?>" size="20" maxlength="20" accept="image/*" onchange="previewImage(this)" style="display:none;"/>
												<input type='text' name='file2' id='file2' style='display: none;'> 
												<img src='/../~sale9/product_img/<?=$row->pic;?>' width="100" class="img-fluid img-thumbnail" border='0' onclick='document.all.image.click(); document.all.file2.value=document.all.image.value'>
												<br>
												변경할 이미지
												<div id="preview"></div>
    </td>
</tr>
<tr>

</table>

	<div align="center">
		<input type="submit" value="저장" class="btn btn-sm mycolor1">&nbsp;
		<input type="button" value="이전화면" class="btn btn-sm mycolor1" onclick="history.back();">
	</div>

</form>
