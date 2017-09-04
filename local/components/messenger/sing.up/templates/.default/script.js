$(function() {
    function registration() {
        $.ajax({
            url: $(".path").attr("id") + "/ajax/ajax.handler.php",
            type: "POST",
            dataType: "html",
            data: {
                "email": $("#email").val(),
                "password": $("#pass").val(),
                "confirmPassword": $("#confpass").val(),
                "name": $("#name").val(),
                "secondName": $("#second").val()
            },
            success: function(data) {
                document.location.href = 'http://messenger.ru/registration/after_adding.php';
            },
            error: function(xhr, status, error) {
                alert(status + '|\n' +error);
            }
        });
    }

    // Валидация данных

    function nameVal() {
        if ($("#name").val().length == 0) {
            $("#nameException").empty();
            $("#nameException").append("Заполните строку имени");
            return false;
        }
        if ($("#name").val().length > 20) {
            $("#nameException").empty();
            $("#nameException").append("Длина имени не должна превышать 20 симбволов");
            return false;
        }
        $("#nameException").empty();
        return true;
    }

    function snameVal() {
        if ($("#second").val().length == 0) {
            $("#snameException").empty();
            $("#snameException").append("Заполните строку фамилии");
            return false;
        }
        if ($("#name").val().length > 20) {
            $("#snameException").empty();
            $("#snameException").append("Длина фамилии не должна превышать 20 симбволов");
            return false;
        }
        $("#snameException").empty();
        return true;
    }
    
    function emailVal() {
        var r = /^[\w\.\d-_]+@[\w\.\d-_]+\.\w{2,4}$/i;
        if (!r.test($("#email").val())) {
            $("#emailException").empty();
            $("#emailException").append("Введите корректный e-mail адрес");
            return false;
        }
        $("#emailException").empty();
        return true;
    }
    
    function passVal() {
        if ($("#pass").val().length > 20 || $("#pass").val().length < 6) {
            $("#passException").empty();
            $("#passException").append("Длина длина пароля должна быть от 6 до 20 симбволов");
            return false;
        }
        $("#passException").empty();
        return true;
    }

    function cpassVal() {
        if($("#pass").val() != $("#сonfpass").val()) {
            $("#cpassException").empty();
            $("#cpassException").append("Пароли не совпадают");
            return false;
        }
        $("#cpassException").empty();
        return true;
    }

    var email = false;
    var name = false;
    var sname = false;
    var password = false;
    var cpass = false;

    $("#email").keyup(function() {
        email = emailVal();
    });

    $("#name").keyup(function() {
        name = nameVal();
    });

    $("#second").keyup(function() {
        sname = snameVal();
    });

    $("#pass").keyup(function() {
        password = passVal();
    });

    $("#confpass").keyup(function() {
        cpass = cpassVal();
    });

// окно с вводом данных регистрации

    $( "#regDialog" ).dialog( {
        autoOpen: false,
        dialogClass: "resp",
        width: 400,
        modal: true,
        buttons: {
            "sing up": function() {
                if(email || name || sname || password || cpass) {
                    registration();
                    window.location.replace('http://messenger.ru/registration/after_adding.php');
                }
            },
            Cancel: function() {
                $( this ).dialog( "close" );
                $('#regForm')[0].reset();
            }
        }
    });

    $( "#opener" ).on( "click", function() {
        $( "#regDialog" ).dialog( "open" );
    });

});