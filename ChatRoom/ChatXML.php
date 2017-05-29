<?php
header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';

$text = $_GET['TextInput'];

$file = fopen('chatRecord.txt','a');
if(!empty($text)){
fwrite($file,$text." ");
}
fclose($file);

echo '<response>';

$read = file('chatRecord.txt');

foreach($read as $text){
if(!empty($text)){
	echo $text;
}
}

echo '</response>';
?>
