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

    public function create($data)
    {
        $sql = "INSERT INTO zangeressen (  Naam
                                            ,NettoWaarde
                                            ,Land
                                            ,Leeftijd
                                            ,BekendsteNummer
                                            ,Debuutjaar
                                            )
                VALUES (:Naam,
                        :NettoWaarde,
                        :Land,
                        :Leeftijd,
                        :BekendsteNummer,
                        :Debuut)";

        $this->db->query($sql);
        $this->db->bind(':Naam', $data['naam'], PDO::PARAM_STR);
        $this->db->bind(':NettoWaarde', $data['netto_waarde'], PDO::PARAM_STR);
        $this->db->bind(':Land', $data['land'], PDO::PARAM_STR);
        $this->db->bind(':Leeftijd', $data['leeftijd'], PDO::PARAM_INT);
        $this->db->bind(':BekendsteNummer', $data['bekendste_nummer'], PDO::PARAM_STR);
        $this->db->bind(':Debuut', $data['debuutjaar'], PDO::PARAM_INT);
        return $this->db->execute();
    }
}