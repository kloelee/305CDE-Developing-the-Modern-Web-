<?php
session_start();
	if(!isset($_SESSION['user'] )) header('Location: index.html');

 ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
<script type="text/javascript" src="js/jquery.js"></script>
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js'></script>
<title>Message to Us</title>

<script>
function reloadlist(){
	$("#JSON_table").empty();
	$.ajax({ 
		url: "get_comment.php", 
		type: "GET", 
		dataType: "json", 
		success: function(guest) { 
			$.each(guest, function(k,v) {
				if(v.updatable == 1){
					$("#JSON_table").append("<tr>" + "<td width='30%';>Username: " + v.guestName + "<br> Email: " + v.guestEmail + "<br>Comment Time : " + v.guestTime + "</td>" + "<td><table width='100%' height='100%'><tr><td>Subject: <input type='text' guest=\""+v.id+"\"  id=\"Subject\" style=\"width: 80%;\" value=\"" + v.guestSubject + "\" /></td></tr>" + "<tr><td  colspan='3' valign='top' style='height:100px'><hr><textarea id=\"commentText\" guest=\""+v.id+"\"  style=\"    display: inline-block;    width: 97%; height:100%;   margin: 10px auto;    height: 30px;    vertical-align: middle;\">" + v.guestContent + "</textarea></td></tr></table></td>" + "</tr>"); if(v.updatable == 1) $("#JSON_table").append("<tr style='text-align:center'><td colspan='2'><button id='delete'guest=\""+v.id+"\"  class='button2'>。Remove Message。</button><button id=\"edit\" guest=\""+v.id+"\" class=\"button2\">  。Edit Message。</button></td></tr>");
				}else{
				
					$("#JSON_table").append("<tr>" + "<td width='30%';>Username: " + v.guestName + "<br> Email: " + v.guestEmail + "<br>Comment Time : " + v.guestTime + "</td>" + "<td><table width='100%' height='100%'><tr><td>Subject: " + v.guestSubject + "</td></tr>" + "<tr><td  colspan='3' valign='top' style='height:100px'><hr>" + v.guestContent + "</td></tr></table></td>" + "</tr>"); 
				}});
			$("#delete").click(function() {						  
					$.ajax({
					  url:'get_comment.php',
					  type:"DELETE",
					  dataType : 'text',
					  data:{ id : $(this).attr('guest') },
					success: function(msg, status){
							reloadlist();
					   
							},
							 error:function(xhr, ajaxOptions, thrownError){
								alert(xhr.status);
								alert(thrownError);
							 }
						});
			   return false;
			});			
			$("#edit").click(function() {
					$.ajax({
					  url:'get_comment.php',
					  type:"PUT",
					  dataType : 'text',
					  data:{ id : $(this).attr('guest'), subject: $("#Subject[guest='"+$(this).attr('guest')+"']").val(),  comment: $("#commentText[guest='"+$(this).attr('guest')+"']").val() },
					success: function(msg, status){
							reloadlist();
					   
							},
							 error:function(xhr, ajaxOptions, thrownError){
								alert(xhr.status);
								alert(thrownError);
							 }
						});
			   return false;
			});
			
		}, 
		error: function(xhr, ajaxOptions, thrownError) { 	
			alert(xhr.status);
			alert(thrownError); } 
	});
		
}

$(function(){
	reloadlist();
$("#LeaveComment").click(function(){
	if($("#Subject").val().trim() == '' || $("#commentText").val().trim() == '') { alert('Please enter Subject and Comment Msg'); return; }
	$.post("leaveComment.php",{ subject : $("#Subject").val(),  comment: $("#commentText").val() },function(){
		reloadlist();
		$("#Subject,#commentText").val('');
	});
	return false;
});
$("#update").click(function() {
	var newpass=$("#updatecontent").val();
	
    var myData = 'guestName='+guestName+'&updatecontent='+updatecontent;
	 			
        $.ajax({
  		  	 url:'comment2.php',
  			   type:"PUT",
           dataType : 'text',
  			   data:myData,
        success: function(msg, status){
    				alert(msg);
        
                },
                 error:function(xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(thrownError);
                 }
            });
   
});



});
</script>


<style>


form {
	margin: 100 auto;
	font-family: Tahoma;
	font-size: 14px;
	background-image: url("img/bg.png");
	background-repeat: no-repeat;
	background-size: 100% 100%;
	text-align: center;
	display: inline-block;
	width: 100%;
	position: absolute;
	color:#066;
	font-weight: bold;
}

.button3 {
	margin: 10px 10px 10px 10px;
	background:#099;
	width:180px;
	color:#fff;
	border-radius:10px;
	border:0px;
	padding:10px;
	font-size:16px;
	font-family:tahoma;
}

.button3:hover {
	color:#6CC;
	background:transparent ;
	cursor:pointer;
	font-weight: bold;
	text-align:center;
}


.button2 {
	margin:10px;
	background:#0CC;
	color:#fff;
	border-radius:5px;
	border:0px;
	padding:4px;
	text-align: center;
	width:150px;
}

.button2:hover {
	color: #099;
	background: transparent;
	cursor: pointer;
	font-weight: bold;
}

.container {
	border: 3px solid #f1f1f1;
	margin: 20px 20px 10px 20px;
	background: #0CC;
	width:85%;
	-webkit-border-radius: 3px 3px 50px 3px;
	border-radius: 3px 3px 50px 3px;
	text-align: center;
}


.container2 {
	margin-top:15px;
    padding: 10px;
    width:auto;
	bottom: 0;	
}

.container2 p {
	font-size: 10px;
	font-family:Tahoma;
	margin: center;
}

.container0 {
	margin:0 0 10px 0;
    padding: 16px;
    width:auto;
	height:10px;
}
.container0 p {
	font-size: 18px;
	font-family: Tahoma;
	margin: -2px 0 12px 0;
	font-weight: bold;
	color: #FFF;
}

.container3 {
	border: 3px solid #f1f1f1;
	margin: 20px 20px 10px 20px;
	background: #6CC;
	width:85%;
	-webkit-border-radius: 3px 3px 50px 3px;
	border-radius: 3px 3px 50px 3px;
	text-align: center;
}

#JSON_table {
	vertical-align:top;
	text-align: left;
  font-family: 'Arial';
  margin: 25px auto;
  border-collapse: collapse;
  border: 1px solid #fff;
  border-bottom: 2px solid #fff;
  box-shadow: 0px 0px 20px rgba(0,0,0,0.10),
     0px 10px 20px rgba(0,0,0,0.05),
     0px 20px 20px rgba(0,0,0,0.05),
     0px 30px 20px rgba(0,0,0,0.05);	 
    }
 
#JSON_table td {
    vertical-align: top;
	background:white;
    color: #099;
    border: 1px solid #6CC;
    border-collapse: collapse;
	font-weight: bold;
	padding:0px
  }
  
#JSON_table  th {
    background:#6CC;
    color: #fff;
    text-transform: uppercase;
    font-size: 12px;
    }

	#comment_box{		
		margin: auto;
		background:white;
		width:80%;
	}
	#comment_box td{
		border: 1px solid #6CC;
		border-collapse: collapse;
		padding:10px;
	}
	
</style>


</head>


<body>
<form id="comment2">

<div class="container0" style="background-color:#6CC">
<p>。 Comment 。</p> </div>
<div class="container">
<br>
<table id='comment_box'><tr><td>Subject : </td><td><input type='text' id="Subject" style="width: 80%;" /></td></tr><tr><td>Comment : </td><td>
<textarea id="commentText" style="
    display: inline-block;
    width: 80%;
    margin: 10px auto;
    height: 30px;
    vertical-align: middle;
"></textarea></td></tr></table>
 <a href="comment.html"><input type="submit" class="button3" id="LeaveComment" value="。 LeaveComment 。"></a>
</div>
<div class="container3">
<table id="JSON_table" border="5" width="87%" CELLPADDING="4" CELLSPACING="3">
</table>
</div>
</div>
</div>

<div align="center"><a href=frontpage.html class="button"><img src="img/homepage.png" width="82" height="45"></a></div>
 <div class="container2" align="center" style="background-color:#6CC">
  <p>®Designed by Kloe</p>  
  </div>
</form>

</body>
</html>

