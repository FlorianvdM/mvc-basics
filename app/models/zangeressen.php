<?php

class zangeressen
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllZangeressen()
    {
        // Voeg Id toe aan de SELECT zodat de delete-knop werkt
        $sql = 'SELECT  Id
                       ,Naam
                       ,NettoWaarde
                       ,Land
                       ,Leeftijd
                       ,BekendsteNummer
                       ,Debuutjaar as Debuut
                FROM    zangeressen
                ORDER BY NettoWaarde DESC';

        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function delete($Id)
    {
        $sql = "DELETE FROM zangeressen 
                WHERE Id = :Id";

        $this->db->query($sql);
        $this->db->bind(':Id', $Id, PDO::PARAM_INT);

        return $this->db->execute();
    }
}