<?php
/**
 * Created by PhpStorm.
 * User: Dora
 * Date: 14/06/26
 * Time: 21:05
 */
    require_once('db.php');

    $validateValue = $_REQUEST['fieldValue'];
    $validateId = $_REQUEST['fieldId'];

    $validateError = "このメールアドレスは登録されています";
    $validateSuccess = "OK";

    $arrayToJs = array();
    $arrayToJs[0] = $validateId;

    $query = "select mmail from member where mmail = '$validateValue'";
    $result = mysqli_query($dbc, $query);
    mysqli_close($dbc);

    if(!mysqli_num_rows($result) == 1) {
        $arrayToJs[1] = true;
        echo json_encode($arrayToJs);
    } else {
        $arrayToJs[1] = false;
        echo json_encode($arrayToJs);
    }