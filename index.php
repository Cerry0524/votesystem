<?php include_once "db.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>家族記帳管理系統</title>
    <link rel="stylesheet" href="./css/normalize.css"><!-- 標準化css -->
    <link rel="stylesheet" href="./css/style.css">
    <script src="../js/jquery-3.7.0.min.js"></script> <!-- 引進jquery -->
</head>

<body>
    <header>
        <div class="top-title">歡迎來到家族記帳管理系統 </div>
        <div class="top-center">
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
            <?php } ?>
        </div>
        <div class="menu-opt" id="menu-opt">
            <div onclick="location.href='?do=add_summary'">收支登記</div>
            <div onclick="location.href='?do=summary_list'">收支清單</div>
            <div onclick="location.href='?do=category_list'">類別管理</div>
            <div onclick="location.href='?do=categories_search_up&category_id=1'">特定查詢</div>
            <div onclick="location.href='?do=vote_list'">投票功能</div>
        </div>
        <div class="system-opt" id="system-opt">
            <div>帳號管理</div>
            <div>歷史紀錄</div>
        </div>
    </header>
    <main>

        <?php

        $do = $_GET['do'] ?? 'list';

        $file = "./front/" . $do . ".php";
        $fileBack = "./back/" . $do . ".php";

        if (file_exists($file)) {
            include $file;
        } elseif (file_exists($fileBack)) {
            include $fileBack;
        } else {
            if (!isset($_SESSION['login'])) {
                include "./front/summary_all.php";
                include "./front/vote_all.php";
            } else {
                include "./front/summary_private.php";
            }
        }
        ?>

    </main>
    <footer></footer>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>
    <script>
        const menuBtn = document.getElementById('menu');
        const menuOptBtn = document.getElementById('menu-opt');
        const systemBtn = document.getElementById('system');
        const systemOptBtn = document.getElementById('system-opt');

        menuBtn.addEventListener('click', () => {
            systemOptBtn.style.display = "none";
            menuOptBtn.style.display = "flex";
            menuBtn.style.background = "blue";
            systemBtn.style.background = "rgb(116, 156, 248)"
        });
        menuOptBtn.addEventListener('click', () => {
            menuOptBtn.style.display = "none";
            menuBtn.style.background = "rgb(116, 156, 248)";
        });
        systemBtn.addEventListener('click', () => {
            menuOptBtn.style.display = "none";
            systemOptBtn.style.display = "flex";
            systemBtn.style.background = "blue";
            menuBtn.style.background = "rgb(116, 156, 248)"
        });
        systemOptBtn.addEventListener('click', () => {
            systemOptBtn.style.display = "none";
            menuOptBtn.style.background = "rgb(116, 156, 248)";
        });
    </script>

</body>

</html>