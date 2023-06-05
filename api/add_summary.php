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
// print_r($_FILES['imgInput']);
// echo "</pre>";


for ($i = 0; $i < count($_POST['project']); $i++) {

    insert('summary', [
        'project' => $_POST['project'][$i],
        'details' => $_POST['details'][$i],
        'amount' => $_POST['amount'][$i],
        'price' => $_POST['price'][$i],
        'effective_time' => $_POST['eff_time'][$i],
        'private' => $_POST['private'][$i][0],
        'continuous' => $_POST['continuous'][$i][0]
    ]);

    $project_id = find('summary', [
        'project' => $_POST['project'][$i],
        'details' => $_POST['details'][$i],
        'amount' => $_POST['amount'][$i],
        'effective_time' => $_POST['eff_time'][$i],
    ]);

    $category_id = find('categories', ['category' => $_POST['category'][$i]]);

    insert('logs', [
        'mem_id' => $_POST['mem_id'][$i],
        'project_id' => $project_id['id'],
        'img_id' => $_POST['amount'][$i],
        'topic_id' => $_POST['price'][$i],
        'vote_time' => $_POST['eff_time'][$i],
        'records' => $_POST['private'][$i],
    ]);

    if ($category_id > 0) {
    } else {
        insert('categories', ['category' => $_POST['category'][$i]]);
        // $sql_category_id = "select `id` from `categories` where `category`='{$_POST['category'][$i]}'";
        // $category_id = $pdo->query($sql_category_id)->fetchColumn();
        $category_id = find('categories', ['category' => $_POST['category'][$i]]);
    }

    // $sql_category_update = "UPDATE `summary` SET `category_id`=$category_id WHERE `project`='{$_POST['project'][$i]}'";
    // $pdo->exec($sql_category_update);

    update('summary', [
        'category_id' => $category_id['id']
    ], [
        'project' => $_POST['project'][$i]
    ]);


    if ($_FILES['imgInput']['error'][$i] == 0) {

        $img_name = $_FILES["imgInput"]["name"][$i];

        move_uploaded_file($_FILES['imgInput']['tmp_name'][$i], "../img/" . $img_name);

        $sql = "insert into `images` (`img`,`desc`,`type`,`size`) 
                            values('$img_name','{$_POST['desc'][$i]}','{$_FILES['imgInput']['type'][$i]}','{$_FILES['imgInput']['size'][$i]}')";

        $pdo->exec($sql);

        echo "圖片上傳成功";
    }
}

// header("location:../?do=summary_list");
to ("../?do=summary_list");
