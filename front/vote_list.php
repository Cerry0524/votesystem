<link rel="stylesheet" href="../css/style_votelist.css">

<div class="container vote-list">
    <div class="row justify-content-md-center text-center  fw-bolder fs-3">
        <div class="col-md-1 text-center">
            序號
        </div>
        <div class="col-md-3">
            投票主題
        </div>
        <div class="col-md-3  text-center">
            功能
        </div>
    </div>
    <?php

    if(!isset($_SESSION['login'])){
        $sql = "select * from `topicsv` where `private`=0 AND `close_time` >= '" . date("Y-m-d H:i:s") . "'";
    }else{
        $sql = "select * from `topicsv` where `close_time` >= '" . date("Y-m-d H:i:s") . "'";
    };

   
    $rows = $pdo->query($sql)->fetchAll();



    foreach ($rows as $idx => $row) {
    ?>

        <div class="row justify-content-md-center fs-5">
            <div class="col-md-1 text-center">
                <?= $idx + 1; ?>
            </div>
            <div class="col-md-3 fw-bolder">
                <?= $row['subject']; ?>
            </div>
            <div class="col-md-3 text-center">
                    <?php
                    switch ($row['type']) {
                        case 0:
                            echo "<button class='btn btn-primary rounded-circle border border-dark'>";
                            echo "單";
                            break;
                        case 1:
                            echo "<button class='btn btn-warning rounded-circle border border-dark'>";
                            echo "多";
                            break;
                    }
                    ?>
                </button>
                <?php
                if ($row['private'] == 1) {
                    echo "<button class='btn btn-danger border border-dark border-1 rounded-pill '>";
                    echo "私人";
                } else {
                    echo "<button class='btn btn-success border border-dark border-1 rounded-pill' >";
                    echo "公開";
                }
                ?>
                </button>
                <button class='btn btn-secondary border border-dark border-1'
                        onclick="location.href='?do=vote_list&id=<?= $row['id']; ?>'">投票</button>
            </div>
        </div>
        <?php
    }
?>

</div>

<button onclick="location.href='?do=add_vote'" class="btn btn-primary">新增投票</button>
