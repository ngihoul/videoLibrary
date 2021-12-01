$(() => {
  // VARIABLES
  // Search
  const SEARCH_FORM = $("#search-form"),
    SEARCH_INPUT = $("#search"),
    SEARCH_BTN = $("#search-btn");
  // Result Table
  const MOVIES_TABLE = $("#movies"),
    TABLE_HEAD_LABELS = ["Titre", "Description", "Année"];
  // AJAX PARAMS
  const METHOD = "GET",
    URL = "videotheque.php",
    DATA_TYPE = "JSON",
    ERROR_404 = "Erreur : Page non trouvée !",
    ERROR = "Erreur",
    AJAX_LOADER = '<img class="d-block mx-auto m-4" src="img/ajax-loader.gif" alt="loader"/>';
  // Movie Manager
  const ERROR_NO_FOUND_MOVIE = "Aucun film trouvé !";

  // FUNCTIONS
  let Movies = {
    // Se connecte a la DB et appelle la fonction de recherche et d'affichage
    search: (location, input, tableHeadLabels) => {
      // Récupération de la valeur de l'input
      let searchValue = input.val();
      // AJAX
      $.ajax({
        method: METHOD,
        url: URL,
        data: {},
        dataType: DATA_TYPE,
        statusCode: {
          404: () => {
            location.text(ERROR_404);
          },
        },
        // Display ajax loader
        beforeSend: () => {
          location.html(AJAX_LOADER);
        },
        success: (datas) => {
          // Vérification si la recherche correspond à un film
          let result = Movies.isInDB(searchValue, datas);
          if (result !== false) {
            Movies.displayInTable(location, tableHeadLabels, result);
          } else {
            location.html(`<tr><td>${ERROR_NO_FOUND_MOVIE}</td></tr>`);
          }
        },
        error: (datas, status, error) => {
          location.text(`${ERROR}: ${datas.status} - ${status} - ${error}`);
        },
        timeout: 5000,
      });
    },

    // Retourne les résultats dans un tableau ou false si aucune correspondance dans la DB.
    isInDB: (movie, database) => {
      let result = [];
      let movieLowerCase = movie.toLowerCase();
      database.forEach((data) => {
        let titleLowerCase = data.title.toLowerCase();
        if (titleLowerCase.includes(movieLowerCase)) {
          result.push(data);
        }
      });
      return result.length > 0 ? result : false;
    },

    // Affiche les resultats sous forme de tableau Bootstrap.
    displayInTable: (location, tableHeadLabels, datas) => {
      location.text("");
      // Table header
      location.append($("<thead>").append($("<tr>")));
      tableHeadLabels.forEach((label) => {
        $("<td>").text(label).appendTo("tr");
      });

      // Table body
      location.append($("<tbody>"));
      datas.forEach((data) => {
        let tr = $("<tr>");
        Object.values(data).forEach((value) => {
          // création d'un lien sur le titre du film
          if (data.title === value) {
            tr.append(
              $("<td>").append(
                $("<a>", {
                  text: value,
                  click: () => {
                    Movies.fillForm(data);
                  },
                  href: "#",
                  // Attributs pour ouverture Modal Bootstrap
                  attr: {
                    "data-toggle": "modal",
                    "data-target": "#form-popup",
                  },
                })
              )
            );
            // Affichage uniquement de la description et de l'année (en + du titre)
          } else if (
            data.description === value ||
            data.release_year === value
          ) {
            tr.append($("<td>").text(value));
          }
        });
        $("tbody").append(tr);
      });
    },

    // Remplis le formulaire avec les données du film selectionné et transforme les inputs en readonly.
    fillForm: (data) => {
      for (key in data) {
        $(`#${key}`).val(data[key]).attr("readonly", "");
      }
    },
  };
  
  // SCRIPT
  // Ecoute d'évènement sur la touche 'Enter' quand le curseur est dans l'input de recherche
  SEARCH_FORM.keydown((e) => {
    if (e.which == 13) {
      e.preventDefault();
      Movies.search(MOVIES_TABLE, SEARCH_INPUT, TABLE_HEAD_LABELS);
    }
  });
  // Ecoute d'évènement sur le bouton 'chercher'
  SEARCH_BTN.on("click", (e) => {
    e.preventDefault();
    Movies.search(MOVIES_TABLE, SEARCH_INPUT, TABLE_HEAD_LABELS);
  });
});
