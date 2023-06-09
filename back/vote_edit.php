<?php
$topic = $pdo->query("select * from `topicsv` where `id`='{$_GET['id']}'")
    ->fetch(PDO::FETCH_ASSOC);

$options = $pdo->query("select * from `optionsv` where `subject_id`='{$_GET['id']}'")
    ->fetchAll(PDO::FETCH_ASSOC);

?>

<h1>編輯
    主題</h1>
<form action="../api/evote_dit.php" method="post">
    <div>
        <label for="subject">主題說明：</label>
        <input type="text" name="subject" id="subject" class="subject-input" value="<?= $topic['subject']; ?>">
    </div>
    <div class="time-set">
        <div class="time-item">
            <label for="open_time">開放時間：</label>
            <input type="datetime-local" name="open_time" id="open_time" value="<?= $topic['open_time']; ?>">
        </div>
        <div class="time-item">
            <label for="close_time">關閉時間：</label>
            <input type="datetime-local" name="close_time" id="close_time" value="<?= $topic['close_time']; ?>">
        </div>
    </div>
    <div>
        <label for="type">單複選：</label>
        <input type="radio" name="type" value="0" <?= ($topic['type'] == 0) ? 'checked' : ''; ?>>單選&nbsp;&nbsp;
        <input type="radio" name="type" value="1" <?= ($topic['type'] == 1) ? 'checked' : ''; ?>>複選
    </div>
    <div>
        <label for="type">是否公開：</label>
        <input type="radio" name="login" value="0" <?= ($topic['private'] == 0) ? 'checked' : ''; ?>>是&nbsp;&nbsp;
        <input type="radio" name="login" value="1" <?= ($topic['private'] == 1) ? 'checked' : ''; ?>>否
    </div>
    <hr>
    <div class="options">
        <?php
        foreach ($options as $opt) {
        ?>
            <div>
                <label for="description">項目：</label>
                <input type="text" name="description[]" class="description-input" value="<?= $opt['description']; ?>">
                <span onclick="addOption()">+</span>
                <span onclick="removeOption(this)">-</span>
                <input type="hidden" name="opt_id[]" value="<?= $opt['id']; ?>">
            </div>

        <?php
        }
        ?>
    </div>
    <div>
        <input type="hidden" name="subject_id" value="<?= $topic['id']; ?>">
        <input type="submit" value="編輯">
    </div>
</form>


<script>
    function addOption() {
        let opt = `
    <div class="form-group offset-2 options col-7">
            <div class="input-group mb-3">
                <span class="input-group-text" id="description">項目</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="description[]">
                &nbsp&nbsp&nbsp
                <span onclick="addOption()" class="lh-lg fs-5">+</span> 
                &nbsp&nbsp&nbsp
                <span onclick="removeOption(this)" class="lh-lg fs-5">-</span>
            </div>
        </div>`
        $(".options").parent().append(opt);
    }

    function removeOption(el) {
        let dom = $(el).parent()
        $(dom).remove();
    }
</script>