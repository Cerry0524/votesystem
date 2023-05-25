<?php
include_once "../db.php";

    $sql = "INSERT INTO `summary`( `project`, `details`, `amount`,`effective_time`,`private`, `continuous`)
                          VALUES ('{$_POST['project']}', '{$_POST['details']}', '{$_POST['amount']}', '{$_POST['eff_time']}', '{$_POST['private']}', '{$_POST['continuous']}')";
   
    $pdo->exec($sql);//新增收支項目
    
    $sql_category_id = "select `id` from `categories` where `category`='{$_POST['category']}'";//查詢categories是否存在資料庫內
    $category_id = $pdo->query($sql_category_id)->fetchColumn();//回傳id給$category_id

    print_r($category_id);

    if($category_id>0){

    }else{
        $sql="INSERT INTO `categories`(`category`) VALUES ('{$_POST['category']}')";//新增類別進資料庫
        $pdo->exec($sql);//指令送資料庫
        $sql_category_id = "select `id` from `categories` where `category`='{$_POST['category']}'";//查詢categories是否存在資料庫內
        $category_id = $pdo->query($sql_category_id)->fetchColumn();//回傳id給$category_id
    };
   
    $sql_category_update="UPDATE `summary` SET `category_id`=$category_id WHERE `project`='{$_POST['project']}'";//更新新建收支表的category_id
    $pdo->exec($sql_category_update);//指令送資料庫
    
    $sql_inerstNew="SELECT `summary`.`project`,`categories`.`category`,`summary`.`details`,`summary`.`amount`,`summary`.`effective_time`, `summary`.`private`, `summary`.`continuous` 
                    FROM `summary`,`categories`
                    WHERE `summary`.`category_id`=`categories`.id`";