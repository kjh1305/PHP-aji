			<script>
				function find_text()
				{
					if(!form1.text1.value) // 값이 없는경우, 전체 자료
						form1.action="/~sale9/art_admin_member/lists";
					else
						form1.action="/~sale9/art_admin_member/lists/text1/"+form1.text1.value;
					form1.submit();
				}
			</script>    
		<?	$tmp=$text1 ? "/text1/$text1/page/$page" : "/page/$page"; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">회원관리</h1>
                      
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                회원관리 테이블
								<span class="col-3" style="float:right;">
									<a href="/~sale9/art_admin_member/add<?=$tmp?>" class="btn btn-sm bg-primary col-12" style="color:white;">추가</a>	
									</span>
                            </div>
                            <div class="card-body">
							<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-3" name="form1">
                <div class="input-group">
                    <input class="form-control" type="text" name="text1" value="<?=$text1?>" onKeydown="if (event.keyCode == 13) { find_text(); }" placeholder="Search for name" aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button" onClick="find_text();"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
			
			
			
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Uid</th>
                                                <th>Pwd</th>
                                                <th>Name</th>
                                                <th>Tel</th>
                                                <th>Rank</th>
												<th>Exp</th>
												<th>Pic</th>
                                            </tr>
                                        </thead>
                                        <tbody>
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
                                                <td><?=$row->uid9;?></td>
                                                <td><?=$row->pwd9;?></td>
                                                <td><a href="/~sale9/art_admin_member/view/no/<?=$no;?><?=$tmp?>"><?=$row->name9;?></td>
                                                <td><?=$tel;?></td>
                                                <td><?=$rank;?></td>
												<td><?=$row->exp9;?></td>
												<td><?=$row->pic9;?></td>
                                            </tr>
										<?
												
										}
										?>
                                        </tbody>
										 
                                        
                                        
                                    </table>
                                </div>
								  <?=$pagination?>
                            </div>
                        </div>
                    </div>
                </main>
               
