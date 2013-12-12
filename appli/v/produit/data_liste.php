<script type="text/javascript">
    var liste = <?php echo json_encode($this->liste); ?>;
    var curr_page = <?php echo $this->page; ?>;
    
    var item_per_page = 50; //Nombre d'élement par page
    var start_id = (curr_page-1) * item_per_page;
    var last_id = (curr_page*item_per_page > liste.length) ? liste.length : curr_page*item_per_page;

    for(var i=start_id; i < last_id; i++)
    {
        $('#table_rows').append('<tr><td>'+liste[i].id+'</td><td>'+liste[i].name+'</td><td>'+liste[i].price.replace(',','.')+'</td><td>'+liste[i].quantity+'</td><td class="text-center"><button class="btn btn-info" type="button">Commander '+liste[i].commandquantity+'</button></tr>');
    }
    
    $('#loader-scroll').hide();
    $('#data').show();
    $('#loader').hide();
</script>

