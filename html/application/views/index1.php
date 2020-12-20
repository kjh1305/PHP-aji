
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
			<!-- Masthead Avatar Image-->
                <img class="masthead-avatar mb-5" src="/~sale9/my/img/default.png" alt="" />
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">AJI에 오신것을 환영합니다.</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">투표해주세요!</p>
            </div>
        </header>
        <!-- Portfolio Section-->
        <section class="page-section portfolio" id="portfolio">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">순위</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>

				<form name="form" action="" method="post">
					</div>
				</div>
				</div><br>
				<div class="row">
				<?
					$i=0;
					foreach($list_count as $row1)
					{
						$aji_no=$row1->aji_no;	
						$count=$row1->c;
						$i=$i+1;	
						foreach($list as $row)
						{
							$no=$row->no;
							$iname=$row->image ? $row->image : "";
							$pname=$row->name; 
							if($aji_no==$no){
									
							?>
										<div class="col-4">
										
										<div class="myimage_box<?=$i?>">
										<img src="/~sale9/product_img/thumb/<?=$i?>.png" class="myimage_image2">
										<br>
										<img src="/~sale9/product_img/thumb/<?=$iname?>" class="myimage_image">
										</a>
										<div class="myimage_text">
										 <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
										 <?=$count?>
										</div>
										 <div class="divider-custom">
										 <div class="divider-custom-line"></div>
										<div class="myimage_text"><?=$pname?></div>
										<div class="divider-custom-line"></div>
										</div>
										</div>
										</div>
							<?
							}
						}
					}				
				?>
   
            </div>
        </section>
        <!-- About Section-->
        <section class="page-section bg-primary text-white mb-0" id="about">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white">투표하기</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
                    <div class="col-lg-4 ml-auto"><p class="lead">세상에서 제일 귀엽고 이쁜 강아지들을 투표하세요!</p></div>
                    <div class="col-lg-4 mr-auto"><p class="lead">너무 나도 사랑스러운 강아지들!</p></div>
                </div>
                <!-- About Section Button-->
                <div class="text-center mt-4">
                    <a class="btn btn-xl btn-outline-light" href="/~sale9/tupyo">
                        <i class="fas fa-dog mr-2"></i> 
                        투표하러 가기!
                    </a>
                </div>
            </div>
        </section>
        <!-- Contact Section-->
        <section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">그래프 보기</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
					
                </div>
                <!-- Contact Section Form-->
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19.-->
                       <style>
	canvas {
		-moz-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
	}
	</style>
	
	<div class="row">
		 <div class="col-sm-12">
				<div class="text-center">
      <input type = "button" value="도넛 차트 보기" onclick="showarea() "class="btn btn-sm btn-primary" />
		<input type = "button" value="바 차트 보기" onclick="showbar()" class="btn btn-sm btn-primary"/>
		<input type = "button" value="도넛 차트 숨기기" onclick="hidearea()" class="btn btn-sm btn-primary" />
		<input type = "button" value="바 차트 숨기기" onclick="hidebar()" class="btn btn-sm btn-primary"/>
				</div>
			</div>
	</div>

	<div id="canvas-holder" style="width:100%">
		<canvas id="chart-area"></canvas>
	</div>
	<br>
	<div id="container" style="width: 100%;">
		<canvas id="canvas"></canvas>
	</div>
		
<?
	$str_label="";
	$str_data = "";
	
	foreach($list_rowc as $row2)
	{
		$str_label .="'$row2->name',";
		$str_data .= $row2->c.',';
	}
	
?>
	
	
	<script>
	
	var config = {
			type: 'doughnut',
			data: {
				datasets: [{
					data:[<?=$str_data;?>],
					backgroundColor: [
						window.chartColors.red,
						window.chartColors.orange,
						window.chartColors.yellow,
						window.chartColors.green,
						window.chartColors.blue,
						window.chartColors.gray,
						window.chartColors.purple,
						"rgba(255,99,132,0.7)",
						"rgba(255,159,64,0.7)",
						"rgba(255,205,86,0.7)",
						"rgba(75,192,192,0.7)",
						"rgba(153,102,255,0.7)",
						"rgba(201,203,207,0.7)",
						"rgba(54,162,235,0.7)"
					],
					label: 'Dataset 1'
				}],
				labels: [<?=$str_label;?>]
			},
			options: {
				responsive: true,
				legend: {
					position: 'top',
				},
				title: {
					display: false,
					text: '구분별 분포도'
				},
				animation: {
					animateScale: true,
					animateRotate: true
				}
			}
		};

		
		window.onload= function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myDoughnut = new Chart(ctx, config);
		};

		var color = Chart.helpers.color;
		var barChartData = {
			labels: [<?=$str_label;?>],
			datasets: [{
				label: '좋아요',
				backgroundColor: color(window.chartColors.green).alpha(0.7).rgbString(),
				borderColor: window.chartColors.green,
				borderWidth: 1,
				data: [<?=$str_data;?>
				]
			}]

		};
		
		window.addEventListener('load',function(){
		//window.onload = function() {
			var ctx1 = document.getElementById('canvas').getContext('2d');
			window.myBar = new Chart(ctx1, {
				type: 'bar',
				data: barChartData,
				options: {
					responsive: true,
					legend: {
						position: 'bottom',
					},
					title: {
						display: false,
						text: '아지 막대 차트'
					}
				}
			});

		});
		document.getElementById("chart-area").style.display = "none";
		document.getElementById("canvas").style.display = "none";
		function hidearea() {
			document.getElementById("chart-area").style.display = "none";
		 }
		 function showarea() {
		 document.getElementById("chart-area").style.display = "block";
		 }
		 function hidebar() {
			document.getElementById("canvas").style.display = "none";
		 }
		 function showbar() {
		 document.getElementById("canvas").style.display = "block";
		 }
			</script>
			</div>
	</div>
	
</form>
                    </div>
                </div>
            </div>
			
        </section>
      
                   