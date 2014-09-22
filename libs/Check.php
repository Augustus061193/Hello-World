<?php
/*
 * Date:8-16-2012
 * Login Form , entry to the application
 * Auhthor : Litto chacko
 * Email:littochackomp@gmail.com
*/
	class Check extends MySql{
		




function checkms($theatreid,$dat){
$c=1;
$query	=	'SELECT * FROM `cms_movieshows` WHERE `theatre_id`='.$theatreid.' AND  `ms_status`='.$c;
				$rec		=	$this->fetchAll($query);
				 $dt=date('Y-m-d',strtotime($dat));

if(count($rec)>0){

for($i=0;$i<count($rec);$i++){

$movieid=$rec[$i]['movie_id'];
 $query1="SELECT * FROM `cms_movie` WHERE `movie_id`='$movieid' AND `release_date` <'$dt' AND `end_date` > '$dt'";
$rec1		=	$this->fetchAll($query1);

if(count($rec1)>0){
return false;
}else{

}
}
return true;

}
else{

	return true;
}

}



function checkmat($theatreid,$dat){
$c=1;
$query	=	'SELECT * FROM `cms_movieshows` WHERE `theatre_id`='.$theatreid.' AND  `mat_status`='.$c;
				$rec		=	$this->fetchAll($query);
 $dt=date('Y-m-d',strtotime($dat));
if(count($rec)>0){

for($i=0;$i<count($rec);$i++){

$movieid=$rec[$i]['movie_id'];
$query1="SELECT * FROM `cms_movie` WHERE `movie_id`='$movieid' AND `release_date` <'$dt' AND `end_date` > '$dt'";
$rec1		=	$this->fetchAll($query1);

if(count($rec1)>0){
return false;
}else{

}
}
return true;
}
else{

	return true;
}

}

function checkevg($theatreid,$dat){
$c=1;
 $query	=	'SELECT * FROM `cms_movieshows` WHERE `theatre_id`='.$theatreid.' AND  `evg_status`='.$c;
				$rec		=	$this->fetchAll($query);
 $dt=date('Y-m-d',strtotime($dat));
if(count($rec)>0){

for($i=0;$i<count($rec);$i++){

$movieid=$rec[$i]['movie_id'];
 $query1="SELECT * FROM `cms_movie` WHERE `movie_id`='$movieid' AND `release_date` <'$dt' AND `end_date` > '$dt'";
$rec1		=	$this->fetchAll($query1);

if(count($rec1)>0){
return false;
}else{

}
}
return true;
}
else{

	return true;
}

}

function checksec($theatreid,$dat){
$c=1;
$query	=	'SELECT * FROM `cms_movieshows` WHERE `theatre_id`='.$theatreid.' AND  `sec_status`='.$c;
				$rec		=	$this->fetchAll($query);
 $dt=date('Y-m-d',strtotime($dat));
if(count($rec)>0){

for($i=0;$i<count($rec);$i++){

$movieid=$rec[$i]['movie_id'];
$query1="SELECT * FROM `cms_movie` WHERE `movie_id`='$movieid' AND `release_date` <'$dt' AND `end_date` > '$dt'";
$rec1		=	$this->fetchAll($query1);

if(count($rec1)>0){
return false;
}else{

}
}
return true;
}
else{

	return true;
}

}

function checkextra1($theatreid,$dat){
$c=1;
$query	=	'SELECT * FROM `cms_movieshows` WHERE `theatre_id`='.$theatreid.' AND  `extrashow1_status`='.$c;
				$rec		=	$this->fetchAll($query);
 $dt=date('Y-m-d',strtotime($dat));
if(count($rec)>0){

for($i=0;$i<count($rec);$i++){

$movieid=$rec[$i]['movie_id'];
$query1="SELECT * FROM `cms_movie` WHERE `movie_id`='$movieid' AND `release_date` <'$dt' AND `end_date` > '$dt'";
$rec1		=	$this->fetchAll($query1);

if(count($rec1)>0){
return false;
}else{

}
}
return true;
}
else{

	return true;
}

}

function checkextra2($theatreid,$dat){
$c=1;
$query	=	'SELECT * FROM `cms_movieshows` WHERE `theatre_id`='.$theatreid.' AND  `extrashow2_status`='.$c;
				$rec		=	$this->fetchAll($query);
 $dt=date('Y-m-d',strtotime($dat));
if(count($rec)>0){

for($i=0;$i<count($rec);$i++){

$movieid=$rec[$i]['movie_id'];
$query1="SELECT * FROM `cms_movie` WHERE `movie_id`='$movieid' AND `release_date` <'$dt' AND `end_date` > '$dt'";
$rec1		=	$this->fetchAll($query1);

if(count($rec1)>0){
return false;
}else{

}
}
return true;
}
else{

	return true;
}

}

		}


		?>