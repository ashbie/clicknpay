<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Home: Click n Pay</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link href="fontawesome/css/all.css" rel="stylesheet">
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Material Design Bootstrap -->
        <link rel="stylesheet" href="css/mdb.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="ionicons/css/ionicons.min.css">
        <!-- custom styles -->
        <link rel="stylesheet" href="css/partners.css">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/home.css">

        <style>
             header {
                background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('img/hero.jpg');
                background-attachment: fixed;
                background-size: cover;
                background-position: center;
                height: 100vh;
                position: relative;
            }

            .box {
                margin-top: 50px;
                text-transform: uppercase;
                color: #fff;
                width: 1140px;
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
            }

            .box h3 {
                font-weight: 500;
                font-size: 60px;
                margin-bottom: 40px;
                animation: moveInRight 1s ease-out;
                -webkit-animation: moveInRight 1s ease-out .75s;
                animation-fill-mode: backwards;
            }

            @keyframes moveInRight {
                0% {
                    opacity: 0;
                    transform: translateX(-150px);
                    -webkit-transform: translateX(-150px);
                    -moz-transform: translateX(-150px);
                    -ms-transform: translateX(-150px);
                    -o-transform: translateX(-150px);
                }

                100% {
                    opacity: 1;
                    transform: translate(0);
                    -webkit-transform: translate(0);
                    -moz-transform: translate(0);
                    -ms-transform: translate(0);
                    -o-transform: translate(0);
                }
            }

            @keyframes moveInBottom {
                0% {
                    opacity: 0;
                    transform: translateY(150px);
                    -webkit-transform: translateY(150px);
                    -moz-transform: translateY(150px);
                    -ms-transform: translateY(150px);
                    -o-transform: translateY(150px);
}

                100% {
                    opacity: 1;
                    transform: translate(0);
                    -webkit-transform: translate(0);
                    -moz-transform: translate(0);
                    -ms-transform: translate(0);
                    -o-transform: translate(0);
                }
            }

            .box a {
                display: inline-block;
                text-decoration: none;
                padding: 10px;
                margin-right: 40px;
                border-radius: 200px;
                width: 120px;
                text-align: center;
                animation: moveInBottom 1s ease-out .5s;
                -webkit-animation: moveInBottom 1s ease-out .9s;
                animation-fill-mode: backwards;
}

            .box a:link,
            .box a:visited {
                color:#fff;
                background-color: rgb(30,144,255);
                transition: color 0.3s, background 0.3s;
            }

            .box a:hover,
            .box a:active {
                    padding-top: 9px;
                    padding-bottom: 9px;
                    border: 1px solid rgb(30,144,255);
                    color: rgb(30,144,255);
                    background: transparent; 
                 }

            .rules {
                background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('img/welcome.jpg');
                background-attachment: fixed;
                background-size: cover;
                background-position: center;
                height: 100vh;
            }     

            .rules h3 {
                color: #fff;
                margin: 0 auto;
                text-transform: uppercase;
                font-weight: 400;

            }

            .rules p {
                text-align: center;
                color: #000;
                font-size: 25px;
                color: #fff;
            }

            .wrap {
                margin-top: 150px;
            }

            #icon1,
            #icon2,
            #icon3,
            #icon4 {
                font-size: 60px;
                display: block;
                text-align: center;
                color:rgb(30,144,255);
                margin-bottom: 15px;
                -webkit-transition: -webkit-transform .8s ease-in-out;
                transition: transform .8s ease-in-out;
            }

            #icon1:hover,
            #icon2:hover,
            #icon3:hover,
            #icon4:hover {
                -webkit-transform: rotate(360deg);
                 transform: rotate(360deg);
            }

        </style>

    </head>
    <body>

    <?php include('header.php') ?>
    

    <div class="content">
    <header>
        <div class="box">
        <h3>Bienvenue dans le monde du divertissement</h3>
        <a href="#watch">Regarder</a>
        <a href="#play">Jouer</a>
        <a href="#listen">Ecouter</a>
        </div>
    </header>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
 
    <section class="about-us py-5 " id="about-us">
    <div class="container-fluid my-5 px-5">
    
    <div class="row mb-5" id="watch">

<div class="col-md-7">
    <div class="row no-gutters">

     <video width='700' height='356' controls>
        <source src="videos/intro.mp4" type='video/mp4'>
    </video>

    </div>
</div>

<div class="col-md-5 text-center">
    <h1 class='text-info'>Les Films!</h1>
    <h3>Un temps pour se détendre</h3>
    <hr>
    <p class="identity-description"><span class="identity pr-1">Click & Pay <sup>&copy;</sup> <span class="text-muted">Movies</span></span> vous donne la chance parfaite d'accéder aux films au bon moment.
    Tout cela en seulement quelques clics et un paiement simple et abordable. Cela n'a jamais été aussi simple</p>
    <p>Choisissez parmi une large gamme de films de qualité pour que vous puissiez en profiter avec votre famille et vos amis</p>
    <a href="films.php" type="button" class="btn btn-outline-success mt-4">Acheter maintenant <i class="far fa-hand-point-right pl-2"></i></a>

</div>

<br>
<div class="container-fluid my-5 rules">
    <div class="wrap">
    <div class="row mb-5">
        <h3>cliquez, payez & profitez</h3>
    </div>
    <div class="row">

        <div class="col-3">
            <i class="ion-search" id="icon1"></i>
            <p>Parcourez notre vaste collection de films, jeux et chansons</p>
        </div>
        <div class="col-3">
            <i class="ion-plus-circled" id="icon2"></i>
            <p>Choisissez tout ce qui vous intéresse, sans aucune limite</p>
        </div>
        <div class="col-3">
            <i class="ion-social-usd" id="icon3"></i>
            <p>Payez tous vos produits en un seul clic, c'est si simple</p>
        </div>
        <div class="col-3">
            <i class="ion-loop" id="icon4"></i>
            <p>Profitez de tous les divertissements à tout moment et en tout lieu</p>
        </div>

    </div>
    </div>
</div>

</div>



    <div class="row mb-5" id="play">

		<div class="col-md-7 big-image">
            <img class="card-img-top" src="img/fifa.png" alt="Card image cap">
        </div>

		<div class="col-md-5 text-center">
		    <h1 class='text-info'>Les Jeux!</h1>
		    <h3>S'amuser bien</h3>
		    <hr>
		    <p class="identity-description"><span class="identity pr-1">Click & Pay <sup>&copy;</sup> <span class="text-muted">Games</span></span> a rendu le divertissement plus amusant.</p>
            <p class="identity-description">Que vous soyez un fan de jeux remplis d'adrénaline ou de jeux qui aident à réduire le stress, nous avons ce qu'il vous faut. Prenez votre manette de jeu et préparez-vous à plonger dans un monde de plaisir.</p>
            <p>Nous avons des jeux pour chaque plateforme. PC, Xbox, PlayStation ... etc.</p>
		    <a href="games.php" type="button" class="btn btn-outline-success mt-4">Acheter maintenant <i class="far fa-hand-point-right pl-2"></i></a>

		</div>

        </div>



	<div class="row" id="listen">
		<div class="col-md-5 text-center">
		    <h1 class='text-info'>La Musique!</h1>
		    <h3>Musique pour toute occasion</h3>
		    <hr>
		    <p class="identity-description"><span class="identity pr-1">Click & Pay <sup>&copy;</sup> <span class="text-muted">Music</span></span> fournit une plate-forme mondiale pour vous permettre d'accéder facilement au type de musique souhaité.</p>
            <p class="identity-description">Découvrez un tout nouveau monde de musique de qualité. Des vieilles chansons aux plus récentes, il y a des chansons pour tout le monde</p>
            <p>Cliquez sur le bouton ci-dessous et commencez votre voyage dans un monde plein de rythme</p>
		    <a href="songs.php" type="button" class="btn btn-outline-success mt-4">Acheter maintenant <i class="far fa-hand-point-right pl-2"></i></a>

		</div>
		<div class="col-md-7">
            <div class="row no-gutters">

            <div class="col-md-6 big-image">
            <img class="card-img-top" src="img/concert.jpg" alt="Card image cap">
            </div>

            <div class="col-md-6 small-image">
            <div class="row no-gutters">
            <div class="col-md-12">
            <img class="card-img-top" src="img/keyboard.jpg" alt="Card image cap">
            </div>
            <div class="col-md-12">
            <img class="card-img-top" src="img/guy_listening_to_music.jpg" alt="Card image cap">
            </div>
            </div>
            </div>

            </div>
        </div>
	</div>
</div>
</section>

<!-- logos from: https://www.logo.wine/ -->
<div class="portfolio">
        <div class="container">
              
              <div class="row">
                      <div class="text-center">  
                          <h4 class="display-4"><span class=" icon ion-minus"></span>Nos Partenaires<span class=" icon ion-minus"></span></h4>
                          <p class="mx-5 px-5" id="partner-words">Nous travaillons avec différents partenaires pour vous apporter le meilleur contenu de l'industrie des jeux, du cinéma et de la musique</p><br>
                      </div> 
              </div>  
                  
              <div class="row">

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">     
                    <a href="#">
                        <img class="img-rounded" src="img/partners/xbox-partnership.png" alt="">
                    </a>                                                 
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">         
                    <a href="#">
                        <img class="img-rounded" src="img/partners/stadia-partnership.png" alt="">
                    </a>                                             
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">      
                    <a href="#">
                        <img class="img-rounded" src="img/partners/playstation-partnership.png">
                    </a>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <a href="#">
                        <img class="img-rounded" src="img/partners/ea-partnership.png" alt="">
                    </a>
                </div>
                     
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <a href="#">
                        <img class="img-rounded" src="img/partners/fox-partnership.png" alt="">
                    </a>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
    				<a href="#">
                        <img class="img-rounded" src="img/partners/netflix-partnership.png" alt="">
                    </a>
                </div>
                 
                 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                     <a href="#">
                         <img class="img-rounded"  src="img/partners/multichoice-partnership.png">
                     </a>
                 </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <a href="#">
                        <img class="img-rounded" src="img/partners/snrt-partnership.png" alt="">
                    </a>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <a href="#">
                        <img class="img-rounded" src="img/partners/apple-music-partnership.png" alt="">
                    </a>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <a href="#">
                        <img class="img-rounded"  src="img/partners/spotify-partnership.png">
                    </a>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <a href="#">
                        <img class="img-rounded" src="img/partners/deezer-partnership.png" alt="">
                    </a>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <a href="#">
                        <img class="img-rounded" src="img/partners/soundcloud-partnership.png" alt="">
                    </a>
                </div>
               
         </div>  
             
 </div>
</div>  

<?php include('footer.php') ?>

<!-- end of body content -->
</div>
        
        <script src="" async defer></script>
    </body>
</html>