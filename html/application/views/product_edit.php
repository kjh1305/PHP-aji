
<br>
		 <div class="alert mycolor1" role="alert">제품</div> <!-- 제목 -->

		<form name="form1" method="post" action="" enctype="multipart/form-data">

<table class="table table-bordered table-sm mymargin5">
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle"> 번호</td>
    <td width="80%" align="left"><?=$row->no9;?></td>
</tr>
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 구분명
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
			<select name="gubun_no" class="form-control form-control-sm">
				<option value="">선택하세요.</option>
					<?
						foreach($list as $row1)
						{
							if($row->gubun_no9==$row1->no9)
								echo("<option value='$row1->no9' selected>$row1->name9</option>");
							else
								echo("<option value='$row1->no9' >$row1->name9</option>");
						}
					?>
			</select>
        </div>    
					<?if(form_error("gubun_no")==TRUE) echo form_error("gunun_no");?>
    </td>
</tr>
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle">
        <font color="red">*</font> 제품명
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
        <font color="red">*</font> 단가
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <input  type="text" name="price" value="<?=$row->price9;?>"
                         class="form-control form-control-sm" size="20" maxlength="20">
						 <?if(form_error("price")==true) echo form_error("price");?>
        </div>
    </td>
</tr>
<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle">
         재고
    </td>
    <td width="80%" align="left">
        <div class="form-inline">
            <input  type="text" name="jaego" value="<?=$row->jaego9;?>"
                         class="form-control form-control-sm" size="20" maxlength="20">
						
        </div>
    </td>
</tr>

<tr>
    <td width="20%" class="mycolor2" style="vertical-align:middle">
         사진
    </td>
	
                  <td width="80%" align="left">
				  <div class="form-inline">
				  <input type="file" name="pic" value="" class="form-control form-control-sm">
				  </div>
			
			<b>파일이름</b> : <?=$row->pic9;?> <br>			
     
		<?
			if($row->pic9) //이미지가 있는 경우
				echo("<img src='/../~sale9/product_img/$row->pic9' width='200' class='img-fluid img-thumbnail'>");
			else //이미지가 없는 경우
				echo("<img src='' width='200' class='img-fluid img-thumbnail'>");
		?>
    </td>
</tr>


<tr>

</table>

	<div align="center">
		<input type="submit" value="저장" class="btn btn-sm mycolor1"></a>&nbsp;
		<input type="button" value="이전화면" class="btn btn-sm mycolor1" onclick="history.back();">
	</div>

</form>
