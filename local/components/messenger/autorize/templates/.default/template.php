<? if (!$this->$arResult["autorize"]) {?>
<div id="singin">
    <h1 class="head">Sing In</h1><br>

    <form action="" method="post">
        <div class="exeption"></div>
        E-mail:<br>
        <input type="text" name="email"><br>
        Password:<br>
        <input type="password" name="password"><br>
        <input type="submit" name="singin" value="sing in">
        <?
        $APPLICATION->IncludeComponent(
            "messenger:sing.up",
            "",
            Array()
        );
        ?>
    </form>
</div>
<?}