<form method="post" class="img-container">

    <?php foreach ($arrFilter as $file): ?>
        <div class="img-item">
            <img class="img-gal" src="<?= "/uploaded_files/" . $file?>" alt="<?=$file?>">
            <span class="img-name"><?=$file?></span>

            <input id="<?=$file?>" class="img-cb" type="checkbox" name="deleteListCheckbox[]" value="<?=$file?>">

        </div>
    <?php endforeach; ?>

    <button class="btn" type="submit" name="formDel" value="Удалить выбранные">Удалить выбранные</button>

</form>
