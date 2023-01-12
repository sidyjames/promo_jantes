<nav class="navbar navbar-expand-lg navbar-dark bg-dark STICKY-top" id="mainNav">
    <div class="container-fluid">
        <a class="navbar-brand js-scroll-trigger" href="index"><img src="assets/img/eja.png" alt=""></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars fa-2x"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index"><i class="fas fa-home fa-2x"></i></a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="jantes-alu">Jantes alu</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="marque">Recherche marque</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="entraxe">Recherche entraxe</a></li>
                <li class="nav-item">
                    <div class="dropdown show">
                        <a class="btn btn-secondary" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background:transparent;border:0px;">
                           <i class="fas fa-user fa-2x"></i>
                        </a>
                        <div class="dropdown-menu bg-secondary" aria-labelledby="dropdownMenuLink" style="right:0!important; left:unset;">
                            <div style="margin:10px;width:max-content;" class="text-center">
                                <?php if(!isset($_SESSION['session_utilisateur'])||$_SESSION['session_utilisateur']==null)
                                    {
                                ?>
                                    <form action="" method="post">
                                        <label for="email">E-mail</label></br>
                                        <input type="email" name="cn_email" id="email"></br>
                                        <label for="mot_de_passe"> mot de passe</label></br>
                                        <input type="password" name="cn_mot_de_passe" id="mot_de_passe"></br>
                                        <button type="submit" class="btn btn-primary" name="cn_submit">Se connecter</button>
                                    </form>
                                    <a class="nav-link js-scroll-trigger" href="inscription"><button class="btn btn-secondary">Inscription</button></a>
                                <?php
                                    }else {
                                ?>
                                    <a href="mon-compte"><p>Mon compte</p></a>
                                    <a href="commandes"><p>Historique des commandes</p></a>
                                    <a href="deconnexion">
                                        <button id="deconnexion" class="btn btn-outline-light mt-auto mb-auto">
                                            Se déconnecter
                                        </button>
                                    </a>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </li>
                
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="panier"><i class="fas fa-shopping-cart fa-2x"></i><?php if(isset($_SESSION['caddie']['articles'])){echo $_SESSION['caddie']['total_articles'];}?></a></li>
                <!-- <li class="nav-item"><a class="nav-link js-scroll-trigger" href="faq">F.A.Q</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="contact">Contact</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger">Tél : 01.46.97.90.15</a></li> -->
            </ul>
            <div class="search-container-nav">
                <form class="form-inline my-2 my-lg-0">
                    <input type="text" name="search_nav" id="search_nav" autocomplete="off" class="form-control form-control-xl">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="fas fa-search fa-1x"></i></button>
                </form>
                <div id="search_res">
                </div>               
            </div>
        </div>
    </div>
</nav>

<?php
        if(isset($_GET['deconnexion'])){
            unset($_SESSION['session_utilisateur']);
            echo "<script>
                    window.location = window.location.href.split('deconnexion')[0];
                </script>";
        }  
$key='C5C46185617484B13BA706230C8A287C79E52E9F';
$data="0303983*22/12/2022:16:55:34*1.01EUR*ref155534*FR*ZNC60BETSELE*TexteLibre*test@test.zz";

        if(is_dir('./__inc')){
            // include '__inc/note/comptoiredb.class.php';
            // include '__inc/functions/StringMb.php';
            // include '__inc/functions/SHA256.php';
            include_once "__inc/functions/fonctions.php";
            //echo "dde";

        }
        elseif(is_dir('./../__inc')){
            // include '../__inc/note/comptoiredb.class.php';
            // include '../__inc/functions/StringMb.php';
            // include '../__inc/functions/SHA256.php';
            include_once "../__inc/functions/fonctions.php";
            echo "1";
        }
        else{
            // include '../../__inc/note/comptoiredb.class.php';
            // include '../../__inc/functions/StringMb.php';
            // include '../../__inc/functions/SHA256.php';
            include_once "../../__inc/functions/fonctions.php";
            echo "2";

        }
        // session_destroy();
        // var_dump(hmac_sha1($key, $data));
            // var_dump($_SESSION['session_utilisateur']);
    if(isset($_POST['cn_mot_de_passe'] ) && isset($_POST['cn_email']) && isset($_POST['cn_submit'])){
        user_login_now($_POST['cn_email'],$_POST['cn_mot_de_passe']);
        //verifier_authentification($_POST['cn_email'],$_POST['cn_mot_de_passe']);
    }
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
   $(document).ready(function(){
      $('#search_nav').keyup(function(){
         var search_nav = $('#search_nav').val();
         $.ajax({
            type: 'post',
            url: 'jquery_return',
            data: {search_nav: search_nav},
            success: function(data){
                $('#search_res').html(data);
            //    $('#search_res').text(data);
            }
         });
      });
   });

</script>
<style>
.nav-item{
    margin:auto;
}
.show>.search-btn{
    display:none;
}
.search-container-nav{
    position: relative;
    margin: 0 !important;;
}
#search_res{
    position: absolute;
    background:#f6cc39;
    z-index: 1000;
    border-radius: 0 0 10px 10px;
    width: 100%;
}
</style>