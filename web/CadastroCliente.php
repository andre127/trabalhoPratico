<?php
   include "utils.php";
   
   if(!empty($_GET["id"])){
   $id= $_GET["id"];
   $sql = "SELECT`pessoa`.`id`,`pessoa`.`nome`,`pessoa`.`endereco`,`pessoa`.`rg`,`pessoa`.`cpf`,`pessoa`.`login`,`pessoa`.`senha`,`cliente`.`cnh`,`cliente`.`numeroDependentes` FROM `pessoa` INNER JOIN `cliente` ON `pessoa`.`id`=`cliente`.`idPessoa`WHERE `pessoa`.`id`='$id'";
   $result = $conn->query($sql);
   $row = $result->fetch_assoc();
   $valid=$row['id'];
   } else {
     $valid='novo';
}
?>

<html>
    <head>
        <title>Cadastro de Cliente</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         
        
        <!-- CSS  -->
              <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
              <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
              <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <body>
        <nav class="light-blue lighten-1" role="navigation" style="z-index: 1">         
           
            <div class=""><a id="logo-container" href="#" class="brand-logo"><img src="img/logoPequeno.png"></a>
                <ul class="right hide-on-med-and-down">
                    <a>Cadastro de Cliente</a>
                </ul>
            </div>
        </nav>
        <br><br><br>   
        <div class="container">
            <div class="section">
		<div class="row">
                    <form id="Formulario" method="POST" action="acoes.php"   >
                      <div class="col s6 offset-s3">                       
                        <div class="row">
                          <div class="input-field col s12">  
                              <i class="material-icons prefix">account_circle </i>
                              <input id="nomeCliente" name="nomeCliente" type="text" class="form validate" required="required" value="<?php if(!empty($row['nome']))echo $row['nome'] ?>">
                            <label for="nome">Digite seu Nome</label>
                          </div>          
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                             <i class="material-icons prefix">location_on</i>
                            <input id="enderecoCliente" type="text" name="enderecoCliente" class="form validate" required="required" value="<?php if(!empty($row['endereco']))echo $row['endereco'] ?>">
                            <label for="nome">Digite seu Endereço</label>
                          </div>          
                        </div>
                          <div class="row">
                                   <div class="input-field col s6">
                                       <i class="material-icons prefix">portrait</i> 
                                       <input  type="text" name="rgCliente" class="form validate" required="required" value="<?php if(!empty($row['rg']))echo $row['rg'] ?>">
                                       <label for="nome">Digite seu RG</label>
                                   </div>
                                   <div class="input-field col s6">
                                       <i class="material-icons prefix">subtitles</i> 
                                       <input type="text" name="cpfCliente" class="form validate" required="required" value="<?php if(!empty($row['cpf']))echo $row['cpf'] ?>" >
                                       <label for="nome">Digite seu CPF</label>
                                   </div>
                          </div> 
                          <div class="row">
                                   <div class="input-field col s6">
                                       <i class="material-icons prefix">call_to_action</i> 
                                       <input  type="text" name="cnhCliente" class="form validate" required="required" value="<?php if(!empty($row['cnh']))echo $row['cnh'] ?>">
                                       <label for="nome">Digite sua CNH</label>
                                   </div>
                                   <div class="input-field col s6">
                                       <i class="material-icons prefix">people</i> 
                                       <input type="number" name="dependenteCliente" class="form validate" required="required" value="<?php if(!empty($row['numeroDependentes']))echo $row['numeroDependentes'] ?>">
                                       <label for="nome">Numero de Dependentes</label>
                                   </div>
                            </div> 
                            <div class="row">
                                   <div class="input-field col s6">
                                       <i class="material-icons prefix">person</i> 
                                      <input  type="text" name="loginCliente" class="form validate" required="required" value="<?php if(!empty($row['login']))echo $row['login'] ?>">
                                      <label for="nome">Nome de usuario</label>
                                   </div>
                                   <div class="input-field col s6">
                                    <i class="material-icons prefix">lock_outline</i>   
                                    <input type="text" name="senhaCliente" class="form validate" required="required" value="<?php if(!empty($row['senha']))echo $row['senha'] ?>">
                                    <label for="nome">Senha</label>      
                                   </div>
                          </div>    
                        <div class="row">
                          <button  class="btn waves-effect waves-light" type="submit">Salvar
                            <i class="material-icons right"></i>                        
                          </button>
                            <a class="waves-effect waves-light btn" href="GerenciamentoCliente.php">Cancelar</a>
                        </div>
                      </div>
                        <input type="hidden" name="acao" value="salvar">
                        <input type="hidden" name="tipo" value="cliente">
                        <input type="hidden" name="id" value=<?php echo $valid?>>
                    </form>
                    
		</div>
            </div>
     </div>
       
     <!--  Scripts-->
            <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
            <!--<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>-->
            <script src="js/materialize.js"></script>
            <script src="js/init.js"> </script> 
          
  </body>
</html>
