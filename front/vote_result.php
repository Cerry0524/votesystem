<?php 


$id=$_GET['id'];
$options=$pdo->query("select * from `optionsv` where `subject_id`=$id")->fetchAll(PDO::FETCH_ASSOC);
$subject=$pdo->query("select * from `topicsv` where `id`=$id")->fetch(PDO::FETCH_ASSOC);

?>
<h1>投票結果</h1>
<h2><?=$subject['subject'];?></h2>
<ul class="vote-result">
    <li class="vote-option-title">
        <div class="vote-item">序號</div>
        <div class="vote-item">項目</div>
        <div class="vote-item">票數</div>
    </li>
    <?php 
    foreach($options as $idx => $option){
    ?>
    <li class="vote-option">
        <div class="vote-item"><?=$idx+1;?>. 
    </div>
        <div class="vote-item"><?=$option['description'];?></div>
        <div class="vote-item"><?=$option['total'];?></div>
    </li>
    <?php
    }
    ?>
</ul>