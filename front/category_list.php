<link rel="stylesheet" href="../css/style_category.css">
<?php include_once "./api/category_list.php" ?>

<table class="table table-striped table-hover table-dark ">
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
            <form action="../api/category_edit.php" method="post">
            <td><?= $i; ?></td>
            <td><input class="text-light" type="text" name="category" id="category" value="<?= $category['category']; ?>"></td>
            <td><input class="text-light" type="text" name="description" id="description" value="<?= $category['description']; ?>"></td>
            <td>

                    <input type="hidden" name="category_id"  value="<?=$category['id'];?>">
                    <button type="sumbit" value="">更新</button>
                </form>
                <form action="../api/category_del.php" method="POST">
                    <input type="hidden" name="category_id"  value="<?=$category['id'];?>">
                    <button type=" buttom" value="">刪除</button>
                </form>
            </td>
        </tr>
    <?php
        $i += 1;
    }
    ?>
    <form action="../api/add_category.php" method="post">
        <tr>
            <td>+</td>
            <td><input  class="text-light"  type="text" name="category" id="category"></td>
            <td><textarea   class="text-light" name="description" id="description" cols="30" rows="10"></textarea></td>
            <td>
                <button type="sumbit">新增</button>
                <button type="reset">重製</button>
            </td>
        </form>
    </tr>
</table>