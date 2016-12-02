<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Documentation - Uniteam</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        table {
            font-size: 20px;
            padding-bottom: 20px;
        }

        td {
            color: black;
            padding-bottom: 10px;
            padding-right: 25px;
        }

        .full-height {
            height: 100vh;
        }

        .flex-top {
            padding-top: 80px;
            display: flex;
            padding-left: 200px;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .top-left {
            position: absolute;
            left: 10px;
            top: 18px;
        }

        .content {
            text-align: left;
        }

        .title {
            font-size: 60px;
            padding-bottom: 20px;
        }

        .title2 {
            font-size: 40px;
            padding-bottom: 10px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
<div class="flex-top position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ url('/login') }}">Login</a>
                <a href="{{ url('/register') }}">Register</a>
            @endif
        </div>
    @endif

    <div class="content">
        <div class="links top-left">
            <a href="..">< Retour à l'accueil</a>
        </div>
        <div class="title">
            Documentation
        </div>


        <div class="title2">
            Utilisateurs
        </div>
        <table>
            <tr>
                <th>Type</th>
                <th>URI</th>
                <th>Utilisation</th>
            </tr>
            <tr>
                <td>GET</td>
                <td>/api/v1/utilisateurs</td>
                <td>Récupérer tous les utilisateurs</td>
            </tr>
            <tr>
                <td>GET</td>
                <td>/api/v1/utilisateurs/<em>{utilisateur}</em></td>
                <td>Récupérer les infos d'un utilisateur</td>
            </tr>
            <tr>
                <td>POST</td>
                <td>/api/v1/utilisateurs</td>
                <td>Créer un utilisateur</td>
            </tr>
            <tr>
                <td>PUT</td>
                <td>/api/v1/utilisateurs/<em>{utilisateur}</em></td>
                <td>Modifier les infos d'un utilisateur</td>
            </tr>
            <tr>
                <td>DELETE</td>
                <td>/api/v1/utilisateurs/<em>{utilisateur}</em></td>
                <td>Supprimer un utilisateur</td>
            </tr>
        </table>

        <div class="title2">
            Projets
        </div>
        <table>
            <tr>
                <th>Type</th>
                <th>URI</th>
                <th>Utilisation</th>
            </tr>
            <tr>
                <td>GET</td>
                <td>/api/v1/projets/<em>{utilisateur}</em></td>
                <td>Récupérer tous les projets d'un utilisateur</td>
            </tr>
            <tr>
                <td>GET</td>
                <td>/api/v1/projets/<em>{projet}</em></td>
                <td>Récupérer les infos d'un projet</td>
            </tr>
            <tr>
                <td>GET</td>
                <td>/api/v1/projets/<em>{projet}</em>/participants</td>
                <td>Récupérer les participants d'un projet</td>
            </tr>
            <tr>
                <td>POST</td>
                <td>/api/v1/projets</td>
                <td>Créer un projet</td>
            </tr>
            <tr>
                <td>PUT</td>
                <td>/api/v1/projets/<em>{projet}</em></td>
                <td>Modifier les infos d'un projet</td>
            </tr>
            <tr>
                <td>DELETE</td>
                <td>/api/v1/projets/<em>{projet}</em></td>
                <td>Supprimer un projet</td>
            </tr>
        </table>

        <div class="title2">
            Tâches
        </div>
        <table>
            <tr>
                <th>Type</th>
                <th>URI</th>
                <th>Utilisation</th>
            </tr>
            <tr>
                <td>GET</td>
                <td>/api/v1/taches/<em>{projet}</em></td>
                <td>Récupérer toutes les tâches d'un projet</td>
            </tr>
            <tr>
                <td>GET</td>
                <td>/api/v1/taches/<em>{tache}</em></td>
                <td>Récupérer les infos d'une tâche</td>
            </tr>
            <tr>
                <td>GET</td>
                <td>/api/v1/taches/<em>{tache}</em>/participants</td>
                <td>Récupérer les participants d'une tâche</td>
            </tr>
            <tr>
                <td>POST</td>
                <td>/api/v1/taches/<em>{projet}</em></td>
                <td>Créer une tâche pour un projet</td>
            </tr>
            <tr>
                <td>PUT</td>
                <td>/api/v1/taches/<em>{tache}</em></td>
                <td>Modifier les infos d'une tâche</td>
            </tr>
            <tr>
                <td>DELETE</td>
                <td>/api/v1/taches/<em>{tache}</em></td>
                <td>Supprimer une tâche</td>
            </tr>
        </table>

        <div class="title2">
            Réunions
        </div>
        <table>
            <tr>
                <th>Type</th>
                <th>URI</th>
                <th>Utilisation</th>
            </tr>
            <tr>
                <td>GET</td>
                <td>/api/v1/reunions/<em>{projet}</em>/<em>{utilisateur}</em></td>
                <td>Récupérer toutes les réunions d'un projet et un utilisateur</td>
            </tr>
            <tr>
                <td>GET</td>
                <td>/api/v1/reunions/<em>{reunion}</em></td>
                <td>Récupérer les infos d'une réunion</td>
            </tr>
            <tr>
                <td>GET</td>
                <td>/api/v1/reunions/<em>{reunion}</em>/participants</td>
                <td>Récupérer les participants d'une réunion</td>
            </tr>
            <tr>
                <td>POST</td>
                <td>/api/v1/reunions/<em>{projet}</em></td>
                <td>Créer une réunion pour un projet</td>
            </tr>
            <tr>
                <td>PUT</td>
                <td>/api/v1/reunions/<em>{reunion}</em></td>
                <td>Modifier les infos d'une réunion</td>
            </tr>
            <tr>
                <td>DELETE</td>
                <td>/api/v1/reunions/<em>{reunion}</em></td>
                <td>Supprimer une reunion</td>
            </tr>
        </table>

        <div class="title2">
            Comptes rendus
        </div>
        <table>
            <tr>
                <th>Type</th>
                <th>URI</th>
                <th>Utilisation</th>
            </tr>
            <tr>
                <td>GET</td>
                <td>/api/v1/comptes-rendus/<em>{projet}</em></td>
                <td>Récupérer tous les comptes rendus d'un projet</td>
            </tr>
            <tr>
                <td>GET</td>
                <td>/api/v1/comptes-rendus/<em>{compte-rendu}</em></td>
                <td>Récupérer les infos d'un compte rendu</td>
            </tr>
            <tr>
                <td>GET</td>
                <td>/api/v1/comptes-rendus/<em>{compte-rendu}</em>/participants</td>
                <td>Récupérer les participants d'un compte rendu</td>
            </tr>
            <tr>
                <td>POST</td>
                <td>/api/v1/comptes-rendus/<em>{reunion}</em></td>
                <td>Créer un compte rendu pour une réunion</td>
            </tr>
            <tr>
                <td>PUT</td>
                <td>/api/v1/comptes-rendus/<em>{compte-rendu}</em></td>
                <td>Modifier les infos d'un compte rendu</td>
            </tr>
            <tr>
                <td>DELETE</td>
                <td>/api/v1/comptes-rendus/<em>{compte-rendu}</em></td>
                <td>Supprimer un compte rendu</td>
            </tr>
        </table>

        <div class="title2">
            Commentaires
        </div>
        <table>
            <tr>
                <th>Type</th>
                <th>URI</th>
                <th>Utilisation</th>
            </tr>
            <tr>
                <td>GET</td>
                <td>/api/v1/commentaires/taches/<em>{tache}</em></td>
                <td>Récupérer tous les commentaires d'une tâche</td>
            </tr>
            <tr>
                <td>GET</td>
                <td>/api/v1/commentaires/reunions/<em>{reunion}</em></td>
                <td>Récupérer tous les commentaires d'une réunion</td>
            </tr>
            <tr>
                <td>GET</td>
                <td>/api/v1/commentaires/comptes-rendus/<em>{compte-rendu}</em></td>
                <td>Récupérer tous les commentaires d'un compte rendu</td>
            </tr>
            <tr>
                <td>GET</td>
                <td>/api/v1/commentaires/taches/<em>{commentaire}</em></td>
                <td>Récupérer les infos d'un commentaire de tâche</td>
            </tr>
            <tr>
                <td>GET</td>
                <td>/api/v1/commentaires/reunions/<em>{commentaire}</em></td>
                <td>Récupérer les infos d'un commentaire de réunion</td>
            </tr>
            <tr>
                <td>GET</td>
                <td>/api/v1/commentaires/comptes-rendus/<em>{commentaire}</em></td>
                <td>Récupérer les infos d'un commentaire de compte rendu</td>
            </tr>
            <tr>
                <td>POST</td>
                <td>/api/v1/commentaires/taches<em>{tache}</em></td>
                <td>Créer un commentaire pour une tâche</td>
            </tr>
            <tr>
                <td>POST</td>
                <td>/api/v1/commentaires/reunions<em>{reunion}</em></td>
                <td>Créer un commentaire pour une réunion</td>
            </tr>
            <tr>
                <td>POST</td>
                <td>/api/v1/commentaires/comptes-rendus<em>{compte-rendu}</em></td>
                <td>Créer un commentaire pour un compte rendu</td>
            </tr>
            <tr>
                <td>DELETE</td>
                <td>/api/v1/commentaires/taches/<em>{commentaire}</em></td>
                <td>Supprimer un commentaire de tâche</td>
            </tr>
            <tr>
                <td>DELETE</td>
                <td>/api/v1/commentaires/reunions/<em>{reunion}</em></td>
                <td>Supprimer un commentaire de réunion</td>
            </tr>
            <tr>
                <td>DELETE</td>
                <td>/api/v1/commentaires/comptes-rendus/<em>{compte-rendu}</em></td>
                <td>Supprimer un commentaire de compte rendu</td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>