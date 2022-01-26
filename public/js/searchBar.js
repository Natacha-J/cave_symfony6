//permet de rendre la recherche insensible à la casse
const searchWithoutCase = () => {
    $.expr[":"].contains = $.expr.createPseudo(function (text) {
        return function (elem) {
            return $(elem).text().toLowerCase().indexOf(text.toLowerCase()) >= 0;
        };
    });
}

//permet de ré-afficher toutes les items et supprime le bouton
const searchClear = () => {
    $('table tbody tr').show(); 
    $('#clear_btn').hide();

}

//lancement de la recherche : affichage seulement des vins contenant la valeur de l'input de recherche
const searchItems = () => {
    $('#search_btn').on('click', () => {
        let val = $('#search_input').val();
        console.log(val);
        searchWithoutCase();
        $('table tbody tr').hide();
        $('table tbody tr:contains(' + val + ')').show();

        //affichage du bouton "Afficher tout"
        $('#clear_btn').show();
    });
}
