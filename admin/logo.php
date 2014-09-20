<?php
$df=new User;
$logodet=$df->getauth();
?>
<h1 id="title"><a href="/admin/"><img src="../uploads/<?php echo $logodet[0]['logo'];  ?>" alt="Logo"></a></h1>