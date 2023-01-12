<?php
if(is_dir('./__inc')){
    include '__inc/note/db.class.php';
    include '__inc/starbar.php';
}
elseif(is_dir('./../__inc')){
    include '../__inc/note/db.class.php';
    include '../__inc/starbar.php';
}
else{
    include '../../__inc/note/db.class.php';
    include '../../__inc/starbar.php';
}
$bdd = new db();

?>


<div class="mt-5 text-center">
    <h4>N'hésitez pas à laisser votre avis ci-dessous :</h4>
</div>

<div class="d-flex justify-content-center" id="notes">
    <?php echo starBar(5, 1, 25); ?>
</div>


<footer class="footer py-4 bg-secondary mt-5 sticky-bottom">
    <div class="container text-light">
        <div class="row">
        <div class="col-12 col-md-8">
            <p>Il est obligatoire de mentionner la source <b><a href="index.php">Entraxe-Jante-Alu.com</a></b> en cas de réutilisation des données de ce site.</p>
            <p>Les données présentes sur ce site sont à titre indicatif. Entraxe Jante Alu décline toute responsabilité en cas d'inexactitude des informations proposées et des conséquences que cela pourrait engendrer.</p>
            <p>Contactez-nous au <b>01.46.97.90.15</b></p>
            <p class="mt-3">Copyright © Entraxe Jante Alu <?php echo date("Y");?></p>
        </div>
        <div class="col-12 col-md-4">
            <ul class="list-group list-group-flush bg-transparent">
                <li class="list-group-item bg-transparent p-1" ><a class="nav-link js-scroll-trigger" href="faq">F.A.Q</a></li>
                <li class="list-group-item bg-transparent p-1"><a class="nav-link js-scroll-trigger" href="contact">Contact</a></li>
                <li class="list-group-item bg-transparent p-1"><a class="nav-link js-scroll-trigger" href="contact">Conditions de vente</a></li>
                <li class="list-group-item bg-transparent p-1">
                    <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/Comptoir-du-tuning-547924971997341"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="https://www.comptoirdutuning.fr/"><img src="assets/img/cdtalpha.png" alt="logo_cdt" width="50"></a>
                    <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/comptoirdutuning/"><i class="fab fa-instagram"></i></a>
                </li>
            </ul>
        </div>
        </div>
    </div>

</footer>
</body>
<!-- Bootstrap core JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
<!-- Third party plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

<!--
<script src="assets/mail/jqBootstrapValidation.js"></script>
<script src="assets/mail/contact_me.js"></script>
<script src="js/scripts.js"></script>
-->

</html>