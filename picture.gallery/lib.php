<?php

$uploadPath = $_SERVER["DOCUMENT_ROOT"] . "/uploaded_files/";
$typeArr = ['image/jpeg', 'image/png'];

/**
 * Ф-ия после проведения проверок помещает файлы в папку /uploaded_files/
 * @param $typeArr - массив типав файлов
 * @param $uploadPath - путь к папке с куда загружаются файлы
 */
function moveFile($uploadPath, $typeArr)
{
    if (isset($_POST["uploadBtn"]) && checkEmptyArr()) {

        if (checkSizeFile() &&
            checkTypeFile($typeArr) &&
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
 * @param $typeArr - массив типав файлов
 * @return true - файл является картинкой или весь массив файлов картинки
 * @return false - файл НЕ является картинкой или хотя бы один из файлов массива НЕ картинка
 *
 */
function checkTypeFile($typeArr)
{
    $resultCheckTypeFile = null;
    foreach ($_FILES["uploadUserPhoto"]["tmp_name"] as $key => $tmp_name) {
        if (in_array(mime_content_type($tmp_name), $typeArr)) {
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
/**
 * @param $fileSizeBytes - размер файла в байтах
 * @return int|string
 */
function sizeView($fileSizeBytes)
{
    $sizeMask = 0;
    if ($fileSizeBytes <= (1024 * 10)) {
        $sizeMask = round($fileSizeBytes) . ' b';
    } else if ($fileSizeBytes > (1024 * 10) && $fileSizeBytes <= (1024 * 1024)) {
        $sizeMask = round($fileSizeBytes / 1024) . ' Kb';
    } else if ($fileSizeBytes > (1024 * 1024)   ) {
        $sizeMask = round($fileSizeBytes / (1024 * 1024)) . ' Mb';
    }
    return $sizeMask;
}

/**
 * @param $date - результат выполнения ф-ии filectime()
 * @return false|string
 */
function dateView($date)
{
    return date('d.m.Y H:i:s', $date);
}

