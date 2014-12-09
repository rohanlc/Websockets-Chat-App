<html>
<head><title>Chat</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

<script>
$( document ).ready(function() {
 
   $("#input1").keyup(function (e) {
    if (e.keyCode == 13) {
        send1();
    }
});

$("#input2").keyup(function (e) {
    if (e.keyCode == 13) {
        send2();
    }
});
 
});



function send1(){
	var text1 = $('#input1').val();
	if(text1 == '') return false; 
	//var text1up = "<span style='color:red'>" + text1 + "</span><br/>"; 
	var pill1 = '<ul class="nav nav-pills" role="tablist" ><li role="presentation" class="active" ><a href="#" style="background-color: #B73347;">' + text1 + '<span class="badge"></span></a></li></ul><hr><br/>';
	
	$('#ch1').html($('#ch1').html() + pill1);
	$('#input1').val('');
	var datastring = "text=" + text1 + "&from=1&to=2";
	$.get("/rohan/backend.php", datastring, 
		function(response){
			var pill12 = '<ul class="nav nav-pills pull-right" role="tablist" ><li role="presentation" class="active" ><a href="#" >' + response + '<span class="badge"></span></a></li></ul><br/><hr>';
			$('#ch2').html($('#ch2').html() + pill12);
			$('#ch1').scrollTop($('#ch1').prop('scrollHeight'));
			$('#ch2').scrollTop($('#ch2').prop('scrollHeight'));
		}
	);
}

function send2(){
	var text2 = $('#input2').val();
	if(text2 == '') return false;
	//var text1up = "<span style='color:red'>" + text1 + "</span><br/>"; 
	var pill2 = '<ul class="nav nav-pills" role="tablist" ><li role="presentation" class="active" ><a href="#" style="background-color: #B73347;">' + text2 + '<span class="badge"></span></a></li></ul><hr><br/>';
	
	$('#ch2').html($('#ch2').html() + pill2);
	$('#input2').val('');
	$.get("/rohan/backend.php", "text=" + text2, 
		function(response){
			var pill21 = '<ul class="nav nav-pills pull-right" role="tablist" ><li role="presentation" class="active" ><a href="#" >' + response + '<span class="badge"></span></a></li></ul><br/><hr>';
			$('#ch1').html($('#ch1').html() + pill21);
			$('#ch1').scrollTop($('#ch1').prop('scrollHeight'));
			$('#ch2').scrollTop($('#ch2').prop('scrollHeight'));
		}
	);
}
</script>
</head>
<body>

<div class="container">
<div class="row">
<div class="col-lg-12">
<h1>Chat! On Mirraw.com</h1>
</div>
</div>
<div class="row">
</div>
<div class="row">
	<div class="col-lg-6">
	<ul class="nav nav-pills" role="tablist">
	  <li role="presentation" class="active"><a href="#">Chatting with Rohan... <span class="badge" id="notif1">42</span></a></li>
	</ul>
		<div id="ch1" style="overflow-y:scroll; height:450px;">
			
		</div>
	</div>
	<div class="col-lg-6">
	<ul class="nav nav-pills" role="tablist">
	  <li role="presentation" class="active"><a href="#">Chatting with Neha... <span class="badge" id="notif2">42</span></a></li>
	</ul>
		<div id="ch2" style="overflow-y:scroll; height:450px;">
			
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		<div class="input-group">
		  <span class="input-group-addon"></span>
		  <input type="text" class="form-control" placeholder="type here..." id="input1">
		</div>
		<button type="button" class="btn btn-default navbar-btn" onclick="javascript:send1();">Send</button>
	</div>	
	<div class="col-lg-6">
		<div class="input-group">
		  <span class="input-group-addon"></span>
		  <input type="text" class="form-control" placeholder="type here..." id="input2">
		</div>
		<button type="button" class="btn btn-default navbar-btn" onclick="javascript:send2();">Send</button>
	</div>
</div>	
</div>


</body>
</html>