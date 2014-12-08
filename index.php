<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registration</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />

	<style>
		.centering {
			float:none;
			margin:0 auto;
		}

		body {
		  padding-top: 70px;
		}

		input[type=checkbox]
		{
		  /* Double-sized Checkboxes */
		  -ms-transform: scale(1.8); /* IE */
		  -moz-transform: scale(1.8); /* FF */
		  -webkit-transform: scale(1.8); /* Safari and Chrome */
		  -o-transform: scale(1.8); /* Opera */
		  margin-left: 8px;
		}
		
		td {
		  vertical-align: middle !important;
		}
	</style>
</head>

<body>
<div class="container container-fluid">
	<!-- Fixed navbar -->
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand logo sprite-46" style="margin: 1px 10px 0 5px;" href="#"></a>
			</div>
			<!-- stupid menu wont align center unless use inline css -->
			<div class="navbar-collapse collapse text-center" style="text-align:center;">
				<ul class="nav navbar-nav" id="navbullet">
					<li class="active"><a href="#">Registration</a></li>
					<li class=""><a href="input.php">Backend</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>
		
	<form method="POST" action="" accept-charset="UTF-8" role="form">
		<center style="margin-bottom:5px;"><code>Disclaimer: For hackathon purpose, just key in dummy data</code></center>
		<div style="min-width:400px; max-width:650px;" class="centering">
			<div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading"><strong>Registration</strong></div>

				<!-- Table -->
				<table class="table table-hover" id="form1">
					<tbody>
						<tr class="reglabel">
							<td>Name</td>
							<td>
								<input class="form-control" required="required" name="name_en" type="text">
							</td>
						</tr>
						<tr class="reglabel">
							<td>Address</td>
							<td>
								<input class="form-control" required="required" name="name_en" type="text">
							</td>
						</tr>
						<tr class="reglabel">
							<td>Sex</td>
							<td>
								<label for="sex-male">Male</label>
								<input id="sex-male" style="margin-right:80px;" checked="checked" name="sex" type="radio" value="male">
								<label for="sex-female">Female</label>
								<input id="sex-female" name="sex" type="radio" value="female">
							</td>
						</tr>
						<tr class="reglabel">
							<td>Contact</td>
							<td class="form-inline">
								<label for="home_no">Home</label>
								<input class="form-control" id="home_no" style="margin-right:15px;" name="home_no" type="text">
								<label for="handphone">HP</label>
								<input class="form-control" id="handphone" name="handphone" type="text">
							</td>
						</tr>
						<tr class="reglabel">
							<td>Remark</td>
							<td>
								<textarea class="form-control" rows="3" name="other" cols="50"></textarea>
							</td>
						</tr>
						<tr class="reglabel">
							<td>Supplier</td>
							<td>
								<select id="supplier-opt" class="form-control" autofocus="autofocus" required="required" name="standard"></select>
							</td>
						</tr>
						<tr>
							<td>TOS</td>
							<td><label for="tos">Agree</label><input id="tos" type="checkbox" style="width"></input><code> <-- Click</code></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<button style="margin-top:-10px; margin-bottom:10px; width:400px;" class="btn btn-lg btn-primary center-block" type="submit">Register</button>


		<!-- Modal box -->
		<div class="modal fade" id="tos-content" tabindex="-1" role="dialog" aria-labelledby="tos-content" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title" id="myModalLabel">Term of Service</h4>
					</div>
					<div class="modal-body">
						<!-- content -->
						<div class="thumbnail" style="width:100%; height:350px;">
							<div id="titles"><div id="titlecontent">

								<article class="starwars">
								  <audio preload="auto">
								      <?php
								        $data = array('Common Terms: You should read DMCA Copyright Policy and the Privacy Policy pages. If you don’t agree to these terms, please exit; Eligibility & Registration: You must be at least 13 years old to use our service. By registering with your information, you are guaranteeing the services offered are solely for your use and not a third party – and that all of the information is accurate adn updated; Confidentiality: We are not sharing confidential information with any of our customers;');
								        $data = trim(http_build_query($data));
								        $data = str_replace("0=","",$data);
								        $data = 'http://tts-api.com/tts.mp3?return_url=1&q='.$data;
								        $data = file_get_contents($data);
								      ?>
								      <source src=<?php echo $data; ?> type="audio/mpeg">
								  </audio>

								  <section id="starttos" class="start">
								  </section>

								  <div class="animation">

								  <section class="titles">
								      <div id="tos-brief">
											<p><strong>Common Terms</strong><br />
											You should read DMCA Copyright Policy and the Privacy Policy pages. If you don’t agree to these terms, please exit.</p>

											<p><strong>Eligibility & Registration</strong><br />
											 You must be at least 13 years old to use our service. By registering with your information, you are guaranteeing the services offered are solely for your use and not a third party – and that all of the information is accurate adn updated.</p>

											<p><strong>Confidentiality</strong><br />
											We are not sharing confidential information with any of our customers.</p>

								      </div>
								      <div style="display:none;" id="tos-detail">							      
								      </div>
								  </section>

								  </div>
								</article>

							</div></div>
						</div>
						<span style="margin-top:-50px;" class="glyphicon glyphicon-play" aria-hidden="true"></span>
						<span style="margin-top:-50px;" class="glyphicon glyphicon-pause" aria-hidden="true"></span>
						<code>Text to speech</code>
						<div style="margin:30px 10px 10px 10px; height:43px; background:url('img/road.jpg');"></div>
						<div id="runner" style="background:url('img/run.gif') no-repeat; margin:-65px 0px 0px 10px; height:50px;"></div>
						<div style="background:url('img/presents.gif') no-repeat; margin-top:-55px; margin-right:10px; width:51px; height:60px; float:right;"></div>
					</div>
				</div>
			</div>
		</div>

	</form> <!-- /container -->
</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="js/index.js"></script>

<script>
	function pull_tos(){
		$.ajax({
				type: "post",
				url: "getdata.php",
				cache: false,
				data:{'appname':$('#supplier-opt option:selected').val()},
				success: function(data)
				{
					data = JSON.parse(data);
					var brief_data = '';
					var detail_data = '';
					$.each(data, function(index, val){
						brief_data += "<p><strong>"+val['name']+"</strong><br />"+val['briefy']+"</p>";
						detail_data += "<p><strong>"+val['name']+"</strong><br />"+val['explanation']+"</p>";
					});

					console.log(brief_data);
					$("#tos-brief").html(brief_data);
					$("#tos-detail").html(detail_data);
				}
		});
	}

	$(document).ready(function(){
		$.ajax({
				type: "get",
				url: "gettag.php",
				cache: false,
				async: false,
				success: function(data)
				{
					data = JSON.parse(data);
					$.each(data, function(index, val){
						$('#supplier-opt').append('<option value="'+val['supplier_name']+'">'+val['supplier_name']+'</option>');
					});
				}
		});
		// setTimeout(function(){pull_tos();},2000);
	});


	// $('#supplier-opt').on('change',function(){
	// 	pull_tos();
	// });

	$('#tos').on('click',function(){
		if($('#tos').prop('checked') === true)
			$('#tos-content').modal('show');
	});

	var length = 10;

	function runner_plus(){
		length += 4;
		$('#runner').css('margin-left',length+'px');
	}

	var running_state;

	function runtogift(){
		running_state = setInterval(function(){ runner_plus(); }, 250);
		setTimeout(function(){
			clearInterval(running_state);
			
		},32000);
	}

	$('#tos-content').on('shown.bs.modal', function (e) {
	  $('.start').click();
	  runtogift();
	});

</script>
</body>
</html>
