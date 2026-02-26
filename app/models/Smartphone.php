<?php

class Smartphone
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;

    }


    public function getAllSmartphones()
    {
        $sql = 'SELECT    SMPS.Merk
                        , SMPS.Model
                        , SMPS.Prijs
                        , SMPS.Geheugen
                        , SMPS.Besturingssysteem
                        , CONCAT(SMPS.Schermgrootte, " inch") AS Schermgrootte
                        , date_format(SMPS.ReleaseDatum, "%d-%m-%Y") AS ReleaseDatum
                        , CONCAT(SMPS.Megapixels, " MP") AS Megapixels

                FROM    Smartphones as SMPS

                ORDER BY SMPS.Schermgrootte DESC
                        ,SMPS.Prijs DESC
                        ,SMPS.Geheugen DESC
                        ,SMPS.ReleaseDatum DESC
                        ,SMPS.Megapixels DESC';

        $this->db->query($sql);

        return $this->db->resultSet();                      
    }
}