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
        $sql = "DELETE 
                FROM Horloges 
                WHERE Id = :Id";

        $this->db->query($sql);
        $this->db->bind(':Id', $Id, PDO::PARAM_INT);
        return $this->db->execute();
    }

    public function create($data)
    {
        $sql = "INSERT INTO Horloges (  Merk
                                            ,Model
                                            ,Prijs
                                            ,Materiaal
                                            ,Type
                                            ,UniekKenmerk
                                            )
                VALUES (:Merk,
                        :Model,
                        :Prijs,
                        :Materiaal,
                        :Type,
                        :UniekKenmerk)";

        $this->db->query($sql);
        $this->db->bind(':Merk', $data['merk'], PDO::PARAM_STR);
        $this->db->bind(':Model', $data['model'], PDO::PARAM_STR);
        $this->db->bind(':Prijs', $data['prijs'], PDO::PARAM_STR);
        $this->db->bind(':Materiaal', $data['materiaal'], PDO::PARAM_STR);
        $this->db->bind(':Type', $data['type'], PDO::PARAM_STR);
        $this->db->bind(':UniekKenmerk', $data['uniek_kenmerk'], PDO::PARAM_STR);
        
        return $this->db->execute();

    }

    public function getHorlogeById($Id)
    {
        $sql = "SELECT SMPS.Id, 
                        SMPS.Merk, 
                        SMPS.Model, 
                        SMPS.Prijs, 
                        SMPS.Type, 
                        SMPS.Materiaal,
                        SMPS.UniekKenmerk 
                FROM Horloges as SMPS
                WHERE SMPS.Id = :Id";

        $this->db->query($sql);
        $this->db->bind(':Id', $Id, PDO::PARAM_INT);

        return $this->db->single();
    }

    public function update($data)
    {
        $sql = "UPDATE Horloges as SMPS
                SET SMPS.Merk = :Merk,
                    SMPS.Model = :Model,
                    SMPS.Prijs = :Prijs,
                    SMPS.Materiaal = :Materiaal,
                    SMPS.Type = :Type,
                    SMPS.UniekKenmerk = :UniekKenmerk
                WHERE SMPS.Id = :Id";

        $this->db->query($sql);
        $this->db->bind(':Id', $data['Id'], PDO::PARAM_INT);
        $this->db->bind(':Merk', $data['merk'], PDO::PARAM_STR);
        $this->db->bind(':Model', $data['model'], PDO::PARAM_STR);
        $this->db->bind(':Prijs', $data['prijs'], PDO::PARAM_STR);
        $this->db->bind(':Materiaal', $data['materiaal'], PDO::PARAM_STR);
        $this->db->bind(':Type', $data['type'], PDO::PARAM_STR);
        $this->db->bind(':UniekKenmerk', $data['uniek_kenmerk'], PDO::PARAM_STR);
        
        return $this->db->execute();
    }
}