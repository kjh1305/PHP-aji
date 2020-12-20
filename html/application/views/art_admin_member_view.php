
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">회원관리</h1>
                      
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                회원상세 테이블
								
                            </div>
                            <div class="card-body">
						           
					 <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" >
									<?
												$no=$row->no9;
												$tel1 = trim(substr($row->tel9,0,3));
												$tel2 = trim(substr($row->tel9,3,4));
												$tel3 = trim(substr($row->tel9,7,4));
												$tel=$tel1."-".$tel2."-".$tel3;
												$rank = $row->rank9==0 ? "직원":"관리자";
												
										?>
                                        <thead>
                                            <tr>
                                                <th width="20%" style="vertical-align:middle">No</th>
												<td width="80%"><?=$no;?></td>
                                            </tr>
											<tr>
												<th style="vertical-align:middle">Uid</th>
												<td><?=$row->uid9;?></td>
											</tr>
											<tr>
												<th style="vertical-align:middle">Pwd</th>
												 <td><?=$row->pwd9;?></td>
											</tr>
											<tr>
												<th style="vertical-align:middle">Name</th>
												 <td><?=$row->name9;?></td>
											</tr>
											<tr>
												<th style="vertical-align:middle">Tel</th>
												<td><?=$tel;?></td>
											</tr>
											<tr>
												<th style="vertical-align:middle">Rank</th>
												 <td><?=$rank;?></td>
											</tr>
											<tr>
												<th style="vertical-align:middle">Exp</th>
												<td><?=$row->exp9;?></td>
											</tr>
											<tr>
												<th rowspan="2" style="vertical-align:middle">Pic</th>
												<td><?=$row->pic9;?></td>
											</tr>
											
											
											   <td>
											<?
			if($row->pic9) //이미지가 있는 경우
				echo("<img src='/../~sale9/member_img/$row->pic9' width='200' class='img-fluid img-thumbnail'>");
			else //이미지가 없는 경우
				echo("<img src='' width='200' class='img-fluid img-thumbnail'>");
		?>
		</td>
											</td>
											
                                        </thead>
 
                                    </table>
									 <div align="center">
									 <?	$tmp = $text1 ? "/no/$no/text1/$text1/page/$page" : "/no/$no/page/$page"; ?>
		<a href="/~sale9/art_admin_member/edit<?=$tmp ?>" class="btn btn-sm mycolor1">수정</a>
		<a href="/~sale9/art_admin_member/del<?=$tmp ?>" class="btn btn-sm mycolor1">삭제</a>
		<input type="button" value="이전화면" class="btn btn-sm mycolor1" onclick="history.back();">
	</div>
									
                                </div>
								
                            </div>
                        </div>
                    </div>
                </main>
               
