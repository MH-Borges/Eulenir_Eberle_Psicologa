<?php 
  require_once("config.php");

  @session_start();
  $id_usuario = @$_SESSION['id_usuario'];
  $nivel_usuario = @$_SESSION['nivel_usuario'];
  
  $postagem_get = @$_GET['nome'];
  $query = $pdo->query("SELECT * FROM blog_post where nome_url = '$postagem_get' ");
  $res = $query->fetchAll(PDO::FETCH_ASSOC);
  $palavras = $res[0]['key_words'];
  $data = $res[0]['data'];
  $data = implode(' / ', array_reverse(explode('-', $data)));
  $texto_simp = $res[0]['descri_simp'];
  $titulo = $res[0]['titulo'];
  $autor = $res[0]['autor'];

  $imagem = $res[0]['imagem'];
  $tempo = $res[0]['tempo'];
  $Texto_comp = $res[0]['texto_comp'];
  $id = $res[0]['id'];
  $nome_url = $res[0]['nome_url']; 
  $fontes = $res[0]['fontes'];
  $likes = $res[0]['likes'];

  $tag_id = $res[0]['tag_id'];
  $query2 = $pdo->query("SELECT * from tags where id = '$tag_id' ");
  $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
  $nome_tag = $res2[0]['nome'];


$numero = $res[0]['visita'];
$visitantes = $numero + 1;

$pdo->query("UPDATE blog_post SET visita = '$visitantes' WHERE id = '$id' ");

$queryVS = $pdo->query("SELECT * FROM blog_post where nome_url = '$postagem_get' ");
$resVS = $queryVS->fetchAll(PDO::FETCH_ASSOC);
$visitas = $resVS[0]['visita'];

?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="author" content="Matheus Henrique || https://mhborges.com.br">
    <?php if(@$palavras == ""){ ?>
        <meta name="keywords" content="Psicologa, Psicologia, Serviços Psicologia, Eulenir Eberle, Eulenir Eberle psicológa, Blog, Blog Ansiedade, Blog Emoções, Blog Sentimentos, Blog Eulenir Eberle">
    <?php }else{ ?>
        <meta name="keywords" content="<?php echo $palavras ?>">
    <?php } ?>
    <meta name="description" content="<?php echo $texto_simp ?>">
    
    <meta property="og:locale" content="pt_BR">
    <meta property="og:url" content="https://eulenireberle.com.br/Blog">
    <meta property="og:title" content="<?php echo $titulo ?>">
    <meta property="og:site_name" content="<?php echo $nome_site ?>">
    <meta property="og:description" content="<?php echo $texto_simp ?>">

    <meta property="og:type" content="article">
    <meta property="article:author" content="<?php echo $autor ?>">
    <meta property="article:section" content="<?php echo $nome_tag ?>">
    <?php if(@$palavras == ""){ ?>
        <meta property="article:tag" content="Emoções, Psicologa, Psicologia, Serviços Psicologia, Eulenir Eberle, Eulenir Eberle psicológa, Blog">
    <?php }else{ ?>
        <meta property="article:tag" content="<?php echo $palavras ?>">
    <?php } ?>
    <meta property="article:published_time" content="<?php echo $data ?>"> 
    <!--SHARE-->
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=60a7b54fccbbe50012c02e2f&product=inline-share-buttons' async='async'></script>

    <title><?php echo $titulo ?></title>
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

<!-- Header -->
<section id="header_text">
    <div class="container">
        <h1><?php echo $titulo ?></h1>
        <p>Por:<div class="user"><i class="fas fa-user"></i></div><h3><?php echo $autor ?></h3></p>
        <i class="fas fa-file-alt"></i><p>Leitura de: <span><?php echo $tempo ?></span></p>
        <i class="fas fa-calendar-alt"></i><p>Data: <span><?php echo $data?></span></p>
    </div>
</section>

<!-- Artigo -->
<section id="article_Post">
    <div class="container">
        <div class="Text_Prin">
            <div id="img_post"><img src="Imgs/blog/<?php echo $imagem ?>" alt=""></div>

            <article><?php echo $Texto_comp ?></article>
            <div class="fontes">

              <?php if ($fontes == ""){?>
                  <h2 class="noneB">Fontes:</h2>
              <?php }else{ ?>
                <h2>Fontes:</h2>
                <p><?php echo $fontes?></p>
              <?php } ?>  
            </div>
        </div>
        <div class="Pages_links">
            <h3>Mais blog</h3>
            <ul>
              <a href="blog.php"><li>Mais Recentes</li></a>
              <?php 
                    $query = $pdo->query("SELECT * FROM tags order by id desc");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);

                    for ($i=0; $i < count($res); $i++) { 
                        foreach ($res[$i] as $key => $value) {
                        }
                        $tag_nome = $res[$i]['nome'];
                  ?>

                <?php if($tag_nome != "Sem_Tag"){ ?>
                    <a href="blog.php?tag=<?=$tag_nome?>"><li id="<?php echo $tag_nome?>"><?php echo $tag_nome?></li></a>
                <?php } else { ?>
                    <a class="noneB"></a>
                <?php } } ?>

                
                
            </ul>
            <h3>Veja Também</h3>
            <ul id="mobile">
                <a href="Eulenir.html"><li>Mais sobre Eulenir Eberle</li></a>
                <a href="Sevices.html"><li>Meus Serviços</li></a>
                <a href="EBook.html"><li>E-book Ansiedade</li></a>
            </ul>
            <h4><i class="fas fa-eye"></i> <?php echo $visitas ?></h4>
        </div>
    </div>
</section>

<section id="likes">
    <div class="container">
        <h3>Gostou? Deixe seu like:</h3>
        <form method="post">
            <input type="hidden" id="id_like" name="id_like" value="<?php echo $id ?>" required>
            <button type="button" id="Like" name="Like" onclick="toggleLike();" class="btn LikeBtn"><i class="fas fa-heart"></i><span id="maisUm"><?php echo $likes ?></span><span id="resulta"></span></button>
        </form>
    </div>
</section>

<section id="comments">
    <div class="container">
        <?php if($id_usuario == null || $id_usuario == ""){ ?>

        <div class="chama_coment">
            <p>Deseja fazer algum comentario? Clique <a target="_blank" href="sistema"> AQUI </a> para fazer Login ou se Cadastrar!</p>
        </div>

        <div class="comments_cont">
            <h3>Comentários:</h3>
            <div class="commentsBk">
                <?php
                    $query2 = $pdo->query("SELECT * from comentarios where id_post = '$id' order by id desc");
                    $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                    
                    for ($i=0; $i < count($res2); $i++) { 
                        foreach ($res2[$i] as $key => $value) {
                        }
                        
                        $id_coment = $res2[$i]['id'];
                        $id_user = $res2[$i]['id_user'];
                        $comment = $res2[$i]['comentario'];
                        $data = $res2[$i]['data'];
                        $data = implode(' / ', array_reverse(explode('-', $data)));

                        $query3 = $pdo->query("SELECT * from clientes where id = '$id_user'");
                        $res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
                        $nome_cliente = $res3[0]['nome'];
                        $nome_url = $res3[0]['perfil_url'];
                        $imagem_cliente = $res3[0]['imagem'];
                ?>
                <div class="comentario">
                    
                        <a href="perfil-<?php echo $nome_url ?>"> <div class="imgUser"><img src="Imgs/ProfilePics/<?php echo $imagem_cliente ?>"></div></a>
                        <p class="NomeUser"><a href=""><?php echo $nome_cliente ?></a> <span><?php echo $data ?></span> </p>
                    
                    <span><?php echo $data ?></span> </p>
                    <p class="textUser"><?php echo $comment ?></p>
                </div>
                <?php  } ?> 
            </div>
        </div>

        <?php } else {  ?>

        <div class="comments_cont">
            <h3>Comentários:</h3>
            <div class="commentsBk">
                <?php
                    $query2 = $pdo->query("SELECT * from comentarios where id_post = '$id' order by id desc");
                    $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                    
                    for ($i=0; $i < count($res2); $i++) { 
                        foreach ($res2[$i] as $key => $value) {
                        }
                        
                        $id_coment = $res2[$i]['id'];
                        $id_user = $res2[$i]['id_user'];
                        $comment = $res2[$i]['comentario'];
                        $data = $res2[$i]['data'];
                        $data = implode(' - ', array_reverse(explode('-', $data)));

                        $query3 = $pdo->query("SELECT * from clientes where id = '$id_user'");
                        $res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
                        $nome_cliente = $res3[0]['nome'];
                        $imagem_cliente = $res3[0]['imagem'];
                        $nome_url = $res3[0]['perfil_url'];
                ?>
                <div class="comentario">
                    <a href="perfil-<?php echo $nome_url ?>">
                        <div class="imgUser"><img src="Imgs/ProfilePics/<?php echo $imagem_cliente ?>"></div>
                        <p class="NomeUser"><?php echo $nome_cliente ?> <span><?php echo $data ?></span> </p>
                    </a>
                    <?php if($nivel_usuario == 'Admin'){ ?>
                        <a class="delet_Comment" href="postagem-<?php echo $postagem_get ?>&acao=deletar&id_coment=<?php echo $id_coment ?>"><i class="fa fa-trash text-danger"></i></a>
                    <?php } ?>

                    <p class="textUser"><?php echo $comment ?></p>
                </div>
                <?php  } ?>
            </div>
        </div>

        <div class="comments_msg">
            <form method="post">
                <div class="form-group">
                    <label>Comentário (Máx 500 Caracteres) </label>
                    <textarea maxlength="1000" class="form-control" id="comentario" name="comentario"></textarea>
                </div>
                <button type="submit" name="btn-comentario" id="btn-comentario" class="btn btn-info">Publicar</button>
            </form>
        </div>

        <?php } ?>
    </div>
</section>

<!-- Recomendação-->
<section id="recomend">
    <div class="container">
        <h3>Gostou? <span>Veja Também:</span></h3>
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

<?php 
    if(isset($_POST['btn-comentario'])){
        $comentario = $_POST['comentario'];
        if ($comentario == ""){exit();}
        $res = $pdo->prepare("INSERT INTO comentarios (id_post, id_user, comentario, data) VALUES (:id_post, :id_user, :comentario, curDate())");
        
        $res->bindValue(":id_post", $id);
        $res->bindValue(":id_user", $id_usuario);
        $res->bindValue(":comentario", $comentario);
        $res->execute();
        
        echo "<script language='javascript'> window.location='postagem-$postagem_get' </script>";  
    }
    if(@$_GET['acao'] == 'deletar'){
        $id_com = $_GET['id_coment'];
        $pdo->query("DELETE from comentarios WHERE id = '$id_com'");
        echo "<script language='javascript'> window.location='postagem-$postagem_get' </script>";
    }

?>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src="js/script.js"></script>
<script src="js/mixitup.min.js"></script>

<script>
    $(document).ready(function () {
        $('#Like').click(function (event) {
            event.preventDefault();
            $.ajax({
                url: "like.php",
                method: "post",
                data: $('form').serialize(),
                dataType: "text",
                success: function (mensagem){
                    if (mensagem.trim() === 'atualizado com Sucesso!!') {
                        var likes = $("#maisUm").text();
                        var liketrans = parseInt(likes);
                        likesfinal = liketrans + 1;  
                        $("#maisUm").remove();
                        $("#resulta").append(likesfinal);
                    }
                },
            })
        });
    });

    function toggleLike(){
        Like = document.querySelector('.LikeBtn');
        Like.classList.toggle('active');
    }
</script>

</body>
</html>