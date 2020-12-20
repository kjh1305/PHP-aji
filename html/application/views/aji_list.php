<header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">강아지 추가하기</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
            </div>
        </header>
<br>
	
	
				<script>
				function find_text()
				{
					if(!form1.text1.value) // 값이 없는경우, 전체 자료
						form1.action="/~sale9/aji/lists";
					else
						form1.action="/~sale9/aji/lists/text1/"+form1.text1.value;
					form1.submit();
				}
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
		<?	$tmp=$text1 ? "/text1/$text1/page/$page" : "/page/$page"; ?>
             <a href="/~sale9/aji/add<?=$tmp?>" class="btn btn-sm bg-primary">추가</a>
        </div>
    </div>


	<table class="table  table-bordered  table-sm  mymargin5">
    <tr class="bg-light">
        <td width="10%">번호</td>
        <td width="50%">강아지 종류 이름</td>
    </tr>
    <?
	
		foreach($list as $row)
		{
			$no=$row->no;
	?>
		<tr>
		<td><?=$no;?></td>
		<td><a href="/~sale9/aji/view/no/<?=$no;?><?=$tmp?>"><?=$row->name;?></td>
		</tr>
		<?
		}
	?>
</table>
</form>
<br>

		<?=$pagination?>