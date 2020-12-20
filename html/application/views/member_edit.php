<?
	$no=$row->no9;
	$tel1 = trim(substr($row->tel9,0,3));
	$tel2 = trim(substr($row->tel9,3,4));
	$tel3 = trim(substr($row->tel9,7,4));
	$tel = $tel1. "-" . $tel2 . "-" . $tel3;
	$rank = $row->rank9==0 ? "직원":"관리자";
?>
<br>
		 <div class="alert mycolor1" role="alert">사용자</div> <!-- 제목 -->

		<form name="form1" method="post" action="">
<table class="table table-bordered table-sm mymargin5">
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle"> 번호</td>
    <td width="80%" align="left"><?=$row->no9;?></td>
</tr>
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 이름
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <input  type="text" name="name" value="<?=$row->name9;?>"
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
            <input  type="text" name="uid" value="<?=$row->uid9;?>"
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
            <input  type="text" name="pwd"  value="<?=$row->pwd9;?>"
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
                         class="form-control form-control-sm" size="10" maxlength="20" value="<?=$tel1;?>" >-
						 <input  type="text" name="tel2" 
                         class="form-control form-control-sm" size="10" maxlength="20" value="<?=$tel2;?>" >-
						 <input  type="text" name="tel3" 
                         class="form-control form-control-sm" size="10" maxlength="20" value="<?=$tel3;?>" >
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle">
        등급
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
		<?
		
		if($row->rank9==0){
			echo("<input  type='radio' name='rank' class='form-control form-control-sm mr0' value='0' checked > 직원
			<input  type='radio' name='rank' class='form-control form-control-sm mr0' value='1'> 관리자");
		}
		else
		{
			echo("<input  type='radio' name='rank' class='form-control form-control-sm mr0' value='0'  > 직원
			<input  type='radio' name='rank' class='form-control form-control-sm mr0' value='1' checked> 관리자");
		}
		?>
        </div>
    </td>
</tr>
<tr>

</table>

	<div align="center">
		<input type="submit" value="저장" class="btn btn-sm mycolor1"></a>&nbsp;
		<input type="button" value="이전화면" class="btn btn-sm mycolor1" onclick="history.back();">
	</div>

</form>
