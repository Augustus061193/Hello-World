<?php
/*
 * Date:8-16-2012
 * Login Form , entry to the application
 * Auhthor : Litto chacko
 * Email:littochackomp@gmail.com
*/
class User extends MySql{

	/*
	 * Add user information
	*/
	function addAccount($inputs){

 $nam=$this->addFilter($inputs['name']);
$sMail=$this->addFilter($inputs['email']);
$pass=$this->addFilter($inputs['password']);
$ref=$this->addFilter($inputs['ref']);
$passen=base64_encode($pass);
		$insert	=	array('name'=>$this->addFilter($inputs['name']),'type'=>$inputs['type'],
											'email'=>$this->addFilter($inputs['email']),'phone'=>$inputs['phone'],
											'mobile'=>$inputs['mobile'],
											'address'=>$inputs['address'],'date_join'=>$inputs['datej'],'profile_pic'=>$inputs['image'],'reference_no'=>$inputs['ref'],
											'password'=>$passen,
											);
		$this->insert($insert,"cms_user");
$ad="admin";
$Mail="littochackomp@gmail.com";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: '.$ad.' <'.$Mail.'>' . "\r\n";	
$sub="Password & referrence number of RealEstate ";

$person="person";
$reference="REFERENCE NUMBER";
$passw="PASSWORD";
$message="  <p>  Person : $nam</p>
			
			<p>REFERENCE NUMBER : $ref</p>
			<p>PASSWORD : $pass</p>";

mail($sMail,$sub,$message,$headers);	
		return true;
	}
	function updateAccountlog($inputs){
		$insert	=	array(	'email'=>$this->addFilter($inputs['username']),
											'password'=>$inputs['password']);
		$this->update($insert,"cms_user",'');		
		return true;
	}
	/*
	 * Edit user information
	*/
function incrementcounter($count){
$gh=1;
		$insert	=	array(	'count'=>$count);
		$this->update($insert,"cms_counter","id='$gh'");		
		return true;
	}
function updateAccountwithimage($inputs,$id){
	$insert	=	array('name'=>$this->addFilter($inputs['name']),'type'=>$inputs['type'],
											'email'=>$this->addFilter($inputs['email']),'phone'=>$inputs['phone'],
											'mobile'=>$inputs['mobile'],
											'address'=>$inputs['address'],'profile_pic'=>$inputs['image']
											);
		$this->update($insert,"cms_user","user_id='$id'");
return true;
}
function updateAccount($inputs,$id){
	$insert	=	array('name'=>$this->addFilter($inputs['name']),'type'=>$inputs['type'],
											'email'=>$this->addFilter($inputs['email']),'phone'=>$inputs['phone'],
											'mobile'=>$inputs['mobile'],
											'address'=>$inputs['address']
											);
		$this->update($insert,"cms_user","user_id='$id'");

return true;
}



	function editAccount($inputs,$id){
		$insert	=	array('name'=>$this->addFilter($inputs['name']),
											'email'=>$this->addFilter($inputs['email']),
											'username'=>$this->addFilter($inputs['username']),
											'password'=>$inputs['password'],
											'pass_key'=>$inputs['key'],
											'address'=>$inputs['address'],
											'city'=>$inputs['city'],
											'state'=>$inputs['state'],
											'country'=>$inputs['country'],
											'phone'=>$inputs['phone'],
											'mobile'=>$inputs['mobile'],
																						
											);
		$this->update($insert,"cms_user","id='$id'");		
		return true;
	}
	
	/*
	* Get all user
	*/
	function listUser(){
	
	$query="SELECT * FROM `cms_user`";
	$rec	=	$this->fetchAll($query);
	return $rec;
	}
function getcount(){
	
	$query="SELECT * FROM `cms_counter`";
	$rec	=	$this->fetchAll($query);
	return $rec;
	}	
			/*
			 * Get user
			*/
			function getUser($id){
				$query="SELECT * FROM `cms_user` WHERE `user_id`='$id'";
				$rec	=	$this->fetchAll($query);
				return $rec;
			}
	function getauth(){
		$id=1;
				$query="SELECT * FROM `cms_auth` WHERE `auth_id`='$id'";
				$rec	=	$this->fetchAll($query);
				return $rec;
			}
	
	function forgetpass($name,$email){
	echo "hai";
	
				echo $query="SELECT * FROM `cms_user` WHERE `name`='$name' AND `email`='$email'";
				$rec	=	$this->fetchAll($query);
				print_r($rec);
			echo $wanted=$rec[0]['password'];
			$ref=$rec[0]['reference_no'];
			echo $orginal=base64_decode($wanted);
			$ad="admin";
			echo $sMail=$email;
				echo $Mail="<littochackomp@gmail.com>";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
echo $headers .= 'From:'.$ad.'<'.$Mail.'>' . "\r\n";

echo $headers;
echo $sub="Password ";


echo $message="  <p>  Person : $name</p>
			
			<p>REFERENCE NUMBER : $ref</p>
			<p>PASSWORD : $orginal</p>";
mail($sMail,$sub,$message,$headers);	
return 1;
			}
			/*
			 * Delete Media Items
			*/
			
			function deleteList($list){
					for($i=0;$i<count($list);$i++){
							$this->delete('cms_user','`user_id`='.$list[$i]);
							
					}
			}
			/*
			* Update status into 1
			*/
			function updateStatus($id,$value){
				$input=array('status'=>$value);
				$this->update($input,"cms_user",'`id`='.$id);
				}
			
			
			
	/*
	 * Un Publush records
	*/	
	function unpublishList($list){
		for($i=0;$i<count($list);$i++){
			$this->update(array('status'=>'0'),"cms_user",'`user_id`='.$list[$i]);
		}
	}
	
	
	/*
	 * Publush records
	*/
	
	function publishList($list){
		for($i=0;$i<count($list);$i++){
			$this->update(array('status'=>'1'),"cms_user",'`user_id`='.$list[$i]);
		}
	}
	
			
			
			
			
			
	

	/*
	 * List Banner
	*/
	
	
	
	

	function listAllUsers($values){
		
		echo $start		=	$values['start'];
		echo $limit		=	$values['limit'];
		echo $mode			=	trim($values['mode']);
		echo $ord			=	trim($values['ord']);
		echo $keyword	=	trim($values['keyword']);
		$parent		=	trim($values['parent']);
		
		$qry="";
		$order	=	'';
		
		if(!empty($keyword)){
			$qry.=' AND LOWER(`name`) LIKE \'%'.$this->addFilter($this->escapeHtml($keyword)).'%\'';
		}
		
		
		if(!empty($mode) && !empty($ord)){
			if($mode=='name'){
				if($ord=='dsc'){
					$order=' ORDER BY `name` DESC';
				}else if($ord='asc'){
					$order=' ORDER BY `name` ASC';
				}
			}
			if($mode=='order'){
				if($ord=='dsc'){
					$order=' ORDER BY `order` DESC';
				}else if($ord='asc'){
					$order=' ORDER BY `order` ASC';
				}
			}
		}
		
		$query	=	"SELECT count(`user_id`) FROM `cms_user` WHERE `user_id`!=''";
		$query.=$qry;
		
		$rec	=	$this->fetchAll($query);
		
		$this->totalRecords	=	$rec[0]['count(`user_id`)'];
		
		$query	=	"SELECT * FROM `cms_user`";
		$query.=$qry;
		$query.=$order;
		$query.=' LIMIT '.$start.','.$limit;

		
		$rec	=	$this->fetchAll($query);
		$this->pageRecords	=	count($rec);
		
		return $rec;		
		
		
	}
				
				
}

?>