<?php

class Personne
{
    private $_id;
    private $_nom;
    private $_prenom;
    private $_age;


    // Constructeur avec parametres
    /*public function __construct($id, $nom, $prenom, $age) {
        $this->_id = $id;
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_age = $age;
    }*/

    public function __construct(array $donnees) {
        foreach($donnees as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if(method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    // Getters et Setters
    public function setId($id) { $this->_id = $id; }
    public function getid() { return $this->_id; }

    public function setNom($nom) { $this->_nom = $nom; }
    public function getNom() { return $this->_nom; }

    public function setPrenom($prenom) { $this->_prenom = $prenom; }
    public function getPrenom() { return $this->_prenom; }

    public function setAge($age) { $this->_age = $age; }
    public function getAge() { return $this->_age; }

}

?>