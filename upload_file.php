<?php

$destination_path = $_REQUEST["destination"] . "/"; 
$target_path = "/var/www/" . $destination_path;
$target_path = $target_path . basename( $_FILES['uploadedfile']['name']);
$fix_path = $destination_path . basename( $_FILES['uploadedfile']['name']);

echo "Source = " .        $_FILES['uploadedfile']['name'] . "<br />"; 
echo "Destination = " .   $destination_path . "<br />"; 
echo "Target path = " .   $target_path . "<br />"; 
echo "Size (bytes) = " .          $_FILES['uploadedfile']['size'] . "<br />"; 


if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
    echo "File: ".  basename( $_FILES['uploadedfile']['name']). 
    " uploaded successfully.<br><br>";
	$path_no_spaces = str_replace(' ', '%20', $fix_path);
	echo "<a style=\"font-family:'Roboto';padding:10px;\" href=/" . $path_no_spaces . '>File link</a>';
} else{
    echo "An error occurred while uploading the file.";
}
?>
