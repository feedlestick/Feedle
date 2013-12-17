<script type="text/javascript"> 
    var liste = <?php echo json_encode($this->mouvement_liste); ?>;
    
    for(var i=0; i < liste.length; i++)
    {
        $('#table_rows_mouvements').append('<tr class=\''+Mouvement.getClassTrType(liste[i].type)+'\'><td>'+liste[i].date_mvt+'</td><td>'+ Mouvement.getStringType(liste[i].type)+'</td><td>'+liste[i].produit_id+'</td><td>'+liste[i].quantity+'</td><td>'+liste[i].commentaire+'</td></tr>');
    }
    
    $('#data_mouvement').show();
    $('#loader_mouvement').hide();
    
    $("table").tablesorter({debug: true}); //TableSorter
</script>
