jQuery(document).ready(function(){
  jQuery( '[name="id_secteur"]' ) //si tu utilise change on il faut le faire sur le select et/ou le input text
      .change(function() {
        var str = "";
        var id_secteur = "";
        var envoi = "";
        var recherche = "";
        
        jQuery( "select option:selected" ).each(function() {
          str += jQuery( this ).text();
          id_secteur += jQuery(this).attr('value');
          recherche = jQuery(this).parent().siblings('input[name="recherche"]').val();
          //alert(jQuery(this).parent().siblings('input[name="recherche"]').text());
          //alert(jQuery(this).parent().siblings('input[name="recherche"]').val());
          //console.log(jQuery(this));
        });

        if(id_secteur){
          jQuery.post(
              ajaxurl,
              {
                'action': 'mon_action',
                'id_secteur': id_secteur,
                'recherche' : recherche
               
              },
              function(response){
                console.log(response);
                jQuery('.contenu_recherche').empty();
                jQuery('.contenu_recherche').append(response);
              }
              
          );
                //alert(recherche);
                //alert(id_secteur);
            }
          
      })
      .trigger( "change" );
      

});