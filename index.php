<?php

function get_ip() {
    if($_SERVER['HTTP_HOST'] == 'localhost' ){
        $ip = '127.0.0.1';
    }elseif(isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
#echo '<pre>';
#print_r($_SERVER);
#echo '</pre>';

$interval = 300;
if(isset($_GET['int']))
	if( is_numeric($_GET['int']))
		$interval = $_GET['int'];

$ip = get_ip();
$date = date("Y m d  H:i:s");

$fd = fopen('ip.txt', 'a');
fputs($fd, $date.'  '.$ip. "\n");
fclose($fd);


?>

<html>
   <head>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
        <meta http-equiv="refresh" content="<?php echo $interval ?>">
        <title>Myip address</title>
        <style>
		html{
			margin:0px;
			overflow-x:hidden;
		}

		div{
			font-size: 4vh;
			text-align: center; 
			margin: auto;
			width: 100%; 
			position: absolute;
		}

        </style>
   </head>
   <body>
       <div>
<h1>Your IP is: <?php echo $ip ?></h1><br />
<h3>On <?php echo $date ?></h3></br>
<h5>The page will refresh every <?php echo $interval ?> seconds ~<?php echo round($interval/60,1) ?> minutes.</br>
<a href='ip.txt'>Check IP history record</a></h5>

       </div>
   </body>
</html>
