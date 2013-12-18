<div class ="row">
    <div class="col-lg-12">
        <h1 class="page-header">Catégories <small><span class="label label-danger"><?php echo $this->type_count; ?></span></small></h1>
       <!-- Bandeau -->
        <ol class="breadcrumb">
            <li><a href="#" onclick="ajax($('#page-content'),{c:'Utilisateur',a:'tableaudebord_content'}, true, true)">Tableau de bord</a></li>
            <li class="active">Catégories</li>
        </ol>
        <!-- -->
    </div>
</div>

<div class ="row">
    <div class="col-lg-12">
        <p>
            <span href="#" onclick="ajax($('#type-content'),{c:'Type',a:'listelevel'}, true, true)" class="label label-primary" type="button">Parcourir</span>
            <span href="#" onclick="ajax($('#type-content'),{c:'Type',a:'listeall'}, true, true)" class="label label-primary" type="button">Tout afficher</span>
        </p>
    </div>
</div>

<div class ="row"></div>

<div id="type-content">
</div>

<script>
    ajax($('#type-content'),{c:'Type',a:'listelevel', type:'0'}, true, true);
</script>