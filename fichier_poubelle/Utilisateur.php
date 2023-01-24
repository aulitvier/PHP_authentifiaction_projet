<?php

class Utilisateur {
    private string $nom, $prenom, $pseudo, $mot_de_passe, $mail;
    private int $age;
    private bool $administrateur;

    public function __construct($nom, $prenom, $pseudo, $mot_de_passe, $mail, $age, $administrateur) {
        $this->nom            = $nom;
        $this->prenom         = $prenom;
        $this->pseudo         = $pseudo;
        $this->mot_de_passe   = $mot_de_passe;
        $this->mail           = $mail;
        $this->age            = $age;
        $this->administrateur = $administrateur;
    }

   public function setNom($nom) {
    $this->nom = $nom;
   }
   public function setPrenom($prenom) {
    $this->prenom = $prenom;
   }
   public function setPseudo($pseudo) {
    $this->pseudo = $pseudo;
   }
   public function setMotDePasse($mot_de_passe) {
    $this->mot_de_passe = $mot_de_passe;
   }
   public function setMail($mail) {
    $this->mail = $mail;
   }
   public function setAge($age) {
    $this->age = $age;
   }
   public function setAdministrateur($administrateur) {
    $this->administrateur = $administrateur;
   }
   public function getNom() {
    return $this->nom;
   }
   public function getPrenom() {
    return $this->prenom;
   }
   public function getPseudo() {
    return $this->pseudo;
   }
   public function getMotDePasse() {
    $this->mot_de_passe;
   }
   public function getMail() {
    return $this->mail;
   }
   public function getAge() {
    return $this->age;
   }
   public function getAdministrateur() {
    return $this->administrateur;
   }
}