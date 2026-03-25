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
        $sql = "DELETE FROM zangeressen WHERE Id = :Id";
        $this->db->query($sql);
        $this->db->bind(':Id', $Id, PDO::PARAM_INT);
        return $this->db->execute();
    }

    public function create($data)
    {
        $sql = "INSERT INTO zangeressen (Naam, NettoWaarde, Land, Leeftijd, BekendsteNummer, Debuutjaar)
                VALUES (:naam, :waarde, :land, :leeftijd, :nummer, :jaar)";

        $this->db->query($sql);
        $this->db->bind(':naam',     $data['naam'],     PDO::PARAM_STR);
        $this->db->bind(':waarde',   $data['waarde'],   PDO::PARAM_INT);
        $this->db->bind(':land',     $data['land'],     PDO::PARAM_STR);
        $this->db->bind(':leeftijd', $data['leeftijd'], PDO::PARAM_INT);
        $this->db->bind(':nummer',   $data['nummer'],   PDO::PARAM_STR);
        $this->db->bind(':jaar',     $data['jaar'],     PDO::PARAM_INT);
        return $this->db->execute();
    }

    public function getZangeresById($id)
    {
        $sql = 'SELECT Id, Naam, NettoWaarde, Land, Leeftijd, BekendsteNummer, Debuutjaar
                FROM   zangeressen
                WHERE  Id = :id';

        $this->db->query($sql);
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->single();
    }

    public function updateZangeres($data)
    {
        $sql = "UPDATE zangeressen
                SET    Naam            = :naam
                      ,NettoWaarde     = :waarde
                      ,Land            = :land
                      ,Leeftijd        = :leeftijd
                      ,BekendsteNummer = :nummer
                      ,Debuutjaar      = :jaar
                WHERE  Id = :id";

        $this->db->query($sql);
        $this->db->bind(':id',       $data['id'],       PDO::PARAM_INT);
        $this->db->bind(':naam',     $data['naam'],     PDO::PARAM_STR);
        $this->db->bind(':waarde',   $data['waarde'],   PDO::PARAM_INT);
        $this->db->bind(':land',     $data['land'],     PDO::PARAM_STR);
        $this->db->bind(':leeftijd', $data['leeftijd'], PDO::PARAM_INT);
        $this->db->bind(':nummer',   $data['nummer'],   PDO::PARAM_STR);
        $this->db->bind(':jaar',     $data['jaar'],     PDO::PARAM_INT);
        return $this->db->execute();
    }
}