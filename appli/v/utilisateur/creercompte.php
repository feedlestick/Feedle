<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php echo Install\App::NAME; ?></title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo \Install\Chemins::CSS; ?>bootstrap.css" rel="stylesheet">

        <!-- Add custom CSS here -->
        <link href="<?php echo \Install\Chemins::CSS; ?>sb-admin.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo \Install\Chemins::FONT; ?>css/font-awesome.min.css">
        <!-- Page Specific CSS -->
        <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
    </head>

    <body>

        <div id="wrapper">

            <!-- Sidebar -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php"><?php echo Install\App::NAME; ?></a>
                </div>

            </nav>

            <div id="page-wrapper">

                <div class="row">
                    <div class="col-lg-4">

                    </div>
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Création de compte</h3>
                            </div>
                            <div class="panel-body">
                                <?php
                                APPLI\V\Helper::messages();
                                ?>
                                <form role="form" action="." method="POST">
                                    <input type="hidden" name="c" value="utilisateur">
                                    <input type="hidden" name="a" value="creerCompteConfirm">
                                    <div class="form-group">
                                        <label>Adresse mail</label><input class="form-control" type="text" name="email"><br />
                                        <label>Mot de passe</label><input class="form-control" type="password" name="password">
                                        <label>Confirmez le mot de passe</label><input class="form-control" type="password" name="password2">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-default">Valider</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4">

                    </div>
                </div><!-- /.row -->







            </div><!-- /#page-wrapper -->

        </div><!-- /#wrapper -->

        <!-- Bootstrap core JavaScript -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="<?php echo \Install\Chemins::JS; ?>bootstrap.js"></script>
        <!-- Page Specific Plugins -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
        <script src="<?php echo \Install\Chemins::JS; ?>morris/chart-data-morris.js"></script>
        <script src="<?php echo \Install\Chemins::JS; ?>tablesorter/jquery.tablesorter.js"></script>
        <script src="<?php echo \Install\Chemins::JS; ?>tablesorter/tables.js"></script>
    </body>
</html>
