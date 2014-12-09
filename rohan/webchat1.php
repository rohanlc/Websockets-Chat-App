<html>
<head><title>Chat</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

<script>/*
$( document ).ready(function() {
 
   $("#input1").keyup(function (e) {
    if (e.keyCode == 13) {
        send1();
    }
});

poll();
 
});

function poll() {
   setTimeout(function() {
       $.get("/rohan/fetch.php",  "from=2", function(response){
	   if(response.length != 2){
            var pill12 = '<ul class="nav nav-pills pull-right" role="tablist" ><li role="presentation" class="active" ><a href="#" >' + response + '<span class="badge"></span></a></li></ul><br/><hr>';
			$('#ch1').html($('#ch1').html() + pill12);
			$('#ch1').scrollTop($('#ch1').prop('scrollHeight'));}
			//$('#ch2').scrollTop($('#ch2').prop('scrollHeight'));
			poll();
			});
    }, 3000);
}

function send1(){
	var text1 = $('#input1').val();
	if(text1 == '') return false; 
	//var text1up = "<span style='color:red'>" + text1 + "</span><br/>"; 
	var pill1 = '<ul class="nav nav-pills" role="tablist" ><li role="presentation" class="active" ><a href="#" style="background-color: #B73347;">' + text1 + '<span class="badge"></span></a></li></ul><hr><br/>';
	
	$('#ch1').html($('#ch1').html() + pill1);
	$('#input1').val('');
	var datastring = "text=" + text1 + "&from=1&to=2";
	$.get("/rohan/backend.php",  datastring, 
		function(response){
			
		}
	);
}
*/
</script>

<script>
var socket;

function init(){
  var host = "ws://localhost:8080/rohan/chat-server.php";
  try{
    socket = new WebSocket(host);
    log('WebSocket - status '+socket.readyState);
    socket.onopen    = function(msg){ log("Welcome - status "+this.readyState); };
    socket.onmessage = function(msg){ log("Received: "+msg.data); };
    socket.onclose   = function(msg){ log("Disconnected - status "+this.readyState); };
  }
  catch(ex){ log(ex); }
  $("msg").focus();
}

function send(){
  var txt,msg;
  txt = $("msg");
  msg = txt.value;
  if(!msg){ alert("Message can not be empty"); return; }
  txt.value="";
  txt.focus();
  try{ socket.send(msg); log('Sent: '+msg); } catch(ex){ log(ex); }
}
function quit(){
  log("Goodbye!");
  socket.close();
  socket=null;
}

// Utilities
function $(id){ return document.getElementById(id); }
function log(msg){ $("log").innerHTML+="<br>" + '<ul class="nav nav-pills" role="tablist" ><li role="presentation" class="active" ><a href="#" >' + msg + '<span class="badge"></span></a></li></ul>'; }
function onkey(event){ if(event.keyCode==13){ send(); } }
</script>

</head>
<body onload="init()">

<div class="container">
<div class="row">
<div class="col-lg-12">
<h1>Chat! On Mirraw.com</h1>
</div>
</div>
<div class="row">
</div>
<div class="row">
<div class="col-lg-3">
	
	</div>
	<div class="col-lg-6">
	<ul class="nav nav-pills" role="tablist">
	  <li role="presentation" class="active"><a href="#">Client 1... <span class="badge" id="notif1"></span></a></li>
	</ul>
		<div id="log" style="overflow-y:scroll; height:450px;">
			
		</div>
	</div>
	<div class="col-lg-3">
	
	</div>
</div>
<div class="row">
<div class="col-lg-3">
	
	</div>
	<div class="col-lg-6">
		<div class="input-group">
		  <span class="input-group-addon"></span>
		  <input type="text" class="form-control" placeholder="type here..." id="msg" onkeypress="onkey(event)">
		</div>
		<button type="button" class="btn btn-default navbar-btn" onclick="send()">Send</button>
	</div>	
	<div class="col-lg-3">
	
	</div>
</div>	
</div>


</body>
</html>