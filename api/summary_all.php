<?php

$sql_summary_public_all = "SELECT `categories`.`category` as '類別',
                            SUM(`summary`.`price`) as '小計'
                    from `summary`,`categories`
                    where `summary`.`category_id`=`categories`.`id` AND
                         `summary`.`private`= 0 AND
                         `summary`.`effective_time` like '%$month%'
                GROUP by `summary`.`category_id`";
                


$sql_summary_public_in = "SELECT `categories`.`category` as '類別',
                            SUM(`summary`.`price`) as '小計'
                    from `summary`,`categories`
                    where `summary`.`category_id`=`categories`.`id` AND
                         `summary`.`private`= 0 AND `summary`.`class`= 0
                GROUP by `summary`.`category_id`";

$sql_summary_public_out = "SELECT `categories`.`category` as '類別',
                            SUM(`summary`.`price`) as '小計'
                    from `summary`,`categories`
                    where `summary`.`category_id`=`categories`.`id` AND
                         `summary`.`private`= 0 AND `summary`.`class`= 1
                GROUP by `summary`.`category_id`";


$summary_public_all=$pdo->query($sql_summary_public_all)->fetchAll(PDO::FETCH_ASSOC);
$summary_public_in=$pdo->query($sql_summary_public_in)->fetchAll(PDO::FETCH_ASSOC);
$summary_public_out=$pdo->query($sql_summary_public_out)->fetchAll(PDO::FETCH_ASSOC);

$sumIn = 0;
foreach ($summary_public_in as $summary_publicIn) {
        $sumIn += $summary_publicIn['小計'];
}
    
    
$sumOut = 0;
foreach ($summary_public_out as $summary_publicOut) {
        $sumOut += $summary_publicOut['小計'];
}
    
?>