<?php
$topic = $pdo->query("select * from `topicsv` where `id`='{$_GET['id']}'")
    ->fetch(PDO::FETCH_ASSOC);

$options = $pdo->query("select * from `optionsv` where `subject_id`='{$_GET['id']}'")
    ->fetchAll(PDO::FETCH_ASSOC);

?>

<p class="fs-1 text-center">編輯主題</p>
<div class="container">
    <form action="../api/vote_edit.php" method="post" enctype="multipart/form-data">
        <div class="input-group  mb-3">
            <label class="input-group-text bg-primary text-light col-2" for="topic">主題說明</label>
            <input type="text" class="form-control" name="topic" id="topic" value="<?= $topic['subject']; ?>">
        </div>
        <div class="input-group  mb-3">
            <label class="input-group-text bg-success text-light col-2" for="open_time">開放時間</label>
            <input type="datetime-local" class="form-control" name="open_time" id="open_time" value="<?= $topic['open_time']; ?>">
        </div>
        <div class="input-group  mb-3">
            <label class="input-group-text bg-danger text-light col-2" for="close_time">關閉時間</label>
            <input type="datetime-local" class="form-control" name="close_time" id="close_time" value="<?= $topic['close_time']; ?>">
        </div>
        <div class="input-group  mb-3">
            <label class="input-group-text bg-info form-check-label form-check form-check-inline col-2" for="type">單 複 選</label>
            <div class="input-group-text">
                <input type="radio" class="form-check-input" name="type" class="form-control" value="0" <?= ($topic['type'] == 0) ? 'checked' : ''; ?>>&nbsp;單&nbsp;選&nbsp;
            </div>
            <div class="input-group-text">
                <input type="radio" class="form-check-input" name="type" class="form-control" value="1" <?= ($topic['type'] == 1) ? 'checked' : ''; ?>>&nbsp;複&nbsp;選
            </div>
        </div>
        <div class="input-group  mb-3">
            <label class="input-group-text bg-info form-check-label form-check form-check-inline col-2 " for="private">是否公開</label>
            <div class="input-group-text">
                <input type="radio" class="form-check-input" name="private" value="0" <?= ($topic['private'] == 0) ? 'checked' : ''; ?>>&nbsp;公&nbsp;開&nbsp;
            </div>
            <div class="input-group-text">
                <input type="radio" class="form-check-input" name="private" value="1" <?= ($topic['private'] == 1) ? 'checked' : ''; ?>>&nbsp;不公開&nbsp;
            </div>
        </div>
        <hr>
        <div>
            <?php
            foreach ($options as $opt) {
            ?>
                <div class="input-group  mb-3 options">
                    <label class="input-group-text btn btn-secondary col-2" for="description">項 目</label>
                    <input type="text" class="form-control" name="description[]" class="description-input" value="<?= $opt['description']; ?>">
                    <span class="input-group-text btn btn-warning align-middle" style="font-size:24px;line-height:0.8" onclick="addOption()">+</span>
                    <span class="input-group-text btn btn-dark align-middle" style="font-size:24px;line-height:0.8" onclick="removeOption(this)">-</span>
                    <input type="hidden" name="opt_id[]" value="<?= $opt['id']; ?>">
                </div>
            <?php
            }
            ?>
        </div>
        <div class="row  mx-auto">
            <input type="hidden" name="subject_id" value="<?= $topic['id']; ?>">
            <input type="submit" class=" btn btn-primary" value="編輯">
        </div>
    </form>
    <form action="../api/vote_del.php" method="post">
        <div class="row  mx-auto">
            <input type="hidden" name="subject_id" value="<?= $topic['id']; ?>">
            <input type="submit" class=" btn btn-danger" value="刪除">
        </div>
    </form>
</div>


<script>
    function addOption() {
        let opt = `
                <div class="input-group  mb-3 options">
                    <label class="input-group-text btn btn-secondary col-2" for="description">項 目</label>
                    <input type="text" class="form-control" name="description[]" class="description-input" value="<?= $opt['description']; ?>">
                    <span class="input-group-text btn btn-warning align-middle" style="font-size:24px;line-height:0.8" onclick="addOption()">+</span>
                    <span class="input-group-text btn btn-dark align-middle" style="font-size:24px;line-height:0.8" onclick="removeOption(this)">-</span>
                    <input type="hidden" name="opt_id[]" value="<?= $opt['id']; ?>">
                </div>`
        $(".options").parent().append(opt);
    }

    function removeOption(el) {
        let dom = $(el).parent()
        $(dom).remove();
    }
</script>