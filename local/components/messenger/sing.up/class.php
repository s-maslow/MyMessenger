<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

class SingUp extends CBitrixComponent {


    public function executeComponent() {
        $this->arResult["componentPath"] = $this->GetPath();
        $this->IncludeComponentTemplate();
    }

}