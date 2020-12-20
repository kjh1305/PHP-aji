<?
	$no=$row->no9;
	
?>
<br>
		 <div class="alert mycolor1" role="alert">구분</div> <!-- 제목 -->

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



</table>
<?	$tmp = $text1 ? "/no/$no/text1/$text1/page/$page" : "/no/$no/page/$page"; ?>
	<div align="center">
		<a href="/~sale9/gubun/edit<?=$tmp ?>" class="btn btn-sm mycolor1">수정</a>
		<a href="/~sale9/gubun/del<?=$tmp ?>" class="btn btn-sm mycolor1">삭제</a>
		<input type="button" value="이전화면" class="btn btn-sm mycolor1" onclick="history.back();">
	</div>

</form>
