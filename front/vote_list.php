<link rel="stylesheet" href="../css/style_votelist.css">

<div class="container vote-list">
    <div class="row justify-content-md-center text-center  fw-bolder fs-3">
        <div class="col-md-1 text-center">
            序號
        </div>
        <div class="col-md-3">
            投票主題
            <button onclick="location.href='?do=add_vote'" class="btn btn-primary">新增</button>
        </div>
        <div class="col-md-3  text-center">
            功能
        </div>
    </div>
    <?php
    if (!isset($_SESSION['login'])) {
        $sql = "select * from `topicsv` where `private`=0 AND `close_time` >= '" . date("Y-m-d H:i:s") . "'";
    } else {
        $sql = "select * from `topicsv` where `close_time` >= '" . date("Y-m-d H:i:s") . "'";
        $sql_created_topics = "SELECT `topicsv`.`subject`,
                                      `logs`.`created_time`,
                                      `members`.`acc`
                               FROM `logs` 
                               LEFT JOIN `topicsv` ON `topicsv`.`id`=`logs`.`topic_id`
                               LEFT JOIN `members` ON `members`.`id`=`logs`.`mem_id`
                               GROUP By `topicsv`.`id`
                               ORDER by `logs`.`created_time` ASC";
        $created_topics = q($sql_created_topics);
    };
    $rows = q($sql);


    foreach ($rows as $idx => $row) {
    ?>
        <div class="row justify-content-md-center fs-5  mb-1">
            <div class="col-md-1 text-center">
                <?= $idx + 1; ?>
            </div>
            <div class="col-md-3 fw-bolder">
                <?php
                echo $row['subject'];
                foreach ($created_topics as $created_topic) {
                    if ($created_topic['subject'] == $row['subject'] && $created_topic['acc'] == $_SESSION['login']) {
                ?>
                        <button class='btn btn-info border border-dark border-1' onclick="location.href='?do=vote_edit&id=<?= $row['id']; ?>'">修正</button>
                <?php
                    };
                }
                ?>
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
                <?php
                $mem_id=find('members',[
                    'acc'=>$_SESSION['login'],
                ]);
                // dd($mem_id);
                $logs_chk = $pdo->query("select `topic_id`,`records` from `logs` where `mem_id`='{$mem_id['id']}'")->fetchAll(PDO::FETCH_ASSOC);
                // dd($logs_chk);
                $tmp_chk = false;
                foreach ($logs_chk as $log_chk)
                    if (($row['id'] == $log_chk['topic_id']) && ($log_chk['records'] != "")) {
                        $tmp_chk = true;
                    }
                switch ($tmp_chk) {
                    case 'true':
                ?>
                        <button class='btn btn-dark border border-dark border-1 disabled'>已投票</button>
                    <?php
                        break;
                    default:
                    ?>
                        <button class='btn btn-dark border border-dark border-1' onclick="location.href='?do=vote_page&id=<?= $row['id']; ?>'">可投票</button>
                <?php
                        break;
                }
                ?>
            </div>
        </div>
    <?php
    }
    ?>

</div>

