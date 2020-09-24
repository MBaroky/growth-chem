<?php
require 'PHPMailer-master/PHPMailerAutoload.php';
$englishMessages = array(
"SUBMIT_SUCCESSFULLY"=>"<div id=sentMailSuc class=sentMailSuc>Your request has been sent. Please expect a call shortly from one of our Media Consultants.</div>#success_submit",
"SUBMIT_FAILED"=>"Failed#success_submit",
);
$arabicMessages = array(
"SUBMIT_SUCCESSFULLY"=>"<div id=sentMailSuc class=sentMailSuc>شكراً لإهتمامك، احد مندوبينا سيقوم بالإتصال بك قريباً.</div>#success_submit",
"SUBMIT_FAILED"=>"لم ينجح الارسال#success_submit",
);

if (!isset($_REQUEST['lang']) || $_REQUEST['lang'] == 'english'){
	$allMessages = $englishMessages;
}else if (@$_REQUEST['lang'] == 'arabic'){
	$allMessages = $arabicMessages;
}

if ( isset($_REQUEST['formRequesterFirstName']) && $_REQUEST['formRequesterFirstName'] != ''){
	//Email to send to address
     
	 $to = "m.baroky@yellow.com.eg";
	 	 $bcc = "a.atef@yellow.com.eg";

	
	// //Form Name
	// $formname = @$_REQUEST['formRequesterFormName'];
	// $utm_source = $_REQUEST["utm_source"];
	// $utm_language = $_REQUEST["utm_language"];
	// $utm_adname = $_REQUEST["utm_adname"];
	
	 
	//   if ($formname == "Free Directory Listing") {
	// 	 $to ="";

		 
	//  }
	//  /*else if ($formname == "free_business_profile") {
	// 	 $to ="r.saleh@yellow.com.eg";
	//  }*/
	//  else {
	// 	 $to ="";
		 
		 
	//  }
	 
	//  $bcc ="";
	 $subject="Yellow Media -- from: ";

	/**/


	//First Name Subject
	$firstname = htmlspecialchars(@$_REQUEST['formRequesterFirstName'], ENT_QUOTES);

	//Mobile from address
	$mobile = htmlspecialchars(@$_REQUEST['formRequesterMobile'], ENT_QUOTES);
	
	
	//Email
	$from = htmlspecialchars(@$_REQUEST['formRequesterEmail'], ENT_QUOTES);


	
	//companyname
	// $companyname = htmlspecialchars(@$_REQUEST['formRequesterCompanyName'], ENT_QUOTES);
	
	
	//businessactivity
	// $businessactivity = htmlspecialchars(@$_REQUEST['formRequesterBusinessActivity'], ENT_QUOTES);

	
	
	//city	
	// $city = @$_REQUEST['formRequesterCity'];
	
	
	//message	
	$message = htmlspecialchars(@$_REQUEST['formRequesterMessage'], ENT_QUOTES);

		
		
	//Checkbox
	// $checkBox = @$_REQUEST['formRequesterCheckBox'];
	//echo "test==>".$checkBox;
	
	// if ($checkBox == "1")
	// {
	// 	$checkBox = "yes";
	// 	}
	// else
	// {
	// 	$checkBox = "no";
	// 	}
	
	
	//tittle1	
	// $tittle1 = htmlspecialchars(@$_REQUEST['formRequesterJobTittle1'], ENT_QUOTES);
	
	
	//tittle2	
	// $tittle2 = htmlspecialchars(@$_REQUEST['formRequesterJobTittle2'], ENT_QUOTES);
	
	
	//website	
	// $website	 = htmlspecialchars(@$_REQUEST['formRequesterWebsite'], ENT_QUOTES);
	
	
	//facebook	
	// $facebook = htmlspecialchars(@$_REQUEST['formRequesterFacebook'], ENT_QUOTES);
	
	
	//timefrom	
	// $timefrom = @$_REQUEST['formRequesterTimefrom'];
	
	
	//formRequesterTimeto	
	// $timeto = @$_REQUEST['formRequesterTimeto'];
	
	//address
	// $address = htmlspecialchars(@$_REQUEST['formRequesterAddress'], ENT_QUOTES);

	
	
//	$emailContent = '';
//	$emailContent .= "from:".$from."\n";
//	$emailContent .= "mobile:".$mobile."\n";
//	$emailContent .= "message:".$message."\n";
//	$emailTemplateFile = fopen("form.html", "r");

	

	$emailContent = file_get_contents('form.html');
	

	$emailContent = preg_replace('/-##FIRSTNAME##-/',$firstname,$emailContent);
	
	$emailContent = preg_replace('/-##MOBILE##-/',$mobile,$emailContent);

	$emailContent = preg_replace('/-##EMAIL##-/',$from,$emailContent);
	
	// $emailContent = preg_replace('/-##ADDRESS##-/',$address,$emailContent);
	
	// $emailContent = preg_replace('/-##COMPANYNAME##-/',$companyname,$emailContent);
	
	// 	$emailContent = preg_replace('/-##BUSINESSACTIVITY##-/',$businessactivity,$emailContent);

	
	// $emailContent = preg_replace('/-##TITLE##-/',$tittle1,$emailContent);
	
	// $emailContent = preg_replace('/-##OTHER##-/',$tittle2,$emailContent);
	
	// $emailContent = preg_replace('/-##WEBSITE##-/',$website,$emailContent);
	
	// $emailContent = preg_replace('/-##FACEBOOK##-/',$facebook,$emailContent);
		
	// $emailContent = preg_replace('/-##CITY##-/',$city,$emailContent);
			
	// $emailContent = preg_replace('/-##checkBox##-/',$checkBox,$emailContent);
				
	$emailContent = preg_replace('/-##MESSAGE##-/',$message,$emailContent);
			
	// $emailContent = preg_replace('/-##UTM_SOURCE##-/',$utm_source,$emailContent);
			
	// $emailContent = preg_replace('/-##UTM_LANGUAGE##-/',$utm_language,$emailContent);
	
	// $emailContent = preg_replace('/-##UTM_ADNAME##-/',$utm_adname,$emailContent);
			
			
	// $emailContent = preg_replace('/-##TIMEFROM##-/',$timefrom,$emailContent);
			
	// $emailContent = preg_replace('/-##TIMETO##-/',$timeto,$emailContent);
			
	// $emailContent = preg_replace('/-##ADDRESS##-/',$address,$emailContent);




	

	// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	
	
	// Additional headers
	$headers .= 'To: <'.$to.'>' . "\r\n";
	$headers .= "From:" . $from . "\r\n";
	$headers .= 'Bcc: ' . $bcc . "\r\n";



	if ( @mail($too,$subject,$emailContent,$headers) ){
		$endFormMessage = $allMessages['SUBMIT_SUCCESSFULLY'];
	} else {
		//$endFormMessage = $allMessages['SUBMIT_FAILED'];
		$mail = new PHPMailer;
 
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->SMTPDebug = 0;
		$mail->Host = 'smtpout.secureserver.net';                       // Specify main and backup server
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'noreply@solutions.yellowpages.com.eg';          // SMTP username
		$mail->Password = 'eLg1Z@1F';               	// SMTP password
		//$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
		$mail->Port = 80;                                    //Set the SMTP port number - 587 for authenticated TLS
		$mail->setFrom('noreply@solutions.yellowpages.com.eg', 'Yellow Media');     //Set who the message is to be sent from
		//$mail->addReplyTo('mnassser@gmail.com', 'First Last');  //Set an alternative reply-to address
		$mail->addAddress($to, '');  // Add a recipient
		////$mail->addCC('cc@example.com');
		$mail->addBCC($bcc);
		$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
		//$mail->addAttachment('/usr/labnol/file.doc');         // Add attachments
		//$mail->addAttachment('/images/image.jpg', 'new.jpg'); // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML
		 
		$mail->Subject = $subject;
		$mail->Body    = $emailContent;
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		 
		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
		 
		if(!$mail->send()) {
		   $endFormMessage = $allMessages['SUBMIT_FAILED'];
		   //echo $mail->ErrorInfo;
		   exit;
		}
		else {
			$endFormMessage = $allMessages['SUBMIT_SUCCESSFULLY'];
		}
	}
	//with message in URL
	$HTTP_REFERER = $_SERVER['HTTP_REFERER'];
	$HTTP_REFERER = explode('?',$HTTP_REFERER);
	$HTTP_REFERER = $HTTP_REFERER[0];
	header( 'Location: '.$HTTP_REFERER.'?endFormMessage='.$endFormMessage );
}