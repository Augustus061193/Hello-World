<?php
/*
 * Date:8-16-2012
 * Login Form , entry to the application
 * Auhthor : Litto chacko
 * Email:littochackomp@gmail.com
*/
	class Theatre extends MySql{
		
			
	function addtheatrepublish($inputs){
					$insert	=	array('theatre_name'=>$inputs['theatrename'],
									   'routemap'=>$inputs['routemap'],
									   'no_seats'=>$inputs['seats'],	
									   'ms_time'=>$inputs['mstime'],
									    'matinee_time'=>$inputs['matineetime'],	
									    'evg_time'=>$inputs['evngtime'],
									    'second_time'=>$inputs['secondtime'], 
                                        'ms_2d_rate'=>$inputs['mstwodrate'],
                                          'mat_2d_rate'=>$inputs['mattwodrate'],
                                         'evg_2d_rate'=>$inputs['evgtwodrate'],
                                         'sec_2d_rate'=>$inputs['sectwodrate'],  
                                         'ms_3d_rate'=>$inputs['msthreedrate'],
                                          'mat_3d_rate'=>$inputs['matthreedrate'],
                                         'evg_3d_rate'=>$inputs['evgthreedrate'],
                                         'sec_3d_rate'=>$inputs['secthreedrate'], 
                                         'extra_details'=>$inputs['extradetails'],
                                         'extrashow1_time'=>$inputs['extrashow1time'],
                                         'extrashow2_time'=>$inputs['extrashow2time'],
                                         'extrashow1_2d_rate'=>$inputs['extrashow1twodrate'],
                                         'extrashow2_2d_rate'=>$inputs['extrashow2twodrate'],
                                         'extrashow1_3d_rate'=>$inputs['extrashow1threedrate'],
                                         'extrashow2_3d_rate'=>$inputs['extrashow2threedrate'],
                                         'image_loc'=>$inputs['image'],
                                          'status'=>'1'
											);
				$this->insert($insert,"cms_theatre");		
				return true;
			}
			function addtheatresave($inputs){
					$insert	=	array('theatre_name'=>$inputs['theatrename'],
									   'routemap'=>$inputs['routemap'],
									   'no_seats'=>$inputs['seats'],	
									   'ms_time'=>$inputs['mstime'],
									    'matinee_time'=>$inputs['matineetime'],	
									    'evg_time'=>$inputs['evngtime'],
									    'second_time'=>$inputs['secondtime'], 
                                        'ms_2d_rate'=>$inputs['mstwodrate'],
                                          'mat_2d_rate'=>$inputs['mattwodrate'],
                                         'evg_2d_rate'=>$inputs['evgtwodrate'],
                                         'sec_2d_rate'=>$inputs['sectwodrate'],  
                                         'ms_3d_rate'=>$inputs['msthreedrate'],
                                          'mat_3d_rate'=>$inputs['matthreedrate'],
                                         'evg_3d_rate'=>$inputs['evgthreedrate'],
                                         'sec_3d_rate'=>$inputs['secthreedrate'], 
                                         'extra_details'=>$inputs['extradetails'],
                                         'extrashow1_time'=>$inputs['extrashow1time'],
                                         'extrashow2_time'=>$inputs['extrashow2time'],
                                         'extrashow1_2d_rate'=>$inputs['extrashow1twodrate'],
                                         'extrashow2_2d_rate'=>$inputs['extrashow2twodrate'],
                                         'extrashow1_3d_rate'=>$inputs['extrashow1threedrate'],
                                         'extrashow2_3d_rate'=>$inputs['extrashow2threedrate'],
                                         'image_loc'=>$inputs['image'],
                                          'status'=>'0'
											);
				$this->insert($insert,"cms_theatre");		
				return true;
			}
	function edittheatreimagepublish($inputs){
					$insert	=	array('theatre_name'=>$inputs['theatrename'],
									   'routemap'=>$inputs['routemap'],
									   'no_seats'=>$inputs['seats'],	
									   'ms_time'=>$inputs['mstime'],
									    'matinee_time'=>$inputs['matineetime'],	
									    'evg_time'=>$inputs['evngtime'],
									    'second_time'=>$inputs['secondtime'], 
                                        'ms_2d_rate'=>$inputs['mstwodrate'],
                                          'mat_2d_rate'=>$inputs['mattwodrate'],
                                         'evg_2d_rate'=>$inputs['evgtwodrate'],
                                         'sec_2d_rate'=>$inputs['sectwodrate'],  
                                         'ms_3d_rate'=>$inputs['msthreedrate'],
                                          'mat_3d_rate'=>$inputs['matthreedrate'],
                                         'evg_3d_rate'=>$inputs['evgthreedrate'],
                                         'sec_3d_rate'=>$inputs['secthreedrate'], 
                                         'extra_details'=>$inputs['extradetails'],
                                          'extrashow1_time'=>$inputs['extrashow1time'],
                                         'extrashow2_time'=>$inputs['extrashow2time'],
                                         'extrashow1_2d_rate'=>$inputs['extrashow1twodrate'],
                                         'extrashow2_2d_rate'=>$inputs['extrashow2twodrate'],
                                         'extrashow1_3d_rate'=>$inputs['extrashow1threedrate'],
                                         'extrashow2_3d_rate'=>$inputs['extrashow2threedrate'],
                                         'image_loc'=>$inputs['image'],
                                          'status'=>'1'
											);
				$this->update($insert,"cms_theatre",'`theatre_id`='.$inputs['id']);			
				return true;
			}
	function edittheatrepublish($inputs){
					$insert	=	array('theatre_name'=>$inputs['theatrename'],
									   'routemap'=>$inputs['routemap'],
									   'no_seats'=>$inputs['seats'],	
									   'ms_time'=>$inputs['mstime'],
									    'matinee_time'=>$inputs['matineetime'],	
									    'evg_time'=>$inputs['evngtime'],
									    'second_time'=>$inputs['secondtime'], 
                                        'ms_2d_rate'=>$inputs['mstwodrate'],
                                          'mat_2d_rate'=>$inputs['mattwodrate'],
                                         'evg_2d_rate'=>$inputs['evgtwodrate'],
                                         'sec_2d_rate'=>$inputs['sectwodrate'],  
                                         'ms_3d_rate'=>$inputs['msthreedrate'],
                                          'mat_3d_rate'=>$inputs['matthreedrate'],
                                         'evg_3d_rate'=>$inputs['evgthreedrate'],
                                         'sec_3d_rate'=>$inputs['secthreedrate'], 
                                         'extra_details'=>$inputs['extradetails'],
                                          'extrashow1_time'=>$inputs['extrashow1time'],
                                         'extrashow2_time'=>$inputs['extrashow2time'],
                                         'extrashow1_2d_rate'=>$inputs['extrashow1twodrate'],
                                         'extrashow2_2d_rate'=>$inputs['extrashow2twodrate'],
                                         'extrashow1_3d_rate'=>$inputs['extrashow1threedrate'],
                                         'extrashow2_3d_rate'=>$inputs['extrashow2threedrate'],
                                          'status'=>'1'
											);
				$this->update($insert,"cms_theatre",'`theatre_id`='.$inputs['id']);			
				return true;
			}


	function edittheatreimagesave($inputs){
					$insert	=	array('theatre_name'=>$inputs['theatrename'],
									   'routemap'=>$inputs['routemap'],
									   'no_seats'=>$inputs['seats'],	
									   'ms_time'=>$inputs['mstime'],
									    'matinee_time'=>$inputs['matineetime'],	
									    'evg_time'=>$inputs['evngtime'],
									    'second_time'=>$inputs['secondtime'], 
                                        'ms_2d_rate'=>$inputs['mstwodrate'],
                                          'mat_2d_rate'=>$inputs['mattwodrate'],
                                         'evg_2d_rate'=>$inputs['evgtwodrate'],
                                         'sec_2d_rate'=>$inputs['sectwodrate'],  
                                         'ms_3d_rate'=>$inputs['msthreedrate'],
                                          'mat_3d_rate'=>$inputs['matthreedrate'],
                                         'evg_3d_rate'=>$inputs['evgthreedrate'],
                                         'sec_3d_rate'=>$inputs['secthreedrate'], 
                                         'extra_details'=>$inputs['extradetails'],
                                          'extrashow1_time'=>$inputs['extrashow1time'],
                                         'extrashow2_time'=>$inputs['extrashow2time'],
                                         'extrashow1_2d_rate'=>$inputs['extrashow1twodrate'],
                                         'extrashow2_2d_rate'=>$inputs['extrashow2twodrate'],
                                         'extrashow1_3d_rate'=>$inputs['extrashow1threedrate'],
                                         'extrashow2_3d_rate'=>$inputs['extrashow2threedrate'],
                                         'image_loc'=>$inputs['image'],
                                          'status'=>'0'
											);
				$this->update($insert,"cms_theatre",'`theatre_id`='.$inputs['id']);			
				return true;
			}
	function edittheatresave($inputs){
					$insert	=	array('theatre_name'=>$inputs['theatrename'],
									   'routemap'=>$inputs['routemap'],
									   'no_seats'=>$inputs['seats'],	
									   'ms_time'=>$inputs['mstime'],
									    'matinee_time'=>$inputs['matineetime'],	
									    'evg_time'=>$inputs['evngtime'],
									    'second_time'=>$inputs['secondtime'], 
                                        'ms_2d_rate'=>$inputs['mstwodrate'],
                                          'mat_2d_rate'=>$inputs['mattwodrate'],
                                         'evg_2d_rate'=>$inputs['evgtwodrate'],
                                         'sec_2d_rate'=>$inputs['sectwodrate'],  
                                         'ms_3d_rate'=>$inputs['msthreedrate'],
                                          'mat_3d_rate'=>$inputs['matthreedrate'],
                                         'evg_3d_rate'=>$inputs['evgthreedrate'],
                                         'sec_3d_rate'=>$inputs['secthreedrate'], 
                                         'extra_details'=>$inputs['extradetails'],
                                          'extrashow1_time'=>$inputs['extrashow1time'],
                                         'extrashow2_time'=>$inputs['extrashow2time'],
                                         'extrashow1_2d_rate'=>$inputs['extrashow1twodrate'],
                                         'extrashow2_2d_rate'=>$inputs['extrashow2twodrate'],
                                         'extrashow1_3d_rate'=>$inputs['extrashow1threedrate'],
                                         'extrashow2_3d_rate'=>$inputs['extrashow2threedrate'],
                                          'status'=>'0'
											);
				$this->update($insert,"cms_theatre",'`theatre_id`='.$inputs['id']);			
				return true;
			}




	function listall($values){
					$start		=	$values['start'];
					$limit		=	$values['limit'];
					$mode			=	trim($values['mode']);
					$ord			=	trim($values['ord']);
					$keyword	=	trim($values['keyword']);		
					$filter		=	trim($values['filter']);
					
					$qry="";
					$order	=	'';					
					if(!empty($keyword)){
						$qry.=' AND LOWER(c.`theatre_name`) LIKE \'%'.$this->addFilter($this->escapeHtml($keyword)).'%\'';
					}		
					if(!empty($filter)){
						if($filter=='featured'){
								$qry.=' AND c.`featured`=\'1\'';
						}
						if($filter=='archived'){
								$qry.=' AND c.`archived`=\'1\'';
						}
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
					
					$query	=	"SELECT count(c.`theatre_id`) FROM `cms_theatre` c WHERE c.`theatre_id`!=''";
					$query.=$qry;
					$rec	=	$this->fetchAll($query);
					$this->totalRecords	=	$rec[0]['count(c.`theatre_id`)'];
					
					$query	=	"SELECT c.* FROM `cms_theatre` c WHERE c.`theatre_id`!=''";
					$query.=$qry;
					$query.=$order;
					$query.=' LIMIT '.$start.','.$limit;
					$rec	=	$this->fetchAll($query);
					$this->pageRecords	=	count($rec);					
					return $rec;		
		
			}
	function getthtlist($id){
		$f=1;
				$query	=	'SELECT * FROM `cms_movieshows` WHERE `mainstatus`='.$f.' AND  `movie_id`='.$id;
				$rec		=	$this->fetchAll($query);
				return $rec;
			}
function gettheatre($id){
				$query	=	'SELECT * FROM `cms_theatre` WHERE `theatre_id`='.$id;
				$rec		=	$this->fetchAll($query);
				return $rec;
			}
			function getalltheatres(){
				$id=1;
				$query	=	'SELECT * FROM `cms_theatre` WHERE `status`='.$id;
				$rec		=	$this->fetchAll($query);
				return $rec;
			}
			/*
			 * Delete News Items
			*/ 
			function deleteUp($image){
  	$destinationPath="../uploads/";
            unlink($destinationPath.$image);
        }

					function dltlist($id){

$query	=	'SELECT * FROM `cms_theatreimage` WHERE `theatre_id`='.$id.' ';
		$rec	=	$this->fetchAll($query);

		for($i=0;$i<count($rec);$i++){
			$this->delete('cms_theatreimage','`image_id`='.$rec[$i]['image_id']);
			$image=$rec[$i]['image_loc'];
			$this->deleteUp($image);
		}
	
}

			function deleteList($list){
					for($i=0;$i<count($list);$i++){
						$this->dltlist($list[$i]);
							$this->delete('cms_theatre','`theatre_id`='.$list[$i]);
					}
			}
				function deletetheatre($id){
					
							$this->delete('cms_theatre','`theatre_id`='.$id);
					return true;
			}
	
			/*
			 * Un Publush records
			*/	
			function unpublishList($list){
				for($i=0;$i<count($list);$i++){
					$this->update(array('status'=>'0'),"cms_theatre",'`theatre_id`='.$list[$i]);
				}
			}
			

	/*
			 * Publush records
			*/
			
			function publishList($list){
				for($i=0;$i<count($list);$i++){
					$this->update(array('status'=>'1'),"cms_theatre",'`theatre_id`='.$list[$i]);
				}
			}

function publishms($id){
				
					$this->update(array('ms_status'=>'1'),"cms_theatre",'`theatre_id`='.$id);
					return true;
				
			}

function publishmat($id){
				
					$this->update(array('mat_status'=>'1'),"cms_theatre",'`theatre_id`='.$id);
					return true;
				
			}
function publishevg($id){
				
					$this->update(array('evg_status'=>'1'),"cms_theatre",'`theatre_id`='.$id);
					return true;
				
			}
function publishsec($id){
				
					$this->update(array('sec_status'=>'1'),"cms_theatre",'`theatre_id`='.$id);
					return true;
				
			}
function publishshow1($id){
				
					$this->update(array('extrashow1_status'=>'1'),"cms_theatre",'`theatre_id`='.$id);
					return true;
				
			}
function publishshow2($id){
				
					$this->update(array('extrashow2_status'=>'1'),"cms_theatre",'`theatre_id`='.$id);
					return true;
				
			}
function unpublishms($id){
				
					$this->update(array('ms_status'=>'0'),"cms_theatre",'`theatre_id`='.$id);
					return true;
				
			}

function unpublishmat($id){
				
					$this->update(array('mat_status'=>'0'),"cms_theatre",'`theatre_id`='.$id);
					return true;
				
			}
function unpublishevg($id){
				
					$this->update(array('evg_status'=>'0'),"cms_theatre",'`theatre_id`='.$id);
					return true;
				
			}
function unpublishsec($id){
				
					$this->update(array('sec_status'=>'0'),"cms_theatre",'`theatre_id`='.$id);
					return true;
				
			}
function unpublishshow1($id){
				
					$this->update(array('extrashow1_status'=>'0'),"cms_theatre",'`theatre_id`='.$id);
					return true;
				
			}
function unpublishshow2($id){
				
					$this->update(array('extrashow2_status'=>'0'),"cms_theatre",'`theatre_id`='.$id);
					return true;
				
			}
		}


		?>