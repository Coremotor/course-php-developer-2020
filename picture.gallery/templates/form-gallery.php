<form id="form-gallery" method="post" class="img-container">

    <?php foreach ($arrFilter as $file): ?>
        <div class="img-item">
            <img class="img-gal" src="<?="/uploaded_files/" . $file?>" alt="<?=$file?>">
            <span class="img-name"><?=$file?></span>
            <span class="img-size"><?="Размер файла: " . sizeView(filesize("uploaded_files/" . $file))?></span>
            <span class="img-time"><?="Дата файла: " . dateView(filectime("uploaded_files/" . $file))?></span>

            <input id="<?=$file?>" class="img-cb" type="checkbox" name="deleteListCheckbox[]" value="<?=$file?>">

        </div>
    <?php endforeach; ?>

    <button class="btn" type="submit" name="formDel" value="Удалить выбранные">Удалить выбранные</button>

</form>
