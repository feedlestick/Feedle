<div class ="row">
    <div class="col-lg-12">
        <h1 class="page-header">Marques <small><span class="label label-danger"><?php echo $this->marque_count; ?></span></small></h1>
        <ul class="breadcrumb">
            <li><a href="#" onclik="ajax($('#page-content'),{c:'Utilisateur',a:'tableaudebord_content'}, true, true)">Tableau de bord</a></li>
            <li class="active">Marques</li>
        </ul>
    </div>
</div>

<!-- Contenue -->
<div id="marque">
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
      <div class="row text-center">
        <div class="col-lg-12">
            <div class="list">
            </div>
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
      <!-- Pagination -->
      <div class="row text-center">
          <div class="col-lg-12">
            <ul class="pagination paginationBottom"></ul>
         </div>
      </div>
</div>

<script>
var marques = <?php echo json_encode($this->marques); ?>;

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

var onclick = "ajax($(\'#page-content\'),{c:\'Marque\',a:\'item\', id:$(this).children(\'span\').filter(\'.id\').text()}, true, true)";

var options = {
  valueNames: [ 'id', 'libelle' ],
  item: '<div class="col-lg-3">\n\
            <div class="list-group">\n\
                <a class="list-group-item" href="#" onclick="'+onclick+'"><span class="id badge"></span> <span class="libelle"></span></a>\n\
            </div>\n\
        </div>',
    plugins: [
        ListPagination({ paginationClass:"paginationTop", outerWindow:2}),
        ListPagination({ paginationClass:"paginationBottom", outerWindow:2}),
        ListFuzzySearch()
    ]
};


var marqueList = new List('marque', options, marques);
</script>