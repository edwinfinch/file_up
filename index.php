<?php
$password = "password";
$username = "username";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>File Upload</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
<link href='http://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/buttons.css">
<link rel="stylesheet" href="css/buttons-core.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

<script>
   function chooseFile() {
      document.getElementById("uploadInput").click();
   }
</script>

<script>
   function changeName() {
      var x = document.getElementById("uploadInput").value;
	  
	  if(x === ''){
		x = "No file!";
	  }
	  
	  document.getElementById("fileDisplay").innerHTML = x;
   }
</script>

</head>
<body>
<?php 
// If password is valid let the user get access
if (isset($_POST["password"]) && ($_POST["password"]=="$password") && ($_POST["username"]=="$username")) {
?>
<!-- START OF HIDDEN HTML - PLACE YOUR CONTENT HERE -->

<html>
<head></head>
<body>
<div align="center">
<form enctype="multipart/form-data" action="upload_file.php" 
	method="post">
<p>
<h2 style="font-family:'Roboto';padding:10px;">File</h2>
<!--<input type="file" size="35" name="uploadedfile" class="pure-button"/>-->
<div style="height:0px;overflow:hidden">
   <input type="file" size="35" id="uploadInput" name="uploadedfile" onchange="changeName();"/>
</div>
<button type="button" onclick="chooseFile();" class="pure-button" id="fileDisplay">Choose File</button>
<br>
<h4 id="fileChosen"></h4>

<h2 style="font-family:'Roboto';padding:10px;">Destination</h2>
<input type="text" size="35" name="destination" 
       value= "<?php echo $_ENV["USER"];?>" />
<br><br>
<input type="submit" name="Upload" value="Upload" class="pure-button pure-button-primary"/>
</p>
</form>
</div>
</body>
</html>

<!-- END OF HIDDEN HTML -->
<?php 
}
else
{
// Wrong password or no password entered display this message
if (isset($_POST['password']) || $password == "") {
  print "<p align=\"center\" style=\"font-family:'Roboto';padding:10px;\"><font color=\"red\"><b>Incorrect.</b><br>Re-enter password/username combo.</font></p>";}
  print "<form method=\"post\"><p style=\"font-family:'Roboto';padding:10px;\">Username:<br>";
  print "<input name=\"username\" type=\"text\" size=\"25\" maxlength=\"10\">";
  print "<p style=\"font-family:'Roboto';padding:10px;\">Password:<br>";
  print "<input name=\"password\" type=\"password\" size=\"25\" maxlength=\"10\"><br><br><input value=\"Login\" type=\"submit\" class=\"pure-button pure-button-primary\"></p></p></form>";
}
?>
<BR>
</body>
</html>
