<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
        <title><?php echo Install\App::NAME; ?></title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo Install\Chemins::CSS; ?>bootstrap.css" rel="stylesheet">

        <!-- Add custom CSS here -->
        <link href="<?php echo Install\Chemins::CSS; ?>sb-admin.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo Install\Chemins::FONT; ?>css/font-awesome.min.css">
        <!-- Page Specific CSS -->
        <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
        <!-- editArea editor -->
    </head>

    <body>

        <div id="wrapper">

            <!-- Sidebar -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#" onclick="ajax($('#page-content'),{c:'Utilisateur',a:'tableaudebord_content'}, true, true)"><?php echo Install\App::NAME; ?></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    
                    <ul id="menu" class="nav navbar-nav side-nav">
                        <li id="nav_tableaudebord"><a href="#" onclick="ajax($('#page-content'),{c:'Utilisateur',a:'tableaudebord_content'}, true, true)"><i class="fa fa-dashboard"></i> Tableau de bord</a></li>
                        <li id="nav_marque"><a href="#" onclick="ajax($('#page-content'),{c:'Marque',a:'liste'}, true, true);"><i class="fa fa-flag-checkered"></i> Marques</a></li>
                        <li id="nav_categorie"><a href="#" onclick="ajax($('#page-content'),{c:'Type',a:'liste'}, true, true)"><i class="fa fa-book"></i> Catégorie</a></li>
                        <li id="nav_mouvement"><a href="#" onclick="ajax($('#page-content'),{c:'Mouvement',a:'liste'}, true, true)"><i class="fa fa-truck Mouvement"></i> Mouvement</a></li>
                        <!-- <li><a href="#" onclick="ajax($('#page-content'),{c:'Produit',a:'statistique'}, true, true)"><i class="fa fa-bar-chart-o"></i> Statistique</a></li> -->
                    </ul>

                    <ul class="nav navbar-nav navbar-right navbar-user">
                        <li class="dropdown user-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> <?php echo Install\App::$utilisateur->email; ?><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href=""><i class="fa fa-gear"></i> Paramètres</a></li>
                                <li class="divider"></li>
                                <li><a href=".?c=utilisateur&a=logout"><i class="fa fa-power-off"></i> Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
            
            <div id="page-wrapper">
                <div id="page-localstorage"></div>
                <div id="page-content"></div>
            </div>

        </div><!-- /#wrapper -->

        <!-- Bootstrap core JavaScript -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="<?php echo Install\Chemins::JS; ?>bootstrap.js"></script>
        <!-- Page Specific Plugins -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
        <script src="<?php echo Install\Chemins::JS; ?>tablesorter/jquery.tablesorter.js"></script>
        <script src="<?php echo Install\Chemins::JS; ?>tablesorter/tables.js"></script>
        <script src="<?php echo Install\Chemins::JS; ?>localStorageHelper.js"></script>
        <script src="<?php echo Install\Chemins::JS; ?>list.js"></script>
        <script src="<?php echo Install\Chemins::JS; ?>list.pagination.js"></script>
        <script src="<?php echo Install\Chemins::JS; ?>list.fuzzysearch.js"></script>
        <script src="<?php echo Install\Chemins::JS; ?>perso.js"></script>
        <script>
            $(document).ready(function() {
            });
        </script>
    </body>
</html>
