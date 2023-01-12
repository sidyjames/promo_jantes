<div class="container">
  <form>
    <div class="row">
      <div class="col-md-8 mb-4">
        <div class="card mb-4">
          <div class="card-header mb-2">
            <h5 class="mb-0">Adresse de facturation</h5>
          </div>
          <div class="card-body">
            <div class="form-outline mb-4">
              <input type="text" id="societe_facture" name="societe_facture" class="form-control" />
              <label class="form-label" for="societe_facture">société</label>
            </div>
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input type="text" id="nom_facture" name="nom_facture" class="form-control" required/>
                  <label class="form-label" for="nom_facture">Nom</label>
                </div>
              </div>
              <div class="col">
                <div class="form-outline">
                  <input type="text" id="prenom_facture" name="prenom_facture" class="form-control" required/>
                  <label class="form-label" for="prenom_facture">Prenom</label>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input type="email" id="email_facture" name="email_facture" class="form-control" required/>
                  <label class="form-label" for="email_facture">Email</label>
                </div>
              </div>
              <div class="col">
                <div class="form-outline">
                  <input type="tel" size="32" id="tel_facture" name="tel_facture" class="form-control"/>
                  <label class="form-label" for="tel_facture">Téléphone</label>
                </div>
              </div>
            </div>

            <div class="form-outline mb-4">
              <input type="text" id="adresse_facture" name="adresse_facture" class="form-control" required/>
              <label class="form-label" for="adresse_facture">Addresse</label>
            </div>
          </div>
        </div>
        <div class="card mb-4">
          <div class="card-header mb-2">
            <h5 class="mb-0">Adresse de livraison</h5>
          </div>
          <div class="card-body">
            <div class="form-outline mb-4">
              <input type="text" id="societe_livraison" name="societe_livraison" class="form-control" />
              <label class="form-label" for="societe_livraison">société</label>
            </div>
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input type="text" id="nom_livraison" name="nom_livraison" class="form-control" required/>
                  <label class="form-label" for="nom_livraison">Nom</label>
                </div>
              </div>
              <div class="col">
                <div class="form-outline">
                  <input type="text" id="prenom_livraison" name="prenom_livraison" class="form-control" required/>
                  <label class="form-label" for="prenom_livraison">Prenom</label>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input type="email" id="email_livraison" name="email_livraison" class="form-control" required/>
                  <label class="form-label" for="email_livraison">Email</label>
                </div>
              </div>
              <div class="col">
                <div class="form-outline">
                  <input type="tel" size="32"id="tel_livraison" name="tel_livraison" class="form-control" required/>
                  <label class="form-label" for="tel_livraison">Téléphone</label>
                </div>
              </div>
            </div>

            <div class="form-outline mb-4">
              <input type="text" id="adresse_livraison" name="adresse_livraison" class="form-control" required/>
              <label class="form-label" for="adresse_livraison">Addresse</label>
            </div>
            <div class="form-outline mb-4">
              <input type="text" id="modele_vehicule" name="modele_vehicule" class="form-control" required/>
              <label class="form-label" for="modele_vehicule">Modèle du véhicule : <i>Exemple : Renault Clio 4 RS / 2014 / 1.6 200ch</i></label>
            </div>
            <fieldset>
              <legend>Commentaires / Instructions spéciales :</legend>
              <div>
                <textarea class="form-control" name="commentaire" cols="54" rows="5"></textarea>
              </div>
            </fieldset> 
            <p class="str_cgv_ok"><input type="checkbox" name="cgv" value="1" required> J'ai pris connaissance des <a href="https://www.entraxe-jante-alu.com/cgv.php" onclick="return(window.open(this.href)?false:true);">conditions générales de vente</a> du site entraxe-jante-alu.com en vigueur à cet instant et j'y adhère sans réserve.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0">Détails de la commande</h5>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                Produits
                <span><?php echo moneyformat($_SESSION['caddie']['total_prix_caddie_ht']);?></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0 ">
                Livraison
                <span>Gratuit</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                Tva
                <span><?php echo moneyformat($_SESSION['caddie']['total_tva']);?></span>
              </li> 
              <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                <div>
                  <strong>Total TTC</strong>
                </div>
                <span><strong><?php echo moneyformat($_SESSION['caddie']['total_prix_caddie']);?></strong></span>
              </li>
            </ul>          
            <button type="submit" class="btn btn-primary btn-lg btn-block">
              Paiement
            </button>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>