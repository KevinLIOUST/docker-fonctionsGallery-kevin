<?php
// Il faut faire 1 fonction :

// Soit pour afficher 10 femmes
// Soit pour afficher 5 femmes
// Soit pour afficher 5 hommes
// Soit pour afficher toutes les photos

require_once "data/users.php";

// var_dump($_GET);

if (isset($_GET['type'])) {
    $type = $_GET['type'];
    // if (!in_array($type, $allTypes)) {
    //     $noFound = true;
    // }
} else {
    $type = 'all';
}

// Fonction pour afficher les photos des gens en fonction de leurs paramètres pour le genre, le tableau des users et le nombre d'affichage
function generationGallery($users, $genre = "", $nbAffichage = "")
{
    if ($genre == "Femme") {
        for ($i = 0; $i < count($users); $i++) {
            if ($users[$i]["genre"] == $genre) {
                if ($nbAffichage == 0) {
                    break;
                }
                $photo = $users[$i]["photo"];
                $prenom = $users[$i]["prenom"];
                $nom = $users[$i]["nom"];
                echo "
                    <div>
                        <img class=\"taille-img rounded-4\" src=\"assets/img/$photo\" alt=\"assets/img/$photo\">
                        <p class=\"mt-3\">$prenom $nom</p>
                        <p>$genre</p>
                    </div>
                ";
                $nbAffichage--;
            }
        }
    } elseif ($genre == "Homme") {
        for ($i = 0; $i < count($users); $i++) {
            if ($users[$i]["genre"] == $genre) {
                if ($nbAffichage == 0) {
                    break;
                }
                $photo = $users[$i]["photo"];
                $prenom = $users[$i]["prenom"];
                $nom = $users[$i]["nom"];
                echo "
                    <div>
                        <img class=\"taille-img rounded-4\" src=\"assets/img/$photo\" alt=\"assets/img/$photo\">
                        <p class=\"mt-3\">$prenom $nom</p>
                        <p>$genre</p>
                    </div>
                ";
                $nbAffichage--;
            }
        }
    } else {
        for ($i = 0; $i < count($users); $i++) {
            $photo = $users[$i]["photo"];
            $prenom = $users[$i]["prenom"];
            $nom = $users[$i]["nom"];
            $genre = $users[$i]["genre"];
            echo "
                <div>
                    <img class=\"taille-img rounded-4\" src=\"assets/img/$photo\" alt=\"assets/img/$photo\">
                    <p class=\"mt-3\">$prenom $nom</p>
                    <p>$genre</p>
                </div>
            ";
        }
    }
}

shuffle($users);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gallery Photos </title>

    <!-- Lien vers Bootstrap -->
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css" />

    <!-- Lien vers les icônes Bootstrap -->
    <link rel="stylesheet" href="../../node_modules/bootstrap-icons/font/bootstrap-icons.min.css">

    <!-- Lien vers le fichier pour designer le site web -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="bg-light d-flex flex-column min-vh-100">

    <h1 class="text-center py-4 bg-dark text-white">Custom Gallery</h1>

    <div class="d-flex justify-content-center">
        <a class="m-4 btn btn-secondary taille-police-btns border-btns" href="gallery.php">Toute la
            collection</a>
        <a class="m-4 btn btn-secondary taille-police-btns border-btns" href="gallery.php?type=Homme">Hommes</a>
        <a class="m-4 btn btn-secondary taille-police-btns border-btns" href="gallery.php?type=Femme">Femmes</a>
    </div>

    <main class="container-fluid div-photo py-4">
        <!-- <div>
            <img class="taille-img rounded-4" src="assets/img/photo_6.jpg" alt="assets/img/photo_6.jpg">
        </div> -->
        <?php
        generationGallery($users, $type, 10);
        ?>
    </main>

    <footer class="bg-dark text-white text-center mt-auto py-4">
        <p class="m-3">Afpa 2K25 - SuperGlobale - Session</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
</body>

</html>