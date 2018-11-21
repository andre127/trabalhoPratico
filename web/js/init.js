(function ($) {
    $(function () {
        $('.modal-trigger').leanModal();
        $('.parallax').parallax();
        $('.carousel').carousel();
        $('.slider').slider();
        $('.sidenav').sidenav();
    });

    // end of document ready
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
    $('.tabelaLocacao').click(function () {

//       $('#CPF_Cliente').val($(this).find(":nth-child(2)").html());
//       document.getElementById("btnCadastro").style = 'visibility: hidden';
        //style = 'visibility: hidden';
// document.getElementById("save-button").disabled = true;
//        document.getElementById("edit-button").disabled = false;
        document.getElementById("listar").style = 'visibility: hidden';
        document.getElementById("btnSalvar").style = 'visibility: hidden';
        document.getElementById("insercao").style = 'visibility: visible';
        document.getElementById("btnEditar").style = 'visibility: visible';
        window.location.replace("#insercao");
    });
    $('#btncancelar').click(function () {
        window.location.replace("Locacao.php");
    });

})(jQuery); // end of jQuery name space
