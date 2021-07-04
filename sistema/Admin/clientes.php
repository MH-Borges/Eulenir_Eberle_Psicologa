<?php 
    $pag = "clientes";
    require_once("../../config.php");
    
    @session_start();
    //verificação de autenticação do usuario
    if(@$_SESSION['id_usuario'] == null || @$_SESSION ['nivel_usuario'] != 'Admin'){
        echo "<script language='javascript'>window.location='../index.php'</script>";
    }
?>

<div class="container clientesPage">
    <div class="Bt_clientes">
        <a type="button" href="index.php?pag=<?php echo $pag?>&funcao=novo">Novo Cliente</a>
    </div>
    <div class="BxTable">    
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Imagem</th>
                    <th>Ativo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $query = $pdo->query("SELECT * FROM clientes order by id desc ");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);

                    for ($i=0; $i < count($res); $i++) { 
                    foreach ($res[$i] as $key => $value) {
                    }
                    $nome = $res[$i]['nome'];
                    $email = $res[$i]['email'];
                    $telefone = $res[$i]['telefone'];
                    $imagem = $res[$i]['imagem'];
                    $ativo = $res[$i]['ativo'];

                    $id = $res[$i]['id'];       
                ?>
                <tr>
                    <td><?php echo $nome ?></td>
                    <td><?php echo $email ?></td>
                    <td><?php echo $telefone ?></td>
                    <td><a href="index.php?pag=<?php echo $pag ?>&funcao=editarFT&id=<?php echo $id ?>" ><img src="../../Imgs/ProfilePics/<?php echo $imagem ?>" width="50"></a></td>
                    <td>
                        <?php echo $ativo;
                            if($ativo == 'Sim'){ echo '<i class="fas fa-square ml-2 text-success"></i>';}
                            else{echo '<i class="fas fa-square ml-2 text-danger"></i>';} 
                        ?>
                    </td>
                    <td>
                        <a href="index.php?pag=<?php echo $pag ?>&funcao=editar&id=<?php echo $id ?>" class="text-primary mr-2" title="Editar Dados"><i class="far fa-edit"></i></a>
                        <a href="index.php?pag=<?php echo $pag ?>&funcao=excluir&id=<?php echo $id ?>" class="text-danger mr-2" title="Apagar Registro"><i class="far fa-trash-alt"></i></a>
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
    <div class="modal fade" id="modalDadosClT" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <?php
                    if (@$_GET['funcao'] == 'editar') {
                        $titulo_modal = "Editar registro de cliente";
                        $id2 = $_GET['id'];
    
                        $query = $pdo->query("SELECT * FROM clientes where id = '" . $id2 . "' ");
                        $res = $query->fetchAll(PDO::FETCH_ASSOC);
    
                        $nome_edit = $res[0]['nome'];
                        $email_edit = $res[0]['email'];
                        $senha_edit = $res[0]['senha'];
                        $nivel_edit = $res[0]['nivel'];
                        $imagem_edit = $res[0]['imagem'];
                        $telefone_edit = $res[0]['telefone'];
                        $ativo_edit = $res[0]['ativo'];
    
                    } else {$titulo_modal = "Inserir novo cliente";}
                    ?>
                    <h5 class="modal-title"><?php echo $titulo_modal ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form" method="POST">
                    <div class="modal-body">     
                        <div class="form-group">
                            <label>Nome*</label>
                            <input value="<?php echo @$nome_edit ?>" type="text" class="form-control" id="nome" name="nome" placeholder="Nome Completo">
                        </div>
                        <div class="form-group">
                            <label >Email*</label>
                            <input value="<?php echo @$email_edit ?>" type="email" class="form-control" id="email" name="email" placeholder="Email para contato">
                        </div>
                        <div class="form-group">
                            <label>Telefone</label>
                            <input value="<?php echo @$telefone_edit ?>" type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone de contato">
                        </div>
                        <div class="form-group">
                            <label>Senha</label>
                            <div class="senha">
                                <input type="password" class="form-control" id="senha_client" name="senha_client" value="<?php echo @$senha_edit ?>" placeholder="Senha do Usuario">
                                <button type="button" id="Key_User"><i class="fas fa-eye"></i></button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>É um cliente Ativo</label>
                            <input type="text" class="form-control" id="ativo" name="ativo" value="<?php echo @$ativo_edit ?>" placeholder="É um usuario ativo? (Sim ou Não)">
                        </div>
                        <div class="form-group">
                            <label>Nivel de Usuario</label>
                            <input type="text" class="form-control" id="nivel" name="nivel" value="<?php echo @$nivel_edit ?>" placeholder="Qual o nivel do Usuario?">
                        </div>
                        <div id="mensagem"></div>
                    </div>
                    <div class="modal-footer">
                        <input value="<?php echo @$email_edit ?>" type="hidden" name="email_antigo" id="email_antigo">
                        <input value="<?php echo @$_GET['id'] ?>" type="hidden" name="id2_blind" id="id2_blind">
                        <button type="button" id="btn-fechar" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" name="btn-salvar" id="btn-salvar" class="btn btn-success">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="modalFoto" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <?php
                $id_foto = $_GET['id'];
                $query3 = $pdo->query("SELECT * from clientes where id = '$id_foto' ");
                $res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
                $imagem_User = $res3[0]['imagem'];
                $Nome_User = $res3[0]['nome'];
            ?>
            <h5>Editar foto - <?php echo $Nome_User ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" action="clientes/EditFoto.php" enctype="multipart/form-data">
            <div class="modal-body">
              <?php if(@$imagem_User != ""){ ?>
                <img src="../../Imgs/ProfilePics/<?php echo $imagem_User ?>" id="TargetIMG">
              <?php  } else { ?>
                <img src="../../Imgs/ProfilePics/sem-foto.jpg" id="TargetIMG">
              <?php } ?>
            </div>
            <div class="modal-footer">
              <div class="form-group">
                <label> Escolha uma nova Imagem </label>
                <input type="file" value="<?php echo @$imagem_User ?>" class="form-control-file TargetIMGct" id="imgCliente" name="imgCliente" onChange="carregarFT();">
              </div>
              <input value="<?php echo @$id_foto ?>" type="hidden" name="idFoto" id="idFoto">
              <button type="button" id="fechaFoto" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" name="salvarFoto" id="salvarFoto" class="btn btn-success">Salvar</button>
            </div>
          </form>
          <div id="msg_Ft"></div>
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
                        <input type="hidden" id="id"  name="id" value="<?php echo @$_GET['id'] ?>" required>
                        <button type="button" id="btn-deletar" name="btn-deletar" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    //chamada de modal de novo registro
    if(@$_GET["funcao"] != null && @$_GET["funcao"] == "novo") {
        echo "<script>$('#modalDadosClT').modal('show');</script>";
    }
    if(@$_GET["funcao"] != null && @$_GET["funcao"] == "editar") {
        echo "<script>$('#modalDadosClT').modal('show');</script>";
    }
    if(@$_GET["funcao"] != null && @$_GET["funcao"] == "editarFT") {
        echo "<script>$('#modalFoto').modal('show');</script>";
    }
    if(@$_GET["funcao"] != null && @$_GET["funcao"] == "excluir") {
        echo "<script>$('#modal-deletar').modal('show');</script>";
    }
?>

<script type="text/javascript" src="../js/script_Clientes.js"></script>
<script type="text/javascript" src="../js/jquery_Clientes.js"></script>