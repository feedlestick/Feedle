<script type="text/javascript">
    // ======= infinite scroll ==========
    var liste = <?php echo json_encode($this->liste); ?>;
    var curr_page = <?php echo $this->page; ?>;
    
    var item_per_page = 50; //Nombre d'élement par page
    var start_id = (curr_page-1) * item_per_page;
    var last_id = (curr_page*item_per_page > liste.length) ? liste.length : curr_page*item_per_page;


    for(var i=start_id; i < last_id; i++)
    {
        $('#table_rows').append('<tr class=\''+Mouvement.getClassTrType(liste[i].type)+'\'><td>'+liste[i].date_mvt+'</td><td>'+ Mouvement.getStringType(liste[i].type)+'</td><td>'+liste[i].produit_id+'</td><td>'+liste[i].quantity+'</td><td>'+liste[i].commentaire+'</td></tr>');
    }
    
    $('#loader-scroll').hide();
    $('#data').show();
    $('#loader').hide();
</script>

