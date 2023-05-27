<?php
$sql_summary_lists = "SELECT `summary`.`effective_time` as '日期',
                             `summary`.`class` as '屬性',
                             `summary`.`project` as '項目',
                             `summary`.`details` as '細節',
                             `categories`.`category` as '類別',
                             `summary`.`amount` as '數量',
                             `summary`.`price` as '金額',
                             `summary`.`private` as '公開/私人',
                             `summary`.`continuous` as '持續性'
                   FROM `summary`,`categories`
                   WHERE `summary`.`category_id`=`categories`.`id`
                   Order By `summary`.`effective_time` desc";

$summary_lists = $pdo->query($sql_summary_lists)->fetchALL(PDO::FETCH_ASSOC);

// echo "<pre>";
// print_r($summary_lists);
// echo "</pre>";

?>
