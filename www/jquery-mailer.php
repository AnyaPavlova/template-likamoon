<?php
header("Content-Type: text/html; charset=utf-8");

# Configuration
#
define('DESTINATION', 'anjutalove@gmail.com');
define('DESTINATION2', 'likamoon@list.ru,info@likamoon.ru,likamoon01@gmail.com');
define('SCRIPT_URI',  'jquery-mailer.php');

###############################################################

function ok($e = '')
{
  header("Content-Type: application/json");
  print json_encode(array("status" => "ok", "error" => $e));
  exit();
}

function not_ok($e)
{
  header("Content-Type: application/json");
  print json_encode(array("status" => "not ok", "error" => $e));
  exit();
}

#Сохраняем данные в csv-файлик
function catch2csv($array) {
  $error = "";
  $fp = fopen("registration.csv", "a");

  fwrite($fp, date("Y-m-d H:i:s") . ";");

  foreach ($array as $t) {
    // fwrite($fp, iconv("UTF8", "CP1251", $t) . ";");

    if (gettype($t) != 'array') {
      fwrite($fp, iconv("UTF8", "CP1251", $t) . ";");
    } else {
      foreach( $t as $t2 ) {
        fwrite($fp, iconv("UTF8", "CP1251", $t2) . ",");
      }
      fwrite($fp, ";");
    }
  }
  fwrite($fp,  " " . "\r\n");
  fclose($fp);
  return $error;
}

#Форма
if ($_SERVER['REQUEST_METHOD']) {

  $_subject = isset($_POST["formSubject"]) ? filter_var($_POST['formSubject'], FILTER_SANITIZE_STRING) :  null;
  $subject = "Заявка с сайта Медпром: " . $_subject;

  $info;

  foreach ($_POST as $key => $value) {
    $infoArr[$key] = $value;

    if (($key != "formType") and ($key != "formSubject")) {
      if (gettype($value) != 'array') {
        $info = $info . "\n" . $key . ": " . $value;
      } else {
        $info = $info . "\n" . $key . ": " ;
        foreach( $value as $key2 => $value2 ) {
          $info = $info . "\n	" . $value2 ;
        }
      }
    }
  }

  catch2csv($infoArr);

  $message = "Информация:
    $info

Заявка: 		$_subject
Время заявки:       " . date("Y-m-d H:i:s") . "
		";

  $headers =  "From: info@" . $_SERVER['HTTP_HOST'] . "\r\n" .
    "Reply-To: info@" . $_SERVER['HTTP_HOST'] . "\r\n" .
    "Content-type: text/plain; charset=\"utf-8\"" . "\r\n" .
    "X-Mailer: PHP/" . phpversion();

  #Отправка письма клиенту
  $mailClient;
  foreach ($_POST as $key => $value) {
    $infoArr[$key] = $value;
    if (($key == "email")) {
      $mailClient = $value;
    }
  }
  $subjectForClient = "Уведомление с сайта Medprom";
  $messageForClient ="Ваша заявка с сайта Medprom принята. Мы свяжемся с вами в ближайшее время!";
  mail($mailClient, $subjectForClient, $messageForClient, $headers);
  #End Отправка письма клиенту

  if (mail(DESTINATION, $subject, $message, $headers) && mail(DESTINATION2, $subject, $message, $headers))
    ok();
  else
    not_ok("Ошибка. Возможно функция mail отключена. Обратитесь к хостинг-провайдеру.");

} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
  not_ok("Все поля обязательны к заполнению");
}

?>

