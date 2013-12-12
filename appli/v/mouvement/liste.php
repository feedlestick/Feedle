<div class ="row">
    <div class="col-lg-12">
        <h1 class="page-header">Liste des mouvements</h1>
    </div>
</div>

<!-- Recherche -->
<div class ="row">
    <div class="form-group input-group col-lg-3">  
       <label>Type: </label>
       <label class="radio-inline"><input id="optionsRadiosInline1" type="radio" checked="" value="option1" name="optionsRadiosInline"></input>Sortie</label>
       <label class="radio-inline"><input id="optionsRadiosInline1" type="radio" checked="" value="option1" name="optionsRadiosInline"></input>Entrée</label>
       <label class="radio-inline"><input id="optionsRadiosInline1" type="radio" checked="" value="option1" name="optionsRadiosInline"></input>Tout</label>
    </div>

    
    <div class="form-group input-group col-lg-3"></div>
    
    <div class="form-group input-group col-lg-3">  
         <span class="input-group-addon">Identifiant produit :</span>
         <input class="form-control"></input>
    </div>

    <div class="form-group input-group col-lg-3">
        <span class="input-group-addon">Date :</span>
        <input class="form-control"></input>
    </div>
    
 
</div>

<!-- Contenue -->
<div class="row">
    <div class="col-lg-12">
        <!-- LOADER -->
        <div id="loader">
            <h1>Chargement ...</h1>
            <div class="progress progress-striped active">
                <div class="progress-bar progress-bar-success" style="width: 100%"></div>
            </div>
        </div>
        <!-- FIN LOADER -->
        <div class="table table-responsive" id="data" hidden>
            <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                    <tr>
                        <th class="header">Date <i class="fa fa-sort"></i></th>
                        <th class="header">Type <i class="fa fa-sort"></i></th>
                        <th class="header">Produit <i class="fa fa-sort"></i></th>
                        <th class="header">Quantité <i class="fa fa-sort"></i></th>
                        <th class="header">Commentaire <i class="fa fa-sort"></i></th>
                    </tr>
                </thread>
                <tbody id="table_rows">
                   <!-- <tr>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                    </tr> -->
                </tbody>
            </table>
        </div>
         <!--LOADER INFINITE scroll -->
         <div id="loader-scroll" hidden>
             <div class="col-lg-4"></div>
             <div class="col-lg-4">
                 <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                </div>
             </div>
             <div class="col-lg-4"></div>
        </div>
        <!-- FIN INFINTE SCROLL -->
    </div>
</div>


<script type="text/javascript">
    var page = 1;
    ajax($('#table_rows'),{c:'Mouvement',a:'data_liste', p:page}, false, true);
    
    //infinite scroll
    $(window).scroll(function()
    {
        if($(window).scrollTop() === $(document).height() - $(window).height())
        {
           page++;
           $('#loader-scroll').show();
           ajax($('#table_rows'),{c:'Mouvement',a:'data_liste', p:page}, false, true);
        }
    });
    

  
</script>