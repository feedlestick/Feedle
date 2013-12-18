
<div id="type">
    <div class="row">
        <div id="title" class="col-lg-12" hidden>
            <h2>
                 <a href="#" onclick="ajax($('#type-content'),{c:'Type',a:'listelevel', type:'<?php echo $this->prevType ?>'}, true, true)"><i class="fa fa-arrow-left"></i> retour...</a>
                <?php echo $this->type_str ?>
            </h2>
        </div>
    </div>
    <!-- Search -->
      <div class="row">
         <div class="col-lg-5"></div>
         <div class="col-lg-5"></div>
         <div class="col-lg-2 text-right">
             <div class="form-group input-group">
                 <span class="input-group-addon">Nom : </i></span>
                 <input type="text" class="fuzzy-search form-control"/>
           </div>
         </div>
      </div>
     <!-- Content -->
     <div class="row">
        <div class="col-lg-12">
            <div class="list">
            </div>
        </div>
     </div>
</div>

<script>
 var types = <?php echo json_encode($this->types); ?>;
 var curr_type = <?php echo $this->currentType?>;
 var getTypeId = "$(this).parents().parents().children('span').filter('.id').text()";
 var getTypeId_produits = "$(this).parents().children('span').filter('.id').text()";
 
 if(curr_type !== 0)
 {
    $('#title').show();
 }
 else
 {
     $('#title').hide();
 }
  
 //Conditionnel structure item
 var html_template = 
 '<div class="col-lg-3">\n\
        <div class="list-group">\n\
            <div class="list-group-item">\n\
                <a href="#" onclick="ajax($(\'#page-content\'),{c:\'Type\',a:\'item\',id:'+getTypeId_produits+'}, true, true)" class="badge">Voir produits</a>\n\
                <h4 class="list-group-item-heading"><span class="libelle"></span></h4>\n\
                <div class="text-right"><a href="#" onclick="ajax($(\'#type-content\'),{c:\'Type\',a:\'listelevel\', type:'+getTypeId+'}, true, true);">Sous-catégorie...  <i class="fa fa-arrow-circle-o-right"></i></a></div>\n\
                <span class="as_subtype" hidden></span>\n\
                <span class="id" hidden></span>\n\
            </div>\n\
        </div>\n\
    </div>';
  
 var options = {
  valueNames: [ 'id', 'libelle' ],
  item: html_template,
    plugins: [
        ListFuzzySearch()
    ]
};

var typeListe = new List('type', options, types);

</script>