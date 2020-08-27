<?php

//include('Personne.php');

class PersonneManager
{
    private $_db;

    /**
     * Construction d'initialisation de la base de données
     *
     * @param [type] $db
     */
    public function __construct($db) {
        $this->setDB($db);
    }

    /**
     * Fonction pour ajouter un personnage
     *
     * @param Personne $personne
     * @return void
     */
    public function add(Personne $personne)
    {
        $sql = $this->_db->prepare('INSERT INTO personne (id, nom, prenom, age) VALUES (:id, :nom, :prenom, :age)');
        $sql->bindValue(':id', $personne->getid(), PDO::PARAM_INT);
        $sql->bindValue(':nom', $personne->getNom());
        $sql->bindValue(':prenom', $personne->getPrenom());
        $sql->bindValue(':age', $personne->getAge(), PDO::PARAM_INT);
        
        $sql->execute();
    }

    /**
     * Fonction pour obtenir les informations d'un personnage
     *
     * @param [type] $id
     * @return void
     */
    public function get($id)
    {
        $id = (int)$id;
        $sql = $this->_db->prepare('SELECT * FROM personne WHERE id = '.$id);
        $donnees = $sql->fetch(PDO::FETCH_ASSOC);

        return new Personne($donnees);
    }

    /**
     * Fonction pour obtenir la liste des personnages 
     *
     * @return void
     */
    public function getList()
    {
        $persos = [];
        $sql = $this->_db->prepare('SELECT * FROM personne');
        while($donnees = $sql->fetch(PDO::FETCH_ASSOC))
        {
            $persos[] = new Personne($donnees);
        }

        return $persos;
    }

    public function update(Personne $personne)
    {
        $sql = $this->_db->prepare('UPDATE personne SET nom = :nom, prenom = :prenom, age = :age WHERE id = :id');
        
        $sql->bindValue(':nom', $personne->getNom());
        $sql->bindValue(':prenom', $personne->getPrenom());
        $sql->bindValue(':age', $personne->getAge(), PDO::PARAM_INT);
        $sql->bindValue(':id', $personne->getid(), PDO::PARAM_INT);

        $sql->execute();
    }


    public function delete(Personne $personne)
    {
        $sql = $this->_db->prepare('DELETE FROM personne WHERE id = '.$personne->getid());
        $sql->execute();
    }

    public function setDB($db)
    {
        $this->_db = $db;
    }

}

?>