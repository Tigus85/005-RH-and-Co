<?php
session_start();




//fonction de verification adressse mail
function sanitizeEmail(string $mail){
	$email = trim($mail);
	$email = filter_var($mail, FILTER_VALIDATE_EMAIL);
	return $mail;
}
$today = date("d/m/Y",$_SERVER['REQUEST_TIME']); // retour la date sous format 01/01/2000
$information = []; // variable qui stock l'ensemble du post 

// verification de saisie users
foreach($_POST as $key => $value){
$information[$key] = htmlspecialchars($value);
}


// verifier si l'information dest_civilite

if(empty($information["dest_civilite"])){
  $information["dest_civilite"] = "";
}

$_SESSION['information'] = $information; // stock dans la variable $_SESSION




// gestion des emploies 
$emploies = [
  ($information["emploies1"]),
  ($information["emploies2"]),
  ($information["emploies3"]),
  ($information["emploies4"]),
  ($information["emploies5"])
];
rsort($emploies);
$count = 0 ; // variable pour compter le nombre de champs vide dans $emploies
for($i = 0 ; $i < count($emploies) ; $i++){
  if(empty($emploies[$i])){
    
    $count++;
  }
}
array_splice($emploies , -$count);
sort($emploies);



?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style/renderstyle.css">
  <title>Render</title>
</head>
<body>
  <h1> Contenu de la lettre : </h1>
  <section>
    <div class="marginBottom flexStart">
      <div> <?= $information["name"] ?> <?= $information["firstname"] ?>  </div>
      <div> <?= $information["address"] ?>  </div>
      <div> <?= $information["postal_code"] ?>  / <?= $information["town"] ?> </div>
      <div> <?= $information["telephone"] ?>  </div>
      <div> <?= sanitizeEmail($information["email"]) ?> </div>
    </div>
    <div class="marginBottom flexEnd">
      <div> <?= $information["dest_civilite"] ?> <?= $information["dest_name"] ?> <?= $information["dest_firstname"] ?>  </div>
      <div> <?= $information["dest_raison_sociale"] ?> </div>
      <div> <?= $information["dest_adresse"] ?> </div>
      <div> <?= $information["dest_postal_code"] ?> / <?= $information["dest_town"] ?> </div>
    </div>
    <div class="marginBottom flexEnd"> Fait à <?= $information["dest_town"] ?>  , le <?= $today ?> .  </div>
    <div class="marginBottom flexStart"> PJ : Curriculum Vitae </div>
    <div class="flexStart"> Objet : Candidature au poste de <?= $information["post_vise"] ?> </div>
    <div class="marginBottom flexStart"> <?= $information["dest_civilite"] ?> </div>
    <p class="flexStart"> Etant actuellement à la recherche d’un emploi, je me permets de vous proposer ma candidature au poste de <?= $information["post_vise"] ?>. </p>
    <p class="flexStart">En effet, mon profil correspond à la description recherchée sur l’offre d’emploi <?= $information["ref_offre"] ?>.</p>

    <?php if(count($emploies) < 2){

    ?>


    <!-- (Si le candidat possède peu d’expérience professionnelle) :  -->

    <p class="flexStart"> Ma formation en <?= $information["ma_formation"] ?> m'a permis d'acquérir de nombreuses compétences parmi celles que vous recherchez. Je possède tous les atouts qui me permettront de réussir dans le rôle que vous voudrez bien me confier. Motivation, rigueur et écoute sont les maîtres mots de mon comportement professionnel. </p>
    <?php } else { ?>
    <!-- (Si le candidat possède une expérience significative dans le poste à pourvoir) -->

    <p class="flexStart"> Mon expérience en tant que 
      <?php foreach($emploies as $emploie){
        echo $emploie . ", ";
    } ?>m’a permis d’acquérir toutes les connaissances nécessaires à la bonne exécution des tâches du poste à pourvoir. Régulièrement confronté aux aléas du métier, je suis capable de répondre aux imprévus en toute autonomie.</p>
     <?php } ?>

    <p class="flexStart">Intégrer votre entreprise, représente pour moi un réel enjeu d’avenir dans lequel mon travail et mon honnêteté pourront s’exprimer pleinement.</p>
    <p class="marginBottom flexStart">Restant à votre disposition pour toute information complémentaire, je suis disponible pour vous rencontrer lors d’un entretien à votre convenance.</p>

    <div class="marginBottom flexStart">Veuillez agréer, <?= $information["dest_civilite"] ?>  l’expression de mes sincères salutations.</div>

    <div class="flexStart">Signature</div>
  </section>
  
    <button id="return_btn"> <a href="index.php">Retour en arriere </a> </button>

</body>
</html>