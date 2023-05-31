<link rel="stylesheet" href="./css/style_categoriessearch.css">
<?php
include_once "./api/categories_search.php";
?>


<div class="content">
    <div class="top">
        <div class="top-left">
            <select onchange="category_select(this)">
                <?php
                foreach ($categories as $idx => $category) {
                ?>
                    <option value="<?= $category['id']; ?>">
                    <?=($idx + 1).".". $category['category']; ?>
                    </option>

                <?php
                }
                ?>

            </select>
        </div>
        <div class="top-right">top-right</div>
    </div>
    <div class="canva">
        <div class="canva-left">canva-left</div>
        <div class="canva-right">canva-righ</div>
    </div>
</div>


<?php
include_once "./back/categories_search_down.php";
?>
<script>


    function category_select(selectOpt) {
        let selectValue = selectOpt.value;
        window.location.href = "?do=categories_search_up&category_id=" + selectValue;
    }

</script>