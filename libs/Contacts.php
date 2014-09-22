<?php

	class Contacts extends MySql{
		/*
 * Date:8-16-2012
 * Login Form , entry to the application
 * Auhthor : Litto chacko
 * Email:littochackomp@gmail.com
*/
			
			/*
			 * Add Media Item
			*/			
			function updateSettings($inputs){
					$query	=	"SELECT * FROM `cms_contacts` LIMIT 0,1";
					$rec		=	$this->fetchAll($query);
					if(count($rec)>0){
						$insert	=	array(
												'contact_email'=>$this->addFilter($inputs['email']),
												'contact_emailtemplate'=>$this->addFilter($inputs['template']),											
												'contact_thanks'=>$this->addFilter($inputs['thanks']),
												'linked_page'=>$inputs['page'],
												'privacy_policy'=>$this->addFilter($inputs['policy']),
												);
						$this->update($insert,"cms_contacts",'');
					}else{
						$insert	=	array(
												'contact_email'=>$this->addFilter($inputs['email']),
												'contact_emailtemplate'=>$this->addFilter($inputs['template']),											
												'contact_thanks'=>$this->addFilter($inputs['thanks']),
												'linked_page'=>$inputs['page'],
												'privacy_policy'=>$this->addFilter($inputs['policy']),
												);
						$this->insert($insert,"cms_contacts");		
				}
				return true;
			}
			
			/*
			 * Get Settings
			*/
			
			function getSettings(){
				$query	=	"SELECT * FROM `cms_contacts` LIMIT 0,1";
				$rec		=	$this->fetchAll($query);
				return $rec;
			}
			
			
	}

?>