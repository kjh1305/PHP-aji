			<script>
				function find_text()
				{
					if(!form1.text1.value) // 값이 없는경우, 전체 자료
						form1.action="/~sale9/art_admin_jagpum/lists";
					else
						form1.action="/~sale9/art_admin_jagpum/lists/text1/"+form1.text1.value;
					form1.submit();
				}
			</script>    
		<?	$tmp=$text1 ? "/text1/$text1/page/$page" : "/page/$page"; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">작품관리</h1>
                      
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                작품관리 테이블
								<span class="col-3" style="float:right;">
									<a href="/~sale9/art_admin_jagpum/add<?=$tmp?>" class="btn btn-sm bg-primary col-12" style="color:white;">추가</a>	
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
                                                <th width="5%">No</th>
                                                <th width="10%">Name</th>
                                                <th width="10%">M_name</th>
                                                <th width="30">Exp</th>
                                                <th width="15%">Writeday</th>
                                                <th width="30%" colspan="2">Pic</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?
											foreach($list as $row)
											{
												$no=$row->no;							
										?>
                                            <tr>
                                                <td><?=$no;?></td>
                                                <td><a href="/~sale9/art_admin_jagpum/view/no/<?=$no;?><?=$tmp?>"><?=$row->name;?></td>
                                                <td><?=$row->member_name;?></td>
                                                <td class="text_size"><?=$row->exp;?></td>
                                                <td><?=$row->writeday;?></td>
												<td><?=$row->pic;?></td>
												<td><img class="img_size" src="/~sale9/product_img/<?=$row->pic?>" alt=""></td>
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
               
