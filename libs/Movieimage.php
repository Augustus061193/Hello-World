<?php
/*
 * Date:8-16-2012
 * Login Form , entry to the application
 * Auhthor : Litto chacko
 * Email:littochackomp@gmail.com
*/
	class Movieimage extends MySql{
		

function addimage($theatreid,$imagename,$imageloc){
					$insert	=	array('movie_id'=>$theatreid,
									   'image_name'=>$imagename,
									   'image_loc'=>$imageloc,	
									   'date_added'=>date('Y-m-d'),
                                          'status'=>'1'
											);
				$this->insert($insert,"cms_movieimage");		
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
		
		$query	=	"SELECT count(c.`image_id`) FROM `cms_movieimage` c WHERE c.`movie_id`='$passid'";
		 $query.=$qry;
		$rec	=	$this->fetchAll($query);
		$this->totalRecords	=	$rec[0]['count(c.`image_id`)'];
		
		$query	=	"SELECT * FROM `cms_movieimage` WHERE `movie_id`='$passid'";
		$query.=$qry;
		$query.=$order;
		$query.=' LIMIT '.$start.','.$limit;

		
		$rec	=	$this->fetchAll($query);
		$this->pageRecords	=	count($rec);
	
		return $rec;		
		
		
	}



	function updateimagetitle($id,$name){
			
					$this->update(array('image_name'=>$name),"cms_movieimage",'`image_id`='.$id);
				
			}


	/*
			 * Delete career Items
			*/
			function dltlist($id){

$query	=	'SELECT * FROM `cms_movieimage` WHERE `image_id`='.$id.' ';
		$rec	=	$this->fetchAll($query);

	
			$image=$rec[0]['image_loc'];
			$this->deleteUp($image);
	
}
  function deleteUp($image){
  	$destinationPath="../uploads/";
            unlink($destinationPath.$image);
        }
			function deleteList($list){
					for($i=0;$i<count($list);$i++){
						$this->dltlist($list[$i]);
							$this->delete('cms_movieimage','`image_id`='.$list[$i]);
					}
			}

/*
			 * Un Publush records
			*/	
			function unpublishList($list){
				for($i=0;$i<count($list);$i++){
					$this->update(array('status'=>'0'),"cms_movieimage",'`image_id`='.$list[$i]);
				}
			}
			
				function getmax(){

				$query	=	'SELECT MAX(`image_id`) FROM `cms_movieimage` ';
				$rec		=	$this->fetchAll($query);
				return $rec;
			}
			/*
			 * Publush records
			*/
			
			function publishList($list){
				for($i=0;$i<count($list);$i++){
					$this->update(array('status'=>'1'),"cms_movieimage",'`image_id`='.$list[$i]);
				}
			}
function getimages($id){
				$query	=	'SELECT * FROM `cms_movieimage` WHERE `movie_id`='.$id;
				$rec		=	$this->fetchAll($query);
				return $rec;
			}

	function deleteimage($id){
					$this->dltlist($id);
							$this->delete('cms_movieimage','`image_id`='.$id);
					return true;
			}


function publishimage($id){
			
					$this->update(array('status'=>'1'),"cms_movieimage",'`image_id`='.$id);
					return true;
				
			}


	function unpublishimage($id){
				
					$this->update(array('status'=>'0'),"cms_movieimage",'`image_id`='.$id);
					return true;
				
			}





		}




		?>