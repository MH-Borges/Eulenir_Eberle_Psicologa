<?php 
  $pag = "home";
  require_once("../../config.php");
  
  @session_start();
  //verificação de autenticação do usuario
  if(@$_SESSION['id_usuario'] == null || @$_SESSION ['nivel_usuario'] != 'Admin'){
      echo "<script language='javascript'>window.location='../index.php'</script>";
  }

  $query = $pdo->query("SELECT SUM(visita) as total FROM blog_post");
  $res = $query->fetchAll(PDO::FETCH_ASSOC);
  $soma = $res[0]['total'];

  $query2 = $pdo->query("SELECT COUNT(*) as quantidade FROM blog_post WHERE data BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE();");
  $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
  $postMes = $res2[0]['quantidade'];

  $query3 = $pdo->query("SELECT COUNT(*) as Totalcliente FROM clientes");
  $res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
  $clientesTotal = $res3[0]['Totalcliente'];

  $query4 = $pdo->query("SELECT SUM(likes) as curtidas FROM blog_post WHERE data BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE();");
  $res4 = $query4->fetchAll(PDO::FETCH_ASSOC);
  $TotalLikes = $res4[0]['curtidas'];

  $query5 = $pdo->query("SELECT COUNT(*) as Totalcoment FROM comentarios WHERE data BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE();");
  $res5 = $query5->fetchAll(PDO::FETCH_ASSOC);
  $comentsTotal = $res5[0]['Totalcoment'];
?>

<div class="container IndexAdm">
  <h3>Informações do ultimo mês</h3>
    <div>
      <div class="infosBx">
        <h3><?php echo $postMes ?></h3>
        <p>Post no ultimo mês</p>
        <i class="fas fa-align-left"></i>
      </div>
      <div class="infosBx pink">
        <h3><?php echo $TotalLikes ?></h3>
        <p>Curtidas</p>
        <i class="fas fa-heart"></i>
      </div>
      <div class="infosBx">
        <h3><?php echo $soma ?></h3>
        <p>Visualizações</p>
        <i class="fas fa-eye"></i>
      </div>
      <div class="infosBx pink">
        <h3><?php echo $clientesTotal ?></h3>
        <p>Clientes Cadastrados</p>
        <i class="fas fa-user-check"></i>
      </div>
    </div>

 
</div>

<div class="container comentsIdx">
    <h3>Todos comentários</h3>
    <h4>Total: <?php echo $comentsTotal ?></h4>
    <?php
      $query2 = $pdo->query("SELECT * from comentarios order by id desc");
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

    ?>
    <div class="comentario">
      <div class="imgUser"><img src="../../Imgs/ProfilePics/<?php echo $imagem_cliente ?>"></div>
      <p class="NomeUser"><?php echo $nome_cliente ?> <span><?php echo $data ?></span> </p>
      <p class="textUser"><?php echo $comment ?></p>
      <div class="postInfo">
        <div class="imgPost"><img src="../../Imgs/blog/<?php echo $imagem_post ?>"></div>
        <h4><?php echo $titulo_post ?></h4>
      </div>
        <a href="index.php?&funcao=editar&id=<?php echo $id_coment ?>" class="edit_Comment" title='Editar Comentario'><i class="fas fa-pen"></i></a>
        <a href="index.php?&funcao=excluir&id=<?php echo $id_coment ?>" class="delet_Comment" title='Excluir Comentario'><i class="fa fa-trash text-danger"></i></a>
      </form>
    </div>
    <?php } ?>

    <div class="ArrowComment">
      <a href="#" onclick="ArrowComment();"><i class="fas fa-chevron-down"></i></a>
    </div>

    <div class="modal fade" id="deletComent" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <p>Deseja realmente Excluir este Comentário?</p>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" id="FechaComment">Cancelar</button>
              <form method="post">
                <input value="<?php echo @$_GET['id'] ?>" type="hidden" name="id_comment" id="id_comment">
                <button type="button" id="Delete_Comment_home" name="Delete_Comment_home" class="btn btn-danger">Excluir</button>
              </form>
              <div id="exclui_coment_home"></div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="EditComent" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <?php
                  $id_ComentFinal = $_GET['id'];
                  $query3 = $pdo->query("SELECT * from comentarios where id = '$id_ComentFinal' ");
                  $res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
                  $Comment_Edit = $res3[0]['comentario'];
                ?>
                  <h5 class="modal-title">Edição de Comentários</h5>
                </div>
                <form id="form" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Mensagem</label>
                            <textarea value="<?php echo $Comment_Edit ?>" type="text" class="form-control " id="mensagem" name="mensagem"><?= $Comment_Edit ?></textarea>
                        </div>
                        <div id="mensagem_edit"></div>
                    </div>

                    <div class="modal-footer">
                        <input value="<?php echo @$_GET['id'] ?>" type="hidden" name="id_comment_edit" id="id_comment_edit">
                        <button type="button" id="Fechar_edit" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" name="Edit_comment" id="Edit_comment" class="btn btn-success">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
      if(@$_GET["funcao"] != null && @$_GET["funcao"] == "editar") {
          echo "<script>$('#EditComent').modal('show');</script>";
      }
      if(@$_GET["funcao"] != null && @$_GET["funcao"] == "excluir") {
          echo "<script>$('#deletComent').modal('show');</script>";
      }
    ?>
</div>

<div class="container Posts">
    <h3>Ultimas Publicações</h3>
    <div class="Cards_Blog_Page">
        <?php 
            $query = $pdo->query("SELECT * FROM blog_post order by id desc LIMIT 3");
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
        <a class="mix <?php echo $nome_tag ?>" href="../../postagem-<?php echo $nome_url ?>">
            <div class="card_blog">
                <div id="img"><img src="../../Imgs/blog/<?php echo $imagem ?>" alt=""></div>
                
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
</div>

<footer>
    <div class="rodapeBox col-lg-10">
        <h5>
            ©2021. Eulenir Eberle Psicóloga<br>
            CRP 08/24116. Todos os direitos reservados.
        </h5>
        <p>Produzido por <a target="_blank" href="https://mhborges.com.br"><img src="../../Imgs/MH_logo.svg" onload="SVGInject(this)"></a></p>
    </div>
</footer>