<?php

class DadesFormulari
{

    private $nom;
    private $cognom;
    private $poblacio;
    private $email;
    private $contrasenya;
    private $tipus;


    function __construct($nom, $cognom, $poblacio, $email, $contrasenya, $tipus)
    {
        $this->nom = $nom;
        $this->cognom = $cognom;
        $this->poblacio = $poblacio;
        $this->email = $email;
        $this->contrasenya = $contrasenya;
        $this->tipus = $tipus;
    }

    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of cognom
     */
    public function getCognom()
    {
        return $this->cognom;
    }

    /**
     * Set the value of cognom
     *
     * @return  self
     */
    public function setCognom($cognom)
    {
        $this->cognom = $cognom;

        return $this;
    }

    /**
     * Get the value of poblacio
     */
    public function getPoblacio()
    {
        return $this->poblacio;
    }

    /**
     * Set the value of poblacio
     *
     * @return  self
     */
    public function setPoblacio($poblacio)
    {
        $this->poblacio = $poblacio;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of contrasenya
     */
    public function getContrasenya()
    {
        return $this->contrasenya;
    }

    /**
     * Set the value of contrasenya
     *
     * @return  self
     */
    public function setContrasenya($contrasenya)
    {
        $this->contrasenya = $contrasenya;

        return $this;
    }

    /**
     * Get the value of tipus
     */
    public function getTipus()
    {
        return $this->tipus;
    }

    /**
     * Set the value of tipus
     *
     * @return  self
     */
    public function setTipus($tipus)
    {
        $this->tipus = $tipus;

        return $this;
    }
}
