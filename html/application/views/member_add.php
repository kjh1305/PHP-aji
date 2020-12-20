<br>
		 <div class="alert mycolor1" role="alert">사용자</div> <!-- 제목 -->

		<form name="form1" method="post" action="">
<table class="table table-bordered table-sm mymargin5">
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle"> 번호</td>
    <td width="80%" align="left">1</td>
</tr>
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 이름
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
    <td width="20%" class="mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 아이디
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <input  type="text" name="uid" value="<?=set_value("uid");?>"
                         class="form-control form-control-sm" size="20" maxlength="20">
						 <?if(form_error("uid")==true) echo form_error("uid");?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 암호
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <input  type="text" name="pwd" "<?=set_value("pwd");?>"
                         class="form-control form-control-sm" size="20" maxlength="20" >
						  <?if(form_error("pwd")==true) echo form_error("pwd");?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle">
         전화
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <input  type="text" name="tel1" 
                         class="form-control form-control-sm" size="10" maxlength="20" value="" >-
						 <input  type="text" name="tel2" 
                         class="form-control form-control-sm" size="10" maxlength="20" value="" >-
						 <input  type="text" name="tel3" 
                         class="form-control form-control-sm" size="10" maxlength="20" value="" >
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle">
        등급
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
		
            <input  type="radio" name="rank" class="form-control form-control-sm mr0" value="
0"> 직원
			<input  type="radio" name="rank" class="form-control form-control-sm mr0" value="1"> 관리자
        </div>
    </td>
</tr>
<tr>

</table>

	<div align="center">
		<input type="submit" value="저장" class="btn btn-sm mycolor1">&nbsp;
		<input type="button" value="이전화면" class="btn btn-sm mycolor1" onclick="history.back();">
	</div>

</form>
