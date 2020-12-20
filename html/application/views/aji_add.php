<header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">강아지 추가하기</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
            </div>
        </header>
<br>
		 

		<form name="form1" method="post" action="" enctype="multipart/form-data" class="m-2">
<table class="table table-bordered table-sm">
<tr>
    <td width="20%" class="bg-light" style="vertical-align:middle"> 번호</td>
    <td width="80%" align="left">1</td>
</tr>
<tr>
    <td width="20%" class="bg-light" style="vertical-align:middle">
        <font color="red">*</font> 강아지 종류 이름
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <input  type="text" name="name" value="<?=set_value("name");?>"
                         class="form-control form-control-sm" size="20" maxlength="20">
						 <?if(form_error("name")==true) echo form_error("name");?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="bg-light" style="vertical-align:middle">
        소개
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <textarea name="sogae" value=""class="form-control form-control-sm" cols="30" rows="5"></textarea>				 
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="bg-light" style="vertical-align:middle">
         사진
    </td>
	 <td width="80%" align="left">
		<div class="form-inline">
			 <input type="file" name="image" value="" class="form-control form-control-sm" size="20" maxlength="20">
		 </div>	 
    </td>
</tr>

</table>

	<div align="center">
		<input type="submit" value="저장" class="btn btn-sm bg-primary">&nbsp;
		<input type="button" value="이전화면" class="btn btn-sm bg-primary" onclick="history.back();">
	</div>
	<br>

</form>
