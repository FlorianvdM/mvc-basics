<?php

class sneakers
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllSneakers()
    {
        $sql = 'SELECT Id,
                       Merk,
                       Model,
                       Type,
                       Prijs,
                       Materiaal,
                       Gewicht,
                       Releasedatum
                FROM   Sneakers
                ORDER BY Prijs DESC';

        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function delete($Id)
    {
        $sql = "DELETE FROM Sneakers WHERE Id = :Id";
        $this->db->query($sql);
        $this->db->bind(':Id', $Id, PDO::PARAM_INT);
        return $this->db->execute();
    }

    public function create($data)
    {
        $sql = "INSERT INTO Sneakers (Merk, Model, Type, Prijs, Materiaal, Gewicht, Releasedatum)
                VALUES (:merk, :model, :type, :prijs, :materiaal, :gewicht, :releasedatum)";

        $this->db->query($sql);
        $this->db->bind(':merk',         $data['merk'],         PDO::PARAM_STR);
        $this->db->bind(':model',        $data['model'],        PDO::PARAM_STR);
        $this->db->bind(':type',         $data['type'],         PDO::PARAM_STR);
        $this->db->bind(':prijs',        $data['prijs'],        PDO::PARAM_STR);
        $this->db->bind(':materiaal',    $data['materiaal'],    PDO::PARAM_STR);
        $this->db->bind(':gewicht',      $data['gewicht'],      PDO::PARAM_STR);
        $this->db->bind(':releasedatum', $data['releasedatum'], PDO::PARAM_STR);
        return $this->db->execute();
    }

    public function getSneakerById($id)
    {
        $sql = 'SELECT Id, Merk, Model, Type, Prijs, Materiaal, Gewicht,
                       DATE_FORMAT(Releasedatum, "%Y-%m-%d") as Releasedatum
                FROM   Sneakers
                WHERE  Id = :id';

        $this->db->query($sql);
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->single();
    }

    public function updateSneaker($data)
    {
        $sql = "UPDATE Sneakers
                SET    Merk         = :merk
                      ,Model        = :model
                      ,Type         = :type
                      ,Prijs        = :prijs
                      ,Materiaal    = :materiaal
                      ,Gewicht      = :gewicht
                      ,Releasedatum = :releasedatum
                WHERE  Id = :id";

        $this->db->query($sql);
        $this->db->bind(':id',           $data['id'],           PDO::PARAM_INT);
        $this->db->bind(':merk',         $data['merk'],         PDO::PARAM_STR);
        $this->db->bind(':model',        $data['model'],        PDO::PARAM_STR);
        $this->db->bind(':type',         $data['type'],         PDO::PARAM_STR);
        $this->db->bind(':prijs',        $data['prijs'],        PDO::PARAM_STR);
        $this->db->bind(':materiaal',    $data['materiaal'],    PDO::PARAM_STR);
        $this->db->bind(':gewicht',      $data['gewicht'],      PDO::PARAM_STR);
        $this->db->bind(':releasedatum', $data['releasedatum'], PDO::PARAM_STR);
        return $this->db->execute();
    }
}