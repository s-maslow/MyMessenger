<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div id="regDialog">
   <div class="path" id="<?=$arResult["componentPath"]?>">
        <form action="" method="post" id="regForm">
            Name:<br>
            <div id="nameException" class="exception"></div>
            <input type="text" id="name" name="name"><br>
            Second name:<br>
            <div id="snameException" class="exception"></div>
            <input type="text" id="second" name="second"><br>
            E-mail:<br>
            <div id="emailException" class="exception"></div>
            <input type="email" id="email" name="email"><br>
            Password:<br>
            <div id="passException" class="exception"></div>
            <input type="password" id="pass" name="pass"><br>
            Confirm password:<br>
            <div id="cpassException" class="exception"></div>
            <input type="password" id="confpass" name="confpass"><br>
        </form>
    </div>
</div>
<button id="opener">sing up</button>