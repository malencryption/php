<?php
$linkName = htmlspecialchars($_POST["linkName"]);
$linkHref = htmlspecialchars($_POST["linkHref"]);

echo $linkName;
echo $linkHref;

$filename = "links.txt";
$file = fopen($filename, "a");


$line = $linkName ." | " .$linkHref . "\n";

fwrite($file, $line);

fclose($file);

header("Location: showLinks.php");
die();
?>
