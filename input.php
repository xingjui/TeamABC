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
			<div id="content-nav-right-top" class="well">
				<ul class="nav nav-pills nav-stacked">
					<li>
						<a href="#">Term Of Service</a>
					</li>
					<li>
						<a href="#">End User License Agreement</a>
					</li>
					<li>
						<a href="#">Data Privacy</a>
					</li>
					<li>
						<a href="#">Copyright</a>
					</li>
				</ul>
			</div>
			
			<div id="content-guide-right-bottom" class="well" style="height:100%;">
				<ul class="nav">
					<li>
						<a href="#"><p style="word-wrap:break-word;">
							Make a site with a clear hierarchy and text links. Every page should be reachable from at least one static text link.
						</p></a>
					</li>
					<li>
						<a href="#"><p style="word-wrap:break-word;">
							Offer a site map to your users with links that point to the important parts of your site. If the site map has an extremely large number of links, you may want to break the site map into multiple pages.
						</p></a>
					</li>
					<li>
						<a href="#"><p style="word-wrap:break-word;">
							Think about the words users would type to find your pages, and make sure that your site actually includes those words within it.
						</p></a>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div id="nothing" style="display:none;"></div>

	<script type="text/javascript">
		var i = 0;
		$(document).ready(function(){
			$('ul li').click(function(){
				$('ul li').removeClass('active');
				$(this).addClass('active');
			});

			$('button[type="submit"]').on("click", function(e){
				$('input[name=supplier_name]').val($('input[name=appname]').val());
				//console.log($('input[name=supplier_name]').val());

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
							AddWithVal(val['name'], val['briefy'], val['category'], val['explanation']);
						});
					}
				});
				e.preventDefault();
			});
});

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

function AddWithVal(name, briefy, category, explanation){
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
		'<input type="hidden" name="supplier_name" value="" />'+
		'</form>';
		$('#formC').append(htmlString);
	}
</script>
</body>



</html>