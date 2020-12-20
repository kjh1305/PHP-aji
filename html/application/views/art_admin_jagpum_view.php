
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">작품관리</h1>
                      
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                작품상세 테이블
								
                            </div>
                            <div class="card-body">
						           
					 <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" >
									<?
												$no=$row->no;
											
												
										?>
                                        <thead>
                                            <tr>
                                                <th width="20%" style="vertical-align:middle">No</th>
												<td width="80%"><?=$no;?></td>
                                            </tr>
											<tr>
												<th style="vertical-align:middle">Name</th>
												<td><?=$row->name;?></td>
											</tr>
											<tr>
												<th style="vertical-align:middle">M_name</th>
												 <td><?=$row->member_name;?></td>
											</tr>
											<tr>
												<th style="vertical-align:middle">Exp</th>
												 <td><?=$row->exp;?></td>
											</tr>
											<tr>
												<th style="vertical-align:middle">Writeday</th>
												<td><?=$row->writeday;?></td>
											</tr>
											<tr>
												<th rowspan="2" style="vertical-align:middle">Pic</th>
												<td><?=$row->pic;?></td>
											</tr>
											
											
											   <td>
											<?
			if($row->pic) //이미지가 있는 경우
				echo("<img src='/../~sale9/product_img/$row->pic' width='400' class='img-fluid img-thumbnail'>");
			else //이미지가 없는 경우
				echo("<img src='' width='400' class='img-fluid img-thumbnail'>");
		?>
		</td>
											</td>
											
                                        </thead>
 
                                    </table>
									 <div align="center">
									 <?	$tmp = $text1 ? "/no/$no/text1/$text1/page/$page" : "/no/$no/page/$page"; ?>
		<a href="/~sale9/art_admin_jagpum/edit<?=$tmp ?>" class="btn btn-sm mycolor1">수정</a>
		<a href="/~sale9/art_admin_jagpum/del<?=$tmp ?>" class="btn btn-sm mycolor1">삭제</a>
		<input type="button" value="이전화면" class="btn btn-sm mycolor1" onclick="history.back();">
	</div>
									
                                </div>
								
                            </div>
                        </div>
                    </div>
                </main>
               
