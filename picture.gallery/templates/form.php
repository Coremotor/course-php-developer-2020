<form id="formSend" class="form" action="index.php" method="post" enctype="multipart/form-data">
    <label class="label" for="inputMulti">Выберите файлы для загрузки</label>
    <input id="inputMulti" class="input" type="file"
           name="uploadUserPhoto[]"
           multiple
           accept="image/jpeg, image/png, image/jpg" />
    <button id="submitBtn" name="uploadBtn" type="submit" value="Отправить">Отправить</button>
</form>