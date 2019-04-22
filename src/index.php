<!Doctype html>
<html lang="Es-es">
<head>
<title>Centro de Estetica</title>
<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="semantic/out/semantic.min.css">
    <script
    src="semantic/jquery-3.4.0.min.js"></script>
    <script src="semantic/out/semantic.min.js"></script>
</head>
<body>
<header class='ui fluid container blue inverted segment'>
    <div class='ui two column doubling stackable grid container'>
        <div class='column'><p>Centro de Estetica</p></div>
        <div class='column'>
            <div class='ui rigth aligned'>
                <p>Segundo</p>
            </div>
        </div>
    </div>
</header>
<section class='ui container'>
<?php
    //phpinfo();
    include "class/dbase.php";
    include "vista/form.php";
    //$bd=new dbase();
    //$bd->link;
    $form=registrar();
    echo $form;
    if(isset($_POST['regi'])) print_r($_POST);
?>
</section>
<footer class='ui fluid raised very padded container inverted segment'style='margin-bottom:0;'>
    <div class='ui three column doubling stackable grid container'>
        <div class='column'>
            <h4>Informacion</h4>
            <div class='ui padded text inverted segment'>
                <p><a href='#'>Nuestro equipo</a></p>
                <p><a href='#'>Política de datos</a></p>
                <p><a href='#'>Política de cookies</a></p>
            </div>
        </div>
        <div class='column'>
            <h4>Cantacto</h4>
            <div class='ui padded text inverted segment'>
                <p><a href='#'>soporte@gmail.com</a></p>
                <p>av.Blasco Ibañes 128, 1</p>
                <p>Valencia, 46014</p>
            </div>
        </div>
        <div class='column'>
            <h4>Columnas</h4>
            <div class='ui padded text inverted segment'>
                <p>Columnas</p>
            </div>
        </div>
    </div>
    <div class='ui divider'></div>
    <div class='ui fluid center aligned container'>
        <p>Diseñado por : <a href='#' class=''>Ruslan Krasiy</a></p>
    </div>
    
</footer>

<script>
    $('.ui.checkbox')
    .checkbox()
    ;
    $('.ui.form')
        .form({
            inline : true,
            on     : 'blur',
            fields: {
            first_name: {
                identifier: 'first-name',
                rules: [
                {
                    type   : 'empty',
                    prompt : 'Please enter your name'
                }
                ]
            },
            last_name: {
                identifier: 'last-name',
                rules: [
                {
                    type   : 'empty',
                    prompt : 'Please enter your name'
                }
                ]
            },
            email: {
                identifier: 'email',
                rules: [
                {
                    type   : 'empty',
                    prompt : 'Please enter your correct email'
                },
                {
                    type    :   "email",
                    prompt  :  "MAL"
                }
                ]
            },
            
            password: {
                identifier: 'password',
                rules: [
                {
                    type   : 'empty',
                    prompt : 'Please enter a password'
                },
                {
                    type   : 'minLength[6]',
                    prompt : 'Your password must be at least {ruleValue} characters'
                }
                ]
            },
            day: {
                identifier: 'day',
                rules: [
                {
                    type   : 'empty',
                    prompt : 'Please enter your birthday'
                }
                ]
            },
            month: {
                identifier: 'month',
                rules: [
                {
                    type   : 'empty',
                    prompt : 'Please enter your month'
                }
                ]
            },
            year: {
                identifier: 'year',
                rules: [
                {
                    type   : 'empty',
                    prompt : 'Please enter your year'
                }
                ]
            },
            }
        });

//kk
if( $('.ui.form').form('is valid')) {
  // form is valid (both email and name)
    console.log("TOFO ad");
}





</script>
</body>
</html>
