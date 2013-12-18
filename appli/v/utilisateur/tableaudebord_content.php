<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tableau de bord</h1>
        <ol class="breadcrumb">
            <li class="active">Tableau de bord</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-6"> <!-- LEFT --> 
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money"></i> Dernier mouvements</h3>
            </div>
            <div class="panel-body">
                <div id="loader_mouvement">
                    <h4>Chargement ...</h4>
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-info" style="width: 100%"></div>
                    </div>
                </div>
                <div class="table table-responsive" id="data_mouvement" hidden>
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
                        <tbody id="table_rows_mouvements">
                            <!-- <tr>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6"> <!-- RIGHT -->
        <div class="form-group input-group">
            <span class="input-group-addon">Recherche :</span>
            <input class="form-control" type="text"></input>
            <span class="input-group-btn">
                <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
            </span>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-comments"></i> Informations</h3>
            </div>
            <div class="panel-body">
                <div class="list-group">
                    <a class="list-group-item" href="#"><i class="fa fa-user"></i> Bienvenue <?php echo $this->username ?></a>
                    <a class="list-group-item" href="#"><i class="fa fa-truck"></i> <span class="label label-info"><?php echo $this->produit_count; ?></span> produits enregistrés</a>
                    <a class="list-group-item" href="#"><i class="fa fa-truck"></i> <span class="label label-info"><?php echo $this->produit_stock; ?></span>  produits en stock</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var liste = new Array();
        $.ajax({
            type: "POST",
            url: '.',
            data: {c: 'Utilisateur', a: 'data_tableaudebord_mouvements'},
            async: true,
            success: function(json) {
                liste = json;
                for (var i = 0; i < liste.length; i++)
                {
                    $('#table_rows_mouvements').append('<tr class=\'' + Mouvement.getClassTrType(liste[i].type) + '\'><td>' + liste[i].date_mvt + '</td><td>' + Mouvement.getStringType(liste[i].type) + '</td><td>' + liste[i].produit_id + '</td><td>' + liste[i].quantity + '</td><td>' + liste[i].commentaire + '</td></tr>');
                }

                $('#data_mouvement').show();
                $('#loader_mouvement').hide();

                $("table").tablesorter({debug: true}); //TableSorter
            },
            dataType: 'json'
        });

        $localstorage = localStorageHelper(); //LocalStorageHelper


    }
    );
//    ajax($('#table_rows_mouvements'),{c:'Utilisateur',a:'data_tableaudebord_mouvements'}, true, true);
</script>