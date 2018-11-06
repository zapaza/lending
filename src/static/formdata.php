<?php

$to = 'm.a.platonov@yandex.ru'; //m.a.platonov@yandex.ru
$to = 'igor@coffeestudio.ru'; //igor@coffeestudio.ru
$to1 = 'support@coffeestudio.ru'; //support@coffeestudio.ru
$to2 = '';
$to3 = '';
$to4 = 'html@coffeestudio.ru';


$from = "no-reply1@coffeestudio.ru"; //from whom
$filename = 'faq.txt'; //name of file !!!Check out that file exists!!!

/* <Magic lines> */
//require '../../coffee/misc/mailer.php';
require '/var/lib/coffee/misc/mailer.php';

$mail = make_mailer('smtp.yandex.ru', $from, 'NrZ03ujK2016', 'UTF-8');
/* </Magic lines> */

if(isset($_POST) && count($_POST)>1) {
    $text = '<strong>'.date('Y-m-d H:i')."</strong> <br><br>\r\n";
    foreach($_POST as $key => $value) {
        $text .= $key.': '.$value."  <br>\r\n";
    }

    //ip and browser (if needed)
    if (isSet($_SERVER)) {
            if (isSet($_SERVER["HTTP_X_FORWARDED_FOR"])) $myip = $_SERVER["HTTP_X_FORWARDED_FOR"];
            elseif (isSet($_SERVER["HTTP_CLIENT_IP"])) $myip = $_SERVER["HTTP_CLIENT_IP"];
            else $myip = $_SERVER["REMOTE_ADDR"];
    } else {
            if ( getenv( 'HTTP_X_FORWARDED_FOR' ) ) $myip = getenv( 'HTTP_X_FORWARDED_FOR' );
            elseif ( getenv( 'HTTP_CLIENT_IP' ) ) $myip = getenv( 'HTTP_CLIENT_IP' );
            else $myip = getenv( 'REMOTE_ADDR' );
    }
    $ippos = strrpos($myip,', ')+2;
    if ($ippos > 2) $myip = substr($myip, $ippos);
    $w=getenv('HTTP_USER_AGENT');

    $text .= '<br>IP: '.$myip." <br>\r\n";
    // $text .= 'Browser: '.$w." <br>\r\n";


    //send e-mail
    $subject = 'Заявка с сайта ООО «ЛМ Групп»';
    // $subject = "=?utf-8?B?".base64_encode($subject)."?=";
    $headers = "Content-Type: text/html; charset=utf-8\nContent-Transfer-Encoding: 8bit\nMime-Version: 1.0\nReply-To: {$from}\nX-Mailer: PHP/".phpversion();
    $body = $text;
    $mail($to, $subject , $body, $headers);
	$mail($to1, $subject , $body, $headers);
	$mail($to2, $subject , $body, $headers);
	$mail($to3, $subject , $body, $headers);
	$mail($to4, $subject , $body, $headers);

    //write to a file
    if(file_exists($_SERVER['DOCUMENT_ROOT'].'/'.$filename)) {
       $fp = fopen($filename, 'a');

       $test = fwrite($fp, $text . "\r\n\r\n");
       if(!$test) die('Error<br><a href="/">go back</a>');
       fclose($fp);
    }

}
