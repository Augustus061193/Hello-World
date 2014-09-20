<?php include_once 'header.php'; ?>
<?php
session_start();
$main="news";
$sub="allnews";
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
        $obj    =   new News();
        $obj->deleteList($list);
        $message    =   new Message('Selected items deleted ','message');
        $message->setMessage(); 
    }else{
            $message    =   new Message('No items selected','error');
            $message->setMessage();     
    }
    header("Location:news-listing.php");
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
        $obj    =   new News();
        $obj->unpublishList($list);
        $message    =   new Message('Selected items were unpublished ','message');
        $message->setMessage(); 
    }else{
            $message    =   new Message('No items selected','error');
            $message->setMessage();     
    }
    header("Location:news-listing.php");
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
        $obj    =   new News();
        $obj->publishList($list);
        $message    =   new Message('Selected items were published ','message');
        $message->setMessage(); 
    }else{
            $message    =   new Message('No items selected','error');
            $message->setMessage();     
    }
    header("Location:news-listing.php");
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
    $obj    =   new News();
    $obj->setOrder($list);
    $message    =   new Message('Order has been applied ','message');
    $message->setMessage(); 
    header("Location:news-listing.php");
    exit;
}



?>
<?php
if(isset($_POST['add'])){
    header("Location:addnews.php");
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

/*
 * Get results based on search conditions
*/
$values =   array('start'=>$start,'limit'=>$limit,"parent"=>$parent,"keyword"=>$keyword,"ord"=>$ord,"mode"=>$mode);
$obj    =   new Content();
$bn =   new News();
$records    =   $bn->listNews($values);
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

<form method="post" action="news-listing.php" enctype="multipart/form-data">

            <div id="nav-toolbar">
                <div class="wrapper clearfix">

                    <ul class="breadcrumb pull-left">
                        <li><a href="#">News</a></li>
                        <li><span class="divider"></span></li>
                        <li><a href="#">All</a></li>
                    </ul>   

<?php include 'dev-settings-nav-toolbar.php'; ?>


                            <div class="pull-right">

                                <div class="btn-group">
                                    <a href="news-listing.php?start=<?php echo $first;?>&keyword=<?php echo $keyword;?>&parent=<?php echo $parent;?>&ord=<?php echo $ord;?>&mode=<?php echo $mode;?>" class="btn"><i class="icon-chevron-left"></i></a>
                                    <div class="btn-group">
                                        <a class="btn dropdown-toggle" data-toggle="dropdown">1 <span class="caret"></span></a>
                                        <ul class="dropdown-menu num">
                                          <?php for($i=0;$i<count($pages);$i++){ 
                        $star   =   ($pages[$i]-1)*$limit;  ?>
                                            <li><a href="news-listing.php?start=<?php echo $star;?>&keyword=<?php echo $keyword;?>&parent=<?php echo $parent;?>&ord=<?php echo $ord;?>&mode=<?php echo $mode;?>"><?php echo $pages[$i];?></a></li>
                                          
                                            <?php }?> 
                                        </ul>
                                    </div>
                                    <a href="news-listing.php?start=<?php echo $last;?>&keyword=<?php echo $keyword;?>&parent=<?php echo $parent;?>&ord=<?php echo $ord;?>&mode=<?php echo $mode;?>" class="btn"><i class="icon-chevron-right"></i></a>
                                </div>

                                <div class="btn-group">
                                    <button class="btn dropdown-toggle" data-toggle="dropdown">100 <span class="caret"></span></button>
                                    <ul class="dropdown-menu pull-right num">
                                        <li><a href="news-listing.php?limit=20">20</a></li>
                                        <li><a href="news-listing.php?limit=50">50</a></li>
                                        <li><a href="news-listing.php?limit=100">100</a></li>
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
                                     <input type="submit" class="btn btn-success" value="Set Order" name="setorder">&nbsp;&nbsp;
                                </span>
                                
                            </div>

                            <div class="form-inline pull-right">
                               
                                

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
      <th>News title</th>
        <th>Order</th>
     
            <th>Date</th>
    </tr>
  </thead>
                                <tbody>
         <?php if($totalRecords > 0){
                    for($i=0;$i<$pageRecords;$i++){
                        ?>
                                    <tr>
                                         <input type="hidden" name="id<?php echo $i;?>" value="<?php echo $records[$i]['news_id'];?>" />
                                        <td width="5%"><label class="checkbox"><input type="checkbox" name="chkId<?php echo $i;?>" id="chkId<?php echo $i;?>" value="<?php echo $records[$i]['news_id'];?>"></label></td>


                                        <td  width="60%">
                                            <a href="#" class="title"><?php echo strtoupper($records[$i]['title']);?><?php if($records[$i]['published']==0) { ?><small>Draft</small> <?php } ?> </a> <span class="theatre">


                                        </span>
                                            <div class="visible-on-select">
                                                <a href="editnews.php?id=<?php echo $records[$i]['news_id'];?>">Edit</a>&nbsp;|&nbsp;<a href="editnews.php?id=<?php echo $records[$i]['news_id'];?>">View</a>&nbsp;|&nbsp;<a href="delete_news.php?id=<?php echo $records[$i]['news_id'];?>">Delete</a>
                                            </div>

                                        </td>
<td width="5%"><input type="text" name="txtOrder<?php echo $i;?>" value="<?php echo $records[$i]["order"];?>"  class="input-mini"></td>
                                        
                                        
                                        <td  width="30%"><span class="meta-data"><?php echo $records[$i]['date_update'];?></span></td>
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
