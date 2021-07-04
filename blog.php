<?php 
  require_once("config.php");

  @session_start();
  $id_usuario = @$_SESSION['id_usuario'];
  $nivel_usuario = @$_SESSION['nivel_usuario'];

?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="author" content="Matheus Henrique || https://mhborges.com.br">
    <meta name="keywords" content="Psicologa, Psicologia, Serviços Psicologia, Psicoterapia individual, Palestras, Workshops, E-Book, Eulenir Eberle, Eulenir Eberle psicológa, Blog, Eulenir Eberle Contato, Newsletter Psicologia">
    <meta name="description" content="">

    <meta property="og:locale" content="pt_BR">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://eulenireberle.com.br">
    <meta property="og:title" content="<?php echo $Nome_Site ?> - Blog">
    <meta property="og:site_name" content="<?php echo $Nome_Site ?>">
    <meta property="og:description" content="">
    
    <title><?php echo $Nome_Site ?> - Blog</title>
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

<!--BANNER-->
<section id="banner_Blog">
    <img id="vecto01" src="Imgs/Vector_folha.png">
    <img id="vecto02" src="Imgs/Vector_folha.png">
    <div class="container">
        <h2>"Não considere nenhuma prática como imutável.<br>
            Mude e esteja pronto a mudar novamente.<br>
            Não aceite verdade eterna.<br>
            <span>Experimente!</span>"
        </h2>
    </div>
</section>

<!--Cards-->
<section id="cards_blog">
    <div class="container">
    <div class="Itens_blog">
        <ul>
            <li class="active" data-filter="*">Todos</li>

            <?php 
                $query = $pdo->query("SELECT * FROM tags order by id desc");
                $res = $query->fetchAll(PDO::FETCH_ASSOC);

                for ($i=0; $i < count($res); $i++) { 
                    foreach ($res[$i] as $key => $value) {
                    }
                    $tag_nome = $res[$i]['nome'];
            
            ?>

            <?php if($tag_nome != "Sem_Tag"){ ?>
                <li id="<?php echo $tag_nome?>" class="<?php echo $tag_nome?>" data-filter=".<?php echo $tag_nome?>"><?php echo $tag_nome?></li>
            <?php } else { ?>
                <li class="noneB"></li>
            <?php } } ?>

        </ul>
        <form action="#">
            <input type="text" placeholder="Pesquisar">
            <button type="submit"><i class="fas fa-search"></i></button>
            <button id="close" type="reset"><i class="fas fa-times"></i></button>
        </form>
    </div>    

    <div class="Cards_Blog_Page">
        <?php 
            $query = $pdo->query("SELECT * FROM blog_post order by id desc");
            $res = $query->fetchAll(PDO::FETCH_ASSOC);

            for ($i=0; $i < count($res); $i++) { 
                foreach ($res[$i] as $key => $value) {
                }

                $imagem = $res[$i]['imagem'];

                $tempo = $res[$i]['tempo'];
                $autor = $res[$i]['autor'];
                $tag_id = $res[$i]['tag_id'];


                $query2 = $pdo->query("SELECT * from tags where id = '$tag_id' ");
                $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                $nome_tag = $res2[0]['nome'];

                $titulo = $res[$i]['titulo'];
                $texto_simp = $res[$i]['descri_simp'];

                $id = $res[$i]['id'];
                $nome_url = $res[$i]['nome_url']; 

                $query3 = $pdo->query("SELECT * FROM comentarios where id_post = '$id' ");
                $res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
                $total_coments = @count($res3);

        ?>
        <a class="mix <?php echo $nome_tag ?>" href="postagem-<?php echo $nome_url ?>">
            <div class="card_blog">
                <div id="img"><img src="Imgs/blog/<?php echo $imagem ?>" alt=""></div>
                <div class="icons_blog_page">
                    <i class="fas fa-file-alt"></i><p><?php echo $tempo ?></p>
                    <i class="fas fa-comments"></i><p><?php echo $total_coments ?> comentários</p>
                    <i class="fas fa-user"></i><h3><?php echo $autor ?></h3>
                </div>
                
                <?php if($tag_id != "1"){ ?>
                    <div class="tag"><p><?php echo $nome_tag ?></p></div>
                    <div class="title_blog_70"><h4><?php echo $titulo ?></h4></div>
                <?php } if( $tag_id == "1") { ?>
                    <div class="noneB"></div>
                    <div class="title_blog_100"><h4><?php echo $titulo ?></h4></div>
                <?php } ?>

                
                <p class="prev"><?php echo $texto_simp ?></p>
            </div>
        </a>
        <?php } ?>
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

<script>
    const urlParams = new URLSearchParams(window.location.search);
    if(urlParams != ""){
        const param = urlParams.get('tag');
        const varia = document.getElementById(param);
        const todas = document.querySelectorAll('.Itens_blog ul li');
        todas.item(0).classList.remove("active");
        todas.item(0).classList.remove("mixitup-control-active");
        varia.classList.add("mixitup-control-active");
        varia.classList.add("active");
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src="js/script.js"></script>
<script src="js/mixitup.min.js"></script>

</body>
</html>