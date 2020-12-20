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

<table class="table table-bordered table-sm mymargin5">
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle"> 번호</td>
    <td width="80%" align="left"><?=$row->no9?></td>
</tr>
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 이름
    </td>
    <td width="80%" align="left"> <?=$row->name9;?>
    </td>
</tr>
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 아이디
    </td>
    <td width="80%" align="left"> <?=$row->uid9;?>
       
    </td>
</tr>
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 암호
    </td>
    <td width="80%" align="left"><?=$row->pwd9;?>
    </td>
</tr>
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle">
         전화
    </td>
    <td width="80%" align="left"><?=$tel;?>
    </td>
</tr>
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle">
        등급
    </td>
    <td width="80%" align="left"> <?=$rank;?>
    </td>
</tr>
<tr>

</table>
<?	$tmp = $text1 ? "/no/$no/text1/$text1/page/$page" : "/no/$no/page/$page"; ?>
	<div align="center">
		<a href="/~sale9/member/edit<?=$tmp ?>" class="btn btn-sm mycolor1">수정</a>
		<a href="/~sale9/member/del<?=$tmp ?>" class="btn btn-sm mycolor1">삭제</a>
		<input type="button" value="이전화면" class="btn btn-sm mycolor1" onclick="history.back();">
	</div>

</form>
