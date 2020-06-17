<form class="form" action="index.php" method="post" enctype="multipart/form-data">
    <label class="label" for="input">Выберите файлы для загрузки</label>
    <input id="input" class="input" type="file"
           name="uploadUserPhoto[]"
           multiple
           accept="image/jpeg, image/png, image/jpg" />
    <button name="uploadBtn" type="submit" value="Отправить">Отправить</button>
</form>