<br>
	 <div class="alert mycolor1" role="alert">사용자</div> <!-- 제목 -->
	
				<script>
				function find_text()
				{
					if(!form1.text1.value) // 값이 없는경우, 전체 자료
						form1.action="/~sale9/member/lists";
					else
						form1.action="/~sale9/member/lists/text1/"+form1.text1.value;
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
             <a href="/~sale9/member/add<?=$tmp?>" class="btn btn-sm mycolor1">추가</a>
        </div>
    </div>
</form>

	<table class="table  table-bordered  table-sm  mymargin5">
    <tr class="mycolor2">
        <td width="10%">번호</td>
        <td width="20%">아이디</td>
        <td width="20%">암호</td>
        <td width="20%">이름</td>
        <td width="20%">전화</td>
        <td width="10%">등급</td>
    </tr>
    <?
	
		foreach($list as $row)
		{
			$no=$row->no9;
			$tel1 = trim(substr($row->tel9,0,3));
			$tel2 = trim(substr($row->tel9,3,4));
			$tel3 = trim(substr($row->tel9,7,4));
			$tel=$tel1."-".$tel2."-".$tel3;
			$rank = $row->rank9==0 ? "직원":"관리자";
	?>
		<tr>
		<td><?=$no;?></td>
		<td><a href="/~sale9/member/view/no/<?=$no;?><?=$tmp?>"><?=$row->name9;?></td>
		<td><?=$tel;?></td>
		<td><?=$row->uid9;?></td>
		<td><?=$row->pwd9;?></td>
		<td><?=$rank;?></td>
		</tr>
		<?
		}
	?>
</table>

		<?=$pagination?>