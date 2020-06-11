<ul class="<?= $listClassName ?>">
    <?php foreach($newArr as $item): ?>
        <?php $title = titleSubStrReplace($item["title"], 18);?>
        <li class=<?=$fontSize?>><a href=<?=$item["path"]?>><?=$title?></a></li>
    <?php endforeach; ?>
</ul>