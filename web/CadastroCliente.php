<?php
   include "utils.php";
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
                              <input id="nomeCliente" name="nomeCliente" type="text" class="form validate" required="required" value="">
                            <label for="nome">Digite seu Nome</label>
                          </div>          
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                             <i class="material-icons prefix">location_on</i>
                            <input id="endereco" type="text" name="endereco" class="form validate" required="required">
                            <label for="nome">Digite seu Endereço</label>
                          </div>          
                        </div>
                          <div class="row">
                                   <div class="input-field col s6">
                                       <i class="material-icons prefix">portrait</i> 
                                       <input  type="text" name="rg" class="form validate" required="required">
                                       <label for="nome">Digite seu RG</label>
                                   </div>
                                   <div class="input-field col s6">
                                       <i class="material-icons prefix">subtitles</i> 
                                       <input type="text" name="cpf" class="form validate" required="required" >
                                       <label for="nome">Digite seu CPF</label>
                                   </div>
                          </div> 
                          <div class="row">
                                   <div class="input-field col s6">
                                       <i class="material-icons prefix">call_to_action</i> 
                                       <input  type="text" name="cnh" class="form validate" required="required">
                                       <label for="nome">Digite sua CNH</label>
                                   </div>
                                   <div class="input-field col s6">
                                       <i class="material-icons prefix">people</i> 
                                       <input type="number" name="dependente" class="form validate" required="required">
                                       <label for="nome">Numero de Dependentes</label>
                                   </div>
                            </div> 
                            <div class="row">
                                   <div class="input-field col s6">
                                       <i class="material-icons prefix">person</i> 
                                      <input  type="text" name="login" class="form validate" required="required">
                                      <label for="nome">Nome de usuario</label>
                                   </div>
                                   <div class="input-field col s6">
                                    <i class="material-icons prefix">lock_outline</i>   
                                    <input type="text" name="senha" class="form validate" required="required">
                                    <label for="nome">Senha</label>      
                                   </div>
                          </div>    
                        <div class="row">
                          <button  class="btn waves-effect waves-light" type="submit">Salvar
                            <i class="material-icons right"></i>                        
                          </button>
                        </div>
                      </div>
                        <input type="hidden" name="acao" value="salvar">
                        <input type="hidden" name="tipo" value="cliente">
                    </form>
		</div>
            </div>
     </div>
     <!--  Scripts-->
            <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
            <!--<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>-->
            <script src="js/materialize.js"></script>
            <script src="js/init.js">  
              $(function(){
               $('#endereco').val('Nome do Computador')
                });
            </script> 
          
  </body>
</html>
