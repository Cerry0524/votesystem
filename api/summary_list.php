<?php

$time = ($_GET['time']) ?? "asc";
$proj = ($_GET['proj']) ?? "asc";
$detail = ($_GET['detail']) ?? "asc";
$cate = ($_GET['cate']) ?? "asc";
$amont = ($_GET['amont']) ?? "asc";
$price = ($_GET['price']) ?? "asc";
$class = ($_GET['class']) ?? "asc";
$private = ($_GET['private']) ?? "asc";
$cont = ($_GET['cont']) ?? "asc";
$btnClick = ($_GET['btn']) ?? "1";

$sql_summary_select = "SELECT `summary`.`effective_time` as '日期',
                             `summary`.`class` as '屬性',
                             `summary`.`project` as '項目',
                             `summary`.`details` as '細節',
                             `categories`.`category` as '類別',
                             `summary`.`amount` as '數量',
                             `summary`.`price` as '金額',
                             `summary`.`private` as '公開/私人',
                             `summary`.`continuous` as '持續性'
                      FROM `summary`, `categories` ";

//sql  where判別

switch ($class) {
    case 'in':
        $class_check = " AND `summary`.`class`='0'";
        break;
    case 'out':
        $class_check = " AND `summary`.`class`='1'";
        break;
    default:
        $class_check = "";
        break;
}

switch ($private) {
    case 'no':
        $private_check = " AND `summary`.`private`='0'";
        break;
    case 'yes':
        $private_check = " AND `summary`.`private`='1'";
        break;
    default:
        $private_check = "";
        break;
}


switch ($cont) {
    case 'no':
        $cont_check = " AND `summary`.`continuous`='0'";
        break;
    case 'yes':
        $cont_check = " AND `summary`.`continuous`='1'";
        break;
    default:
        $cont_check = "";
        break;
}


//sql  orderby判別-第一組
switch ($btnClick) {
    case '1':
        $select_order = "`summary`.`effective_time` Asc";
        break;
    case '2':
        $select_order = "`summary`.`effective_time` Desc";
        break;
    case '3':
        $select_order = "`summary`.`project` Asc";
        break;
    case '4':
        $select_order = "`summary`.`project` Desc";
        break;
    case '5':
        $select_order = "`summary`.`details` Asc";
        break;
    case '6':
        $select_order = "`summary`.`details` Desc";
        break;
    case '7':
        $select_order = "`summary`.`category_id` Asc";
        break;
    case '8':
        $select_order = "`summary`.`category_id` Desc";
        break;
    case '9':
        $select_order = "`summary`.`amount` Asc";
        break;
    case '10':
        $select_order = "`summary`.`amount` Desc";
        break;
    case '11':
        $select_order = "`summary`.`price` Asc";
        break;
    case '12':
        $select_order = "`summary`.`price` Desc";
        break;
    default:
        $select_order = "`summary`.`effective_time` Asc";
        break;
}

//where組合
$sql_summary_where = "WHERE `summary`.`category_id`=`categories`.`id`" .
    $class_check . $private_check . $cont_check;
// echo $sql_summary_where;
//orderby組合
$sql_summary_select_order = " Order By " . $select_order . ";";
// echo $sql_summary_select_order;

$sql_summary_lists = $sql_summary_select . $sql_summary_where . $sql_summary_select_order;
echo $sql_summary_lists;

$summary_lists = $pdo->query($sql_summary_lists)->fetchALL(PDO::FETCH_ASSOC);

// echo "<pre>";
// print_r($summary_lists);
// echo "</pre>";
