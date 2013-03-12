<?php
echo '<meta http-equiv="refresh" content="300">';
echo "The page will refresh every 5 minutes.<br \>\n";
$localtime = date("Ymd H:i");
echo "On $localtime, your IP is: " . $_SERVER["REMOTE_ADDR"];
$fd = fopen("ip.txt", "a");
fputs($fd, date("Ymd H:i:s") . $_SERVER["REMOTE_ADDR"] . "\n");
fclose($fd);
echo "<br />Check IP history record: <a href='ip.txt'>ip.txt</a>";
?>
