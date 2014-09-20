<?php
    ob_start();
    include("autoload.php");
    $db   = new MySql();
    $db->connect();
    $nw=new News();
    $news=$nw->getall();
?>
<h1> NEWS</h1>

    <?php
    for($i=0;$i<count($news);$i++){
echo "</br>";
echo "Title:";
echo $news[$i]['title'];
echo "</br>";
echo "Content:";
echo $news[$i]['content'];
    }


    ?>