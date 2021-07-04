
<?php require_once("config.php"); ?>



<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="author" content="Matheus Henrique || https://mhborges.com.br">
    <meta name="description" content="">

    <meta property="og:locale" content="pt_BR">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://eulenireberle.com.br">
    <meta property="og:title" content="<?php echo $Nome_Site ?> - Descadastrar">
    <meta property="og:site_name" content="<?php echo $Nome_Site ?>">
    <meta property="og:description" content="">
    
    <title>Descadastrar - <?php echo $Nome_Site ?></title>
    <link rel="icon" href="Imgs/icon.png"/>
    
    <!-- font google-->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- font awesome para icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <!-- JQUERY linkagem -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/style.css">
    <script src="js/svg-inject.min.js"></script>
</head>

<body>

<!--MENU-->
<header class="head">
    <nav class="navbar">
        <div class="nav_contato">
            <img src="Imgs/Header_Patter.png">
            <div class="cont_contato col-lg-10">
                <div class="nav_email">
                    <i class="far fa-envelope"></i>
                    <a target="_blank" href="mailto:eulenir.eberle@gmail.com">contato@eulenireberle.com.br</a>
                </div>
                <div class="nav_redes">
                    <a target="_blank" href="https://www.facebook.com/eulenireberlepsicologa"><i class="fab fa-facebook-f"></i></a>
                    <a target="_blank" href="https://www.instagram.com/eulenireberlepsicologa/"><i class="fab fa-instagram"></i></a>
                    <a target="_blank" href="https://api.whatsapp.com/send/?phone=554199066371&text&app_absent=0"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
        </div>
        <div class="nav_menu">
            <div class="cont_menu col-lg-10">
                <a href="index.php"><img id="logo" src="Imgs/logo.png" alt="Logo Principal da marca Eulenir onde ela contem um circulo verde com uma folha branca na parte interna e as escritas na direita 'Eulenir Eberle - Psicóloga' "></a>
                <ul class="menu_box">
                    <li><a href="Eulenir.html">Sobre</a></li>
                    <li><a href="index.php#servicos">Serviços</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="index.php#contato">Contato</a></li>
                </ul>
                <div class="Menu_Mobile"><i class="fa fa-bars" aria-hidden="true"></i></div>
            </div>
        </div>
    </nav>
</header>

<section id="descadastrar">
    <div class="container">
        <p>Não quer mais receber nossos Emails? insira o email que foi cadastrado.</p>
        <div class="form_desc">
            <div class="Title_desc"><h2>Descadastrar</h2></div>
            <form method="post">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="form-group">
                            <label>Email Cadastrado</label>
                            <input type="text" name="email" class="form-control" id="email" placeholder="Insira seu Email">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <button name="btn-descadastrar" id="btn-descadastrar">Descadastrar</button>
                    </div>
                </div>
               
            </form>
            <div id="div-msg-rec"></div>
        </div>   
    </div>   
</section>

<!--Rodapé-->
<footer>
    <div class="rodapeBox col-lg-10">
        <h5>
            ©2021. Eulenir Eberle Psicóloga<br>
            CRP 08/24116. Todos os direitos reservados.
        </h5>
        <p>Produzido por <a target="_blank" href="https://mhborges.com.br"><img src="Imgs/MH_logo.svg" onload="SVGInject(this)"></a></p>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src="js/script.js"></script>
<script type="text/javascript" src="js/jquery_contatos.js"></script>

</body>
</html>