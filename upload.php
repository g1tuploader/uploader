<?php
$timestamp = date("d-m-y H:i:s");
ini_set('memory_limit', '40M');
// A list of permitted file extensions
$allowed = array('png', 'jpg', 'gif','zip', 'rar', 'mp4', 'mp3', 'avi', 'txt', 'torrent', 'pdf', 'psd', 'exe', 'docx', 'pptx', 'xls', 'css', 'html', 'htm', 'js', 'woff', 'ttf', 'svg', 'eot');

if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}

	if(move_uploaded_file($_FILES['upl']['tmp_name'], 'downloads/files/'.$timestamp.'-'.$_FILES['upl']['name'])){
		echo '{"status":"success"}';
		exit;
	}
}
	
echo '{"status":"error"}';
exit;