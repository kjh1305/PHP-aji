<br>
	 <div class="alert mycolor1" role="alert">Best 제품</div> <!-- 제목 -->
	
				<script>
				function find_text()
				{
					form1.action="/~sale9/bestmon/lists/text1/"+form1.text1.value+"/text2/"+form1.text2.value+"/page";
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
										
										&nbsp;&nbsp;
										<div class="input-group input-group-sm">
			</div>
	
</form>

	<table class="table  table-bordered  table-sm  mymargin5">
    <tr class="mycolor2">
        <td width="50%">제품명</td>
        <td width="20%">총 판매수량</td>
		
	
    </tr>
    <?
	
		foreach($list as $row)
		{
			//$no=$row->no9;
	?>
		<tr>
		<td align="left"><?=$row->product_name;?></td>
		<td><?=$row->cnumo;?></td>
		
		
		</tr>

	<?
		}
	?>
	</div>
	</div>
</table>

		<?=$pagination?>