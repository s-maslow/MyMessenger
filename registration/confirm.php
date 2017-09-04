<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php"); ?>




<?
    $data = array(
        "EMAIL"    => $_GET["email"],
        "ID"       => $_GET["id"],
        "CHECKSUM" => $_GET["checksum"]
    );
    $email_login = explode("@",$_GЕT["email"]);
    $checkSum = base64_encode($email_login[0] . md5($_SERVER['REMOTE_ADDR']));
    if($data["CHECKSUM"] != $checkSum) {
        echo "Произошла непредвиденная ошибка, пройдите регистрацию ещё раз, этот пользователь будет удалён.";
        CUser::Delete($data["ID"]);
    } else {
        CUser::SetUserGroup($data["ID"], array(6));
        echo "Теперь вы можете войти на сайт";
    }
?>



<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>
