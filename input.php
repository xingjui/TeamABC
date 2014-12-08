<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Input</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="http://joaopereirawd.github.io/fakeLoader.js/js/fakeLoader.js"></script>
	<link rel="stylesheet" href="fakeLoader.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
</head>

<body>
	<div id="fakeLoader"></div>
	<!-- <div id="top-nav">
		<ul class="nav nav-tabs">
			<li class="active">
				<a href="#">Insert</a>
			</li>
			<li>
				<a href="#">Nothing</a>
			</li>
		</ul>
	</div> -->
	<div id="insert" style="display:block;width:80%;margin-left:auto;margin-right:auto;margin-top:10px;">
		<div id="content" class="well" style="float:left;width:70%;">
			<div>
				Application : 
				<input name="appname" type="text" placeholder="" />
				<button class="btn-info" name="getset">Get/Set</button>
				<br /><br />
			</div>
			<div id="formC">
				<!-- <form method="post" action="#">
					<table class="table">
						<tr>
							<th>Name</th>
							<th>
								<input name="name" type="text" class="form-control" placeholder="Name..." />
							</th>
						</tr>
						<tr>
							<th>Briefy</th>
							<th>
								<textarea name="briefy" rows="3" class="form-control" ></textarea>
							</th>
						</tr>
						<tr>
							<th>Category</th>
							<th>
								<select class="form-control" name="category">
									<option value="common">Common</option>
									<option value="tos">Term of Service</option>
									<option value="eula">End User License Agreement</option>
									<option value="dp">Data Privacy</option>
									<option value="copyright">Copyright</option>
								</select>
							</th>
						</tr>
						<tr>
							<th>Explanation</th>
							<th>
								<textarea name="explanation" rows="5" class="form-control" ></textarea>
							</th>
						</tr>
					</table>
					<input type="hidden" value="do" name="supplier_name" />
				</form> -->
			</div>
			<button class="btn" onclick="Add()">Add</button>
			<button class="btn" type="submit">Submit</button>
		</div>
		<div style="float:right;width:28%;">
			<div><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Tags</div>
			<div id="tags" class="well">
			</div>
			<div><span class="glyphicon glyphicon-th-large" aria-hidden="true"></span> Category</div>
			<div id="content-nav-right-top" class="well">
				<ul class="nav nav-pills nav-stacked">
					<li>
						<a href="#" onclick="show('common')">Common</a>
					</li>
					<li>
						<a href="#" onclick="show('tos')">Term Of Service</a>
					</li>
					<li>
						<a href="#" onclick="show('eula')">End User License Agreement</a>
					</li>
					<li>
						<a href="#" onclick="show('dp')">Data Privacy</a>
					</li>
					<li>
						<a href="#" onclick="show('cr')">Copyright</a>
					</li>
				</ul>
			</div>
			<div><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Guidance</div>
			<div id="content-guide-right-bottom" class="well" style="height:100%;">
				<ul class="nav">
					<li>
						<a href="#"><p style="word-wrap:break-word;">
							Avoid technical jargon. Not everyone have a degree in Law.
						</p></a>
					</li>
					<li>
						<a href="#"><p style="word-wrap:break-word;">
							Be as concise and as simple as possible as people don't like to read a wall of text.
						</p></a>
					</li>
					<li>
						<a href="#"><p style="word-wrap:break-word;">
							People are lazy, so just tell them what they need to know (key point)
						</p></a>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div id="nothing" style="display:none;"></div>

	<script type="text/javascript">
		$(document).ready(function(){

			$('ul li').click(function(){
				$('ul li').removeClass('active');
				$(this).addClass('active');
			});

			$('button[type="submit"]').on("click", function(e){
				$('input[name=supplier_name]').val($('input[name=appname]').val());

				$("#fakeLoader").fakeLoader({
					timeToHide:2000, //Time in milliseconds for fakeLoader disappear
					spinner:"spinner1",//Options: 'spinner1', 'spinner2', 'spinner3', 'spinner4', 'spinner5', 'spinner6', 'spinner7'
					bgColor:"rgba(180,180,180,0.7)" //Hex, RGB or RGBA colors
				});

				$("form").each(function(){
					//console.log($(this).serialize());
					$.ajax({
						type: "POST",
						url: "test.php",
						cache: false,
						data: $(this).serialize(),
						success: function(data){
							if(data == 1)
								setTimeout(function(){alert("Data saved!");},2000);
							else if (data == 0)
								setTimeout(function(){alert("Data not saved!");},2000);
							else{
								console.log(data);
								setTimeout(function(){alert("Error. Please contact admins for further assistance.");},2000);
							}
						}
					});
				});
				e.preventDefault();
			});

			$('button[name=getset]').on("click", function(e){
			//console.log($('input[name=appname]').serialize());
			$.ajax({
				type: "POST",
				url: "getdata.php",
				cache: false,
				data: $('input[name=appname]').serialize(),
				success: function(data)
				{
					data = JSON.parse(data);
					$.each(data, function(index, val){
						// console.log(val['briefy']);
						AddWithVal(val['id'], val['name'], val['briefy'], val['category'], val['explanation']);
					});
				}
			});
			e.preventDefault();
			});

			$.ajax({
				type: "POST",
				url: "gettag.php",
				success: function(data){
					data=JSON.parse(data);
					console.log(data);
					$.each(data, function(i,v){
						$('#tags').append('<button class="btn btn-link" onclick="getValue(\''+v['supplier_name']+'\')" >'+v['supplier_name']+'</button>&nbsp;');
					});
				}
			});
		});
		
		function delData(id){
			$.ajax({
				type: "POST",
				url: "deletedata.php",
				data: {'id' : id},
				success: function(data){
					console.log(data);
				}
			});
		}	

		function show(category){
			var i;
			switch(category){
				case 'common':
					i='common';
				break;
				case 'tos':
					i='tos';
				break;
				case 'eula':
					i='eula';
				break;
				case 'dp':
					i='dp';
				break;
				case 'cr':
					i='copyright';
				break;
			}

			$.ajax({
				type: "POST",
				url: "getdata2.php",
				cache: false,
				data: {"appname" : $('input[name=appname]').val(), "category":i},
				success: function(data)
				{
					$('#formC').html('');
					data = JSON.parse(data);
					$.each(data, function(index, val){
						// console.log(val['briefy']);
						AddWithVal(val['id'], val['name'], val['briefy'], val['category'], val['explanation']);
					});
				}
			});
		}

		function getValue(appname){
			$('#formC').html('');
			$('input[name=appname]').val(appname);
			$('button[name=getset').trigger('click');
		}

		function Add(){
			$('#formC').append(
				'<form method="post" action="#">'+
				'<table class="table">'+
				'<tr>'+
				'<th>Name</th>'+
				'<th>'+
				'<input name="name" type="text" class="form-control" placeholder="Name..." />'+
				'</th>'+
				'</tr>'+
				'<tr>'+
				'<th>Briefy</th>'+
				'<th>'+
				'<input name="briefy" type="text" class="form-control" placeholder="Briefy..." />'+
				'</th>'+
				'</tr>'+
				'<tr>'+
				'<th>Category</th>'+
				'<th>'+
				'<select class="form-control" name="category">'+
				'<option value="common">Common</option>'+
				'<option value="tos">Term of Service</option>'+
				'<option value="eula">End User License Agreement</option>'+
				'<option value="dp">Data Privacy</option>'+
				'<option value="copyright">Copyright</option>'+
				'</select>'+
				'</th>'+
				'</tr>'+
				'<tr>'+
				'<th>Explanation</th>'+
				'<th>'+
				'<textarea name="explanation" rows="5" class="form-control" ></textarea>'+
				'</th>'+
				'</tr>'+
				'</table>'+
				'<input type="hidden" name="supplier_name" value="" />'+
				'</form>'
				);
		}

		function AddWithVal(id,name, briefy, category, explanation){
			var htmlString = 
			'<form method="post" action="#">'+
			'<table class="table">'+
			'<tr>'+
			'<th>Name</th>'+
			'<th>'+
			'<input name="name" type="text" class="form-control" value="'+ name +'" />'+
			'</th>'+
			'</tr>'+
			'<tr>'+
			'<th>Briefy</th>'+
			'<th>'+
			'<input name="briefy" type="text" class="form-control" value="'+ briefy +'" />'+
			'</th>'+
			'</tr>'+
			'<tr>'+
			'<th>Category</th>'+
			'<th>'+
			'<select class="form-control" name="category">'+
			'<option value="common"'; 
			htmlString += (category=='common')? 'selected':'';
			htmlString += '>Common</option>'+
			'<option value="tos"'; 
			htmlString += (category=='tos')? 'selected': ''; 
			htmlString +='>Term of Service</option>'+
			'<option value="eula"'; 
			htmlString += (category=='eula')? 'selected': ''; 
			htmlString +='>End User License Agreement</option>'+
			'<option value="dp"'; 
			htmlString += (category=='dp')? 'selected': ''; 
			htmlString +='>Data Privacy</option>'+
			'<option value="copyright"'; 
			htmlString += (category=='copyright')? 'selected': ''; 
			htmlString += '>Copyright</option>'+
			'</select>'+
			'</th>'+
			'</tr>'+
			'<tr>'+
			'<th>Explanation</th>'+
			'<th>'+
			'<textarea name="explanation" rows="5" class="form-control" >'+ explanation +'</textarea>'+
			'</th>'+
			'</tr>'+
			'</table>'+
			'<button class="btn" onclick="delData(\'';
			htmlString += id;
			htmlString += '\')"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button><br /><br />'+
			'<input type="hidden" name="supplier_name" value="" />'+
			'<input type="hidden" name="id" value="';
			htmlString += id;
			htmlString += '" />'+
			'</form>';
			$('#formC').append(htmlString);
		}
	</script>
</body>



</html>