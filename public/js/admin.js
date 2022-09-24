$(document).ready(function() {
    /***************************************************/
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    if( $('#categories').val() == "0" ) {
        $('#structures').prop('disabled', true);
        $('#addUser').prop('disabled', true);
        $('#addUser').css({opacity : 0.5});
    }
    /***************************************************/
    $('#categories').change(function() {
        if( $('#categories').val() != "0") {
            $('#structures').prop('disabled', false);
            insertOptions($('#categories').val());
        }else {
            $('#structures').prop('disabled', true);
            $('#addUser').prop('disabled', true);
            $('#addUser').css({opacity : 0.5});
        }
    });
    /***************************************************/
    $('#structures').change(function() {
        if( $('#structures').val() == "0") {
            $('#addUser').prop('disabled', true);
            $('#addUser').css({opacity : 0.5});
        }else {
            $('#addUser').prop('disabled', false);
            $('#addUser').css({opacity : 1});
        }
    });
    /***************************************************/
    $('body').click(function (e) { 
        if($(e.target).attr('class') == 'page-link') {
            e.preventDefault();
            var link = $(e.target).attr('href');
            // console.log($('#searchInput').data("category"));
            $.get(link, function(data, status){
                $('#boardAndBlocPagination').html(data);
            }).fail( function(jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            });
        }
    }); 
    /*************************************************************/
    $('#searchInput').on('input',function(e){
        if(e.target.value == '') {
            if($('#searchInput').data("element")!=undefined) {
                if($('#searchInput').data("element")=='category') {
                    $.get("/admin/categories", function(data, status){
                        $('#boardAndBlocPagination').html(data);
                    }).fail( function(jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    });
                } else if($('#searchInput').data("element")=='service') {
                    $.get("/admin/prestations", function(data, status){
                        $('#boardAndBlocPagination').html(data);
                    }).fail( function(jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    });
                } else if($('#searchInput').data("element")=='structure') {
                    $.get("/admin/structures", function(data, status){
                        $('#boardAndBlocPagination').html(data);
                    }).fail( function(jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    });
                } else if($('#searchInput').data("element")=='thematic') {
                    $.get("/admin/thematiques", function(data, status){
                        $('#boardAndBlocPagination').html(data);
                    }).fail( function(jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    });
                } else if($('#searchInput').data("element")=='user') {
                    $.get("/admin/utilisateurs", function(data, status){
                        $('#boardAndBlocPagination').html(data);
                    }).fail( function(jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    });
                }
            }
        } else {
            if($('#searchInput').data("element")!=undefined) {
                if($('#searchInput').data("element")=='category') {
                    postRequest('/admin/rechercherparcategories', e.target.value);
                } else if($('#searchInput').data("element")=='service') {
                    postRequest('/admin/rechercherparprestations', e.target.value);
                } else if($('#searchInput').data("element")=='structure') {
                    postRequest('/admin/rechercherparstructures', e.target.value);
                } else if($('#searchInput').data("element")=='thematic') {
                    postRequest('/admin/rechercherparthematiques', e.target.value);
                } else if($('#searchInput').data("element")=='user') {
                    postRequest('/admin/rechercherparutilisateurs', e.target.value);
                }
            }
        }

    });
    /************************************************************/
    function postRequest(link, searchValue) {
        $.post(link, {
            search : searchValue
        },function(data, status){
            $('#boardAndBlocPagination').html(data);
        }).fail( function(jqXHR, textStatus, errorThrown) {
            alert(errorThrown);
        });
    }

    function insertOptions(categorie_id) { 
        $("#structures option[value!='0']").remove();
        $.get("/structuresparcategorie/" + categorie_id, 
                function(data, status){
                    JSON.parse(data).forEach(structure => {
                        $('#structures').append(new Option(structure.description, structure.id));
                    });
                    $('#structures').prop('disabled', false);
            })
    }
});