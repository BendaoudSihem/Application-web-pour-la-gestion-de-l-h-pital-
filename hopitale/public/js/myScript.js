/**
 * Created by Yacine on 24/02/2017.
 */
/**
 * Fermer la fenetre superposée du login en cliquant sur le X
 */
$('.wrapper-container .login-popup .fa-stack').on('click', function () {
    $(".wrapper-container").hide();
});
/**
 * Afficher la fenetre superposée du login en cliqunat sur se connecter
 */
$('.se-connecter').on('click', function () {
    $(".wrapper-container").show();
});
/**
 * Afficher la page Se connecter
 */
$('.wrapper-container .login-popup .sign-up a').on('click', function () {

    $('.sign-up').slideUp(400, function () {
        $('.sign-in').slideDown();
    });
})
/**
 * Afficher la page Creer
 */
$('.wrapper-container .login-popup .sign-in a').on('click', function () {


    $('.sign-in').slideUp(400, function () {
        $('.sign-up').slideDown();
    });
})
/**
 * Afficher le mot de passe lorsque l'utilisateur passe le pointeur sur l'oeil
 */
$('.show-pass').hover(function () {
    $(this).parent().children().first().attr('type', 'text');
    },function () {
    $(this).parent().children().first().attr('type', 'password');
})
/**
 * Afficher le bouton qui redirige l'utilisateur vers la barre de recherche
 * et afficher l'ombre du navbar
 */
$(window).scroll(function () {
    var search = $("#goToSearch");
    $(this).scrollTop() >= 60 ? search.show() : search.hide();
    $(this).scrollTop() >= 40 ? $(".navbar").css('box-shadow', '2px 1px 10px #999') : $(".navbar").css('box-shadow', 'none');
    $(this).scrollTop() >= 40 ? $(".navbar .container .row").fadeOut() : $(".navbar .container .row").fadeIn();
})
/**
 * Rediriger l' utilisateur vers la barre de recherche en cliquant sur le bouton en bas a droite
 */
$("#goToSearch").on('click', function () {

    $("html,body").animate({scrollTop : 0}, 600)
    $("#searchBar").focus();
})
/**
 *
 */
$(".article-favori").on('click', function () {
    if (confirm("Etes vous sur de vouloir supprimer cet article de votre liste des favoris?"))
    {
        $(this).css('color', '#FFF');
        //$(this).parent().parent().fadeOut(600);
    }
})

$(".retirer-produit").on('click', function () {
    if (confirm("Etes vous sur de vouloir supprimer cet article de votre panier?"))
        $(this).parent().parent().fadeOut();
})

$(".detail-produit .cara-produit .add-to-favorite").on('click', function () {
    if ($(this).find(".fa").hasClass("added-to-favorite"))
        $(this).find(".fa").removeClass("added-to-favorite");
    else
        $(this).find(".fa").addClass("added-to-favorite");
})