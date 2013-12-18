<div id="produit">
    <!-- Pagination -->
      <div class="row text-center">
         <div class="col-lg-12">
            <ul class="pagination paginationTop"></ul>
         </div>
      </div>
      <!-- Search -->
      <div class="row text-center">
         <div class="col-lg-5"></div>
         <div class="col-lg-2">
             <div class="form-group input-group">
                 <span class="input-group-addon">Nom : </i></span>
                 <input type="text" class="fuzzy-search form-control"/>
           </div>
         </div>
        <div class="col-lg-5"></div>
      </div>
      <!-- Content -->
      <div class="row">
            <div class="list">
            </div>
      </div>
      <!-- Pagination -->
      <div class="row text-center">
          <div class="col-lg-12">
            <ul class="pagination paginationBottom"></ul>
         </div>
      </div>
</div>

<!-- -->

<script>
var produits = <?php echo json_encode($this->produits); ?>;

$("#count_produit").append(produits.length);

var html_template = '<div class="col-lg-4"><div class="panel panel-default">\n\
                            <div class="panel-heading">\n\
                                <h5><span class="name"></span></h5>\n\
                            </div>\n\
                            <div class="panel-body">\n\
                                 <p><strong>Prix HT :</strong> <span class="price"></span>€</p>\n\
                                 <p><strong>Quantité en stock :</strong> <span class="quantity"></span></p>\n\
                                 <p><strong>Stock d\'alerte :</strong> <span class="minstock"></span></p>\n\
                                 <p><strong>Catégorie :</strong> <span class="categorie_str"></span></p>\n\
                                 <p><strong>Marque :</strong> <span class="marque_str"></span></p>\n\
                                 <p><strong>Référence :</strong> PROD-<span class="id"></span></p>\n\
                            </div>\n\
                            <div class="panel-footer">\n\
                                <a href="#" class="label label-success">Commander</a>\n\
                                <a href="#" class="label label-danger">Sortie</a>\n\
                                <a href="#" onclick="ajax($(\'#page-content\'),{c:\'Produit\',a:\'item\'}, true, true)" class="label label-info">Voir fiche produit</a>\n\
                            </div>\n\
                         </div></div>';

var paginationTopOptions = {
    name: "paginationTop",
    paginationClass: "paginationTop",
    outerWindow: 2
 };
 
var paginationBottomOptions = {
    name: "paginationBottom",
    paginationClass: "paginationBottom",
    innerWindow: 3,
    left: 2,
    right: 4
 };
 

var options = {
  valueNames: [ 'id', 'libelle' ],
  item: html_template,
                            
    plugins: [
        ListPagination({ paginationClass:"paginationTop", outerWindow:2}),
        ListPagination({ paginationClass:"paginationBottom", outerWindow:2}),
        ListFuzzySearch()
    ]
};


var produitsList = new List('produit', options, produits);
</script>