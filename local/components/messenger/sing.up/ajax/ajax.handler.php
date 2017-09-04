<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

function registration() {
    $user = new CUser;
    $fields = array(
        "NAME"              => trim($_POST["name"]),
        "LAST_NAME"         => trim($_POST["secondName"]),
        "EMAIL"             => trim($_POST["email"]),
        "LOGIN"             => trim($_POST["email"]),
        "PASSWORD"          => trim($_POST["password"]),
        "CONFIRM_PASSWORD"  => trim($_POST["confirmPassword"])
    );
    $id = $user->Add($fields);
    $url = createConfUrl($fields["EMAIL"], $id);
    return sendConfMessage($url, $fields);
}

function createConfUrl($email, $id) {
    $confUrl = "messenger.ru/registration/confirm.php";
    $email_login = explode("@",$email);
    $checkSum = base64_encode($email_login[0] . md5($_SERVER['REMOTE_ADDR']));
    $confUrl .= "?checkSum=".$checkSum."&email=".$email."&id=".$id;
    return $confUrl;
}

function sendConfMessage($url,$fields) {
    $arEventFields = array(
        "USER_EMAIL"    => $fields["EMAIL"],
        "USER_NAME"     => $fields["NAME"],
        "CONFIRM_URL"   => $url
    );
    return CEvent::Send("REGISTRATION_CONFIRM", "s1", $arEventFields);
}

registration();