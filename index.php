<?php 
  require_once("config.php");
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
    <meta property="og:title" content="<?php echo $Nome_Site ?> - Home">
    <meta property="og:site_name" content="<?php echo $Nome_Site ?>">
    <meta property="og:description" content="">
    
    <title><?php echo $Nome_Site ?> - Home</title>
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
                <a href="#banner"><img id="logo" src="Imgs/logo.png" alt="Logo Principal da marca Eulenir onde ela contem um circulo verde com uma folha branca na parte interna e as escritas na direita 'Eulenir Eberle - Psicóloga' "></a>
                <ul class="menu_box">
                    <li><a href="#sobre">Sobre</a></li>
                    <li><a href="#servicos">Serviços</a></li>
                    <li><a href="#blog">Blog</a></li>
                    <li><a href="#contato">Contato</a></li>
                </ul>
                <div class="Menu_Mobile"><i class="fa fa-bars" aria-hidden="true"></i></div>
            </div>
        </div>
    </nav>
</header>

<!--BANNER-->
<section id="banner">
    <img id="ImgBanner" src="Imgs/banner.png" alt="Foto de uma rede para descanso com fundo borrado onde pode se observar ao fundo uma planta e parte de uma janela. A foto tambem possuie tons esverdeados">
    <div class="Block">
        <img src="Imgs/Vector_Banner.svg" onload="SVGInject(this)"/>
        <h3>Bem - vindo</h3>
        <p>Acredito que a Psicologia pode contribuir
            para as pessoas terem uma vida com mais
            leveza e maior qualidade.</br></br>
            Este site existe com o objetivo de compartilhar
            conhecimento com base na ciência psicológica
            para pessoas que querem aprender a ter uma vida
            emocional mais saudável.
        </p>
        <h1>Psicóloga Eulenir Eberle</h1>
    </div>
</section>

<!--Serviços-->
<section id="servicos">
    <img id="img_serv" src="Imgs/servicos.png" >
    <div class="container">
        <div class="title">
            <img src="Imgs/title.svg" onload="SVGInject(this)"/>
            <h2>Serviços</h2>
        </div>
        <p>Ajudo você a gerenciar suas emoções para viver uma vida mais leve e com significado</p>
        <div class="cards">
            <a href="Sevices.html">
                <div class="Card">
                    <img src="Imgs/Service_Icon_01.png" alt="Arte de duas moças aonde uma se encontra triste na parte da frente, e a outra em tom mais esbranquiçado esta tapando os olhos da moça da frente">
                    <h3>PSICOTERAPIA INDIVIDUAL ADULTO</h3>
                </div>
            </a>
            <a href="Sevices.html#palestra">
                <div class="Card">
                    <img src="Imgs/Service_Icon_02.png" alt="Arte aonde pode se observar um grande cerebro e sua parte interna é composta por peças de quebra cabeça. na esquerda da arte podemos ver um rapaz de pé e um pouco curvado segurando uma peça como se estivesse montando o quebra-cabeça">
                    <h3>PALESTRAS/ OFICINAS
                        WORKSHOP/ AULAS</h3>
                </div>
            </a>
            <a href="EBook.html">
                <div class="Card">
                    <img src="Imgs/Service_Icon_03.png" alt="Arte aonde é possivel observar uma moça anotando em seu diario, e ao seu redor podemos ver plantas e flores. ">
                    <h3>E-BOOK</h3>
                </div>
            </a>
        </div>
    </div>
</section>

<!--Sobre-->
<section id="sobre">
    <div class="container">
        <div class="sobre_block">
            <h2>Eulenir Eberle Psicóloga</h2>
            <div class="Sobre_txt">
                <p>Especializada em Análise do Comportamento pela PUC-PR</p>
                <p>Especialista em Terapias Comportamentais Contextuais.</p>
                <p>Tem experiência em atendimento clínico individual, crianças, família e com trabalhos em grupo.</p>
            </div>
            <div class="botao sobreBT">
                <a href="Eulenir.html"><button>Conheça a profissional</button></a>
            </div>
        </div>
        <img src="Imgs/Eulenir.jpg" alt="Imagem com bordas arredondadas, onde podemos ver uma mulher negra com um sorriso em seu rosto, ela esta levemente virada para sua esquerda, seu cabelo é liso e está na altura dos ombros, ela usa um colar fino, ela esta vestida com uma blusa preta e uma camiseta tambem preta que tem uma estampa florida com rosas brancas e roxas.">
    </div>
</section>

<!--Blog-->
<section id="blog">
    <div class="container">
        <div class="title Tt_Blog">
            <img src="Imgs/title.svg" onload="SVGInject(this)"/>
            <a href="blog.php"><h2>Blog</h2></a>
        </div>
        
        <div class="blog_Block">
            
            <?php 
                $res = $pdo->query("SELECT * FROM blog_post where targ = 'sim' "); 
                $dados = $res->fetchAll(PDO::FETCH_ASSOC);

                if(@count($dados) > 0){
                    $id_postagem = $dados[0]['id'];
            ?>

            <div class="Simp_cards">
                <?php
                    $query2 = $pdo->query("SELECT * FROM blog_post where id != '$id_postagem' order by id desc LIMIT 2");
                    $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                    for ($i=0; $i < count($res2); $i++) { 
                        foreach ($res2[$i] as $key => $value) {
                        }
                        $imagem_simp = $res2[$i]['imagem'];
                        $titulo_simp = $res2[$i]['titulo'];
                        $autor_simp = $res2[$i]['autor'];
                        $tempo_simp = $res2[$i]['tempo'];
                        $nome_url_simp = $res2[$i]['nome_url'];
                ?>
                    <a href="postagem-<?php echo $nome_url_simp ?>">
                        <div class="card_blog">
                            <img src="Imgs/blog/<?php echo $imagem_simp ?>">
                            <div class="blog_infos">
                                <div class="titulo_blog">
                                    <h3><?php echo $titulo_simp ?></h3>
                                </div>
                                <i class="fas fa-user"></i><h4><?php echo $autor_simp ?></h4>
                            </div>
                        </div>
                    </a>  
                <?php } ?>
            </div>      

            <div class="Big_card">
                <?php
                    $query = $pdo->query("SELECT * FROM blog_post where targ = 'sim' ");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);
                    
                    $imagem = $res[0]['imagem'];
                    $titulo = $res[0]['titulo'];
                    $autor = $res[0]['autor'];
                    $data = $res[0]['data'];
                    $tempo = $res[0]['tempo'];
                    $texto = $res[0]['descri_simp'];
                    $nome_url = $res[0]['nome_url'];

                    $data = implode(' / ', array_reverse(explode('-', $data)));

                    $query3 = $pdo->query("SELECT * FROM comentarios where id_post = '$id_postagem' ");
                    $res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
                    $total_coments = @count($res3);

                ?>
                <a href="postagem-<?php echo $nome_url ?>">
                    <h2><?php echo $titulo ?></h2>
                    <img src="Imgs/blog/<?php echo $imagem ?>">
                    <div class="icons">
                        <i class="fas fa-user"></i><h4><?php echo $autor ?></h4>
                        <i class="fas fa-calendar-alt"></i><p><?php echo $data ?></p>
                        <i class="fas fa-file-alt"></i><p><?php echo $tempo ?></p>
                        <i class="fas fa-comments"></i><p><?php echo $total_coments ?> comentários</p>
                    </div>
                    <p class="resume_txt"><?php echo $texto ?></p>
                </a>
            </div>     

                <?php } else { ?>
                    
            <div class="Simp_cards">
                <?php
                    $query2 = $pdo->query("SELECT * FROM blog_post order by id desc LIMIT 1, 2");
                    $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                    for ($i=0; $i < count($res2); $i++) { 
                        foreach ($res2[$i] as $key => $value) {
                        }
                        $imagem_simp = $res2[$i]['imagem'];
                        $titulo_simp = $res2[$i]['titulo'];
                        $autor_simp = $res2[$i]['autor'];
                        $tempo_simp = $res2[$i]['tempo'];
                        $nome_url_simp = $res2[$i]['nome_url'];
                ?>
                    <a href="postagem-<?php echo $nome_url_simp ?>">
                        <div class="card_blog">
                            <img src="Imgs/blog/<?php echo $imagem_simp ?>">
                            <div class="blog_infos">
                                <div class="titulo_blog">
                                    <h3><?php echo $titulo_simp ?></h3>
                                </div>
                                <i class="fas fa-user"></i><h4><?php echo $autor_simp ?></h4>
                            </div>
                        </div>
                    </a>  
                <?php } ?>
            </div>      

            <div class="Big_card">
                <?php
                    $query = $pdo->query("SELECT * FROM blog_post order by id desc");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);
                    
                    $id = $res[0]['id'];
                    $imagem = $res[0]['imagem'];
                    $titulo = $res[0]['titulo'];
                    $autor = $res[0]['autor'];
                    $data = $res[0]['data'];
                    $tempo = $res[0]['tempo'];
                    $texto = $res[0]['descri_simp'];
                    $nome_url = $res[0]['nome_url'];
                    

                    $query3 = $pdo->query("SELECT * FROM comentarios where id_post = '$id' ");
                    $res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
                    $total_coments = @count($res3);

                ?>
                <a href="postagem-<?php echo $nome_url ?>">
                    <h2><?php echo $titulo ?></h2>
                    <img src="Imgs/blog/<?php echo $imagem ?>">
                    <div class="icons">
                        <i class="fas fa-user"></i><h4><?php echo $autor ?></h4>
                        <i class="fas fa-calendar-alt"></i><p><?php echo $data ?></p>
                        <i class="fas fa-file-alt"></i><p><?php echo $tempo ?></p>
                        <i class="fas fa-comments"></i><p><?php echo $total_coments ?> comentários</p>
                    </div>
                    <p class="resume_txt"><?php echo $texto ?></p>
                </a>
            </div>

                <?php } ?>  
            
        </div>

        <div class="botao blogBT">
            <a href="blog.php"><button>Veja Mais</button></a>
        </div>
    </div>
</section>

<!--Contato-->
<section id="contato">
    <img id="vetorBrown" src="Imgs/Vector_contato.png">
    <div class="container">
        <div class="title Tl_cont">
            <img src="Imgs/title.svg" onload="SVGInject(this)"/>
            <h2>Contato</h2>
        </div>
        <h3>Entre em contato</h3>
        <form method="post">
            <div class="BlockBox">
                <input type="text" name="nome" id="nome" required>
                <span>Nome Completo</span>
            </div>
            <div class="BlockBox">
                <input type="text" name="email" id="email" required>
                <span>E-mail</span>
            </div>
            <div class="BlockBox">
                <input type="text" name="telefone" id="telefone" required>
                <span>Telefone</span>
            </div>
            <div class="BlockBox">
                <textarea type="text" name="mensagem" id="mensagem" required></textarea>
                <span>Como posso te ajudar??</span>
            </div>
            <div class="botao Bt_cont">
                <button name="btn-enviar-contato" id="btn-enviar-contato" type="button">Enviar</button>
            </div>
        </form>  
        <div id="msg_box"></div>
    </div>
</section>

<!--NewsLetter-->
<section id="newsletter">
    <div class="container">
        <p>Cadastre-se para receber mais novidades!</p>
        <form method="POST" action="emailNews.php">
            <div class="Box_News">
                <input type="text" name="nome_news" id="nome_news" required>
                <span>Nome Completo</span>
            </div>
            <div class="Box_News">
                <input type="text" name="email_news" id="email_news" required>
                <span>E-mail</span>
            </div>
            <div class="botao Bt_news">
                <button name="btn-enviar-EmailNews" id="btn-enviar-EmailNews" type="button">Enviar</button>
            </div>
        </form>
        <div id="msg_box_news"></div>
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