<br>
	 <div class="alert mycolor1" role="alert">매출장</div> <!-- 제목 -->
	
				<script>
				function find_text()
				{
					form1.action="/~sale9/jangbuo/lists/text1/"+form1.text1.value+"/page";
					form1.submit();
				}
				
				$(function() {
					$('#text1') .datetimepicker({
						locale: 'ko',
						format: 'YYYY-MM-DD',
						defaultDate: moment()
					});
					
					$("#text1") .on("dp.change", function (e) {
						find_text();
					});
				});

			</script>

	<form name="form1" action="" method="post">
    <div class="row">
        <div class="col-3" align="left">            
           <div class="input-group  input-group-sm date" id="text1">
				 <div class="input-group-prepend">
					 <span class="input-group-text">날짜</span>
				</div>
					  <input type="text" name="text1" value="<?=$text1?>" class="form-control" onKeydown="if (event.keyCode == 13) { find_text(); }" >
					<div class="input-group-append">
						<div class="input-group-text">
							<div class="input-group-addon"><i class="far fa-calendar-alt fa-lg"></i></div>
							</div>    
						</div>
					</div>
				 </div>
					 <div class="col-9" align="right">       

						<?	$tmp=$text1 ? "/text1/$text1/page/$page" : "/page/$page"; ?>

					 <a href="/~sale9/jangbuo/add<?=$tmp?>" class="btn btn-sm mycolor1">추가</a>
					 </div>
			</div>
	
	
</form>

	<table class="table  table-bordered  table-sm  mymargin5">
    <tr class="mycolor2">
        <td width="10%">번호</td>
        <td width="20%">날짜</td>
		<td width="30%">제품명</td>
		<td width="10%">단가</td>
		<td width="10%">수량</td>
		<td width="10%">금액</td>
		<td width="20%">비고</td>
    </tr>
    <?
	
		foreach($list as $row)
		{
			$no=$row->no9;
	?>
		<tr>
		<td><?=$no;?></td>
		<td><?=$row->writeday9;?></td>
		<td align="left"><a href="/~sale9/jangbuo/view/no/<?=$no;?><?=$tmp?>"><?=$row->product_name;?></td>
		<td align="right"><?=number_format($row->price9);?></a></td>
		<td><?=$row->numo9;?></td>
		<td align="right"><?=number_format($row->prices9);?></a></td>
		<td><?=$row->bigo9;?></td>
		</tr>

	<?
		}
	?>
	</div>
	</div>
</table>

		<?=$pagination?>