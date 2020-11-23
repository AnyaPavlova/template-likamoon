<?php
	header("Content-Type: text/html; charset=utf-8");
	
	# Configuration
	#
	define('DESTINATION', 'anjutalove@gmail.com');
	define('DESTINATION2', 'likamoon@list.ru');
	define('SCRIPT_URI',  'jquery-mailer.php');
		
	###############################################################
	
	function ok ($e = '') {
		header("Content-Type: application/json");
		print json_encode(array("status" => "ok", "error" => $e));
		exit();
	}
	
	function not_ok ($e) {
		header("Content-Type: application/json");
		print json_encode(array("status" => "not ok", "error" => $e));
		exit();
	}
		
	#Форма обратной связи
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST["formType"] == "feedback" )
	{				
		
		$_subject = isset($_POST["formSubject"]) ? filter_var($_POST['formSubject'], FILTER_SANITIZE_STRING) :  null;		
		$subject = "Заявка с сайта Skoda: " . $_subject ;	
		
		$message = "Информация:		
		Телефон:            ".(isset($_POST["phone"]) ?             filter_var($_POST['phone'],            FILTER_SANITIZE_STRING) :  null)."		
		Заявка: 				$_subject 
		Время заявки:       ".date("Y-m-d H:i:s")."
		";
		
		$headers =  "From: info@" . $_SERVER['HTTP_HOST']. "\r\n" .
		"Reply-To: info@" . $_SERVER['HTTP_HOST']. "\r\n" .
		"Content-type: text/plain; charset=\"utf-8\"" . "\r\n" .
		"X-Mailer: PHP/" . phpversion();

		if ( mail(DESTINATION, $subject, $message, $headers) && mail(DESTINATION2, $subject, $message, $headers) )
        ok();
		else
        not_ok("Ошибка. Возможно функция mail отключена. Обратитесь к хостинг-провайдеру.");		
	}

	#Форма ПОЛУЧИТЬ ПРЕДЛОЖЕНИЕ
	elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST["formType"] == "action" )
	{	
		$_subject = isset($_POST["formSubject"]) ? filter_var($_POST['formSubject'], FILTER_SANITIZE_STRING) :  null;		
		$subject = "Заявка с сайта Skoda: " . $_subject ;				
		
		$message = "Информация:				
		Имя:            ".(isset($_POST["name"]) ?             filter_var($_POST['name'],            FILTER_SANITIZE_STRING) :  null)."		
		Фамилия:            ".(isset($_POST["secondname"]) ?             filter_var($_POST['secondname'],            FILTER_SANITIZE_STRING) :  null)."			
		Телефон:            ".(isset($_POST["phone"]) ?             filter_var($_POST['phone'],            FILTER_SANITIZE_STRING) :  null)."
		E-mail:            ".(isset($_POST["email"]) ?             filter_var($_POST['email'],            FILTER_SANITIZE_STRING) :  null)." 
		Город:            ".(isset($_POST["city"]) ?             filter_var($_POST['city'],            FILTER_SANITIZE_STRING) :  null)." 
		Дилер:            ".(isset($_POST["dealer"]) ?             filter_var($_POST['dealer'],            FILTER_SANITIZE_STRING) :  null)." 
		Модель:            ".(isset($_POST["model"]) ?             filter_var($_POST['model'],            FILTER_SANITIZE_STRING) :  null)." 
		Заявка: 				$_subject 
		Время заявки:       ".date("Y-m-d H:i:s")."
		";
		
		$headers =  "From: info@" . $_SERVER['HTTP_HOST']. "\r\n" .
		"Reply-To: info@" . $_SERVER['HTTP_HOST']. "\r\n" .
		"Content-type: text/plain; charset=\"utf-8\"" . "\r\n" .
		"X-Mailer: PHP/" . phpversion();

		if ( mail(DESTINATION, $subject, $message, $headers) && mail(DESTINATION2, $subject, $message, $headers) )
        ok();
		else
        not_ok("Ошибка. Возможно функция mail отключена. Обратитесь к хостинг-провайдеру.");		
	}

	#Форма Записаться на обслуживание
	elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST["formType"] == "signUp" )
	{	
		$_subject = isset($_POST["formSubject"]) ? filter_var($_POST['formSubject'], FILTER_SANITIZE_STRING) :  null;		
		$subject = "Заявка с сайта Skoda: " . $_subject ;				
		
		$message = "Информация:				
		Имя:            ".(isset($_POST["name"]) ?             filter_var($_POST['name'],            FILTER_SANITIZE_STRING) :  null)."		
		Телефон:            ".(isset($_POST["phone"]) ?             filter_var($_POST['phone'],            FILTER_SANITIZE_STRING) :  null)."		
		Дилер:            ".(isset($_POST["dealer"]) ?             filter_var($_POST['dealer'],            FILTER_SANITIZE_STRING) :  null)." 		
		Заявка: 				$_subject 
		Время заявки:       ".date("Y-m-d H:i:s")."
		";
		
		$headers =  "From: info@" . $_SERVER['HTTP_HOST']. "\r\n" .
		"Reply-To: info@" . $_SERVER['HTTP_HOST']. "\r\n" .
		"Content-type: text/plain; charset=\"utf-8\"" . "\r\n" .
		"X-Mailer: PHP/" . phpversion();

		if ( mail(DESTINATION, $subject, $message, $headers) && mail(DESTINATION2, $subject, $message, $headers) )
        ok();
		else
        not_ok("Ошибка. Возможно функция mail отключена. Обратитесь к хостинг-провайдеру.");		
	}

	elseif ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		not_ok("Все поля обязательны к заполнению");
	}		
	
?>