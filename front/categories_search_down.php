<div class="row row-cols-1 row-cols-md-6 g-4 px-5 py-3">
    <?php foreach ($categories_select as $category_select) { ?>
        <div class="col ">
            <div class="card h-100 shadow">
                <img src="
                <?php
                echo ($category_select['img']== null)?"../background/nofindpic.png":"../img/".$category_select['img'];
                ?>" 
                    class="card-img-top" alt="..." style="height:250px">
                <div class="card-body ">
                    <h5 class="card-title"><?= $category_select['項目'] ?></h5>
                    <p class="card-text badge bg-Secondary text-wrap"><?php
                                            $category_createdtime = $category_select['日期'];
                                            echo date("Y 年 n 月 j 日 H 時 m 分", strtotime($category_createdtime));
                                            ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?= $category_select['細節']; ?></li>
                    <li class="list-group-item"><?= $category_select['金額']; ?></li>
                </ul>
                <div class="card-footer">
                    <small class="text-muted">
                        <?php
                        $category_time = $category_select['登載時間'];
                        echo "更新時間：";
                        echo date("Y / n / j - H 時 m 分", strtotime($category_time));
                        ?></small>
                </div>
            </div>
        </div>
    <?php } ?>
</div>