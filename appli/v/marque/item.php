<div class ="row">
    <div class="col-lg-12">
        <h1 class="page-header">Produits - Marque <?php echo $this->marque_name; ?> <small><span id="count_produit" class="label label-danger"></span></small></h1>
        <!-- Bandeau -->
        <ol class="breadcrumb">
            <li><a href="#" onclick="ajax($('#page-content'),{c:'Utilisateur',a:'tableaudebord_content'}, true, true)">Tableau de bord</a></li>
            <li><a href="#" onclick="ajax($('#page-content'),{c:'Marque',a:'liste'}, true, true)">Marques</a></li>
            <li class="active"><?php echo $this->marque_name; ?></li>
        </ol>
        <!-- -->
    </div>
</div>

<!-- Contenue -->
<div id="produit-content">
     <h2> Chargement... </h2>
    <div class="progress progress-striped active">
        <div class="progress-bar progress-bar-info" style="width: 100%"></div>
    </div>
</div>

<script>
    ajax($('#produit-content'),{c:'Produit', a:'liste', t:1, id:'<?php echo $this->marque_id;?>'}, true, true);
</script>