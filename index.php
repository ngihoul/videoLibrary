<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    
    <title>Devoir 8.5.3 - 25-03-2021 - Nicolas Gihoul</title>
</head>

<body>
    <main class="container">
        <header>
            <h1 class="text-center mt-3 mb-3">Vidéothèque</h1>
            <!-- Search form -->
            <form class="form-group row">
                <div id="search-form" class="input-group mb-3 col-6 mx-auto">
                    <input id="search" type="text" name="search" class="form-control" placeholder="Rechercher un film" aria-label="Recherche" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button id="search-btn" class="btn btn-outline-primary" type="button">Chercher</button>
                    </div>
                </div>
            </form>
        </header>
        <!-- Results table -->
        <table id="movies" class="table table-striped">
        </table>
        <!-- Edit Form - Popup -->
        <div class="modal fade" id="form-popup" tabindex="-1" role="dialog" aria-labelledby="form-popup" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="form-popup">Détails</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="movie-details">
                            <div class="form-group">
                                <label for="id">Id</label>
                                <input type="text" id="film_id" name="film_id" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="title">Titre</label>
                                <input type="text" id="title" name="title" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="title">Description</label>
                                <input type="text" id="description" name="description" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="year">Année</label>
                                <input type="text" id="release_year" name="release_year" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="year">Langue</label>
                                <input type="text" id="language_id" name="language_id" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="year">Langue originale</label>
                                <input type="text" id="original_language_id" name="original_language_id" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="year">Durée de location</label>
                                <input type="text" id="rental_duration" name="rental_duration" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="year">Prix de location</label>
                                <input type="text" id="rental_rate" name="rental_rate" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="length">Durée (min)</label>
                                <input type="text" id="length" name="length" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="year">Prix de la caution</label>
                                <input type="text" id="replacement_cost" name="replacement_cost" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="year">Note</label>
                                <input type="text" id="rating" name="rating" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="year">Particularités</label>
                                <input type="text" id="special_features" name="special_features" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="user_id">Dernière mise à jour</label>
                                <input type="text" id="last_update" name="last_update" class="form-control" />
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>