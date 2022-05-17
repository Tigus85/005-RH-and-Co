<?php
session_start();

var_dump($_POST);


//fonction de verification de saisie 
function verifSaisie(string $saisie){
  if(isset($_POST["submit_btn"]) && !empty($saisie)){
    $saisie = htmlspecialchars($saisie);
    
  } else {

    $saisie = "";
    
  }
  return $saisie;
}
//fonction de verification adressse mail
function sanitizeEmail(string $mail){
	$email = trim($mail);
	$email = filter_var($mail, FILTER_VALIDATE_EMAIL);
	return $mail;
}


// Variables Personnels

$name = verifSaisie($_POST['name']);  
$firstname = verifSaisie($_POST['firstname']);
$address = verifSaisie($_POST['address']);
$postal_code = verifSaisie($_POST['postal_code']);
$town = verifSaisie($_POST['town']);
$telephone = verifSaisie($_POST['telephone']);
$email = sanitizeEmail($_POST['email']);
$ma_formation = verifSaisie($_POST['ma_formation']);


// creation du tableau $emploies
$emploies = [
  verifSaisie($_POST['emploies1']),
  verifSaisie($_POST['emploies2']),
  verifSaisie($_POST['emploies3']),
  verifSaisie($_POST['emploies4']),
  verifSaisie($_POST['emploies5'])
            ];



rsort($emploies);  // trie du tableau 

$countNoValue = 0; // variables comptable du tableau
// compte le nombre de champs vide 
for($i=0 ; $i<count($emploies); $i++) {
  if ($emploies[$i] === ''){
    $countNoValue++;
  }
}
// suprime les champs vide 
if($countNoValue > 0){
  array_splice($emploies,-$countNoValue);
} 




// variables Destinataires

$dest_civilite = verifSaisie($_POST['dest_civilite']); 
$dest_name = verifSaisie($_POST['dest_name']); 
$dest_firstname = verifSaisie($_POST['dest_firstname']); 
$dest_raison_sociale = verifSaisie($_POST['dest_raison_sociale']); 
$dest_adresse = verifSaisie($_POST['dest_adresse']); 
$dest_postal_code = verifSaisie($_POST['dest_postal_code']); 
$dest_town = verifSaisie($_POST['dest_town']); 
$post_vise = verifSaisie($_POST['post_vise']); 
$ref_offre= verifSaisie($_POST['ref_offre']); 
$today = date( "d/m/Y" ,$_SERVER['REQUEST_TIME']);




// stockage des variables dans les variables SESSION
$_SESSION["name"] =  $name ;
$_SESSION["firstname"] =  $firstname ;
$_SESSION["address"] =  $address ;
$_SESSION["postal_code"] =  $postal_code ;
$_SESSION["town"] =  $town ;
$_SESSION["telephone"] = $telephone ;
$_SESSION["email"] = $email ;
$_SESSION["ma_formation"] =  $ma_formation ;
$_SESSION["emploies"] =  $emploies ;

$_SESSION["dest_civilite"] =  $dest_civilite ;
$_SESSION["dest_name"] =  $dest_name ;
$_SESSION["dest_firstname"] =  $dest_firstname ;
$_SESSION["dest_raison_sociale"] =  $dest_raison_sociale ;
$_SESSION["dest_postal_code"] =  $dest_postal_code ;
$_SESSION["dest_town"] =  $dest_town ;
$_SESSION["post_vise"] =  $post_vise ;
$_SESSION["ref_offre"] =  $ref_offre ;




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
      <div> <?= $name ?> <?= $firstname ?>  </div>
      <div> <?= $address ?>  </div>
      <div> <?= $postal_code ?>  / <?= $town ?> </div>
      <div> <?= $telephone ?>  </div>
      <div> <?= $email ?> </div>
    </div>
    <div class="marginBottom flexEnd">
      <div> <?= $dest_civilite ?> <?= $dest_name ?> <?= $dest_firstname ?>  </div>
      <div> <?= $dest_raison_sociale ?> </div>
      <div> <?= $dest_adresse ?> </div>
      <div> <?= $dest_postal_code ?> / <?= $dest_town ?> </div>
    </div>
    <div class="marginBottom flexEnd"> Fait à <?= $dest_town ?>  , le <?= $today ?> .  </div>
    <div class="marginBottom flexStart"> PJ : Curriculum Vitae </div>
    <div class="flexStart"> Objet : Candidature au poste de <?= $post_vise ?> </div>
    <div class="marginBottom flexStart"> <?= $dest_civilite ?> </div>
    <p class="flexStart"> Etant actuellement à la recherche d’un emploi, je me permets de vous proposer ma candidature au poste de <?= $post_vise ?>. </p>
    <p class="flexStart">En effet, mon profil correspond à la description recherchée sur l’offre d’emploi <?= $ref_offre ?>.</p>

    <?php if(count($emploies) < 2){

    ?>


    <!-- (Si le candidat possède peu d’expérience professionnelle) :  -->

    <p class="flexStart"> Ma formation en <?= $ma_formation ?> m'a permis d'acquérir de nombreuses compétences parmi celles que vous recherchez. Je possède tous les atouts qui me permettront de réussir dans le rôle que vous voudrez bien me confier. Motivation, rigueur et écoute sont les maîtres mots de mon comportement professionnel. </p>
    <?php } else { ?>
    <!-- (Si le candidat possède une expérience significative dans le poste à pourvoir) -->

    <p class="flexStart"> Mon expérience en tant que 
      <?php foreach($emploies as $emploie){
        echo $emploie . ", ";
    } ?>m’a permis d’acquérir toutes les connaissances nécessaires à la bonne exécution des tâches du poste à pourvoir. Régulièrement confronté aux aléas du métier, je suis capable de répondre aux imprévus en toute autonomie.</p>
     <?php } ?>

    <p class="flexStart">Intégrer votre entreprise, représente pour moi un réel enjeu d’avenir dans lequel mon travail et mon honnêteté pourront s’exprimer pleinement.</p>
    <p class="marginBottom flexStart">Restant à votre disposition pour toute information complémentaire, je suis disponible pour vous rencontrer lors d’un entretien à votre convenance.</p>

    <div class="marginBottom flexStart">Veuillez agréer, <?= $dest_civilite ?>  l’expression de mes sincères salutations.</div>

    <div class="flexStart">Signature</div>
  </section>
  <form action="index.php">
    <button id="return_btn"> Retour en arriere </button>
  </form> 
</body>
</html>