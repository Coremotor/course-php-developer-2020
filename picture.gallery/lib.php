<pre>
<?php
//var_dump($_POST);
//var_dump($_FILES);

foreach ($_FILES["uploadUserPhoto"]["error"] as $key => $error) {
    var_dump("key", $key);
    if (isset($_POST["uploadBtn"])) {
        $uploadPath = $_SERVER["DOCUMENT_ROOT"] . "/uploaded_files/";
        if (!empty($_FILES["uploadUserPhoto"]["error"][$key])) {
            echo "Error";
        } else {
            move_uploaded_file($_FILES["uploadUserPhoto"]["tmp_name"][$key], $uploadPath . $_FILES["uploadUserPhoto"]["name"][$key]);
        }
    }
}

?>
</pre>

