<div class="container">
    <div class="row">
        <div class="card text-center" style="width:100%; border-radius:0px;">
            <div class="card-header">
                Compte N° : <?php echo $_SESSION['session_utilisateur']['code_client']; ?>
            </div>
            <div class="card-body">
                <div class="row">   
                    <div class="col-md-6 mb-2">
                        <div class="card text-center" style=" max-height:523px;">
                            <div class="card-header">
                                Mes commandes
                            </div>
                            <div class="card-body">
                                <a href="commandes" class="profile">
                                    <div class="card mb-3 mt-3">
                                        <div class="row no-gutters pt-2 ">
                                            <div class="col-md-2 m-auto">
                                                <i class="fas fa-history fa-4x"></i>
                                            </div>
                                            <div class="col-md-8">
                                            <div class="card-body m-auto">
                                                <p class="card-title text-md-left">Historique des commandes </p>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="produits-achetes" class="profile">
                                    <div class="card mb-3 mt-3">
                                        <div class="row no-gutters pt-2 ">
                                            <div class="col-md-2 m-auto">
                                                <i class="fas fa-list fa-4x"></i>
                                            </div>
                                            <div class="col-md-8">
                                            <div class="card-body m-auto">
                                                <p class="card-title text-md-left">Liste des produits achetés</p>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="card text-center" style=" max-height:523px;">
                            <div class="card-header">
                                Parametres
                            </div>
                            <div class="card-body">
                                <a href="changer-mot-passe" class="profile">
                                    <div class="card mb-3 mt-3">
                                        <div class="row no-gutters pt-2 ">
                                            <div class="col-md-2 m-auto">
                                                <i class="fas fa-lock fa-4x"></i>
                                            </div>
                                            <div class="col-md-8">
                                            <div class="card-body m-auto">
                                                <p class="card-title text-md-left">Changer de mot de passe</p>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="changer-parametre" class="profile">
                                    <div class="card mb-3 mt-3">
                                        <div class="row no-gutters pt-2 ">
                                            <div class="col-md-2 m-auto">
                                                <i class="fas fa-cog fa-4x"></i>
                                            </div>
                                            <div class="col-md-8">
                                            <div class="card-body m-auto">
                                                <p class="card-title text-md-left">Changer mes parametres</p>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    a.profile:link{
        text-decoration:none;
    }
    a.profile{
        color:black;
    }
    a.profile:hover{
        color:#e6b301;
    }
</style>