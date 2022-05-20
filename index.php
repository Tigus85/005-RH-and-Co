<?php

session_start();

$informations = [];

if(empty($_SESSION)){
  echo "machin";
  $informations = [
    "name" => "",
    "firstname" => "",
    "address" => "",
    "postal_code" => "",
    "town" => "",
    "telephone" => "",
    "email" => "",
    "ma_formation" => "",
    "emploies1" => "",
    "emploies2" => "",
    "emploies3" => "",
    "emploies4" => "",
    "emploies5" => "",
    "dest_civilite" => "",
    "dest_name" => "",
    "dest_firstname" => "",
    "dest_raison_sociale" => "",
    "dest_adresse" => "",
    "dest_postal_code" => "",
    "dest_town" => "",
    "post_vise" => "",
    "ref_offre" => ""
  ];

} else {
  echo "test";
  foreach($_SESSION["information"] as $keyinfo => $information){
    $informations[$keyinfo] = $information;
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
            <input type="text" name="name" id="name" value= <?= $informations["name"]  ?>  >
          </div>
          <div>
            <label for="firstname"> Prénom</label>
            <input type="text" name="firstname" id="firstname" value= <?= $informations["firstname"] ?>  >
          </div>
          <div>
            <label for="address"> Adresse</label>
            <input type="text" name="address" id="address" value= <?= $informations["address"]  ?> >
          </div>
          <div>
            <label for="postal_code"> Code postal</label>
            <input type="number" name="postal_code" id="postal_code" value= <?= $informations["postal_code"]  ?>   >
          </div>
          <div>
            <label for="town"> Ville</label>
            <input type="text" name="town" id="town" value= <?= $informations["town"]  ?>  >
          </div>
          <div>
            <label for="telephone"> Télephone</label>
            <input type="number" name="telephone" id="telephone" value= <?= $informations["telephone"] ?>   >
          </div>
          <div>
            <label for="email"> Email</label>
            <input type="email" name="email" id="email" value= <?= $informations["email"]  ?> >
          </div>
          <div>
            <label for="ma_formation"> Ma formation</label>
            <input type="text" name="ma_formation" id="ma_formation" value= <?= $informations["ma_formation"]  ?> >
          </div>
          <div>
            <label for="mes_emploies"> Mes emploies</label>
            <input type="text" name="emploies1" id="emploies1" value= <?= $informations["emploies1"]  ?>  >
            <input type="text" name="emploies2" id="emploies2" value= <?= $informations["emploies2"]  ?> >
            <input type="text" name="emploies3" id="emploies3" value= <?= $informations["emploies3"]  ?> >
            <input type="text" name="emploies4" id="emploies4" value= <?= $informations["emploies4"]  ?> >
            <input type="text" name="emploies5" id="emploies5" value= <?= $informations["emploies5"]  ?> >
          </div>
        </div>
        <div class="targetInformations card">
          <h2>Information entreprises cible</h2>
          <div>
            <label for="dest_civilite"> Civilité </label>
            <div id="radio">
              <div>
                <input type="radio" name="dest_civilite" id="mister" value="M"
                 <?php
                 if(!empty($informations["dest_civilite"])){
                   ($informations["dest_civilite"] !== "M") ? "" : "checked" ;
                 }
                   ?> >
                <label for="mister">M</label>
              </div>
              <div>
                <input type="radio" name="dest_civilite" id="madame" value="Mme" 
                <?php
                 if(!empty($informations["dest_civilite"])){
                   ($informations["dest_civilite"] !== "Mme") ? "" : "checked" ;
                 }
                   ?> >
                <label for="madame">Mme</label>
              </div>
              <div>
                <input type="radio" name="dest_civilite" id="miss" value="Mlle" 
                <?php
                 if(!empty($informations["dest_civilite"])){
                   ($informations["dest_civilite"] !== "Mlle") ? "" : "checked" ;
                 }
                   ?> >
                <label for="miss">Mlle</label>
              </div>
            </div>
          </div>
          <div>
            <label for="dest_name"> Nom</label>
            <input type="text" name="dest_name" id="dest_name" value= <?= $informations["dest_name"]  ?> >
          </div>
          <div>
            <label for="dest_firstname"> Prénom</label>
            <input type="text" name="dest_firstname" id="dest_firstname" value= <?= $informations["dest_firstname"]  ?>  >
          </div>
          <div>
            <label for="dest_raison_sociale"> Raison Sociale</label>
            <input type="text" name="dest_raison_sociale" id="dest_raison_sociale" value= <?= $informations["dest_raison_sociale"] ?>  >
          </div>
          <div>
            <label for="dest_adresse"> Adresse</label>
            <input type="text" name="dest_adresse" id="dest_adresse" value= <?= $informations["dest_adresse"] ?>   >
          </div>
          <div>
            <label for="dest_postal_code"> Code postal</label>
            <input type="number" name="dest_postal_code" id="dest_postal_code" value= <?= $informations["dest_postal_code"]  ?>   >
          </div>
          <div>
            <label for="dest_town"> Ville</label>
            <input type="text" name="dest_town" id="dest_town" value= <?= $informations["dest_town"] ?>   >
          </div>
          <div>
            <label for="post_vise"> Poste visée</label>
            <input type="text" name="post_vise" id="post_vise" value= <?= $informations["post_vise"]  ?> >
          </div>
          <div>
            <label for="ref_offre">Référence offre d'emploi</label> 
            <input type="text" name="ref_offre" id="ref_offre" value= <?= $informations["ref_offre"] ?>  >
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

