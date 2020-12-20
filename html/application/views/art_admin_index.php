
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">회원 수</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                      <?=$mrow->cm;?>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">작품 수</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?=$jrow->cj;?>
                                    </div>
                                </div>
                            </div>
							 <div class="col-xl-6 col-md-12">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">좋아요 수</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?=$grow->cg;?>
                                    </div>
                                </div>
                            </div>
							<div class="col-xl-6 col-md-12">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">작가 수</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?=$jagga;?>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                           
                            
                        
                        
                        </div>
                    </div>
                </main>