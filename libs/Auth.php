<?php

class Auth extends MySql{
	private $authId;
	private $username;
	private $password;
	private $passKey;
	private $email;
	private $name;
	private $dateCreated;
	/*
 * Date:8-16-2012
 * Login Form , entry to the application
 * Auhthor : Litto chacko
 * Email:littochackomp@gmail.com
*/
	/*
	 * Admin Panel authetiction Check
	*/
	function login($array){
		$this->username	=	$array["username"];
		$this->password	=	$array["password"];
		echo $query	=	"SELECT * FROM `cms_auth` WHERE `username`='".$this->addFilter($this->username)."' ";
		$rec		=	$this->fetchAll($query);
		if(count($rec)>0){
			$this->passKey	=	$rec[0]["pass_key"];
			$crypt	=	new Crypt();
			$crypt->crypt_key($this->passKey);
			$password	=	$crypt->encrypt($this->password);
			if($password==$rec[0]["password"]){
				$this->authId	=	$rec[0]["auth_id"];
				$this->email	=	$rec[0]["email"];
				$this->name		=	$rec[0]["name"];
				$this->dateCreated		=	$rec[0]["date_create"];				
				return true;
			}	
		}		
		return false;
	}
	function loginuser($array){
		$this->username	=	$array["username"];
		$this->password	=	$array["password"];
		echo $query	=	"SELECT * FROM `cms_user` WHERE `email`='".$this->addFilter($this->username)."' ";
		$rec		=	$this->fetchAll($query);


		if(count($rec)>0){
			echo "hai";

			echo $password	= $this->password;
 
$password1=base64_encode($password);
			if($password1==$rec[0]["password"]){
session_start();
				echo $_SESSION["loggedUser"]	=	$rec[0]["user_id"];
				echo $_SESSION["loggedName"]	=	$rec[0]["name"];	
		$_SESSION["email"]	=	$rec[0]["email"];
$_SESSION["password"]	=	$password;
				return true;
			}	
		}
		
		return false;
	}
function loginuserman($array){
		$this->username	=	$array["username"];
		$this->password	=	$array["password"];
		echo $query	=	"SELECT * FROM `cms_user` WHERE `email`='".$this->addFilter($this->username)."' ";
		$rec		=	$this->fetchAll($query)or die(mysql_error());
		print_r($rec);
echo "hai me";
		if(count($rec)>0){
			echo "hai";

			echo $password	= $this->password;
 
$password1=base64_encode($password);
			if($password1==$rec[0]["password"]){
echo $k=$rec[0]["user_id"];

session_start();
				echo $_SESSION["loggedUser"]	=	$rec[0]["user_id"];
				echo $_SESSION["loggedName"]	=	$rec[0]["name"];	
		echo $_SESSION["email"]	=	$rec[0]["email"];
echo $_SESSION["password"]	=	$password;
				return true;
			}	
		}
		
		return false;
	}
	/*
	 * Get logged admin details
	*/
	function getLoggedInfo(){
		$query	=	"SELECT * FROM  `cms_auth` LIMIT 0,1";
		return $this->fetchAll($query);
	}
	function getSliderImage(){
		$query	=	"SELECT * FROM  `cms_auth` WHERE auth_id = '2'";
		return $this->fetchAll($query);
	}
	function getsettingsbasic(){
		$query	=	"SELECT * FROM  `cms_settings` LIMIT 0,1";
		return $this->fetchAll($query);
	}
	function getaboutus(){
		$query	=	"SELECT * FROM  `cms_about` LIMIT 0,1";
		return $this->fetchAll($query);
	}
		function getcontactus(){
		$query	=	"SELECT * FROM  `cms_contact` LIMIT 0,1";
		return $this->fetchAll($query);
	}
	/*
	 * Update Account and Login information
	*/
	function updateAccount($inputs){
		$insert	=	array(	'username'=>$this->addFilter($inputs['username']),
											'password'=>$inputs['password'],
											'pass_key'=>$inputs['key'],
											'email'=>$this->addFilter($inputs['email']),
											'name'=>$this->addFilter($inputs['name']),
											'date_create'=>date("Y-m-d H:i:s"),
											'privacypolicy'=>$inputs['privacy']											
											);
		$this->update($insert,"cms_auth",'');		
		return true;
	}
	
	function updateEventSetting($inputs){
		$this->update($inputs,"cms_auth","auth_id='2'");	
		return true;
	}
	
	function addSliderImg($image){
		$id=2;
		$insert	=	array('logo'=>$image);
		$this->update($insert,"cms_auth",'`auth_id`='.$id);		
		return true;
	}
	
	
	function addlogo($image){
		$id=1;
		$insert	=	array('logo'=>$image);
		$this->update($insert,"cms_auth",'`auth_id`='.$id);		
		return true;
	}
		function addlogoabout($image){
		$id=1;
		$insert	=	array('image'=>$image);
		
		$this->update($insert,"cms_about",'`id`='.$id);		
		return true;
	}


	function updatebasic($moviecount,$comment){
		$id=1;
		$insert	=	array('movie_count'=>$moviecount,'comment_show'=>$comment);
		$this->update($insert,"cms_settings",'`id`='.$id);		
		return true;
	}
	function updatesite($options){
		$id=1;
		$insert	=	array('sitename'=>$options['websitename'],'description'=>$options['description'],'keywords'=>$options['keywords']);
		$this->update($insert,"cms_settings",'`id`='.$id);		
		return true;
	}


	function updateabout($options){
		$id=1;
		$insert	=	array('title'=>$options['title'],'description'=>$options['description']);
		$this->update($insert,"cms_about",'`id`='.$id);		
		return true;
	}
		function updatecontact($options){
		$id=1;
		$insert	=	array('email'=>$options['email'],'landline'=>$options['landline'],'mobile'=>$options['mobile'],'address'=>$options['address']);
		$this->update($insert,"cms_contact",'`id`='.$id);		
		return true;
	}
}


?>