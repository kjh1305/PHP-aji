<header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">강아지 투표하기</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
            </div>
        </header>
<br>
	 
	 <?	$tmp=$text1 ? "/text1/$text1/page/$page" : "/page/$page"; ?>
	
				<script>
				function find_text()
				{
					if(!form1.text1.value) // 값이 없는경우, 전체 자료
						form1.action="/~sale9/tupyo/lists";
					else
						form1.action="/~sale9/tupyo/lists/text1/"+form1.text1.value;
					form1.submit();
				}
				
				function ajax_tupyo(no){
					if(confirm("투표하시겠습니까?") == true){
						var rowno = no;
						$.ajax({
							url:"/~sale9/tupyo/tupyo_insert",
							type: "POST",
							data:{
								"no":rowno
							},
							dataType:"html",
							success:function(data){
									location.reload();
								}
						});
					}
					else{
						return ; 
					}				
				}
				
				
				/*
				function adelete(){
					alert("삭제?");
					$.ajax({
						url:"/~sale9/tupyo/tupyo_delete",
						type: "POST",
						data:{
							no : $('#no').val()
						},
						dataType:"html"
					});
				}*/
				
			</script>


	<form name="form1" action="" method="post" class="m-2">

    <div class="row">
        <div class="col-3" align="left">            
           <div class="input-group  input-group-sm">
    <div class="input-group-prepend">
        <span class="input-group-text">이름</span>
    </div>
    <input type="text" name="text1" value="<?=$text1?>" class="form-control" onKeydown="if (event.keyCode == 13) { find_text(); }" >
    <div class="input-group-append">
        <button class="btn  btn-sm bg-primary" type="button" onClick="find_text();">검색</button>
    </div>
</div>
        </div>
        <div class="col-9" align="right">       
		
             
        </div>
    </div>

	<table class="table  table-bordered  table-sm  mymargin5" id="table_list">
	
    <tr class="bg-light">
		<td width="10%">번호</td>
		<td width="30%">사진</td>
        <td width="10%">강아지명</td>
		<td width="30%">소개</td>
		<td i class="fas fa-star" width="5%"></td>
		<td width="10%">간식주기</td>

    </tr>
    <?
		foreach($list as $row)
		{
			$no=$row->no;
			$iname=$row->image ? $row->image : "";
			$pname=$row->name;
	?>
		<tr>
		<td class="align-middle"><?=$no;?></td>
		<td><img src="/~sale9/product_img/thumb/<?=$iname?>" class="mythumb_image"></td>
		<td class="align-middle"><?=$row->name;?></td>
		<td class="align-middle"><?=$row->sogae;?></td>
		<td class="align-middle" id="count">
		<? 
			foreach($list_count as $row1)
			{
				if($no==$row1->aji_no)
				echo $row1->c;
			}		
		?>
		</td>
		<td class="align-middle">
		<?echo("<input type='button' name='tupyo' id='tupyo' i class='fas fa-bone' value='투표하기' onClick='ajax_tupyo($no)'>");?>	
		</td>
		<!--<input type="button" id="del" class="btn btn-sm bg-primary" value="삭제하기" onClick="adelete()"/>-->
		</tr>	
		<?
		}
	?>
</table>
	</form>

		<?=$pagination?>
		