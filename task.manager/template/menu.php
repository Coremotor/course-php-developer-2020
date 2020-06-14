<ul class="<?= $listClassName ?>">
    <?php foreach($newArr as $item): ?>
        <?php
            $title = titleSubStrReplace($item["title"], 18);
        ?>
        <li>
            <a class=<?=isCurrentUrl($item["path"]) ? $activeClass : "no"?> href=<?=$item["path"]?>><?=$title?></a>
        </li>
    <?php endforeach; ?>
</ul>