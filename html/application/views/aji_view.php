<?
	$no=$row->no;
	
?>
<header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">강아지 수정하기</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
            </div>
        </header>
<br>
<form name="form1" action="" method="post" class="m-2">
<table class="table table-bordered table-sm mymargin5">
<tr>
    <td width="20%" class="bg-light" style="vertical-align:middle"> 번호</td>
    <td width="80%" align="left"><?=$row->no?></td>
</tr>
<tr>
    <td width="20%" class="bg-light" style="vertical-align:middle">
        <font color="red">*</font> 강아지 종류 이름
    </td>
    <td width="80%" align="left"> <?=$row->name;?>
    </td>
</tr>
<tr>
    <td width="20%" class="bg-light" style="vertical-align:middle">
	소개
    </td>
    <td width="80%" align="left"> <?=$row->sogae;?>
    </td>
</tr>
<tr>
    <td width="20%" class="bg-light" style="vertical-align:middle">
        사진
    </td>
	<td width="80%" align="left"><b>파일이름</b> : <?=$row->image;?> <br>			
     
		<?
			if($row->image) //이미지가 있는 경우
				echo("<img src='/../~sale9/product_img/$row->image' width='200' class='img-fluid img-thumbnail'>");
			else //이미지가 없는 경우
				echo("<img src='' width='200' class='img-fluid img-thumbnail'>");
		?>
    </td>

    
</tr>
</table>
<?	$tmp = $text1 ? "/no/$no/text1/$text1/page/$page" : "/no/$no/page/$page"; ?>
	<div align="center">
		<a href="/~sale9/aji/edit<?=$tmp ?>" class="btn btn-sm bg-primary">수정</a>
		<a href="/~sale9/aji/del<?=$tmp ?>" class="btn btn-sm bg-primary">삭제</a>
		<input type="button" value="이전화면" class="btn btn-sm bg-primary" onclick="history.back();">
	</div>

</form>
