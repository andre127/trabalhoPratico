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
        var linha = $(this);
        if (confirm("Deseja mesmo exluir " + $(this).find(":nth-child(2)").html() + "?")) {
            //Exclui a pessoa
            $.post('acoes.php', {tipo: "cliente", acao: 'excluir', id: $(this).children().first().html()}).done(function (data) {
                if (data == "") {
                    linha.remove();
                }
            });
        }
    });

})(jQuery); // end of jQuery name space
