<p class="fs-1 text-center">新增主題</p>
<div class="container">
    <form class="form-horizontal" action="../api/add_vote.php" method="post" enctype="multipart/form-data">
        <div class="form-group offset-2">
            <label class="control-label col-sm-2" for="topic">題目:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="topic" id="topic" placeholder="輸入投票題目">
            </div>
        </div>
        <div class="form-group offset-2">
            <label class="control-label col-sm-offset-2 col-sm-2" for="open_time">開放時間:</label>
            <div class="col-sm-10">
                <input type="datetime-local" class="form-control" id="open_time" name="open_time">
            </div>
        </div>
        <div class="form-group offset-2">
            <label class="control-label col-sm-offset-2 col-sm-2" for="close_time">關閉時間:</label>
            <div class="col-sm-10">
                <input type="datetime-local" class="form-control" id="close_time"  name="close_time">
            </div>
        </div>
        <div class="form-group offset-2">
            <label class="control-label col-sm-2" for="type">單複選：</label>
            <div class="col-sm-offset-4 col-sm-6">
                <input type="radio" name="type" value="0">單選&nbsp;&nbsp;
                <input type="radio" name="type" value="1">複選
            </div>
        </div>
        <div class="form-group offset-2">
            <label class="control-label col-sm-4" for="private">是否公開：</label>
            <div class="col-sm-offset-4 col-sm-6">
                <input type="radio" name="private" value="0">是&nbsp;&nbsp;
                <input type="radio" name="private" value="1">否
            </div>
        </div>
        <div class="form-group offset-2 col-8">
            <label class="control-label col-sm-offset-2 col-sm-4" for="img">上傳圖檔：</label>
            <input type="file" class="form-control " id="img" name="img">
        </div>
        <hr>
        <div>
            <div class="form-group offset-2 options col-7">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="description">項目</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="description[]">
                    &nbsp&nbsp&nbsp
                    <span onclick="addOption()" class="lh-lg fs-5">+</span>
                    &nbsp&nbsp&nbsp
                    <span onclick="removeOption(this)" class="lh-lg fs-5">-</span>
                </div>
            </div>
        </div>
        <div class="form-group  offset-2 ">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">確認</button>
            </div>
    </form>
</div>

</main>
</body>

</html>

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