<?php include_once "./db.php";

$category_id = $_GET['category_id'] ?? "";
$dateStart = $_GET['dateStart'] ?? "";
$dateEnd = $_GET['dateEnd'] ?? "";

// $sql_categories= "select * from `categories`";
// $categories=$pdo->query($sql_categories)->fetchAll(PDO::FETCH_ASSOC);
$categories = all('categories');

// $sql_categories_detp="select `description` from `categories` where `id`='{$category_id}'";
// $category_detp=$pdo->query($sql_categories_detp)->fetch(PDO::FETCH_ASSOC);
$category_detp = find('categories', ['id' => $category_id]);


if ($dateStart != "" && $dateEnd == "") {
       $sql_time = " AND `summary`.`effective_time` >= '{$dateStart}'";
} elseif ($dateStart == "" && $dateEnd != "") {
       $dateEnd = date("Y-m-j",strtotime("+1 day",strtotime($dateEnd)));//修正未包含當天錯誤
       $sql_time = " AND `summary`.`effective_time` <= '{$dateEnd}'";
} elseif ($dateStart != "" && $dateEnd != "") {
       $dateEnd = strtotime("+1 day",strtotime($dateEnd));//修正未包含當天錯誤
       $sql_time = " AND `summary`.`effective_time` BETWEEN '{$dateStart}' AND '{$dateEnd}'";
} else {
       $sql_time = "";
}

$sql_categories_select = "SELECT `summary`.`effective_time` as '日期',
                             `summary`.`class` as '屬性',
                             `summary`.`project` as '項目',
                             `summary`.`details` as '細節',
                             `categories`.`category` as '類別',
                             `summary`.`amount` as '數量',
                             `summary`.`price` as '金額',
                             `summary`.`private` as '公開/私人',
                             `summary`.`continuous` as '持續性',
                             `summary`.`created_time` as '登載時間'
                      FROM `summary`, `categories`
                      WHERE `summary`.`category_id` = `categories`.`id` " .
                            (($category_id == "") ? "" : " AND `summary`.`category_id` = '{$category_id}'");

$sql_categories_select = $sql_categories_select . $sql_time;
// dd($sql_categories_select);

$categories_select = q($sql_categories_select);
// dd($categories_select);

$everyMonthFirst = [];
$everyMonthLast = [];

$dateEnd2=($_GET['dateEnd']!="")?$_GET['dateEnd']:date("Y-m-j");

for ($i = 11; $i >= 0; $i--) {
       $everyMonthFirst[] = date("Y-m-j", strtotime("first day of -$i month", strtotime($dateEnd2)));
       $everyMonthLast[] = date("Y-m-j", strtotime("last day of -$i month", strtotime($dateEnd2)));
}


$sql_categories_select_sum = [];
$categories_select_sum = [];


foreach ($everyMonthLast as $monthLast) {
       foreach ($everyMonthFirst as $monthFirst) {
              
              $i = date("n", strtotime($monthFirst));
              $j = date("n", strtotime($monthLast));
              if ($i == $j) {

                     $sql_categories_select_sum = "SELECT SUM(`price`) FROM `summary` WHERE ".
                                                   (($category_id == "") ? "" : "`category_id` = '{$category_id}' && ").
                                                   " `effective_time` BETWEEN '{$monthFirst}' AND '{$monthLast}'";
                     // dd($sql_categories_select_sum);
    
                     $categories_select_sum[ $i.'月']=$tmp=$pdo->query($sql_categories_select_sum)->fetch(PDO::FETCH_NUM);

              }
       }
}

// dd($categories_select_sum);