<?php

$uploadPath = $_SERVER["DOCUMENT_ROOT"] . "/uploaded_files/";

/**
 * Ф-ия после проведения проверок помещает файлы в папку /uploaded_files/
 * @param $uploadPath - путь к папке с куда загружаются файлы
 */
function moveFile($uploadPath)
{
    if (isset($_POST["uploadBtn"]) && checkEmptyArr()) {

        if (checkSizeFile() &&
            checkTypeFile() &&
            !checkCountFiles() &&
            !checkOnError()) {

            foreach ($_FILES["uploadUserPhoto"]["error"] as $key => $error) {
                move_uploaded_file($_FILES["uploadUserPhoto"]["tmp_name"][$key], $uploadPath . $_FILES["uploadUserPhoto"]["name"][$key]);
            }
        }
    }
}

/**
 * Ф-ия проверки типа загружаемых файлов (картинки или что то другое)
 * @return true - файл является картинкой или весь массив файлов картинки
 * @return false - файл НЕ является картинкой или хотя бы один из файлов массива НЕ картинка
 *
 */
function checkTypeFile()
{
    $resultCheckTypeFile = null;
    foreach ($_FILES["uploadUserPhoto"]["tmp_name"] as $key => $tmp_name) {
        if (mime_content_type($tmp_name) === 'image/jpeg' || mime_content_type($tmp_name) === 'image/png') {
            $resultCheckTypeFile = true;
        } else {
            $resultCheckTypeFile = false;
            break;
        }
    }
    return $resultCheckTypeFile;
}

/**
 * Ф-ия проверки размера загружаемых файлов
 * @return true - каждый файл меньше 5мб
 * @return false - хотя бы один из файлов массива больше 5мб
 */
function checkSizeFile()
{
    $resultCheckSizeFile = null;
    foreach ($_FILES["uploadUserPhoto"]["size"] as $sizeFile) {
        if ($sizeFile < 5242880) {
            $resultCheckSizeFile = true;
        } else {
            $resultCheckSizeFile = false;
            break;
        }
    }
    return $resultCheckSizeFile;
}

/**
 * Ф-ия проверки на пустой массив файлов
 * @return true - массив не пустой, есть хотя бы один файл
 * @return false - в массиве нет файлов
 */
function checkEmptyArr()
{
    return $_FILES["uploadUserPhoto"]['tmp_name'][0] !== '';
}

/**
 * Ф-ия проверки на количество файлов
 * @return true - если файлов больше пяти
 * @return false - если файлов меньше пяти
 */
function checkCountFiles()
{
    $resultCheckCountFiles = null;
    if (count($_FILES["uploadUserPhoto"]['name']) > 5) {
        $resultCheckCountFiles = true;
    } else {
        $resultCheckCountFiles = false;
    }
    return $resultCheckCountFiles;
}

/**
 * Ф-ия проверки на ошибки в массиве
 * @return true - если в массиве есть информация об ошибке
 * @return false - если в массиве нет информации об ошибке
 */
function checkOnError()
{
    $resultCheckOnError = null;
    foreach ($_FILES["uploadUserPhoto"]["error"] as $error) {
        if (!empty($error)) {
            $resultCheckOnError = true;
            break;
        } else {
            $resultCheckOnError = false;
        }
    }
    return $resultCheckOnError;
}

//Удаление картинки из галереи
if (isset($_POST['deleteListCheckbox'])) {
    $deleteList = $_POST['deleteListCheckbox'];
    foreach ($deleteList as $file) {
        $filePath = $uploadPath . $file;
        unlink($filePath);
    }
}