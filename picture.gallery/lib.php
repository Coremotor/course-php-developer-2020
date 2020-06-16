<pre>
<?php
//var_dump($_POST);
var_dump($_FILES);
?>

<?php function dump ($arg) {
    echo '<pre>';
    var_dump($arg);
    echo '</pre>';
}?>

<?php
function moveFile()
{
    foreach ($_FILES["uploadUserPhoto"]["error"] as $key => $error) {
         if (isset($_POST["uploadBtn"])) {
            $uploadPath = $_SERVER["DOCUMENT_ROOT"] . "/uploaded_files/";
            if (!empty($_FILES["uploadUserPhoto"]["error"][$key])) {
                echo "Error";
            } else {
                move_uploaded_file($_FILES["uploadUserPhoto"]["tmp_name"][$key], $uploadPath . $_FILES["uploadUserPhoto"]["name"][$key]);
            }
        }
    }
}

function checkTypeFile()
{
    foreach ($_FILES["uploadUserPhoto"]["tmp_name"] as $tmp_name) {
        if (mime_content_type($tmp_name) !== 'image/jpeg') {
            var_dump('no img');
            break 1;
        }
    }
}

if (!checkTypeFile()) {
    var_dump('true');
    moveFile();
} else {
    echo 'Выберите только фото';
}




