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
        $sql = 'SELECT Id, Merk, Model, Prijs, Type, Materiaal, UniekKenmerk
                FROM   Horloges
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

    public function create($data)
    {
        $sql = "INSERT INTO Horloges (Merk, Model, Prijs, Materiaal, Type, UniekKenmerk)
                VALUES (:merk, :model, :prijs, :materiaal, :type, :kenmerk)";

        $this->db->query($sql);
        $this->db->bind(':merk',      $data['merk'],      PDO::PARAM_STR);
        $this->db->bind(':model',     $data['model'],     PDO::PARAM_STR);
        $this->db->bind(':prijs',     $data['prijs'],     PDO::PARAM_STR);
        $this->db->bind(':materiaal', $data['materiaal'], PDO::PARAM_STR);
        $this->db->bind(':type',      $data['type'],      PDO::PARAM_STR);
        $this->db->bind(':kenmerk',   $data['kenmerk'],   PDO::PARAM_STR);
        return $this->db->execute();
    }

    public function getHorlogeById($id)
    {
        $sql = 'SELECT Id, Merk, Model, Prijs, Materiaal, Type, UniekKenmerk
                FROM   Horloges
                WHERE  Id = :id';

        $this->db->query($sql);
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->single();
    }

    public function updateHorloge($data)
    {
        $sql = "UPDATE Horloges
                SET    Merk         = :merk
                      ,Model        = :model
                      ,Prijs        = :prijs
                      ,Materiaal    = :materiaal
                      ,Type         = :type
                      ,UniekKenmerk = :kenmerk
                WHERE  Id = :id";

        $this->db->query($sql);
        $this->db->bind(':id',        $data['id'],        PDO::PARAM_INT);
        $this->db->bind(':merk',      $data['merk'],      PDO::PARAM_STR);
        $this->db->bind(':model',     $data['model'],     PDO::PARAM_STR);
        $this->db->bind(':prijs',     $data['prijs'],     PDO::PARAM_STR);
        $this->db->bind(':materiaal', $data['materiaal'], PDO::PARAM_STR);
        $this->db->bind(':type',      $data['type'],      PDO::PARAM_STR);
        $this->db->bind(':kenmerk',   $data['kenmerk'],   PDO::PARAM_STR);
        return $this->db->execute();
    }
}