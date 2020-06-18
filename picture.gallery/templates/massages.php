<?php if (isset($_POST["uploadBtn"])) : ?>
    <div class="container">
        <?php
        if (!checkEmptyArr()): ?>
            <span class="error">Должна быть выбрана хотя бы одна картинка</span>
        <?php endif; ?>
    </div>
<?php endif; ?>


<?php if ((isset($_POST["uploadBtn"]) && checkEmptyArr())) : ?>
    <div class="container">
        <?php
        if (!checkTypeFile()): ?>
            <span class="error">Загружаемые файлы должны быть изображениями</span>
        <?php endif; ?>

        <?php
        if (!checkSizeFile()): ?>
            <span class="error">Загружаемые файлы должны быть меньше 5 мб</span>
        <?php endif; ?>

        <?php
        if (checkCountFiles()): ?>
            <span class="error">Загружаемых файлов должно быть не больше пяти</span>
        <?php endif; ?>

        <?php
        if (checkOnError()): ?>
            <span class="error">Произошла какая то ошибка</span>
        <?php endif; ?>

        <?php
        if (!checkOnError() && !checkCountFiles() && checkSizeFile() && checkTypeFile()): ?>
            <span class="done">Файлы отправлены</span>
        <?php endif; ?>
    </div>
<?php endif; ?>

