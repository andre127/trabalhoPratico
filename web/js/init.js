(function ($) {
    $(function () {
        $('.modal-trigger').leanModal();
        $('.parallax').parallax();
        $('.carousel').carousel();
        $('.slider').slider();
        $('.sidenav').sidenav();
    });

    $('#teste').click(function (){
        $('#nomeCliente').val('teste');
    });
    
    $(function(){
         $('.linhas').click(function (){
          var linha = $(this);
          if(confirm("Deseja mesmo exluir "+$(this).find(":nth-child(2)").html()+"?")){
            //Exclui a pessoa
              $.post('GerenciamentoCliente.php',{tipo:"funcionario",acao:'excluir',id:$(this).children().first().html()}).done(function (data) {
                  if(data==""){
                    linha.remove();
                  }
              });
          }
      });
     
  });

    $('.linhas').click(function () {
        // var linha = $(this);
        // if (confirm("Deseja mesmo exluir " + $(this).find(":nth-child(1)").html() + "?")) {
        window.open("http://localhost/trabalhoPratico/web/CadastroCliente.php");
        $('nomeCliente').val('teste');

        // $.post('acoes.php', {tipo: "cliente", acao: 'editar', id: $(this).children().first().html()})//.done(function (data) {


        // 
// if (data == "") {
        // linha.remove();
        //}
        // });
        //   }
    });

    $('.linhasVei').click(function () {
        var linha = $(this);
        if (confirm("Deseja Editar o Veículo " + $(this).find(":nth-child(3)").html() + "?")) {
            //Exclui a pessoa
            $.post('UploadVeiculo.php', {tipo: "carro", acao: 'excluir', id: $(this).children().first().html()}).done(function (data) {
                if (data == "") {
                    linha.remove();
                }
            });
        }
    });

    $(function () {
        $('').val(' ')

    });
    //função para informar maneira de editarlocação
    $('#asd').click(function (){
        alert('Para editar clique no icone de edição da locacao que deseja Finalizar locacao/Editar');
 
    });
    
    //testes feitos para locacao
//   $('.edicao').click(function () {
//        document.getElementById("confirmar").value = 'editarLocacao';
//////       $('#CPF_Cliente').val($(this).find(":nth-child(2)").html());
//////       document.getElementById("btnCadastro").style = 'visibility: hidden';
////        //style = 'visibility: hidden';
////// document.getElementById("save-button").disabled = true;
//////        document.getElementById("edit-button").disabled = false;
////        document.getElementById("listar").style = 'visibility: hidden';
////        document.getElementById("btnSalvar").style = 'visibility: hidden';
////        document.getElementById("insercao").style = 'visibility: visible';
////        document.getElementById("btnEditar").style = 'visibility: visible';
////        window.location.replace("#insercao");
////    });
////    $('#btncancelar').click(function () {
////        window.location.replace("Locacao.php");
//  });

    $('#btnEditarCliente').click(function(){
       alert ("Informações alteradas com sucesso, por favor faça o login novamente"); 
    });

})(jQuery); // end of jQuery name space
