<?php
require_once("connect.php");
?>
<markers>
<?php
$q="SELECT * FROM user_position WHERE 1 ORDER BY user_position_id LIMIT 30 ";
$qr=mysql_query($q);
while($rs=mysql_fetch_array($qr)){
?>
    <marker id="<?=$rs['user_id']?>">
        <name><?=$rs['user_name']?></name>
        <latitude><?=$rs['user_latitude']?></latitude>
        <longitude><?=$rs['user_longitude']?></longitude>
        <lastdate><?=$rs['user_datetime']?></lastdate>
        <icon><?=$rs['user_icons']?></icon>
    </marker>
<?php } ?>
</markers>