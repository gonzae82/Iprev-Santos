<?php
include 'assets/autentica.php';
include 'assets/db.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Bootstrap -->
    

    
    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilo.css">

<style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {
            height: 100vh;
            /* Set height to 100% of the viewport height */
        }

        /* Set gray background color and 100% height */
        .sidenav {
            padding-top: 20px;
            background-color: #f1f1f1;
            height: 100%;
        }

        .navbar-collapse {
            z-index: 10000; 
            position: relative;
        }
        /* Set black background color, white text and some padding */
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }

            .row.content {
                height: auto;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img class="navbar-brand" src="img/iprevsantos.png">
                <a class="navbar-brand" href="dashboard.php?dir=views&file=home">iPrev - Santos</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="dashboard.php?dir=views&file=home"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                    <li><a href="dashboard.php?dir=views&file=processosList"><span class="glyphicon glyphicon-list"></span> Listar Processos</a></li>                    
                    <li><a href="dashboard.php?dir=views&file=usuariosList"><span class="glyphicon glyphicon-user"></span> Usuários</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="views/logout.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid text-center">
        <div class="row content">
             <!--
                <div class="col-sm-4 sidenav">               
                <ul class="nav navbar-nav">
                    <li><a href="#"><span class="glyphicon glyphicon-list"></span> Listar Processos</a></li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-plus"></span> Novo Cadastro</a>
                    </li>
                </ul>                
            </div>
            -->
            <div class="conteudo col-sm-12">
            <?php
                include (__DIR__."/{$_GET['dir']}/{$_GET['file']}.php");                
            ?>
            </div>
        </div>
    </div>

    <footer class="container-fluid text-center">
        <p>Versão do Sistema: 2.0 | 27/08/2024</p>
        <p>&copy; <?= date('Y');?> - todos os direitos reservados</p>
    </footer>

</body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</html>