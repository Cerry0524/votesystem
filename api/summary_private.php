<?php

$sql_summary_private_all = "SELECT `categories`.`category` as '類別',
                            SUM(`summary`.`price`) as '小計'
                    from `summary`,`categories`
                    where `summary`.`category_id`=`categories`.`id` AND
                         `summary`.`private`= 1 AND
                         `summary`.`effective_time` like '%$month%'
                GROUP by `summary`.`category_id`";


$sql_summary_private_in = "SELECT `categories`.`category` as '類別',
                            SUM(`summary`.`price`) as '小計'
                    from `summary`,`categories`
                    where `summary`.`category_id`=`categories`.`id` AND
                         `summary`.`private`= 1 AND `summary`.`class`= 0
                GROUP by `summary`.`category_id`";

$sql_summary_private_out = "SELECT `categories`.`category` as '類別',
                            SUM(`summary`.`price`) as '小計'
                    from `summary`,`categories`
                    where `summary`.`category_id`=`categories`.`id` AND
                         `summary`.`private`= 1 AND `summary`.`class`= 1
                GROUP by `summary`.`category_id`";


$summary_private_all=$pdo->query($sql_summary_private_all)->fetchAll(PDO::FETCH_ASSOC);
$summary_private_in=$pdo->query($sql_summary_private_in)->fetchAll(PDO::FETCH_ASSOC);
$summary_private_out=$pdo->query($sql_summary_private_out)->fetchAll(PDO::FETCH_ASSOC);

$sumInprivate = 0;
foreach ($summary_private_in as $summary_privateIn) {
        $sumInprivate += $summary_privateIn['小計'];
}
    
    
$sumOutprivate = 0;
foreach ($summary_private_out as $summary_privateOut) {
        $sumOutprivate += $summary_privateOut['小計'];
}
    
?>