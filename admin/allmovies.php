<?php include_once 'header.php'; ?>
<?php
session_start();
$main="movie";
$sub="allmovie";
$start  =   $_GET['start'];
$limit=$_GET['limit'];
if(empty($limit)){
    $limit  =   25;
}else{
$limit=$_GET['limit'];
}
if(empty($start)){
    $start  =   0;
}

if(isset($_POST['delete'])){
    $cnt    =   $_POST['count'];
    $list   =   array();
    for($i=0;$i<$cnt;$i++){
        if(isset($_POST['chkId'.$i])){
            $list[] =   $_POST['chkId'.$i];
        }
    }
    if(count($list)>0){
        $obj    =   new Movie();
        $obj->deleteList($list);
        $message    =   new Message('Selected items deleted ','message');
        $message->setMessage(); 
    }else{
            $message    =   new Message('No items selected','error');
            $message->setMessage();     
    }
    header("Location:allmovies.php");
    exit;
    
}
if(isset($_POST['unpublish'])){
    $cnt    =   $_POST['count'];
    $list   =   array();
    for($i=0;$i<$cnt;$i++){
        if(isset($_POST['chkId'.$i])){
            $list[] =   $_POST['chkId'.$i];
        }
    }
    if(count($list)>0){
        $obj    =   new Movie();
        $obj->unpublishList($list);
        $message    =   new Message('Selected items were unpublished ','message');
        $message->setMessage(); 
    }else{
            $message    =   new Message('No items selected','error');
            $message->setMessage();     
    }
    header("Location:allmovies.php");
    exit;
}

/*
 * Publish Seleted list of items
*/
if(isset($_POST['publish'])){
    $cnt    =   $_POST['count'];
    $list   =   array();
    for($i=0;$i<$cnt;$i++){
        if(isset($_POST['chkId'.$i])){
            $list[] =   $_POST['chkId'.$i];
        }
    }
    if(count($list)>0){
        $obj    =   new Movie();
        $obj->publishList($list);
        $message    =   new Message('Selected items were published ','message');
        $message->setMessage(); 
    }else{
            $message    =   new Message('No items selected','error');
            $message->setMessage();     
    }
    header("Location:allmovies.php");
    exit;
}

if(isset($_POST['nowrunchange'])){
    $cnt    =   $_POST['count'];
    $list   =   array();
    for($i=0;$i<$cnt;$i++){
        if(isset($_POST['chkId'.$i])){
            $list[] =   $_POST['chkId'.$i];
        }
    }
    if(count($list)>0){
        $obj    =   new Movie();
        $obj->Removenowrun($list);
        $message    =   new Message('Selected items were changed ','message');
        $message->setMessage(); 
    }else{
            $message    =   new Message('No items selected','error');
            $message->setMessage();     
    }
    header("Location:allmovies.php");
    exit;
}
/*
 * Update the listing Order
*/
if(isset($_POST['setorder'])){
    $cnt    =   $_POST['count'];
    $list   =   array();
    $p  =   0;
    for($i=0;$i<$cnt;$i++){
        $list[$p][0]    =   $_POST['id'.$i];
        $list[$p][1]    =   $_POST['txtOrder'.$i];
        $p++;
    }
    $obj    =   new Movie();
    $obj->setOrder($list);
    $message    =   new Message('Order has been applied ','message');
    $message->setMessage(); 
    header("Location:allmovies.php");
    exit;
}
if(isset($_POST['nowrun'])){
    $cnt    =   $_POST['count'];
    $list   =   array();
    for($i=0;$i<$cnt;$i++){
        if(isset($_POST['chkId'.$i])){
            $list[] =   $_POST['chkId'.$i];
        }
    }
    if(count($list)>0){
        $obj    =   new Movie();
        $obj->getnowrun($list);
        $message    =   new Message('Selected items were changed ','message');
        $message->setMessage(); 
    }else{
            $message    =   new Message('No items selected','error');
            $message->setMessage();     
    }
    header("Location:allmovies.php");
    exit;
}


?>
<?php
if(isset($_POST['add'])){
    header("Location:addmovie.php");
}


/*
 * Read an initialize search paramerts
*/
$msg    =   '';
$keyword=   '';
$parent =   '';
$ord    =   '';
$mode   =   '';
$filter =   '';
$now='';
if(isset($_POST['keyword'])){
    $keyword    =   $_POST['keyword'];
}else if(isset($_GET['keyword'])){
    $keyword    =   $_GET['keyword'];
}
if(isset($_POST['now'])){
    $now   =   $_POST['now'];
}else if(isset($_GET['now'])){
    $now    =   $_GET['now'];
}
/*
 * Get results based on search conditions
*/
$values =   array('start'=>$start,'limit'=>$limit,"parent"=>$parent,"keyword"=>$keyword,"ord"=>$ord,"mode"=>$mode,"now"=>$now);
$obj    =   new Content();
$bn =   new Movie();
$records    =   $bn->listall($values);
$totalRecords   =   $bn->totalRecords;
$pageRecords    =   $bn->pageRecords;
$cnt    =   $totalRecords/$limit;
$cnt    =   ceil($cnt);
$current    =   ($start/$limit)+1;  

$pg =   new Pages();
$pages  =   $pg->getPages($current,$cnt,$limit);                    
$first  =   $pg->getFirst($cnt,$limit);
$last   =   $pg->getLast($cnt,$limit);
$prev   =   $pg->getPrev($current,$cnt,$limit);
$next   =   $pg->getNext($current,$cnt,$limit);
$vb=new Theatre();
?>

<?php 
    $view           =   $_SESSION["messageView"];
    $mess   =   $_SESSION["message"];
    $type           =   $_SESSION["messageType"];
    if($view=="0" && !empty($message) && !empty($type)){
        switch($type){
            case 'error':
                echo '<script type="text/javascript">alert("'.$mess.'");</script>';
                break;
            case 'message':
                echo '<script type="text/javascript">alert("'.$mess.'");</script>';
                break;
            case 'warning':
                echo '<script type="text/javascript">alert("'.$mess.'");</script>';
                break;
            
            default:
                echo '<script type="text/javascript">alert("'.$mess.'");</script>';
                break;
        }
    }           
    unset($_SESSION["messageView"]);
    unset($_SESSION["message"]);
    unset($_SESSION["messageType"]);
?>

        <div id="fixedbar">
            <div id="topbar">
                <div class="wrapper clearfix">

                     <?php include_once 'logo.php'; ?>

<?php include_once 'topmovie-buttons.php'; ?>

<?php include_once 'user-settings-topbar.php'; ?>

                </div>
            </div> <!-- #topbar -->

<form method="post" action="allmovies.php" enctype="multipart/form-data">

            <div id="nav-toolbar">
                <div class="wrapper clearfix">

                    <ul class="breadcrumb pull-left">
                        <li><a href="#">Movies</a></li>
                        <li><span class="divider"></span></li>
                        <li><a href="#">All</a></li>
                    </ul>   

<?php include 'dev-settings-nav-toolbar.php'; ?>


                            <div class="pull-right">

                                <div class="btn-group">
                                    <a href="allmovies.php?start=<?php echo $first;?>&now=<?php echo $now;?>&keyword=<?php echo $keyword;?>&parent=<?php echo $parent;?>&ord=<?php echo $ord;?>&mode=<?php echo $mode;?>" class="btn"><i class="icon-chevron-left"></i></a>
                                    <div class="btn-group">
                                        <a class="btn dropdown-toggle" data-toggle="dropdown">1 <span class="caret"></span></a>
                                        <ul class="dropdown-menu num">
                                          <?php for($i=0;$i<count($pages);$i++){ 
                        $star   =   ($pages[$i]-1)*$limit;  ?>
                                            <li><a href="allmovies.php?start=<?php echo $star;?>&now=<?php echo $now;?>&keyword=<?php echo $keyword;?>&parent=<?php echo $parent;?>&ord=<?php echo $ord;?>&mode=<?php echo $mode;?>"><?php echo $pages[$i];?></a></li>
                                          
                                            <?php }?> 
                                        </ul>
                                    </div>
                                    <a href="allmovies.php?start=<?php echo $last;?>&now=<?php echo $now;?>&keyword=<?php echo $keyword;?>&parent=<?php echo $parent;?>&ord=<?php echo $ord;?>&mode=<?php echo $mode;?>" class="btn"><i class="icon-chevron-right"></i></a>
                                </div>

                                <div class="btn-group">
                                    <button class="btn dropdown-toggle" data-toggle="dropdown">100 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right num">
                                        <li><a href="allmovies.php?limit=20">20</a></li>
                                        <li><a href="allmovies.php?limit=50">50</a></li>
                                        <li><a href="allmovies.php?limit=100">100</a></li>
                                    </ul>
                                </div>&nbsp;&nbsp;

                            </div>



                </div>
            </div> <!-- #nav-toolbar -->
        </div> <!-- #fixedbar -->

<?php include_once 'dev-settings.php'; ?>


        <div id="content" class="clearfix">
            <div class="wrapper clearfix">

                <div class="aside">

<?php include 'sidenav.php'; ?>

                </div> <!-- .aside -->



                <div class="main">

                   <div class="viewlist-all">

    
    <input type="hidden" name="count" id="count" value="<?php echo $pageRecords;?>" />
                        <div class="mod-header clearfix">

                            <div class="pull-left">
                                <label class="btn"><input id="select_all_from_list" type="checkbox" class="incheckbox" onclick="checkAll(this);"></label>

                                <span class="btn-group">
                                    <input type="submit" name="publish" value="Publish" class="btn">
                                  <input type="submit" name="unpublish" value="Drafts" class="btn">
                                  <button class="btn" type="submit" name="delete"><i class="icon-trash"></i></button >
                                </span>
                                <input type="submit" class="btn btn-warning" value="Remove Now running" name="nowrunchange">
                            </div>

                            <div class="form-inline pull-right">
                                <input type="submit" class="btn btn-success" value="Set Order" name="setorder">&nbsp;&nbsp;
                                <select class="input-mini" name="now">
                                 <option value="">All</option>
                                 <option value="1">Now running</option>
                                 <option value="0">Upcoming</option>
                                </select>

                                <div class="input-append">
                                    <input type="text" class="input-medium search-query1" name="keyword" placeholder="Search movie">
                                    <button type="submit" class="btn" value="Search" name="search"><i class="icon-search"></i></button>
                                </div>
                            </div>


                        </div> <!-- .mod-header -->

                         <script>
                            $(function() {
                                $('.viewlist-all input[type="checkbox"]').click(function(){
                                    $(this).parents('tr').toggleClass('info');
                                });
                                $('#select_all_from_list').click(function() {
                                    if ($(this).is(':checked')) {
                                        $('.viewlist-all input[type="checkbox"]').each(function(){
                                            $(this).attr('checked', 'checked').parents('tr').addClass('info');
                                        }); 
                                    } else {
                                        $('.viewlist-all input[type="checkbox"]').each(function(){
                                            $(this).removeAttr('checked').parents('tr').removeClass('info');
                                        }); 
                                    };
                                });
                            });
                        </script>

                        <div class="mod-content">
                            <table class="table">
                                <thead>
    <tr>
      <th></th>
      <th>Movie  name</th>
        <th>Order</th>
         <th>Poster</th>
            <th>Release date</th>
    </tr>
  </thead>
                                <tbody>
         <?php if($totalRecords > 0){
                    for($i=0;$i<$pageRecords;$i++){
                        ?>
                                    <tr>
                                         <input type="hidden" name="id<?php echo $i;?>" value="<?php echo $records[$i]['movie_id'];?>" />
                                        <td width="5%"><label class="checkbox"><input type="checkbox" name="chkId<?php echo $i;?>" id="chkId<?php echo $i;?>" value="<?php echo $records[$i]['movie_id'];?>"></label></td>
<?php
$thet=$vb->getthtlist($records[$i]['movie_id']);
?>

                                        <td  width="60%">
                                            <a href="#" class="title"><?php echo strtoupper($records[$i]['movie_name']);?><?php if($records[$i]['status']==0) { ?><small>Draft</small> <?php } ?> </a> <span class="theatre">

<?php for($j=0;$j<count($thet);$j++){           
$tt=$thet[$j]['theatre_id'];
$ttdet=$vb->gettheatre($tt);
$ttname=$ttdet[0]['theatre_name'];
   ?>
                                            <a href="edittheatre.php?id=<?php echo $thet[$j]['theatre_id']; ?>"><?php echo $ttname; ?></a>,
<?php         }  ?>

                                        </span><?php if($records[$i]['movie_status']==1) { ?> <span class="label label-success">Now Running</span> <?php } ?><?php if($records[$i]['movie_status']==2) { ?> <span class="label label-error">Closed</span> <?php } ?> <?php if($records[$i]['movie_status']==0) { ?> <span class="label label-info">Upcoming</span> <?php } ?>
                                            <div class="visible-on-select">
                                                <a href="editmovie.php?id=<?php echo $records[$i]['movie_id'];?>">Edit</a>&nbsp;|&nbsp;<a href="<?php echo $records[$i]['movie_id'];?>">View</a>&nbsp;|&nbsp;<a href="delete_movie.php?id=<?php echo $records[$i]['movie_id'];?>">Delete</a>
                                            </div>

                                        </td>
<td width="5%"><input type="text" name="txtOrder<?php echo $i;?>" value="<?php echo $records[$i]["order"];?>"  class="input-mini"></td>
                                        
                                        <td  width="15%"><span class="author"><img src="thumb.php?file=../uploads/<?php echo $records[$i]['poster'];?>&size=50"></span></td>
                                        <td  width="15%"><span class="meta-data"><?php echo $records[$i]['release_date'];?></span></td>
                                    </tr>

                                <?php } ?>
<?php
                }
                else{
                    ?>
                   <tr><td width="60%">  <div class="alert alert-error">Sorry no records found </div> </td></tr>
                            <?php
                }
                ?> 


                                </tbody>
                            </table>
                        </div> <!-- .mod-content -->



                    </div> <!-- .viewlist-all -->

                </div> <!-- .main -->

            </div>
 <script type="text/javascript" src="js/util.js"></script>
<?php include_once 'footer.php'; ?>

        </div> <!-- #content -->

    </body>
</html>
