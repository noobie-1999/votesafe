<?php
$otp = $_COOKIE['otp'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="stylesheets/otp.css">
  <link rel="stylesheet" type="text/css" href="stylesheets/hover.css"/>
  <link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	<title>Enter Report</title>

</head>


<body >

<nav class="navabar">
  <div class="logo">
    <a href="index.php"><img class="logopic" src="img/votesafelogo.png"></a>
  </div>
  <ul class="butlist">
    <span class="butres">
      <li class="hvr-glow">
        <a href="">ABOUT</a>
      </li>
      <li class="hvr-glow">
        <a href="">NEWSFEED</a>
      </li>
    </span>
  </ul>
</nav>

<div class="container">
  <form id="check_otp" action="verify.php" method="post">
    <fieldset>
    	<input id="text_field" type="text" placeholder="Enter your OTP" name="otp">
    </fieldset>
    <input id="verify_but" type="submit" value="Verify OTP">
  </form>
</div>

<div id="resp_modal" class="modal">
  <div class="modal-body">
    <span class="close">&times;</span>
    <p id="response"></p>
  </div>
</div>
<?php
if(isset($_POST['otp'])){
	//echo('hi');
	$ootp = $_POST['otp'];
	//echo($ootp);
	if($otp==$ootp){
	echo ('
         <script>
		  document.getElementsByClassName("modal")[0].style.display = "block";
		  document.getElementById("response").innerHTML="The OTP entered is correct. Your report has been submitted. Close the dialog box to go to home page.";
		

		
	');
}
	else{
		echo ('
         <script>
		  document.getElementsByClassName("modal")[0].style.display = "block";
		  document.getElementById("response").innerHTML="The OTP entered is incorrect. Your report has not been submitted. Close the dialog box to go to home page.";
		

		');

}
	echo('
		document.getElementsByClassName("close")[0].onclick = function() {
		  document.getElementsByClassName("modal")[0].style.display = "none";
		  window.location.href="/votesafe/submitreport.php"
		}
		window.onclick = function(event) {
		  if (event.target == modal) {
		    document.getElementsByClassName("modal")[0].style.display = "none";
		    window.location.href="/votesafe/submitreport.php"
		  }
		}
		</script>
		</body>
		</html>

		');
}
?>
