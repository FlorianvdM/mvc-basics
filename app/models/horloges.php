<?php

class horloges
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllHorloges()
    {
        // Voeg de ontbrekende kolom toe aan de SELECT
        $sql = 'SELECT Id, 
                       Merk, 
                       Model, 
                       Prijs, 
                       Type, 
                       Materiaal,
                       UniekKenmerk 
                FROM Horloges 
                ORDER BY Prijs DESC';
        
        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function delete($Id)
    {
        $sql = "DELETE FROM Horloges WHERE Id = :Id";
        $this->db->query($sql);
        $this->db->bind(':Id', $Id, PDO::PARAM_INT);
        return $this->db->execute();
    }
}