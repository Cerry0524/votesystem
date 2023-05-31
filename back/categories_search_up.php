<link rel="stylesheet" href="./css/style_categoriessearch.css">
<?php
include_once "./api/categories_search.php";
?>


<div class="content">
    <div class="top">
        <div class="top-left">
            <input type="text" id="search" autocomplete="off">
            <div id="search_input"></div>

            <select onchange="category_select(this)">
                <?php
                foreach ($categories as $idx => $category) {
                ?>
                    <option value="<?= $category['id']; ?>">   
                    <?= $category['category']; ?>
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
    
    div.textContent = item.category;
    document.querySelector('#search').addEventListener('input', function(event) {
        let value = event.target.value;
        search_result(value);
    })

    function category_select(selectOpt){
        let selectValue = selectOpt.value;
        window.location.href = "?do=categories_search_up&category_id=" + $selectValue;
    }

    function search_result(query) {
        fetch('./api/categories_search.php?q=' + encodeURIComponent(query))
    .then(response => response.json())
        .then(data => {
            let search_input = document.querySelector('#search_input');
            search_input.innerHTML = '';
            for (let item of data) {
                let div = document.createElement('div');
                div.textContent = item;
                search_input.appendChild(div);
            }
            search_input.style.display = data.length ? 'block' : 'none';
        });
    }
</script>