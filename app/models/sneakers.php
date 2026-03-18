<?php

class sneakers // Veranderd van 'Sneaker' naar 'sneakers'
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllSneakers()
    {
        // Alle kolommen ophalen die je in de View gebruikt
        $sql = 'SELECT Id, 
                       Merk, 
                       Model, 
                       Type, 
                       Prijs, 
                       Materiaal, 
                       Gewicht, 
                       Releasedatum 
                FROM   Sneakers 
                ORDER BY Merk ASC';
                
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
        $sql = "INSERT INTO Sneakers (  Merk
                                            ,Model
                                            ,Type
                                            ,Prijs
                                            ,Materiaal
                                            ,Gewicht
                                            ,Releasedatum
                                            )
                VALUES (:Merk,
                        :Model,
                        :Type,
                        :Prijs,
                        :Materiaal,
                        :Gewicht,
                        :Releasedatum)";

        $this->db->query($sql);
        $this->db->bind(':Merk', $data['merk'], PDO::PARAM_STR);
        $this->db->bind(':Model', $data['model'], PDO::PARAM_STR);
        $this->db->bind(':Type', $data['type'], PDO::PARAM_STR);
        $this->db->bind(':Prijs', $data['prijs'], PDO::PARAM_STR);
        $this->db->bind(':Materiaal', $data['materiaal'], PDO::PARAM_STR);
        $this->db->bind(':Gewicht', $data['gewicht'], PDO::PARAM_STR);
        $this->db->bind(':Releasedatum', $data['releasedatum'], PDO::PARAM_STR);
        return $this->db->execute();
    }
}
