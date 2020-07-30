<?php

$result3 = [
    "authors" => [
        "divov@pochta.ru" => [
            "authorName" => "Oleg Divov",
            "authorEmail" => "divov@pochta.ru",
            "authorBirthYear" => "2000",
        ],
        "oruel@pochta.ru" => [
            "authorName" => "Gorge Oruel",
            "authorEmail" => "oruel@pochta.ru",
            "authorBirthYear" => "2010",
        ],
        "bulgakov@pochta.ru" => [
            "authorName" => "Mikhail Bulgakov",
            "authorEmail" => "bulgakov@pochta.ru",
            "authorBirthYear" => "2020",
        ],
    ],
    "books" => [
        [
            "bookName" => "Vibrakovka",
            "bookAuthorEmail" => "divov@pochta.ru",
        ],
        [
            "bookName" => "1984",
            "bookAuthorEmail" => "oruel@pochta.ru",
        ],
        [
            "bookName" => "Master-i-margarita",
            "bookAuthorEmail" => "bulgakov@pochta.ru",
        ],
    ],
];

$title = "Заголовок страницы";
$red = (bool)rand(0, 1);


?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?=$title?></title>
        <style type="text/css">.red { color: red; }</style>
    </head>

    <body>
        <h1 class=<?= $red ? "red" : "" ?>><?= $title ?></h1>

        <div>Авторов на портале <?= count($result3["authors"]) ?></div>
        <!-- Выведите все книги -->
        <!--<p>Книга <Название книги>, ее написал <Фио автора> <Год рождения автора> (<email автора>)</p>-->
        <div>
            <?
            foreach ($result3['books'] as $books => $book) {
                echo "<p> Книга 
                {$book['bookName']}, ее написал 
                {$result3['authors'][$book['bookAuthorEmail']]['authorName']}. Год рождения автора: 
                {$result3['authors'][$book['bookAuthorEmail']]['authorBirthYear']} (
                {$book['bookAuthorEmail']})</p>";
            }
            ?>
        </div>
    </body>
</html>
