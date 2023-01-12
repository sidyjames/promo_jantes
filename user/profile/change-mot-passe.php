<div class="container">
    <div class="contentDiv text-center">

        <div class="text-left">
        <p><a href="mon-compte">Mon compte</a> / <a href="changer-mot-passe">Changer de mot de passe</a></p>
        </div>
        <div class="col-12 d-flex justify-content-center">
            <form>
                <div class="form-group">
                    <label for="ancienMdp">Ancien mot de passe</label>
                    <input type="password" class="form-control" name="ancienMdp" id="ancienMdp" placeholder="Ancien mot de passe" required>
                </div>
                <div class="form-group">
                    <label for="nouveauMdp">Nouveau mot de passe</label>
                    <input type="password" onkeyup="isGood(this.value)" minlength="8" maxlength="20" class="form-control" name="nouveauMdp" id="nouveauMdp" placeholder="Nouveau mot de passe" required>
                    <small class="help-block" id="password-text"></small>
                </div>
                <div class="form-group">
                    <label for="nouveauMdpConfirm">Nouveau mot de passe pour confirmation</label>
                    <input type="password" class="form-control" onkeyup="CheckNewmdp(this.value)" name="nouveauMdpConfirm" id="nouveauMdpConfirm" placeholder="Nouveau mot de passe" required>
                    <small class="help-block" id="confirm_password-text"></small>
                </div>
                <button type="submit" class="btn btn-primary" id="btn_changeMdp" disabled>Changer</button>
            </form>
        </div>
    </div>
</div>        
<script>
    function CheckNewmdp(password){
        // console.log(document.getElementById("nouveauMdp").value)
        if(document.getElementById("nouveauMdp").value!=password){
            document.getElementById("confirm_password-text").innerHTML="Les mots de passe ne sont pas similaire."
            document.getElementById("confirm_password-text").classList.add("text-danger")
            document.getElementById("confirm_password-text").classList.remove("text-success")
            document.getElementById("btn_changeMdp").setAttribute('disabled','disabled')
        }else{
            document.getElementById("confirm_password-text").innerHTML="Les mots de passe sont similaire."
            document.getElementById("confirm_password-text").classList.add("text-success")
            document.getElementById("confirm_password-text").classList.remove("text-danger")
            if(password.length>=8){
                document.getElementById("btn_changeMdp").removeAttribute('disabled')
            }
        }
    }
  function isGood(password) {
      var password_strength = document.getElementById("password-text");

      //TextBox left blank.
      if (password.length == 0) {
        password_strength.innerHTML = "";
        return;
      }

      //Regular Expressions.
      var regex = new Array();
      regex.push("[A-Z]"); //Uppercase Alphabet.
      regex.push("[a-z]"); //Lowercase Alphabet.
      regex.push("[0-9]"); //Digit.
      regex.push("[$@$!%*#?&]"); //Special Character.

      var passed = 0;

      //Validate for each Regular Expression.
      for (var i = 0; i < regex.length; i++) {
        if (new RegExp(regex[i]).test(password)) {
          passed++;
        }
      }

      //Display status.
      var strength = "";
      switch (passed) {
        case 0:
        case 1:
        case 2:
          strength = "<small class='progress-bar bg-danger' style='width: 40%'>Faible</small>";
          break; 
        case 3:
          if(password.length>=4 && password.length<8){
            strength = "<small class='progress-bar bg-warning' style='width: 60%'>Moyen</small>";
          }
          break;
        case 4:
          if(password.length>=8){
            strength = "<small class='progress-bar bg-success' style='width: 100%'>Fort</small>";
          }
          break;

      }
      password_strength.innerHTML = strength;

    }
</script>