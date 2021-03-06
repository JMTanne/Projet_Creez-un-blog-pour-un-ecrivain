<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <link rel="stylesheet" href="public/css/style.css"/>
      <script type="text/javascript" src="public/js/main.js"></script>

      <title><?= $title ?></title>
   </head>
   <body>
         <header>
            <div id="logo">
               <!-- logo part bloc/container -->
              <img src="public/ressources/logo/logo_backOffice.png" alt="Logo Back Office" />
            </div>
            <nav>
               <!-- nav part bloc/container -->
               <ul>
                  <li><a class="BO_links_backToSite" href="index.php">Retour au site</a></li>
                  <li><a class="BO_links_header" href="index.php?action=BO_welcome">Accueil Administration</a></li>
                  <li><a class="BO_links_header" href="index.php?action=BO_addPost">Ajout Chapitre</a></li>
                  <li><a class="BO_links_header" href="index.php?action=BO_allPosts">Gestion Chapitres</a></li>
                  
               </ul>
            </nav>
         </header>

         <?= $content ?>

    </body>
</html>