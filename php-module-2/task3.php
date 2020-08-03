<pre>

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
            "bookName" => "Master i margarita",
            "bookAuthorEmail" => "bulgakov@pochta.ru",
        ],
    ],
];

function showInfo ($result3) {
    foreach ($result3['books'] as $books => $book) {
        echo("Книга " .
            $book['bookName'] . ", ее написал " .
            $result3['authors'][$book['bookAuthorEmail']]['authorName'] . " " .
            $result3['authors'][$book['bookAuthorEmail']]['authorBirthYear'] . " года рождения (" .
            $book['bookAuthorEmail'] . ")<br>");
    }
}
showInfo($result3);

shuffle($result3['books']);

showInfo($result3);

?>

</pre>