<?php
    $reqt="SELECT * FROM peel_commandes where id_utilisateur='".$_SESSION['session_utilisateur']['id_utilisateur']."' and email='".$_SESSION['session_utilisateur']['email']."';";
    //var_dump($_SESSION['session_utilisateur']);
    $commandes=query($reqt);
?>
<div class="container">
    <div class="contentDiv text-center">
        <div class="text-left">
            <p><a href="mon-compte">Mon compte</a> / <a href="commandes">Historique des commandes</a></p>
        </div>
    </div>
    <div class="row">
        <?php
        // var_dump($commandes);
            if(empty($commande) || !$commande){
                echo "<p style='min-height:6vh'>Vous n'avez pas encore de commande.</p>";
            }
            else{
        ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Numéro de la commande</th>
                            <th scope="col">Date</th>
                            <th scope="col">Statut du paiement</th>
                            <th scope="col">Montant TTC</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($commandes as $commande){
                        ?>
                                <tr>
                                    <th scope="row"><?php echo $commande['id'];?></th>
                                    <td><?php echo $commande['o_timestamp'];?></td>
                                    <td><?php echo $commande['statut_details'];?></td>
                                    <td><?php echo $commande['montant'];?></td>
                                </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
        <?php
            }
        ?>
    </div>
</div>