<?php include_once "db.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>家族記帳管理系統</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <header>
        <div class="top-title">歡迎來到家族記帳管理系統 </div>
        <div>
            <?php
            if (!isset($_SESSION['login'])) {
            ?>
                <a href="index.php?do=login">請登入會員</a>
                <a href="index.php?do=reg">註冊</a>
            <?php
            } else {
            ?>
                <a href="./api/logout.php">登出</a>
            <?php
            }
            ?>
        </div>
        <div class="top-menu">
            <a href="index.php">回到首頁</a>
            <?php
            if (!isset($_SESSION['login'])) {
            } else { ?>
                <button class="menu" name="menu" id="menu">
                    清單
                </button>
                <button class="system" name="system" id="system">
                    設定
                </button>
                <div class="menu-opt">
                    <div>收支登記</div>
                    <div>收支清單</div>
                    <div>類別管理</div>
                    <div>特定查詢</div>
                    <div>投票功能</div>
                    <div>歷史紀錄查詢</div>
                </div>
            <?php } ?>
        </div>
    </header>
    <main>

        <?php

        $do = $_GET['do'] ?? 'list';

        $file = "./front/" . $do . ".php";

        if (file_exists($file)) {
            include $file;
        } else {
            if (!isset($_SESSION['login'])) {
                include "./front/summary_all.php";
                include "./front/vote_list.php";
            } else {
                include "./front/summary_all.php";
                include "./front/summary_private.php";
            }
        }
        ?>

    </main>
    <footer></footer>
</body>

</html>