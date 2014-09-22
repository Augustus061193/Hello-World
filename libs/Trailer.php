<?php
/*
 * Date:8-16-2012
 * Login Form , entry to the application
 * Auhthor : Litto chacko
 * Email:littochackomp@gmail.com
*/
	class Trailer extends MySql{
		

function add($theatreid,$trailertitle,$trailer){
					$insert	=	array('movie_id'=>$theatreid,
									   'name'=>$trailertitle,
									   'url'=>$trailer,
                                          'status'=>'1'
											);
				$this->insert($insert,"cms_trailer");		
				return true;
			}

function listimage($values,$passid){
		
		$start		=	$values['start'];
		$limit		=	$values['limit'];
		$mode			=	trim($values['mode']);
		$ord			=	trim($values['ord']);
		$keyword	=	trim($values['keyword']);
		$parent		=	trim($values['parent']);
		
		$qry="";
		$order	=	'';
		
		if(!empty($keyword)){
			$qry.=' AND LOWER(c.`title`) LIKE \'%'.$this->addFilter($this->escapeHtml($keyword)).'%\'';
		}
		if(trim($parent)!=''){
			$qry.=' AND c.`parent`=\''.$parent.'\'';
		}
		if(!empty($mode) && !empty($ord)){
			if($mode=='title'){
				if($ord=='dsc'){
					$order=' ORDER BY c.`title` DESC';
				}else if($ord='asc'){
					$order=' ORDER BY c.`title` ASC';
				}
			}
			if($mode=='order'){
				if($ord=='dsc'){
					$order=' ORDER BY c.`order` DESC';
				}else if($ord='asc'){
					$order=' ORDER BY c.`order` ASC';
				}
			}
		}
		
		$query	=	"SELECT count(c.`id`) FROM `cms_trailer` c WHERE c.`movie_id`='$passid'";
		 $query.=$qry;
		$rec	=	$this->fetchAll($query);
		$this->totalRecords	=	$rec[0]['count(c.`id`)'];
		
		$query	=	"SELECT * FROM `cms_trailer` WHERE `movie_id`='$passid'";
		$query.=$qry;
		$query.=$order;
		$query.=' LIMIT '.$start.','.$limit;

		
		$rec	=	$this->fetchAll($query);
		$this->pageRecords	=	count($rec);
	
		return $rec;		
		
		
	}
function gettrailers($id){
				$query	=	'SELECT * FROM `cms_trailer` WHERE `movie_id`='.$id;
				$rec		=	$this->fetchAll($query);
				return $rec;
			}	
		function deleteimage($id){
					
							$this->delete('cms_trailer','`id`='.$id);
					return true;
			}

	function updateimagetitle($id,$name){
			
					$this->update(array('name'=>$name),"cms_trailer",'`id`='.$id);
				
			}


	/*
			 * Delete career Items
			*/
			
			function deleteList($list){
					for($i=0;$i<count($list);$i++){
							$this->delete('cms_trailer','`id`='.$list[$i]);
					}
			}

/*
			 * Un Publush records
			*/	
			function unpublishList($list){
				for($i=0;$i<count($list);$i++){
					$this->update(array('status'=>'0'),"cms_trailer",'`id`='.$list[$i]);
				}
			}
			
				function getmax(){

				$query	=	'SELECT MAX(`id`) FROM `cms_trailer` ';
				$rec		=	$this->fetchAll($query);
				return $rec;
			}
			/*
			 * Publush records
			*/
			
			function publishList($list){
				for($i=0;$i<count($list);$i++){
					$this->update(array('status'=>'1'),"cms_trailer",'`id`='.$list[$i]);
				}
			}


function publishimage($id){
			
					$this->update(array('status'=>'1'),"cms_trailer",'`id`='.$id);
					return true;
				
			}


	function unpublishimage($id){
				
					$this->update(array('status'=>'0'),"cms_trailer",'`id`='.$id);
					return true;
				
			}





		}




		?>