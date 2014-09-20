<?php include_once 'header.php'; ?>
<?php
$main="theatre";
$sub="alltheatre";
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
        $obj    =   new Theatre();
        $obj->deleteList($list);
        $message    =   new Message('Selected items deleted ','message');
        $message->setMessage(); 
    }else{
            $message    =   new Message('No items selected','error');
            $message->setMessage();     
    }
    header("Location:alltheatre.php");
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
        $obj    =   new Theatre();
        $obj->unpublishList($list);
        $message    =   new Message('Selected items were unpublished ','message');
        $message->setMessage(); 
    }else{
            $message    =   new Message('No items selected','error');
            $message->setMessage();     
    }
    header("Location:alltheatre.php");
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
        $obj    =   new Theatre();
        $obj->publishList($list);
        $message    =   new Message('Selected items were published ','message');
        $message->setMessage(); 
    }else{
            $message    =   new Message('No items selected','error');
            $message->setMessage();     
    }
    header("Location:alltheatre.php");
    exit;
}






?>
<?php
if(isset($_POST['add'])){
    header("Location:addtheatre.php");
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

if(isset($_POST['keyword'])){
    $keyword    =   $_POST['keyword'];
}else if(isset($_GET['keyword'])){
    $keyword    =   $_GET['keyword'];
}
/*
 * Get results based on search conditions
*/
$values =   array('start'=>$start,'limit'=>$limit,"parent"=>$parent,"keyword"=>$keyword,"ord"=>$ord,"mode"=>$mode);
$obj    =   new Content();
$bn =   new Theatre();
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

<form method="post" action="alltheatre.php" enctype="multipart/form-data">            

            <div id="nav-toolbar">
                <div class="wrapper clearfix">

                    <ul class="breadcrumb pull-left">
                        <li><a href="#">Theatre</a></li>
                        <li><span class="divider"></span></li>
                        <li><a href="#">All</a></li>
                    </ul>

<?php include 'dev-settings-nav-toolbar.php'; ?>


                            <div class="pull-right">
                                <div class="btn-group">
                                    <a class="btn" href="alltheatre.php?start=<?php echo $first;?>&keyword=<?php echo $keyword;?>&parent=<?php echo $parent;?>&ord=<?php echo $ord;?>&mode=<?php echo $mode;?>"><i class="icon-chevron-left"></i></a>
                                    <div class="btn-group">
                                        <a class="btn dropdown-toggle" data-toggle="dropdown">1<span class="caret"></span></a>
                                        <ul class="dropdown-menu num">
                                             <?php for($i=0;$i<count($pages);$i++){ 
                        $star   =   ($pages[$i]-1)*$limit;  ?>
                                            <li><a href="alltheatre.php?start=<?php echo $star;?>&keyword=<?php echo $keyword;?>&parent=<?php echo $parent;?>&ord=<?php echo $ord;?>&mode=<?php echo $mode;?>"><?php echo $pages[$i];?></a></li>
                                          
                                            <?php }?> 
                                        </ul>
                                    </div>
                                    <a class="btn" href="alltheatre.php?start=<?php echo $last;?>&keyword=<?php echo $keyword;?>&parent=<?php echo $parent;?>&ord=<?php echo $ord;?>&mode=<?php echo $mode;?>"><i class="icon-chevron-right"></i></a>
                                </div>

                                <div class="btn-group">
                                    <button class="btn dropdown-toggle" data-toggle="dropdown">100 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right num">
                                       <li><a href="alltheatre.php?limit=20">20</a></li>
                                        <li><a href="alltheatre.php?limit=50">50</a></li>
                                        <li><a href="alltheatre.php?limit=100">100</a></li>
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
                  
    
    <input type="hidden" name="count" id="count" value="<?php echo $pageRecords;?>" />
                <div class="main">

                   <div class="viewlist-all">

                        <div class="mod-header clearfix">
                            <div class="pull-left">

                                <label class="btn"><input id="select_all_from_list" type="checkbox" onclick="checkAll(this);" class="incheckbox"></label>

                                <span class="btn-group">
                                    <input type="submit" name="publish" value="Publish" class="btn">
                                  <input type="submit" name="unpublish" value="Revert to Drafts" class="btn">
                                  <button class="btn" type="submit" name="delete"><i class="icon-trash"></i></button >
                                </span>

                                <input type="submit" name="add" value="Add New Theatre" class="btn btn-primary">&nbsp;&nbsp;

                            </div>

                            <div class="form-inline pull-right">
                                <div class="input-append">
                                    <input type="text" class="input-medium" name="keyword" placeholder="Search Theatre">
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
      <th>Theatre name</th>
         <th>Image</th>
            <th>No. of seats</th>
    </tr>
  </thead>

                                <tbody>

                                   <?php if($totalRecords > 0){
                    for($i=0;$i<$pageRecords;$i++){
                        ?>
                                    <tr>
                                        <input type="hidden" name="id<?php echo $i;?>" value="<?php echo $records[$i]['theatre_id'];?>" />
                                        <td width="5%"><label class="checkbox"><input type="checkbox" name="chkId<?php echo $i;?>" id="chkId<?php echo $i;?>" value="<?php echo $records[$i]['theatre_id'];?>"></label></td>

                                        <td  width="60%">
                                            <a href="#" class="title"><?php echo strtoupper($records[$i]['theatre_name']);?> <?php if($records[$i]['status']==0) { ?><small>Draft</small> <?php } ?> </a>
                                            <div class="visible-on-select">
                                                <a href="edittheatre.php?id=<?php echo $records[$i]['theatre_id'];  ?>">Edit</a>&nbsp;|&nbsp;<a href="edittheatre.php?id=<?php echo $records[$i]['theatre_id'];  ?>">View</a>&nbsp;|&nbsp;<a href="delete_theatre.php?id=<?php echo $records[$i]['theatre_id']; ?>">Delete</a>
                                            </div>
                                        </td>

                                        <td  width="20%"><span class="author"><img src="thumb.php?file=../uploads/<?php echo $records[$i]['image_loc'];?>&size=50"></span></td>

                                        <td  width="15%"><span class="meta-data"><?php echo $records[$i]['no_seats'];?></span></td>
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
</form>


                    </div> <!-- .viewlist-all -->

                </div> <!-- .main -->

            </div>
 <script type="text/javascript" src="js/util.js"></script>
<?php include_once 'footer.php'; ?>

        </div> <!-- #content -->

    </body>
</html>
    