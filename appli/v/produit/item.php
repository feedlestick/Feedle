<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Produits - <span id="name"></span></h1>
        <ol class="breadcrumb">
            <li><a href="#" onclik="ajax($('#page-content'),{c:'Utilisateur',a:'tableaudebord_content'}, true, true)">Tableau de bord</a></li>
            <li class="active">Produit - <span id="name"></span></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Informations produit</h3>
            </div>
            <div class="panel-body">
                <div><strong>Référence :</strong> PROD-<span id="id"> </span></div>
                <div><strong>Prix HT :</strong> <span id="price"></span></div>
                <div><strong>Stock d'alerte :</strong> <span id="minstock"></span></div>  
                <div><strong>Marque :</strong> <span id="marque_str"></span></div>
                <div><strong>Catégorie :</strong> <span id="categorie_str"></span></div>
                <div><strong>Quantité en stock :</strong> <span id="quantity"></span></div>   
            </div>
        </div>
     </div>           
    <div class="col-lg-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Manipulation</h3>
            </div>
            <div class="panel-body">
                    <form class="form" role="form">
                       
                        <div class="form-group input-group">
                             <span class="input-group-addon">Quantité: </span>
                             <input class="form-control" type="number">
                        </div>
                        
                         <div class="form-group input-group">
                            <span class="input-group-addon">Commentaire: </span>
                            <input class="form-control" type="text">
                        </div>
                        
                        <button class="btn btn-danger" type="button">Sortir</button>
                        <button class="btn btn-warning" type="button">Commander</button>
                    </form>
            </div>
        </div>       
    </div>
</div>

<script>
    var marque_str = <?php echo json_encode($this->marque_str); ?>;
    var type_str = <?php echo json_encode($this->type_str); ?>;
    var produit = <?php echo json_encode($this->produit);?>;
    
    $("span#id").append(produit.id);
    $("span#name").append(produit.name);
    $("span#price").append(produit.price);
    $("span#minstock").append(produit.minstock);
    $("span#quantity").append(produit.quantity);
    
    $("span#marque_str").append(marque_str);
    $("span#categorie_str").append(marque_str);
</script>