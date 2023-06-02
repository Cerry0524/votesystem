<?php
include_once "../db.php";

// echo "<pre>";
// print_r($_POST['project']);
// print_r($_POST['details']);
// print_r($_POST['amount']);
// print_r($_POST['price']);
// print_r($_POST['eff_time']);
// print_r($_POST['private']);
// print_r($_POST['continuous']);
// echo "</pre>";


for ($i = 0; $i < count($_POST['project']); $i++) {

    $j = $i + 1;

    insert('summary', [
        'project' => $_POST['project'][$i],
        'details' => $_POST['details'][$i],
        'amount' => $_POST['amount'][$i],
        'price' => $_POST['price'][$i],
        'effective_time' => $_POST['eff_time'][$i],
        'private' => $_POST['private'][$i][0],
        'continuous' => $_POST['continuous'][$i][0]
    ]);


    $category_id = find('categories', ['category' => $_POST['category'][$i]]);


    if ($category_id > 0) {
    } else {
        insert('categories', ['category' => $_POST['category'][$i]]);
        // $sql_category_id = "select `id` from `categories` where `category`='{$_POST['category'][$i]}'";
        // $category_id = $pdo->query($sql_category_id)->fetchColumn();
        $category_id = find('categories', ['category' => $_POST['category'][$i]]);
    }

    // $sql_category_update = "UPDATE `summary` SET `category_id`=$category_id WHERE `project`='{$_POST['project'][$i]}'";
    // $pdo->exec($sql_category_update);
    dd($category_id);
    update('summary', [
        'category_id' => $category_id['id']
    ], [
        'project' => $_POST['project'][$i]
    ]);
}

// header("location:../?do=summary_list");
to ("../?do=summary_list");
