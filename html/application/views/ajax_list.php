
<br>
	 <div class="alert mycolor1" role="alert">Ajax 구분</div> <!-- 제목 -->
	 <?	$tmp=$text1 ? "/text1/$text1/page/$page" : "/page/$page"; ?>
	
				<script>
				function find_text()
				{
					if(!form1.text1.value) // 값이 없는경우, 전체 자료
						form1.action="/~sale9/ajax/lists";
					else
						form1.action="/~sale9/ajax/lists/text1/"+form1.text1.value;
					form1.submit();
				}
				$(function(){
					$("#ajax_add").click( function(){
						var name=$("#name").val();
					$.ajax({
						url:"/~sale9/ajax/ajax_insert",
						type:"POST",
						data:{
							"name":name
						},
						dataType:"html",
						complete:function(xhr, textStzatus){
								var no = xhr.responseText;

						$("#table_list").append(
							"<tr id='rowno"+no+"'>"+
							"<td>"+no+"</td>"+
							
							"<td><a href='/ajax/view/no/"+no+"<?=$tmp;?>'>"+name+"</a></td>"+
							"<td><a href='#' rowno='"+no+"' class='ajax_del btn btn-sm mycolor1' onClick='javascript:confirm(\"삭제할까요?\");'>삭제</a></td>"+
							"</tr>");

						$("#name").val('')

							}
					});
					});
					$("#table_list").on("click",".ajax_del",function() {
							$.ajax({
								url:"/~sale9/ajax/ajax_delete",
						type:"POST",
						data:{
							"no":$(this).attr("rowno")
						},
						dataType:"text",
						complete:function(xhr, textStatus){
								var no = xhr.responseText;
								$("#rowno"+no).remove();
							}
							});
				});
				});

				
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
		
             <a href="#collapseExample" class="btn btn-sm mycolor1" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample">추가</a>
        </div>
    </div>
</form>
	
	<table class="table  table-bordered  table-sm  mymargin5" id="table_list">
	
    <tr class="mycolor2">
        <td width="10%">번호</td>
        <td width="80%">구분명</td>
		<td width="10%">삭제</td>

    </tr>
    <?
	
		foreach($list as $row)
		{
			$no=$row->no9;
	?>
		<tr id="rowno<?=$no;?>">
		<td><?=$no;?></td>
		<td><a href="/~sale9/ajax/view/no/<?=$no;?><?=$tmp?>"><?=$row->name9;?></td>
		<td>
			<a href="#" rowno="<?=$no;?>"class="ajax_del btn btn-sm mycolor1"
				onClick="javascript:confirm('삭제할까요?');">삭제</a>
		</td>
		</tr>
		<?
		}
	?>
</table>
	<div class="collapse mymargin5" id="collapseExample">
		<div class="card card-body" style="padding:0px 5px 0px 5px;">
			<table class="table table-sm table=bordered mymargin5 alert-primary">
				<form name="form2">
				<tr>
					<td width="10%"></td>
					<td width="80%">
						<input type=text" name="name" value="" class="form-control form-control-sm" id="name">
					</td>
					<td width="10%" style="vertical-align:middle">
						<a href="#" id="ajax_add" class="btn btn-sm btn-primary">저장</a>
					</td>
				</tr>
				</form>
			</table>
		</div>
	</div>

		<?=$pagination?>