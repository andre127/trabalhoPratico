<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
        <nav class="light-blue lighten-1" role="navigation">         
            <div class=""><a id="logo-container" href="#" class="brand-logo"><img src="img/logoPequeno.png"></a>
                <ul class="right hide-on-med-and-down">
                    <li class="modal-trigger" data-target="modalLogin"><a href="$">Cadastro de Cliente</a></li>
                </ul>
            </div>
        </nav>
        <br><br><br>   
        <div class="container">
            <div class="section">
		<div class="row">
                    <form id="Formulario" action="action.php">
                                      <div class="col s6 offset-s3">
                        <div class="row">
                          <div class="input-field col s12">
                            <input  type="text" class="form validate">
                            <label for="nome">Digite seu Nome</label>
                          </div>          
                        </div>
                                <div class="row">
                          <div class="input-field col s12">
                            <input  type="text" class="form validate">
                            <label for="nome">Digite seu Endereço</label>
                          </div>          
                        </div>
                                <div class="row">
                          <div class="input-field col s12">
                            <input  type="text" class="form validate">
                            <label for="nome">Digite seu RG</label>
                          </div>          
                        </div>
                                <div class="row">
                          <div class="input-field col s12">
                            <input  type="text" class="form validate">
                            <label for="nome">Digite seu CPF</label>
                          </div>          
                        </div>
                                <div class="row">
                          <div class="input-field col s12">
                            <input  type="text" class="form validate">
                            <label for="nome">Digite sua CNH</label>
                          </div>          
                        </div>
                        <div class="row">
                          <button class="btn waves-effect waves-light" type="submit" name="action">Salvar
                            <i class="material-icons right"></i>
                          </button>
                        </div>
                      </div>
                    </form>
		</div>
            </div>
     </div>
        
  </body>
</html>
