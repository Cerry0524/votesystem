<?php
if(isset($_GET['error'])){
    echo "<span style='color:red'>";
    echo "帳號密碼不可為空";
    echo "</span>";
}


?>



<form action="../api/reg.php" method="post">
    <div>
        <label for="acc">帳號</label>
        <input type="text" name="acc" id="acc">
    </div>
    <div>
        <label for="pw">密碼</label>
        <input type="text" name="pw" id="pw">
    </div>
    <div>
        <label for="nickname">姓名</label>
        <input type="text" name="nickname" id="nickname">
    </div>
    <div>
        <label for="tel">電話</label>
        <input type="number" name="tel" id="tel">
    </div>
    <div>
        <label for="email">信箱</label>
        <input type="text" name="email" id="email">
    </div>
    <div>
        <input type="submit" value="註冊"></div>
</form>