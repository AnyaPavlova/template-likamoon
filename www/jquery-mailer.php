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
		
	#Форма НАПИШИТЕ НАМ
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST["formType"] == "write-us" )
	{				

		$data_name = isset($_POST['name']) ? filter_var($_POST['name'], FILTER_SANITIZE_STRING) : null;
		if (!$data_name) {
			not_ok("Проверьте указано ли Имя");
		}	
		$data_email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_STRING) : null;
		if (!$data_email) {
			not_ok("Проверьте указан ли Email");
		}				
		$_subject = isset($_POST["formSubject"]) ? filter_var($_POST['formSubject'], FILTER_SANITIZE_STRING) :  null;
		
		$subject = "Заявка с сайта Tetrastroy: " . $_subject . " от $data_name";
		
		$message = "Информация:
		Имя:            ".(isset($_POST["name"]) ?             filter_var($_POST['name'],            FILTER_SANITIZE_STRING) :  null)."
		Email:            ".(isset($_POST["email"]) ?             filter_var($_POST['email'],            FILTER_SANITIZE_STRING) :  null)."
		Телефон:            ".(isset($_POST["phone"]) ?             filter_var($_POST['phone'],            FILTER_SANITIZE_STRING) :  null)."
		Сообщение:            ".(isset($_POST["info"]) ?             filter_var($_POST['info'],            FILTER_SANITIZE_STRING) :  null)."
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
        not_ok("Ошибка. Возможно функция mail отключена. Обратитесь к хостинг-провайдеру или возьмите консультацию на сайте, где купили шаблон");		
	}

	elseif ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		not_ok("Все поля обязательны к заполнению");
	}	

	elseif ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		not_ok("Все поля обязательны к заполнению");
	}
	
	header("Content-Type: text/javascript");
	
?>