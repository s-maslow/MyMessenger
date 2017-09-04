<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

class SingIn extends CBitrixComponent {

    public static function isConfirmed($login) {
        $user = CUser::GetByLogin($login);
        $id = $user->NavNext()["ID"];
        $groups = CUser::GetUserGroup($id);
        return array_search(6, $groups) ? true : false;
    }

    public function executeComponent() {
        echo self::isConfirmed("admin");
        global $USER;
        $this->arResult["autorize"] = $USER->IsAuthorized();
        if (isset($_POST["singin"]) && isset($_POST["email"]) && isset($_POST["password"])) {
            if (!self::isConfirmed($_POST["email"])) {
                $this->arResult["confirmed"] = false;
            } else {
                $auth = $USER->Login($_POST["email"], $_POST["password"]);
                if($auth !== true) {
                    ShowMessage($auth);
                }
            }
        }
        $this->IncludeComponentTemplate();
    }

}