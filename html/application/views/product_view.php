<?
	$no=$row->no9;
	
?>
<br>
		 <div class="alert mycolor1" role="alert">제품</div> <!-- 제목 -->

<table class="table table-bordered table-sm mymargin5">
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle"> 번호</td>
    <td width="80%" align="left"><?=$row->no9?></td>
</tr>
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 구분명
    </td>
    <td width="80%" align="left"> <?=$row->gubun_name;?>
    </td>
</tr>
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 제품명
    </td>
    <td width="80%" align="left"> <?=$row->name9;?>
    </td>
</tr>
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 단가
    </td>
    <td width="80%" align="left"> <?=$row->price9;?>
    </td>
</tr>
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle">
         재고
    </td>
    <td width="80%" align="left"> <?=$row->jaego9;?>
    </td>
</tr>
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle">
        사진
    </td>
	<td width="80%" align="left"><b>파일이름</b> : <?=$row->pic9;?> <br>			
     
		<?
			if($row->pic9) //이미지가 있는 경우
				echo("<img src='/../~sale9/product_img/$row->pic9' width='200' class='img-fluid img-thumbnail'>");
			else //이미지가 없는 경우
				echo("<img src='' width='200' class='img-fluid img-thumbnail'>");
		?>
    </td>

    
</tr>
</table>
<?	$tmp = $text1 ? "/no/$no/text1/$text1/page/$page" : "/no/$no/page/$page"; ?>
	<div align="center">
		<a href="/~sale9/product/edit<?=$tmp ?>" class="btn btn-sm mycolor1">수정</a>
		<a href="/~sale9/product/del<?=$tmp ?>" class="btn btn-sm mycolor1">삭제</a>
		<input type="button" value="이전화면" class="btn btn-sm mycolor1" onclick="history.back();">
	</div>

</form>
