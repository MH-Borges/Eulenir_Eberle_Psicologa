<?php 
  require_once("config.php");

    @session_start();
    $id_usuario = @$_SESSION['id_usuario'];
    $nivel_usuario = @$_SESSION['nivel_usuario'];
  
    $postagem_get = @$_GET['nome'];
    $query = $pdo->query("SELECT * FROM clientes where perfil_url = '$postagem_get' ");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $nome_User = @$res[0]['nome'];
    $email_User = @$res[0]['email'];
    $Telefone_User = @$res[0]['telefone'];   
    $imagem_User = @$res[0]['imagem'];
    $imagemBanner_User = @$res[0]['imagem_banner'];
    $sobre_User = @$res[0]['sobre'];
    $id_User = @$res[0]['id'];


?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="author" content="Matheus Henrique || https://mhborges.com.br">
    <meta name="keywords" content="Psicologa, Psicologia, Serviços Psicologia, Eulenir Eberle, Eulenir Eberle psicológa, Blog, Blog Ansiedade, Blog Emoções, Blog Sentimentos, Blog Eulenir Eberle">
    <meta name="description" content="Pagina de perfil de usuario">
    <meta property="og:locale" content="pt_BR">
    <meta property="og:url" content="https://eulenireberle.com.br">

    
    <title>Perfil - <?php echo $nome_User?></title>
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

<!-- Botão de rolagem-->
<a id="btn_UP"><i class="fas fa-angle-double-up"></i></a>

<!--MENU-->
<header class="head">
    <nav class="navbar">
        <div class="nav_contato">
            <img src="Imgs/Header_Patter.png" alt="">
            <div class="cont_contato col-lg-10">
                <div class="nav_email">
                    <i class="far fa-envelope"></i>
                    <a target="_blank" href="mailto:eulenir.eberle@gmail.com">contato@eulenireberle.com.br</a>
                </div>
                <div class="nav_redes">
                    <a target="_blank" href="https://www.facebook.com/eulenireberlepsicologa"><i class="fab fa-facebook-f"></i></a>
                    <a target="_blank" href="https://www.instagram.com/eulenireberlepsicologa/"><i class="fab fa-instagram"></i></a>
                    <a target="_blank" href="https://api.whatsapp.com/send/?phone=554199066371&text&app_absent=0"><i class="fab fa-whatsapp"></i></a>
                
                    <?php if($id_usuario == null ){ ?>
                        <a class="login" href="sistema"><i class="fa fa-user"></i><span>Login</span></a>
                    <?php } if($id_usuario == 1 || $nivel_usuario == 'Admin'){ ?>
                        <a class="login" href="sistema/Admin"><i class="fa fa-user"></i><span>Painel ADM</span></a>
                    <?php } if($nivel_usuario == 'Padrao'){ ?>
                        <a class="login" href="sistema/Usuario"><i class="fa fa-user"></i><span>Painel Cliente</span></a>
                    <?php } ?>
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

<section id="PerfilPage">
    <div class="container infosUser">
        <div class="row">
            <div class="col-md-12 banner">
                <?php if(@$imagemBanner_User != ""){ ?>
                    <img src="Imgs/BannerPics/<?php echo $imagemBanner_User ?>">
                <?php } else { ?>
                    <img src="Imgs/BannerPics/banner_padrao.jpg">
                <?php } ?>
            </div>
        </div>
    
        <div class="imgPerfil">
            <?php if(@$imagem_User != ""){ ?>
                <img src="Imgs/ProfilePics/<?php echo $imagem_User ?>">
            <?php }else{ ?>
                <img src="Imgs/ProfilePics/sem-foto.jpg" >
            <?php }?>
            <div id="msgPerfil"></div>
        </div>
    
        <div class="infoUser">
            <h3><?php echo @$nome_User ?></h3>
            <div id="msgInfos"></div>
        </div>
    </div>
    
    <div class="container sobre">
        <h3>Sobre</h3>
        <?php if($sobre_User == ""){ ?>
            <div class="sobretxt">Este Usuário ainda não escreveu nada sobre si.</div>
        <?php } else { ?>
            <div class="sobretxt"><?php echo $sobre_User ?></div>
        <?php } ?>
    </div>
    
    <div class="container coments">
        <h3>Ultimos comentários</h3>
        <?php
            $query2 = $pdo->query("SELECT * from comentarios where id_user = '$id_User' order by id desc");
            $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
    
            for ($i=0; $i < count($res2); $i++) {
                foreach ($res2[$i] as $key => $value) {
                }
    
                $id_coment = $res2[$i]['id'];
                $id_user = $res2[$i]['id_user'];
                $id_post = $res2[$i]['id_post'];
                $comment = $res2[$i]['comentario'];
                $data = $res2[$i]['data'];
                $data = implode(' / ', array_reverse(explode('-', $data)));
    
                $query3 = $pdo->query("SELECT * from clientes where id = '$id_user' ");
                $res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
                $nome_cliente = $res3[0]['nome'];
                $imagem_cliente = $res3[0]['imagem'];
    
                $query4 = $pdo->query("SELECT * from blog_post where id = '$id_post' ");
                $res4 = $query4->fetchAll(PDO::FETCH_ASSOC);
                $titulo_post = $res4[0]['titulo'];
                $imagem_post = $res4[0]['imagem'];
    
                $postagem_get = $res4[0]['nome_url'];
        ?>
        <div class="comentario">
            <div class="imgUser"><img src="Imgs/ProfilePics/<?php echo $imagem_cliente ?>"></div>
            <p class="NomeUser"><?php echo $nome_cliente ?> <span><?php echo $data ?></span> </p>
            <p class="textUser"><?php echo $comment ?></p>
            <div class="postInfo">
            <div class="imgPost"><img src="Imgs/blog/<?php echo $imagem_post ?>"></div>
            <h4><?php echo $titulo_post ?></h4>
            </div>
        </div>
        <?php } ?>
    </div>
</section>

  
<!-- Recomendação-->
<section id="recomend">
    <div class="container">
        <h3>Veja Mais<span>Artigos do Blog</span></h3>
        <div class="Cards_Post">
        <?php 
               $query = $pdo->query("SELECT * FROM blog_post where nome_url != '$postagem_get' order by id desc LIMIT 3");
               $res = $query->fetchAll(PDO::FETCH_ASSOC);

               for ($i=0; $i < count($res); $i++) { 
                  foreach ($res[$i] as $key => $value) {
                  }

                  $imagem = $res[$i]['imagem'];
                  $titulo = $res[$i]['titulo'];
                  $tag_id = $res[$i]['tag_id'];
                  $nome_url = $res[$i]['nome_url'];

                  $query2 = $pdo->query("SELECT * from tags where id = '$tag_id' ");
                  $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                  $nome_tag = $res2[0]['nome'];

                  ?>


            <a class="mix ansiedade" href="postagem-<?php echo $nome_url ?>">
                <div class="card_blog">
                <div id="img"><img src="Imgs/blog/<?php echo $imagem ?>" alt=""></div>
                    <div class="title_blog"><h4><?php echo $titulo ?></h4></div>

                    <?php if($tag_id != "1"){ ?>
                        <div class="tag"><p><?php echo $nome_tag ?></p></div>
                    <?php } if( $tag_id == "1") { ?>
                        <div class="noneB"></div>
                    <?php } ?>
                    
                </div>
            </a>

        <?php } ?>    
        </div>
        
    </div>
</section>

<!--Rodapé-->
<footer>
    <div class="rodapeBox col-lg-10">
        <h5>
            ©2021. Eulenir Eberle<br>
            Psicóloga | CRP 08/24116. Todos os direitos reservados.
        </h5>
        <p>Produzido por <a target="_blank" href="https://mhborges.com.br"><img src="Imgs/MH_logo.svg" onload="SVGInject(this)"></a></p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src="js/script.js"></script>

</body>
</html>