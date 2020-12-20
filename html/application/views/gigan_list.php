<br>
	 <div class="alert mycolor1" role="alert">기간별 매출입현황</div> <!-- 제목 -->
	
				<script>
				function find_text()
				{
					form1.action="/~sale9/gigan/lists/text1/"+form1.text1.value+"/text2/"+form1.text2.value+"/text3/"+form1.text3.value+"/page";
					form1.submit();
				}
				function make_excel()
				{
					form1.action="/~sale9/gigan/excel/text1/" + form1.text1.value+"/text2/"+form1.text2.value+"/text3/"+form1.text3.value+"/page";
					form1.submit();
				}
				$(function() {
					$('#text1') .datetimepicker({
						locale: 'ko',
						format: 'YYYY-MM-DD',
						defaultDate: moment()
					});
						$('#text2') .datetimepicker({
						locale: 'ko',
						format: 'YYYY-MM-DD',
						defaultDate: moment()
					});
					
					$("#text1") .on("dp.change", function (e) {
						find_text();
					});
					$("#text2") .on("dp.change", function (e) {
						find_text();
					});
				});

			</script>

	<form name="form1" action="" method="post">
		<div class="row">
			     <div class="col-12" align="left">
				<div class="form-inline">
					 <div class="input-group  input-group-sm table-sm date" id="text1">
						 <div class="input-group-prepend">
							 <span class="input-group-text">날짜</span>
						</div>
							 <input type="text" name="text1" value="<?=$text1?>" class="form-control" size="9" onKeydown="if (event.keyCode == 13) { find_text(); }" >
								<div class="input-group-append">
									<div class="input-group-text">
										<div class="input-group-addon"><i class="far fa-calendar-alt fa-lg"></i></div>	
										
										</div> 
										</div>
									</div>&nbsp;-&nbsp;
									<div class="input-group  input-group-sm table-sm date" id="text2">
									 	<input type="text" name="text2" value="<?=$text2?>" class="form-control" size="9" onKeydown="if (event.keyCode == 13) { find_text(); }" >
								<div class="input-group-append">
											<div class="input-group-text">
												<div class="input-group-addon"><i class="far fa-calendar-alt fa-lg"></i></div>
									
										</div>
												</div>    
											</div>
										
										&nbsp;-&nbsp;
										<div class="input-group input-group-sm">
			<div class="input-group-prepend">
			<span class="input-gorup-text">제품명</span>&nbsp&nbsp
			</div>
			<div class="input-gorup-append">
			<select name="text3" class="form-control form-control-sm" onchange="javascript:find_text();">
			<option value="0">전체</option>
			<?
			foreach($list_product as $row)
			{
				if($row->no9==$text3)
					echo("<option value='$row->no9' selected>$row->name9</option>");
				else
					echo("<option value='$row->no9'>$row->name9</option>");
			}
			?>
		</select>
		&nbsp;&nbsp;
		<input type="button" value="EXCEL" class="form-control btn btn-sm mycolor1" onClick="if(confirm('엑셀파일로 저장할까요?')) make_excel();">
		</div>
		
		</div>
		
	
</form>

	<table class="table  table-bordered  table-sm  mymargin5">
    <tr class="mycolor2">
        <td width="20%">날짜</td>
        <td width="20%">제품명</td>
		<td width="10%">단가</td>
		<td width="10%">매입수량</td>
		<td width="10%">매출수량</td>
		<td width="10%">금액</td>
		<td width="20%">비고</td>
    </tr>
    <?
	
		foreach($list as $row)
		{
			$no=$row->no9;
	?>
		<tr>
		<td><?=$row->writeday9;?></td>
		<td align="left"><?=$row->product_name;?></td>
		<td align="right"><?=number_format($row->price9);?></a></td>
		<? $numi=$row->numi9 ? number_format($row->numi9):"";?>
		<? $numo=$row->numo9 ? number_format($row->numo9):"";?>
		<td align="right" bgcolor="lightyellow"><?=$numi?></td>
		<td align="right" bgcolor="lightyellow"><?=$numo?></td>
		<td align="right"><?=number_format($row->prices9);?></a></td>
		<td><?=$row->bigo9;?></td>
		</tr>

	<?
		}
	?>
	
</table>
		
		<?=$pagination?>
		