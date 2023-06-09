<h1>投票</h1>
<?php



$topic=$pdo->query("select * from `topicsv` where `id`='{$_GET['id']}'")->fetch(PDO::FETCH_ASSOC);
if($topic['private']==1){
    if(!isset($_SESSION['login'])){
        $_SESSION['position']="?do=vote_page&id={$_GET['id']}";
        to("?do=login&msg=1");
    }
}

$options=$pdo->query("select * from `optionsv` where `subject_id`='{$_GET['id']}'")->fetchAll(PDO::FETCH_ASSOC);
?>

<h2><?=$topic['subject'];?></h2>
<?php
    if(!empty($topic['image'])){
        echo "<img src='./upload/{$topic['image']}' style='width:450px;height:300px'>";
    }
?>

<form action="./api/vote_page.php" method="post">
<ul>
<?php
foreach($options as $idx => $opt){
    echo "<li>";
    switch($topic['type']){
        case 0:
            echo "<input type='radio' name='desc' value='{$opt['id']}'>";                
        break;
        case 1:        
            echo "<input type='checkbox' name='desc[]' value='{$opt['id']}'>";
        break;
    }
    
    echo "<span>".($idx+1).". </span>";
    echo "<span>{$opt['description']}</span>";
    echo "</li>";
}
?>
</ul>

<div>
    <input type="hidden" name="subject_id" value="<?=$_GET['id'];?>">
    <input type="submit" value="投票">
    <input type="button" value="取消">
</div>

</form>