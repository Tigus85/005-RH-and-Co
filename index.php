<?php

session_start();
var_dump($_SESSION);

function verifIsset ($verif){
  if(isset($verif)){
    
  }
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style/indexstyle.css">
  <title>RH and Co</title>
</head>
<body>
  <main>
    <div id="title">
      <h1> Formulaire </h1>
    </div>
    <form action="render.php" method="post">
      <div id="containeur">
        <div class="informations card">
          <h2>Mes informations</h2>
          <div>
            <label for="name"> Nom</label>
            <input type="text" name="name" id="name" value=<?= $_SESSION["name"] ?> >
          </div>
          <div>
            <label for="firstname"> Prénom</label>
            <input type="text" name="firstname" id="firstname" value=<?= $_SESSION["firstname"] ?> >
          </div>
          <div>
            <label for="address"> Adresse</label>
            <input type="text" name="address" id="address" value= <?= $_SESSION["address"] ?> >
          </div>
          <div>
            <label for="postal_code"> Code postal</label>
            <input type="number" name="postal_code" id="postal_code" value="01100">
          </div>
          <div>
            <label for="town"> Ville</label>
            <input type="text" name="town" id="town" value="weshland">
          </div>
          <div>
            <label for="telephone"> Télephone</label>
            <input type="number" name="telephone" id="telephone" value="0123456789">
          </div>
          <div>
            <label for="email"> Email</label>
            <input type="email" name="email" id="email" value="troudu@gmail.com">
          </div>
          <div>
            <label for="ma_formation"> Ma formation</label>
            <input type="text" name="ma_formation" id="ma_formation" value="ma_formation">
          </div>
          <div>
            <label for="mes_emploies"> Mes emploies</label>
            <input type="text" name="emploies1" id="emploies1" value="weshland01" >
            <input type="text" name="emploies2" id="emploies2" value="weshland02" >
            <input type="text" name="emploies3" id="emploies3" value="weshland03" >
            <input type="text" name="emploies4" id="emploies4" value="weshland04" >
            <input type="text" name="emploies5" id="emploies5" value="weshland05" >
          </div>
        </div>
        <div class="targetInformations card">
          <h2>Information entreprises cible</h2>
          <div>
            <label for="dest_civilite"> Civilité </label>
            <div id="radio">
              <div>
                <input type="radio" name="dest_civilite" id="mister" value="M">
                <label for="mister">M</label>
              </div>
              <div>
                <input type="radio" name="dest_civilite" id="madame" value="Mme" checked>
                <label for="madame">Mme</label>
              </div>
              <div>
                <input type="radio" name="dest_civilite" id="miss" value="Mlle">
                <label for="miss">Mlle</label>
              </div>
            </div>
          </div>
          <div>
            <label for="dest_name"> Nom</label>
            <input type="text" name="dest_name" id="dest_name" value="Delacroix">
          </div>
          <div>
            <label for="dest_firstname"> Adresse</label>
            <input type="text" name="dest_firstname" id="dest_firstname" value="Jules">
          </div>
          <div>
            <label for="dest_raison_sociale"> Raison Sociale</label>
            <input type="text" name="dest_raison_sociale" id="dest_raison_sociale" value="EURL">
          </div>
          <div>
            <label for="dest_adresse"> Adresse</label>
            <input type="text" name="dest_adresse" id="dest_adresse" value="25 rue mes couilles">
          </div>
          <div>
            <label for="dest_postal_code"> Code postal</label>
            <input type="number" name="dest_postal_code" id="dest_postal_code" value="99100">
          </div>
          <div>
            <label for="dest_town"> Ville</label>
            <input type="text" name="dest_town" id="dest_town" value="blablaland">
          </div>
          <div>
            <label for="post_vise"> Poste visée</label>
            <input type="text" name="post_vise" id="post_vise" value="truc machin">
          </div>
          <div>
            <label for="ref_offre">Référence offre d'emploi</label>
            <input type="text" name="ref_offre" id="ref_offre" value="22ref154dde">
          </div>
        </div>
      </div>
      <div class="btnInput">
        <button class="reset" type="reset" value="Reset">Reset</button>
        <button class="submit" type="submit" name ="submit_btn" value="Validation">Validation</button>
 
      </div>
    </form>
  </main>
</body>
</html>