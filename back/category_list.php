<link rel="stylesheet" href="../css/style_category.css">

<?php
$sql_categories = "SELECT `category`,`description` from `categories`";

$categories = $pdo->query($sql_categories)->fetchAll(PDO::FETCH_ASSOC);
?>
<table class="category-table">
    <tr>
        <th>項次</th>
        <th>類別名稱</th>
        <th>類別描述</th>
        <th>操作</th>
    </tr>
    <?php
    $i = 1;
    foreach ($categories as $category) {
    ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $category['category']; ?></td>
            <td><?= $category['description']; ?></td>
            <td>
                <button type="sumbit" onclick="location.ref:?do=" value="">更新</button>
                <button type="buttom" onclick="location.ref:?do=" value="">刪除</button>
            </td>
        </tr>
    <?php
        $i += 1;
    }
    ?>
    <form action="./api/add_category.php" method="post"></form>
    <tr>
        <td>+</td>
        <td><input type="text" name="category" id="category"></td>
        <td><textarea name="description" id="description" cols="30" rows="10"></textarea></td>
        <td>
            <button type="sumbit" onclick="location.ref:?do=" value="">新增</button>
            <button type="buttom" onclick="location.ref:?do=" value="">重製</button>
        </td>
    </tr>
</table>