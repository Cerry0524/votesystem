<?php

$time = ($_GET['time']) ?? "asc";
$proj = ($_GET['proj']) ?? "asc";
$details = ($_GET['detail']) ?? "asc";
$cate = ($_GET['cate']) ?? "asc";
$amount = ($_GET['amount']) ?? "asc";
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
function clickBtn(
    $btnClick,
    $time,
    $proj,
    $details,
    $cate,
    $amount,
    $price
) {
    $s = "`summary`.";
    $k = ", ";

    switch ($btnClick) {
        case '1':
            $select_order = $s . "`effective_time` Asc" . $k .
                $s . orderProj($proj) . $k .
                $s . orderDetails($details) . $k .
                $s . orderCate($cate) . $k .
                $s . orderAmount($amount) . $k .
                $s . orderPrice($price);

            break;
        case '2':
            $select_order = "`effective_time` Desc" . $k .
                $s . orderProj($proj) . $k .
                $s . orderDetails($details) . $k .
                $s . orderCate($cate) . $k .
                $s . orderAmount($amount) . $k .
                $s . orderPrice($price);
            break;
        case '3':
            $select_order = "`project` Asc" . $k .
                $s . orderTime($time) . $k .
                $s . orderDetails($details) . $k .
                $s . orderCate($cate) . $k .
                $s . orderAmount($amount) . $k .
                $s . orderPrice($price);
            break;
        case '4':
            $select_order = "`project` Desc" . $k .
                $s . orderTime($time) . $k .
                $s . orderDetails($details) . $k .
                $s . orderCate($cate) . $k .
                $s . orderAmount($amount) . $k .
                $s . orderPrice($price);
            break;
        case '5':
            $select_order = "`details` Asc" . $k .
                $s . orderTime($time) . $k .
                $s . orderProj($proj) . $k .
                $s . orderCate($cate) . $k .
                $s . orderAmount($amount) . $k .
                $s . orderPrice($price);
            break;
        case '6':
            $select_order = "`details` Desc" . $k .
                $s . orderTime($time) . $k .
                $s . orderProj($proj) . $k .
                $s . orderCate($cate) . $k .
                $s . orderAmount($amount) . $k .
                $s . orderPrice($price);
            break;
        case '7':
            $select_order = "`category_id` Asc" . $k .
                $s . orderTime($time) . $k .
                $s . orderProj($proj) . $k .
                $s . orderDetails($details) . $k .
                $s . orderAmount($amount) . $k .
                $s . orderPrice($price);
            break;
        case '8':
            $select_order = "`category_id` Desc" . $k .
                $s . orderTime($time) . $k .
                $s . orderProj($proj) . $k .
                $s . orderDetails($details) . $k .
                $s . orderAmount($amount) . $k .
                $s . orderPrice($price);
            break;
        case '9':
            $select_order = "`amount` Asc" . $k .
                $s . orderTime($time) . $k .
                $s . orderProj($proj) . $k .
                $s . orderDetails($details) . $k .
                $s . orderCate($cate) . $k .
                $s . orderPrice($price);
            break;
        case '10':
            $select_order = "`amount` Desc" . $k .
                $s . orderTime($time) . $k .
                $s . orderProj($proj) . $k .
                $s . orderDetails($details) . $k .
                $s . orderCate($cate) . $k .
                $s . orderPrice($price);
            break;
        case '11':
            $select_order = "`price` Asc" . $k .
                $s . orderTime($time) . $k .
                $s . orderProj($proj) . $k .
                $s . orderDetails($details) . $k .
                $s . orderCate($cate) . $k .
                $s . orderAmount($amount);
            break;
        case '12':
            $select_order = "`price` Desc" . $k .
                $s . orderTime($time) . $k .
                $s . orderProj($proj) . $k .
                $s . orderDetails($details) . $k .
                $s . orderCate($cate) . $k .
                $s . orderAmount($amount);
            break;
        default:
            $select_order = $s . "`effective_time` Asc" . $k .
                $s . orderProj($proj) . $k .
                $s . orderDetails($details) . $k .
                $s . orderCate($cate) . $k .
                $s . orderAmount($amount) . $k .
                $s . orderPrice($price);;
            break;
    };


    return $select_order;
};

function orderTime($time)
{
    switch ($time) {
        case 'asc':
            return "`effective_time` Asc";
            break;
        case 'desc':
            return "`effective_time` Desc";
            break;
    }
}

function orderProj($proj)
{
    switch ($proj) {
        case 'asc':
            return "`project` Asc";
            break;
        case 'desc':
            return "`project` Desc";
            break;
    }
}

function orderDetails($details)
{
    switch ($details) {
        case 'asc':
            return "`details` Asc";
            break;
        case 'desc':
            return "`details` Desc";
            break;
    }
}

function orderCate($cate)
{
    switch ($cate) {
        case 'asc':
            return "`category_id` Asc";
            break;
        case 'desc':
            return "`category_id` Desc";
            break;
    }
}

function orderAmount($amount)
{
    switch ($amount) {
        case 'asc':
            return "`amount` Asc";
            break;
        case 'desc':
            return "`amount` Desc";
            break;
    }
}

function orderPrice($price)
{
    switch ($price) {
        case 'asc':
            return "`price` Asc";
            break;
        case 'desc':
            return "`price` Desc";
            break;
    }
}
//sql  orderby判別 後續判別function




//where組合
$sql_summary_where = "WHERE `summary`.`category_id`=`categories`.`id`" .
    $class_check . $private_check . $cont_check;
// echo $sql_summary_where;

//orderby組合
$sql_summary_select_order = " Order By " . clickBtn($btnClick, $time, $proj, $details, $cate, $amount, $price) . ";";
// echo $sql_summary_select_order;

$sql_summary_lists = $sql_summary_select . $sql_summary_where . $sql_summary_select_order;
echo $sql_summary_lists;

$summary_lists = $pdo->query($sql_summary_lists)->fetchALL(PDO::FETCH_ASSOC);

// echo "<pre>";
// print_r($summary_lists);
// echo "</pre>";
