<?php 
    $pag = "posts";
    require_once("../../config.php");

    @session_start();
    if(@$_SESSION['id_usuario'] == null || @$_SESSION ['nivel_usuario'] != 'Admin'){
        echo "<script language='javascript'>window.location='../index.php'</script>";
    }

    $res3 = $pdo->query("SELECT * FROM clientes where id = '$_SESSION[id_usuario]'"); 
    $dados3  = $res3->fetchAll(PDO::FETCH_ASSOC);
    $nomeUserEdit = @$dados3[0]['nome'];

    $res = $pdo->query("SELECT * FROM tags");
    $dados  = $res->fetchAll(PDO::FETCH_ASSOC);
    if(@count($dados) === 0){ $res = $pdo->query("INSERT into tags (nome) values ('Sem_Tag')"); }
?>

<div class="container PostsPage">
    <div class="Bt_Post">
        <a type="button" href="index.php?pag=<?php echo $pag?>&funcao=novo">Fazer novo Post</a>
        <a type="button" id="TagsBt" href="index.php?pag=<?php echo $pag?>&funcao=modal_tags">Registro e Edição de Tags</a>
    </div>

    <div class="BxTable">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Visualizações</th>
                    <th>Titulo</th>
                    <th>Tag</th>
                    <th>Autor</th>
                    <th>Curtidas</th>
                    <th>Imagem</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = $pdo->query("SELECT * FROM blog_post order by id desc ");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);

                    for ($i=0; $i < count($res); $i++) {
                    foreach ($res[$i] as $key => $value) {
                    }

                    $titulo = $res[$i]['titulo'];
                    $tag_id = $res[$i]['tag_id'];

                    $query2 = $pdo->query("SELECT * from tags where id = '$tag_id' ");
                    $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                    $nome_tag = $res2[0]['nome'];

                    $autor = $res[$i]['autor'];
                    $imagem = $res[$i]['imagem'];
                    $id = $res[$i]['id'];
                    $like = $res[$i]['likes'];
                    $visita = $res[$i]['visita'];
                    $nome_url = $res[$i]['nome_url'];
                    $data = $res[$i]['data'];
                    $data = implode(' - ', array_reverse(explode('-', $data)));
                    $target = $res[$i]['targ'];
                ?>
                <tr>
                    <td><?php echo $data ?></td>
                    <td><?php echo $visita ?></td>
                    <td><?php echo $titulo ?></td>
                    <td><?php echo $nome_tag ?></td>
                    <td><?php echo $autor ?></td>
                    <td><?php echo $like ?></td>
                    
                    <td><img src="../../Imgs/blog/<?php echo $imagem ?>" width="100"></td>
                    <td>
                        <a href="index.php?pag=<?php echo $pag ?>&funcao=editar&id=<?php echo $id ?>" class='text-primary mr-1' title='Editar Dados'><i class='far fa-edit'></i></a>
                        <a href="index.php?pag=<?php echo $pag ?>&funcao=excluir&id=<?php echo $id ?>" class='text-danger mr-1' title='Excluir Registro'><i class='far fa-trash-alt'></i></a>
                        <?php 
                            if($target == 'sim'){
                                echo "  
                                    <a href='index.php?pag=$pag&funcao=desativar&id=$id' class='mr-1' title='Desativar Target'>
                                        <i class='fas fa-thumbtack text-danger'></i> 
                                    </a>";
                            }
                            else{
                                echo "
                                    <a href='index.php?pag=$pag&funcao=ativar&id=$id' class='mr-1' title='Ativar Target'>
                                        <i class='fas fa-thumbtack text-success'></i> 
                                    </a>";
                            } 
                        ?>
                        <a href="../../postagem-<?php echo $nome_url ?>" class='text-info mr-1' title='Visulizar Postagem'><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
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

<div class="modalBX">
    <div class="modal fade" id="modalDados" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <?php
                    if (@$_GET['funcao'] == 'editar') {
                        $titulo_modal = "Editar Post";
                        $id2 = $_GET['id'];
                        $query = $pdo->query("SELECT * FROM blog_post where id = '" . $id2 . "' ");
                        $res = $query->fetchAll(PDO::FETCH_ASSOC);
                        $imagem_edit = $res[0]['imagem'];
                        $tempo_edit = $res[0]['tempo'];
                        $autor_edit = $res[0]['autor'];
                        $tag_edit = $res[0]['tag_id'];
                        $titulo_edit = $res[0]['titulo'];
                        $Text_simp_edit = $res[0]['descri_simp'];
                        $Text_comp_edit = $res[0]['texto_comp'];
                        $key_words = $res[0]['key_words'];
                        $fontes = $res[0]['fontes'];
    
                    } else {$titulo_modal = "Criação de Post"; $Text_comp_edit = "Escreva Seu texto aqui";}
                    ?>
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $titulo_modal ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group aling_post">
                                    <label>Imagem Principal do Post</label>
                                    <input type="file" value="<?php echo @$imagem_edit ?>" class="form-control-file" id="imagem" name="imagem" onChange="carregarImg();">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group d-flex justify-content-center align-items-center">
                                    <?php if(@$imagem_edit != ""){ ?>
                                    <img src="../../Imgs/blog/<?php echo $imagem_edit ?>" width="200" id="target">
                                    <?php  }else{ ?>
                                        <img src="../../Imgs/blog/img_padrao.jpg" width="200" id="target">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label>tempo de leitura*</label>
                                    <input value="<?php echo @$tempo_edit ?>" type="text" class="form-control" id="tempo" name="tempo" placeholder="** Minutos">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Autor</label>
                                    <input value="<?php echo @$autor_edit ?>" type="text" class="form-control" id="autor" name="autor" placeholder="<?php echo $nomeUserEdit ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>tags</label>
                                    <select name="tag_id" id="tag_id" class="form-control form-control-sm">
                                        <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                $query = $pdo->query("SELECT * from tags where id = '$tag_edit'");
                                                $res = $query->fetchAll(PDO::FETCH_ASSOC);
                                                $nomeTag = $res[0]['nome'];
                                                echo "<option value='".$tag_edit."'>" .$nomeTag. "</option>";
                                            }
                                            $query2 = $pdo->query("SELECT * from tags order by nome asc");
                                            $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                                            for ($i=0; $i < count($res2); $i++) {
                                                foreach ($res2[$i] as $key => $value){}
                                                if(@$nomeTag != $res2[$i]['nome']){
                                                    echo "<option value='".$res2[$i]['id']."'>" .$res2[$i]['nome']. "</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Titulo da Postagem*</label>
                            <input value="<?php echo @$titulo_edit ?>" type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo">
                        </div>
                        <div class="form-group">
                            <label>Texto de chamada*</label>
                            <input value="<?php echo @$Text_simp_edit ?>" type="text" class="form-control" id="descri_simp" name="descri_simp" placeholder="Texto de chamada">
                        </div>
                        <div class="form-group">
                            <label>texto da postagem</label>
                            <textarea id="editor" name="texto_comp"></textarea>
                            <?php if (@$_GET['funcao'] == 'editar') { ?>
                                <div class="Bx_txt">
                                    <h4>texto anterior</h4>
                                    <article>
                                        <?php echo $Text_comp_edit ?>
                                    </article>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label>Palavras chaves*</label>
                            <input value="<?php echo @$key_words ?>" type="text" class="form-control" id="key_words" name="key_words" placeholder="Palavras chaves da postagem">
                        </div>
                        <div class="form-group">
                            <label>Fontes</label>
                            <input value="<?php echo @$fontes ?>" type="text" class="form-control" id="fontes" name="fontes" placeholder="Fontes para o post">
                        </div>
                        <div id="mensagem"></div>
                    </div>
                    <div class="modal-footer">
                        <input value="<?php echo @$titulo_edit ?>" type="hidden" name="antigo" id="antigo">
                        <input value="<?php echo @$_GET['id'] ?>" type="hidden" name="id_post_prim" id="id_post_prim">
                        <button type="button" id="btn-fechar" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" name="btn-salvar" id="btn-salvar" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-deletar" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Excluir Registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"><p>Deseja realmente Excluir este Registro?</p></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar-excluir">Cancelar</button>
                    <form method="post">
                        <input type="hidden" id="id_post_delet" name="id_post_delet" value="<?php echo @$_GET['id'] ?>" required>
                        <button type="button" id="btn-deletar" name="btn-deletar" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal ATiva/Desativa -->
    <div class="modal fade" id="modal-desativa" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Desativar Target</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"><p>Deseja realmente retirar este Post como Target?</p></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar-desativa">Cancelar</button>
                    <form method="post">
                        <input type="hidden" id="id_post_desativa" name="id_post_desativa" value="<?php echo @$_GET['id'] ?>" required>
                        <button type="button" id="btn-desativa" name="btn-desativa" class="btn btn-danger">Retirar</button>
                    </form>
                </div>
            </div>
        </div>
    </div> 
    <div class="modal fade" id="modal-ativa" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ativar Target Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Deseja mesmo colocar este post na pagina inicial?</p>
                    <div class="text-danger" id="msg_ativa"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar-ativa">Cancelar</button>
                    <form method="post">
                        <input type="hidden" id="id_post_ativa" name="id_post_ativa" value="<?php echo @$_GET['id'] ?>" required>
                        <button type="button" id="btn-ativa" name="btn-ativa" class="btn btn-success">Ativar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal Tags-->
    <div class="modal fade" id="modal_tags" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registro e edição de Tags</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="mt-3 mb-3 mr-5">
                                <a type="button" class="btn-primary btn-sm ml-3 d-none d-md-block" href="index.php?pag=<?php echo $pag?>&funcao=nova_tag">Nova Tag</a>
                                <a type="button" class="btn-primary btn-sm ml-3 d-block d-sm-none" href="index.php?pag=<?php echo $pag?>&funcao=nova_tag">+</a>
                            </div>
                        </div>
                    </div>  
                    <div class="container">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nome da Tag</th>
                                                <th>Quantidades de Posts</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $query = $pdo->query("SELECT * FROM tags order by id desc ");
                                                $res = $query->fetchAll(PDO::FETCH_ASSOC);
                                                for ($i=0; $i < count($res); $i++) {
                                                    foreach ($res[$i] as $key => $value) {
                                                    }
                                                    $nome = $res[$i]['nome'];
                                                    $id = $res[$i]['id'];
    
                                                    //trazer o total de itens
                                                    $query2 = $pdo->query("SELECT * FROM blog_post where tag_id = '$id' ");
                                                    $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                                                    $quant_tag = @count($res2);
                                            ?>
                                            <tr>
                                                <td><?php echo $nome ?></td>
                                                <td><?php echo $quant_tag ?></td>
                                                <td>
                                                    <a href="index.php?pag=<?php echo $pag ?>&funcao=editar_tag&id=<?php echo $id ?>" class="text-primary mr-2" title="Editar Dados"><i class="far fa-edit"></i></a>
                                                    <a href="index.php?pag=<?php echo $pag ?>&funcao=excluir_tag&id=<?php echo $id ?>" class="text-danger mr-2" title="Apagar Registro"><i class="far fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_tag_Dados" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <?php
                    if (@$_GET['funcao'] == 'editar_tag') {
                        $titulo_modal = "Editar Tag";
                        $id2 = $_GET['id'];
    
                        $query = $pdo->query("SELECT * FROM tags where id = '" . $id2 . "' ");
                        $res = $query->fetchAll(PDO::FETCH_ASSOC);
    
                        $nome_Tags = $res[0]['nome'];
    
                    } else {$titulo_modal = "Inserir nova Tag";}
                    ?>
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $titulo_modal ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_tags" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nome da tag*</label>
                            <input value="<?php echo @$nome_Tags ?>" type="text" class="form-control" id="nome_tag" name="nome_tag" placeholder="Qual o nome da Tag">
                        </div>
                        <div id="mensagem_tags"></div>
                    </div>
                    <div class="modal-footer">
                        <input value="<?php echo @$_GET['id'] ?>" type="hidden" name="id2_blind" id="id2_blind">
                        <button type="button" id="btn_fechar_tags" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" name="btn_salvar_tags" id="btn_salvar_tags" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_tag_deletar" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Excluir Registro de Tag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente Excluir este Registro?</p>
                    <strong><div class="text-danger" id="mensagem_excluir"></div></strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn_cancelar_excluir_tags">Cancelar</button>
                    <form method="post">
                        <input type="hidden" id="id"  name="id" value="<?php echo @$_GET['id'] ?>" required>
                        <button type="button" id="btn_deletar_tags" name="btn-deletar_tags" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    //chamada de modal de novo registro
    if(@$_GET["funcao"] != null && @$_GET["funcao"] == "novo") {
        echo "<script>$('#modalDados').modal('show');</script>";
    }
    if(@$_GET["funcao"] != null && @$_GET["funcao"] == "editar") {
        echo "<script>$('#modalDados').modal('show');</script>";
    }
    if(@$_GET["funcao"] != null && @$_GET["funcao"] == "excluir") {
        echo "<script>$('#modal-deletar').modal('show');</script>";
    }

    if(@$_GET["funcao"] != null && @$_GET["funcao"] == "desativar") {
        echo "<script>$('#modal-desativa').modal('show');</script>";
    }
    if(@$_GET["funcao"] != null && @$_GET["funcao"] == "ativar") {
        echo "<script>$('#modal-ativa').modal('show');</script>";
    }

    if(@$_GET["funcao"] != null && @$_GET["funcao"] == "modal_tags") {
        echo "<script>$('#modal_tags').modal('show');</script>";
    }
    if(@$_GET["funcao"] != null && @$_GET["funcao"] == "nova_tag") {
        echo "<script>$('#modal_tag_Dados').modal('show');</script>";
    }
    if(@$_GET["funcao"] != null && @$_GET["funcao"] == "editar_tag") {
        echo "<script>$('#modal_tag_Dados').modal('show');</script>";
    }
    if(@$_GET["funcao"] != null && @$_GET["funcao"] == "excluir_tag") {
        echo "<script>$('#modal_tag_deletar').modal('show');</script>";
    }
?>

<script type="text/javascript" src="../js/script_Post.js"></script>
<script type="text/javascript" src="../js/jquery_Post.js"></script>