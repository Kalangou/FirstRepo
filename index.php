<?php

include('Personne.php');
include('PersonneManager.php');

//Utilisation du constructeur sans parametre
/*$perso = new Personne();
$perso->setId(1);
$perso->setNom('Oumarou');
$perso->setPrenom('Mahamadou');
$perso->setAge(25);*/

//Utilisation de la fonction d'hydratation
$perso = new Personne([
    'id' => 2,
    'nom' => 'Abdou',
    'prenom' => 'Mahamane',
    'age' => 25
]);

$db = new PDO('mysql:host=localhost;dbname=php_poo', 'root', '');
$manager = new PersonneManager($db);
$manager->add($perso);
$perso = array($manager->getList());
foreach($perso as $value)
{
    echo "\n".$key.": ".$value;
}

/*$statu = $manager->add($perso);

if($statu > 1)
    echo 'OK';
else
    echo "NOT OK";
*/
?>