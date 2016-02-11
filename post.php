<?php
header('Content-Type: text/html; charset=utf-8');


//if($_POST['Fname'] == '' || $_POST['Phone'] == ''){
//		if(isset($_POST['mobile']) && $_POST['mobile'] == true){
//			header('location:mobile.php?s=0');
//		}else{
//			header('location:index.php?s=0');
//		}
//	exit();
//}


    if(isset($_POST['submit'])){
    	//echo '<pre dir="ltr">'.print_r($_POST,TRUE).'</pre>';
		$name = $_POST['name'];
		$telephone = $_POST['phone'];
		$email = $_POST['email'];
//        $source = $_POST['page_url'];
//		$publisher = $_POST['publisher'];
		
		$params = array(
			'Password' => '',
			'ProjectID' => '',
			'MediaTitle' => '',
			'Fname' => $name,
			'Phone' => $telephone,
			'Email' => $email,
			'Comments' => '',
			'note' => '',
		);
		
		//extract data from the post
		//extract($_POST);
		
		//set POST variables
		$url = 'http://www.bmby.com/shared/AddClient/index.php';
		
		//url-ify the data for the POST
		foreach($params as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
		rtrim($fields_string, '&');
		
		//open connection
		$ch = curl_init();
		
		//set the url, number of POST vars, POST data
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_POST, count($fields));
		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		//execute post
		$result = curl_exec($ch);
			//echo '<pre dir="ltr">'.print_r($result,TRUE).'</pre>';
		//close connection
		curl_close($ch);
		
		if($result == TRUE){
			$to = "misnkv@gmail.com,ggmedia2010@gmail.com";
			$subject = "LP - New Lead";
			unset($_POST['submit']);
			foreach ($_POST as $key => $value) {
				 $message .= $key.': '.$value.'<BR>'; 
			}
			$from = "GeekDigital@DoNotReply.com";
			$headers = "From: " . strip_tags($from) . "\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
			mail($to,$subject,$message,$headers);
            header('Location: ty.html');
					
//			}
//            (mail($to,$subject,$message,$headers)){
//				if(isset($_POST['mobile']) && $_POST['mobile'] == true){
//					header('location:index.html?s=1');
//				}else{
//					header('location:index.html?s=1');
//				}
//					
//			}
					
			//echo "Mail Sent.";
		}
		
		//processes the form
    	//
    }
?>