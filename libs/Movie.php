<?php
/*
 * Date:8-16-2012
 * Login Form , entry to the application
 * Auhthor : Litto chacko
 * Email:littochackomp@gmail.com
*/
	class Movie extends MySql{
		
			
	function addmoviepublish($inputs){
					$insert	=	array('movie_name'=>$inputs['moviename'],
									   'release_date'=>$inputs['releasedate'],
									    'end_date'=>$inputs['close'],
									   'movie_status'=>$inputs['status'],	
									   'actors'=>$inputs['actors'],
									    'description'=>$inputs['description'],	
									    'trailer'=>$inputs['trailer'],
									    'proj_status'=>$inputs['protype'], 
									    'spl'=>$inputs['spl'],
                                        'poster'=>$inputs['poster'], 
                                        'order'=>$inputs['order'],
                                         'status'=>'1'
											);

				$this->insert($insert,"cms_movie");		
				return true;
			}
function addmoviesave($inputs){
					$insert	=	array('movie_name'=>$inputs['moviename'],
									   'release_date'=>$inputs['releasedate'],
									    'end_date'=>$inputs['close'],
									   'movie_status'=>$inputs['status'],	
									   'actors'=>$inputs['actors'],
									    'description'=>$inputs['description'],	
									    'trailer'=>$inputs['trailer'],
									    'proj_status'=>$inputs['protype'], 
									    'spl'=>$inputs['spl'],
                                        'poster'=>$inputs['poster'], 
                                        'order'=>$inputs['order'],
                                         'status'=>'0'
											);

				$this->insert($insert,"cms_movie");		
				return true;
			}
	function addshows($lastid,$theatreid,$ms_status,$mat_status,$evg_status,$sec_status,$main,$extra1_status,$extra2_status,$ms_2d_rate,$ms_3d_rate,$mat_2d_rate,$mat_3d_rate,$evg_2d_rate,$evg_3d_rate,$sec_2d_rate,$sec_3d_rate,$extrashow1_2d_rate,$extrashow1_3d_rate,$extrashow2_2d_rate,$extrashow2_3d_rate){
					$insert	=	array('movie_id'=>$lastid,
									   'theatre_id'=>$theatreid,
									   'ms_status'=>$ms_status,	
									   'mat_status'=>$mat_status,
									    'evg_status'=>$evg_status,	
									    'sec_status'=>$sec_status,
									    'extrashow1_status'=>$extra1_status,
									    'extrashow2_status'=>$extra2_status,
									    'ms_2d_rate'=>$ms_2d_rate,
									    'ms_3d_rate'=>$ms_3d_rate,
									    'mat_2d_rate'=>$mat_2d_rate,
									    'mat_3d_rate'=>$mat_3d_rate,
									    'evg_2d_rate'=>$evg_2d_rate,
									    'evg_3d_rate'=>$evg_3d_rate,
									    'sec_2d_rate'=>$sec_2d_rate,
									    'sec_3d_rate'=>$sec_3d_rate,
									    'extrashow1_2d_rate'=>$extrashow1_2d_rate,
									    'extrashow1_3d_rate'=>$extrashow1_3d_rate,
									    'extrashow2_2d_rate'=>$extrashow2_2d_rate,
									    'extrashow2_3d_rate'=>$extrashow2_3d_rate,
									    'mainstatus'=>$main
											);
				$this->insert($insert,"cms_movieshows");		
				return true;
			}
			function editshows($theatreid,$ms_status,$mat_status,$evg_status,$sec_status,$extra1_status,$extra2_status,$ms_2d_rate,$ms_3d_rate,$mat_2d_rate,$mat_3d_rate,$evg_2d_rate,$evg_3d_rate,$sec_2d_rate,$sec_3d_rate,$extrashow1_2d_rate,$extrashow1_3d_rate,$extrashow2_2d_rate,$extrashow2_3d_rate,$showid,$st){
					$insert	=	array( 'theatre_id'=>$theatreid,
									   'ms_status'=>$ms_status,	
									   'mat_status'=>$mat_status,
									    'evg_status'=>$evg_status,	
									    'sec_status'=>$sec_status,
									     'extrashow1_status'=>$extra1_status,
									    'extrashow2_status'=>$extra2_status,
									    'ms_2d_rate'=>$ms_2d_rate,
									    'ms_3d_rate'=>$ms_3d_rate,
									    'mat_2d_rate'=>$mat_2d_rate,
									    'mat_3d_rate'=>$mat_3d_rate,
									    'evg_2d_rate'=>$evg_2d_rate,
									    'evg_3d_rate'=>$evg_3d_rate,
									    'sec_2d_rate'=>$sec_2d_rate,
									    'sec_3d_rate'=>$sec_3d_rate,
									    'extrashow1_2d_rate'=>$extrashow1_2d_rate,
									    'extrashow1_3d_rate'=>$extrashow1_3d_rate,
									    'extrashow2_2d_rate'=>$extrashow2_2d_rate,
									    'extrashow2_3d_rate'=>$extrashow2_3d_rate,
									    'mainstatus'=>$st
						
										);
				

			$this->update($insert,"cms_movieshows",'`show_id`='.$showid);			
				return true;
			}
	function editmoviesave($inputs){
					$insert	=	array('movie_name'=>$inputs['moviename'],
									   'release_date'=>$inputs['releasedate'],
									   'movie_status'=>$inputs['status'],	
									   'actors'=>$inputs['actors'],
									    'description'=>$inputs['description'],	
									    'trailer'=>$inputs['trailer'],
									    'proj_status'=>$inputs['protype'],
									    'spl'=>$inputs['spl'],
									    'status'=>'0'
											);
				$this->update($insert,"cms_movie",'`movie_id`='.$inputs['id']);			
				return true;
			}
			function editmainstatus($showid){
					$insert	=	array('mainstatus'=>'0');
				$this->update($insert,"cms_movieshows",'`show_id`='.$showid);			
				return true;
			}
			function editmoviepublish($inputs){
					$insert	=	array('movie_name'=>$inputs['moviename'],
									   'release_date'=>$inputs['releasedate'],
									   'movie_status'=>$inputs['status'],	
									   'actors'=>$inputs['actors'],
									    'description'=>$inputs['description'],	
									    'trailer'=>$inputs['trailer'],
									    'proj_status'=>$inputs['protype'],
									    'spl'=>$inputs['spl'],
									    'status'=>'1'
											);
				$this->update($insert,"cms_movie",'`movie_id`='.$inputs['id']);			
				return true;
			}
	function getNextOrder(){
		$query="SELECT max(`order`) FROM `cms_movie` ";
		$rec=	$this->fetchAll($query);
		if(count($rec)>0){
			return $rec[0]['max(`order`)']+1;
		}else{
			return 1;
		}
	}
			function updateimagesave($image,$id){

				$insert=array('poster'=>$image,'status'=>'0');

				$this->update($insert,"cms_movie",'`movie_id`='.$id);			
				return true;
			}
			function updateimagepublish($image,$id){

				$insert=array('poster'=>$image,'status'=>'1');

				$this->update($insert,"cms_movie",'`movie_id`='.$id);			
				return true;
			}
	function setOrder($list){
		for($i=0;$i<count($list);$i++){
			$this->update(array('order'=>$list[$i][1]),"cms_movie",'`movie_id`='.$list[$i][0]);
		}
	}
	function listall($values){
	

					$start		=	$values['start'];
					$limit		=	$values['limit'];
					$mode			=	trim($values['mode']);
					$ord			=	trim($values['ord']);
					$keyword	=	trim($values['keyword']);		
					$filter		=	trim($values['filter']);
					$now		=	trim($values['now']);
					if($now=='2'){
						$now=0;
					}
					$qry="";
					$order	=	'';					
					if(!empty($keyword)){
						$qry.=' AND LOWER(c.`movie_name`) LIKE \'%'.$this->addFilter($this->escapeHtml($keyword)).'%\'';
					}
						if($now!=''){
						$qry.=' AND  c.`movie_status`='.$now;
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
								$order=' ORDER BY c.`movie_name` DESC';
							}else if($ord='asc'){
								$order=' ORDER BY c.`movie_name` ASC';
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
					
					 $query	=	"SELECT count(c.`movie_id`) FROM `cms_movie` c WHERE c.`movie_id`!='' ORDER BY `movie_id` DESC ";
					 $query.=$qry;
					$rec	=	$this->fetchAll($query);
					$this->totalRecords	=	$rec[0]['count(c.`movie_id`)'];
					
					 $query	=	"SELECT c.* FROM `cms_movie` c WHERE c.`movie_id`!='' ORDER BY `movie_id` DESC ";
					$query.=$qry;
					$query.=$order;
					 $query.=' LIMIT '.$start.','.$limit;
					$rec	=	$this->fetchAll($query);
					$this->pageRecords	=	count($rec);

					return $rec;		
		
			}

	function updatecron(){
		$dat=date('Y-m-d');
	
				$query	=	'SELECT * FROM `cms_movie` WHERE `release_date`='.$dat;
				$rec		=	$this->fetchAll($query);
				for($i=0;$i<count($rec);$i++){

				$this->update(array('movie_status'=>'1'),"cms_movie",'`movie_id`='.$rec[$i]['movie_id']);	
				}
				return true;
			}


function getall(){
	$id=1;
				$query	=	"SELECT * FROM `cms_movie` WHERE `status`='$id' ORDER BY `order` ASC ";
				$rec		=	$this->fetchAll($query);
				return $rec;
			}
			function getnowrunning(){
	$id=1;
				$query	=	'SELECT * FROM `cms_movie` WHERE `movie_status`='.$id;
				$rec		=	$this->fetchAll($query);
				
				return $rec;
			}
function lastInsertId()
		{
			return mysql_insert_id();
		}
function getmovie($id){
				$query	=	'SELECT * FROM `cms_movie` WHERE `movie_id`='.$id;
				$rec		=	$this->fetchAll($query);
				return $rec;
			}
		function getshows($id){
				$query	=	'SELECT * FROM `cms_movieshows` WHERE `movie_id`='.$id;
				$rec		=	$this->fetchAll($query);
				return $rec;
			}	
			function getshowsmain($id){
				$g=1;
				$query	=	'SELECT * FROM `cms_movieshows` WHERE `movie_id`='.$id.' AND `mainstatus`='.$g;
				$rec		=	$this->fetchAll($query);
				return $rec;
			}
			/*
			 * Delete News Items
			*/
			function deleteshow($id){
					
							$this->delete('cms_movieshows','`show_id`='.$id);
					return true;
			}
			function dltlist($id){

$query	=	'SELECT * FROM `cms_movieimage` WHERE `movie_id`='.$id.' ';
		$rec	=	$this->fetchAll($query);

		for($i=0;$i<count($rec);$i++){
			$this->delete('cms_movieimage','`image_id`='.$rec[$i]['image_id']);
			$image=$rec[$i]['image_loc'];
			$this->deleteUp($image);
		}
	
}
			function dltshws($id){

$query	=	'SELECT * FROM `cms_movieshows` WHERE `movie_id`='.$id.' ';
		$rec	=	$this->fetchAll($query);

		for($i=0;$i<count($rec);$i++){
			$this->delete('cms_movieshows','`show_id`='.$rec[$i]['show_id']);
			
		}
	
}
  function deleteUp($image){
  	$destinationPath="../uploads/";
            unlink($destinationPath.$image);
        }
			function deleteList($list){
					for($i=0;$i<count($list);$i++){
							$this->dltshws($list[$i]);
							$this->dltlist($list[$i]);
							$this->delete('cms_movie','`movie_id`='.$list[$i]);
					}
			}
			function deletemovie($id){
					$this->dltshws($id);
							$this->dltlist($id);
							$this->delete('cms_movie','`movie_id`='.$id);
					return true;
			}
	
			/*
			 * Un Publush records
			*/	
			function unpublishList($list){
				for($i=0;$i<count($list);$i++){
					$this->update(array('status'=>'0'),"cms_movie",'`movie_id`='.$list[$i]);
				}
			}
			

	/*
			 * Publush records
			*/
			
			function publishList($list){
				for($i=0;$i<count($list);$i++){
					$this->update(array('status'=>'1'),"cms_movie",'`movie_id`='.$list[$i]);
				}
			}

function Removenowrun($list){
	$dat=date('Y-m-d');
				for($i=0;$i<count($list);$i++){
					$this->update(array('movie_status'=>'0','end_date'=>$dat),"cms_movie",'`movie_id`='.$list[$i]);
				}
			}
function getnowrun($list){
				for($i=0;$i<count($list);$i++){
					$this->update(array('movie_status'=>'1'),"cms_movie",'`movie_id`='.$list[$i]);
				}
			}

		}


		?>