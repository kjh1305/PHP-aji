<br>
	 <div class="alert mycolor1" role="alert">제품</div> <!-- 제목 -->
	
				<script>
				function find_text()
				{
					if(!form1.text1.value) // 값이 없는경우, 전체 자료
						form1.action="/~sale9/product/lists";
					else
						form1.action="/~sale9/product/lists/text1/"+form1.text1.value;
					form1.submit();
				}
			</script>

	<form name="form1" action="" method="post">
    <div class="row">
        <div class="col-3" align="left">            
           <div class="input-group  input-group-sm">
    <div class="input-group-prepend">
        <span class="input-group-text">이름</span>
    </div>
    <input type="text" name="text1" value="<?=$text1?>" class="form-control" onKeydown="if (event.keyCode == 13) { find_text(); }" >
    <div class="input-group-append">
        <button class="btn  btn-sm mycolor1" type="button" onClick="find_text();">검색</button>
    </div>
</div>
        </div>
        <div class="col-9" align="right">       
		<?	$tmp=$text1 ? "/text1/$text1/page/$page" : "/page/$page"; ?>
             <a href="/~sale9/product/add<?=$tmp?>" class="btn btn-sm mycolor1">추가</a>
			 <a href="/~sale9/product/jaego<?=$tmp;?>" class="btn btn-sm mycolor1">재고계산</a>
        </div>
    </div>
</form>

	<table class="table  table-bordered  table-sm  mymargin5">
    <tr class="mycolor2">
        <td width="10%">번호</td>
        <td width="20%">구분명</td>
		<td width="30%">제품명</td>
		<td width="20%">단가</td>
		<td width="20%">재고</td>
    </tr>
    <?
	
		foreach($list as $row)
		{
			$no=$row->no9;
	?>
		<tr>
		<td><?=$no;?></td>
		<td><?=$row->gubun_name;?></td>
		<td align="left"><a href="/~sale9/product/view/no/<?=$no;?><?=$tmp?>"><?=$row->name9;?></td>
		<td align="right"><?=number_format($row->price9);?></a></td>
		<td align="right"><?=number_format($row->jaego9);?></a></td>
		</tr>
		<?
		}
	?>
</table>

		<?=$pagination?>