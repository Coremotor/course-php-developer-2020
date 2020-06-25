<?php if (isset($_POST["uploadBtn"])) : ?>
    <div class="container">
        <?php
        $resultCheckEmptyArr = checkEmptyArr();
        if (!$resultCheckEmptyArr): ?>
            <span class="error">Должна быть выбрана хотя бы одна картинка</span>
        <?php endif; ?>
    </div>
<?php endif; ?>


<?php if (isset($_POST["uploadBtn"]) && $resultCheckEmptyArr) : ?>
    <div class="container">
        <?php
        $resultCheckTypeFile = checkTypeFile($typeArr);
        if (!$resultCheckTypeFile): ?>
            <span class="error">Загружаемые файлы должны быть изображениями</span>
        <?php endif; ?>

        <?php
        $resultCheckSizeFile = checkSizeFile();
        if (!$resultCheckSizeFile): ?>
            <span class="error">Загружаемые файлы должны быть меньше 5 мб</span>
        <?php endif; ?>

        <?php
        $resultCheckCountFiles = checkCountFiles();
        if ($resultCheckCountFiles): ?>
            <span class="error">Загружаемых файлов должно быть не больше пяти</span>
        <?php endif; ?>

        <?php
        $resultCheckOnError = checkOnError();
        if ($resultCheckOnError): ?>
            <span class="error">Произошла какая то ошибка</span>
        <?php endif; ?>

        <?php
        if (!$resultCheckOnError && !$resultCheckCountFiles && $resultCheckSizeFile && $resultCheckTypeFile): ?>
            <?php moveFile($uploadPath, $typeArr); ?>
            <span class="done">Файлы отправлены</span>
        <?php endif; ?>
    </div>
<?php endif; ?>

<!--isset($_POST["uploadBtn"])-->

