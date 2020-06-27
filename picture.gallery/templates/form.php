<form id="formSend" class="form" action="index.php" method="post" enctype="multipart/form-data">

    <label class="label" for="inputMulti"></label>

    <input id="inputMulti" class="input" type="file"
           name="uploadUserPhoto[]"
           multiple
           accept=<?= implode(',', $typeArr) ?>/>

    <button class="btn uk-button uk-button-default" id="submitBtn" name="uploadBtn" type="submit" value="Отправить">
        Отправить
    </button>

</form>
