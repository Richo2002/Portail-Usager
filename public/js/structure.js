$(document).ready(function() {
    /***************************************************/
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    /***************************************************/
    if( $('#categories').val() == "0" ) {
        $('#structures').prop('disabled', true);
    }
    /***************************************************/
    $('#categories').change(function() {
        if( $('#categories').val() != "0") {
            $('#structures').prop('disabled', false);
            insertOptions($('#categories').val());
        }else {
            $('#structures').prop('disabled', true);
            
        }
    });
    /***************************************************/
    $('#structures').change(function() {
        postRequest('/demandeparstructures', null, $('#structures').val());
    });
    /***************************************************/
        $('body').click(function (e) { 
            if($(e.target).attr('class') == 'page-link') {
                e.preventDefault();
                var link = $(e.target).attr('href');
                if($('#categories').val()==undefined) {
                    $.get(link, function(data, status){
                        $('#boardAndBlocPagination').html(data);
                    }).fail( function(jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    });
                }
                else {
                    postRequest(link, null, $('#structures').val());
                }
            }
        });
    /***************************************************/
        $('#searchInput').on('input',function(e){
            console.log("oki");
            if(e.target.value == '') {
                if($('#bluredBanner > h1').data("element")!="") {
                    $.get("/demandeparthematics/"+$('#bluredBanner > h1').data("element"), function(data, status){
                        $('#boardAndBlocPagination').html(data);
                    }).fail( function(jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    });
                }
                else {
                    postRequest('/demandeparstructures', e.target.value, $('#structures').val());
                }
            } else {
                if($('#bluredBanner > h1').data("element")!="") {
                    postRequest('/rechercherparthematics', e.target.value, $('#bluredBanner > h1').data("element"));
                }
                else {
                    postRequest('/rechercherparstructures', e.target.value, $('#structures').val());
                }
                
            }
    
        });
    /***************************************************/
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
    
    function postRequest(link, searchValue, structureOrThematicValue) {
        $.post(link, {
            structures : structureOrThematicValue,
            search : searchValue
        },function(data, status){
            $('#boardAndBlocPagination').html(data);
        }).fail( function(jqXHR, textStatus, errorThrown) {
            alert(errorThrown);
        });
    }
    /***************************************************/
});