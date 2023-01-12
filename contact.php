<?php
$title = 'Entraxe Jante Alu - Contact';
$descriptionSite = "Une question sur les caractéristiques technigues de votre véhicule ? Posez-la nous ici, l'équipe d'Entraxe Jante Alu vous répondra dans les meilleurs délais !";
?>
<div class="container">
    <div class="contentDiv text-center">

        <div class="text-left">
            <p><a href="index">Accueil</a> / <a href="contact">Contact</a></p>
        </div>

        <h1>Nous contacter</h1>

        <form action="__inc/sendmail.php" method="post">
            <div class="form-group mt-5">
                <label for="name">Nom / Prénom :</label>
                <input type="text" name="name" class="form-control text-center" id="name" placeholder="John Doe"
                    required>
            </div>

            <div class="form-group mt-4">
                <label for="email">Adresse email :</label>
                <input type="email" name="email" class="form-control text-center" id="email" placeholder="name@example.com"
                    required>
            </div>

            <div class="form-group mt-4">
                <label for="telephone">Téléphone :</label>
                <input type="tel" name="telephone" minlength="10" maxlength="10" class="form-control text-center" id="telephone" placeholder="06XXXXXXXX"
                    required>
            </div>

            <div class="form-group mt-4">
                <label for="sujet">Sujet de la demande :</label>
                <input type="text" class="form-control text-center" name="sujet" id="sujet"
                    placeholder="Renseignez-ici le sujet de votre demande" required>
            </div>

            <div class="form-group mt-4">
                <label for="message">Détails de votre demande :</label>
                <textarea class="form-control text-center" id="details" name="message"
                        placeholder="Ecrivez ici ce que vous voulez"
                        rows="8" required></textarea>
            </div>

            <input type="hidden" name="raison">
            <div class="g-recaptcha" data-sitekey="CLEF SITE"></div>
            <button type="submit" class="btn btn-primary mt-3">Envoyer</button>

        </form>
    </div>
</div>