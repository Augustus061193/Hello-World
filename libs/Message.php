<?php

	
	class Message{
	/*
 * Date:8-16-2012
 * Login Form , entry to the application
 * Auhthor : Litto chacko
 * Email:littochackomp@gmail.com
*/	
		private $message;
		private $type;		
		
		function __construct($message,$type){
			$this->message	=	$message;
			$this->type			=	$type;
		}
		
		function setMessage(){
			$_SESSION["message"]			=	$this->message;
			$_SESSION["messageType"]	=	$this->type;
			$_SESSION["messageView"]	=	0;
		}
		
		
		function showMessage(){
			$view			=	$_SESSION["messageView"];
			$message	=	$_SESSION["message"];
			$type			=	$_SESSION["messageType"];
			if($view=="0" && !empty($message) && !empty($type)){
				switch($type){
					case 'error':
						echo '<script type="text/javascript">alert("'.$message.'");</script>';
						break;
					case 'message':
						echo '<script type="text/javascript">alert("'.$message.'");</script>';
						break;
					case 'warning':
						echo '<script type="text/javascript">alert("'.$message.'");</script>';
						break;
					
					default:
						echo '<script type="text/javascript">alert("'.$message.'");</script>';
						break;
				}
			}			
			unset($_SESSION["messageView"]);
			unset($_SESSION["message"]);
			unset($_SESSION["messageType"]);
		}
			
		
	}
	
	

?>