<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <link rel="stylesheet" href="public/css/styles.css"/> 
      <title><?= $title ?></title>
   </head>
   <body>
         <header>
            <div id="logo">
               <!-- logo part bloc/container -->
              <img src="public/ressources/logo/logo.png" alt="Logo Blog" />
            </div>
            <nav>
               <!-- nav part bloc/container -->
               <ul>
                  <li><a href="#">Accueil</a></li>
                  <li><a href="#">Lire le livre</a></li>
                  <li><a href="#">identification</a></li>
               </ul>
            </nav>
         </header>

         <?= $content ?>

    </body>
</html>