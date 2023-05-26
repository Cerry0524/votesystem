<?php
include_once "../db.php";

echo "<pre>";
print_r($_POST['project']);
print_r($_POST['details']);
print_r($_POST['amount']);
print_r($_POST['price']);
print_r($_POST['eff_time']);
print_r($_POST['private']);
print_r($_POST['continuous']);
echo "</pre>";


for ($i=0; $i <count($_POST['project']); $i++) { 
    
    $j = $i + 1; 

    $sql = "INSERT INTO `summary`( `project`, `details`, `amount`,`price`,`effective_time`,`private`, `continuous`)
                          VALUES ('{$_POST['project'][$i]}', '{$_POST['details'][$i]}', '{$_POST['amount'][$i]}','{$_POST['price'][$i]}', '{$_POST['eff_time'][$i]}', '{$_POST['private'][$i][0]}', '{$_POST['continuous'][$i][0]}')";
   
    $pdo->exec($sql);
    
    $sql_category_id = "select `id` from `categories` where `category`='{$_POST['category'][$i]}'";
    $category_id = $pdo->query($sql_category_id)->fetchColumn();

    print_r($category_id);

    if($category_id>0){

    }else{
        $sql="INSERT INTO `categories`(`category`) VALUES ('{$_POST['category'][$i]}')";
        $pdo->exec($sql);
        $sql_category_id = "select `id` from `categories` where `category`='{$_POST['category'][$i]}'";
        $category_id = $pdo->query($sql_category_id)->fetchColumn();
    }
   
    $sql_category_update="UPDATE `summary` SET `category_id`=$category_id WHERE `project`='{$_POST['project'][$i]}'";
    $pdo->exec($sql_category_update);
}    



$sql_inerstNew="SELECT `summary`.`project`,`categories`.`category`,`summary`.`details`,`summary`.`amount`,`summary`.`price`,`summary`.`effective_time`, `summary`.`private`, `summary`.`continuous` 
                FROM `summary`,`categories`
                WHERE `summary`.`category_id`=`categories`.`id`";
