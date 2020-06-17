<?php

function dump($str ,$arg)
{
    echo '<pre>';
    var_dump($str);
    var_dump($arg);
    echo '</pre>';
}

dump('масив' ,$_FILES);

$uploadUserPhotoArr = $_FILES["uploadUserPhoto"];
$uploadPath = $_SERVER["DOCUMENT_ROOT"] . "/uploaded_files/";

/**
 * Ф-ия после проведения проверок помещает файлы в папку /uploaded_files/
 * @param $uploadUserPhotoArr - массив загружаемых файлов
 * @param $uploadPath - путь к папке с куда загружаются файлы
 */

function moveFile($uploadUserPhotoArr, $uploadPath)
{
    if ((isset($_POST["uploadBtn"]) && checkEmptyArr($uploadUserPhotoArr))) {

        if (checkSizeFile($uploadUserPhotoArr) &&
            checkTypeFile($uploadUserPhotoArr) &&
            !checkOnError($uploadUserPhotoArr)) {

            foreach ($uploadUserPhotoArr["error"] as $key => $error) {
                move_uploaded_file($_FILES["uploadUserPhoto"]["tmp_name"][$key], $uploadPath . $_FILES["uploadUserPhoto"]["name"][$key]);
            }

        }
    }
}

/**
 * Ф-ия проверки типа загружаемых файлов (картинки или что то другое)
 *
 * @param $uploadUserPhotoArr - массив загружаемых файлов
 * @return true - файл является картинкой или весь массив файлов картинки
 * @return false - файл НЕ является картинкой или хотя бы один из файлов массива НЕ картинка
 *
 */
function checkTypeFile($uploadUserPhotoArr)
{
    $resultCheckTypeFile = null;
    foreach ($uploadUserPhotoArr["tmp_name"] as $key => $tmp_name) {
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
 * @param $uploadUserPhotoArr - массив загружаемых файлов
 * @return true - каждый файл меньше 5мб
 * @return false - хотя бы один из файлов массива больше 5мб
 */
function checkSizeFile($uploadUserPhotoArr)
{
    $resultCheckSizeFile = null;
    foreach ($uploadUserPhotoArr["size"] as $sizeFile) {
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
 * @param $uploadUserPhotoArr - массив загружаемых файлов
 * @return true - массив не пустой, есть хотя бы один файл
 * @return false - в массиве нет файлов
 */
function checkEmptyArr($uploadUserPhotoArr)
{
    return $uploadUserPhotoArr['tmp_name'][0] !== '';
}

/**
 * @param $uploadUserPhotoArr - массив загружаемых файлов
 * @return true - если в массиве есть информация об ошибке
 * @return false - если в массиве нет информации об ошибке
 */
function checkOnError($uploadUserPhotoArr)
{
    $resultCheckOnError = null;
    foreach ($uploadUserPhotoArr["error"] as $error) {
        if (!empty($error)) {
            $resultCheckOnError = true;
            break;
        } else {
            $resultCheckOnError = false;
        }
    }
    return $resultCheckOnError;
}


if (checkEmptyArr($uploadUserPhotoArr)) {
    dump('тип', checkTypeFile($uploadUserPhotoArr));
}
dump('размер', checkSizeFile($uploadUserPhotoArr));
dump('в массиве что то есть?', checkEmptyArr($uploadUserPhotoArr));
dump('ошибки есть?', checkOnError($uploadUserPhotoArr));







