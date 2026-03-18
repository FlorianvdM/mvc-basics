<?php

class Smartphone
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllSmartphones()
    {
        $sql = 'SELECT SMPS.Id
                    ,SMPS.Merk
                    ,SMPS.Model
                    ,SMPS.Prijs
                    ,SMPS.Geheugen
                    ,SMPS.Besturingssysteem
                    ,CONCAT(SMPS.Schermgrootte, " inch") as Schermgrootte
                    ,DATE_FORMAT(SMPS.Releasedatum, "%d/%m/%Y") as Releasedatum
                    ,CONCAT(SMPS.MegaPixels, " MP") as MegaPixels
                FROM   Smartphones as SMPS
                ORDER BY SMPS.Schermgrootte DESC
                    ,SMPS.Prijs DESC
                    ,SMPS.Geheugen DESC
                    ,SMPS.Releasedatum DESC
                    ,SMPS.MegaPixels DESC';

        $this->db->query($sql);

        return $this->db->resultSet();
    }

    public function delete($Id)
    {
        $sql = "DELETE
                FROM Smartphones
                WHERE Id = :Id";

        $this->db->query($sql);

        $this->db->bind(':Id', $Id, PDO::PARAM_INT);

        return $this->db->execute();
    }

    public function create($data)
    {
        $sql = "INSERT INTO Smartphones (   Merk
                                            ,Model
                                            ,Prijs
                                            ,Geheugen
                                            ,Besturingssysteem
                                            ,Schermgrootte
                                            ,Releasedatum
                                            ,MegaPixels
                                            )
                VALUES (:Merk,
                        :Model,
                        :Prijs,
                        :Geheugen,
                        :Besturingssysteem,
                        :Schermgrootte,
                        :Releasedatum,
                        :MegaPixels)";

        $this->db->query($sql);
        $this->db->bind(':Merk', $data['merk'], PDO::PARAM_STR);
        $this->db->bind(':Model', $data['model'], PDO::PARAM_STR);
        $this->db->bind(':Prijs', $data['prijs'], PDO::PARAM_STR);
        $this->db->bind(':Geheugen', $data['geheugen'], PDO::PARAM_INT);
        $this->db->bind(':Besturingssysteem', $data['besturingssysteem'], PDO::PARAM_STR);
        $this->db->bind(':Schermgrootte', $data['schermgrootte'], PDO::PARAM_STR);
        $this->db->bind(':Releasedatum', $data['releasedatum'], PDO::PARAM_STR);
        $this->db->bind(':MegaPixels', $data['megapixels'], PDO::PARAM_INT);

        return $this->db->execute();

    }
                
    
}