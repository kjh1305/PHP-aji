<br>
		 <div class="alert mycolor1" role="alert">제품</div> <!-- 제목 -->

		<form name="form1" method="post" action="" enctype="multipart/form-data" class="form-inline">
	
<table class="table table-bordered table-sm mymargin5">
<tr>
<?$member_no=$this->session->userdata('no');?>
<?$no=$row->no?>
    <td width="20%" class="mycolor2" style="vertical-align:middle">작가 번호</td>
    <td width="80%" align="left"><?=$member_no;?></td>
</tr>
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle">작가명</td>
		<td width="80%" align="left">
			<div class="form-inline">
				<?=$row->member_name;?>
                        
						
			</div>
						
		</td>
</tr>
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle">
       작품명
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->name;;?>
                        
						
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle">
        작품 설명
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
           <?=$row->exp;?>
						
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle">
         날짜
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <?=$row->writeday;?>
                       
						
        </div>
    </td>
</tr>

<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle">
         사진
    </td>
	
                  <td width="80%" align="left">
				  <div class="form-inline">
				 
				  </div>
			
			<b>작품사진파일명</b> : <?=$row->pic;?> <br>			
     
		<?
			if($row->pic) //이미지가 있는 경우
				echo("<img src='/../~sale9/product_img/$row->pic' width='200' class='img-fluid img-thumbnail'>");
			else //이미지가 없는 경우
				echo("<img src='' width='200' class='img-fluid img-thumbnail'>");
		?>
    </td>
</tr>
<tr>

</table>

	<?	$tmp = $text1 ? "/no/$no/text1/$text1/page/$page" : "/no/$no/page/$page"; ?>
	<div align="center">
		<a href="/~sale9/art_myjagpum/edit<?=$tmp ?>" class="btn btn-sm mycolor1">수정</a>
		<a href="/~sale9/art_myjagpum/del<?=$tmp ?>" class="btn btn-sm mycolor1">삭제</a>
		<input type="button" value="이전화면" class="btn btn-sm mycolor1" onclick="history.back();">
	</div>

</form>
