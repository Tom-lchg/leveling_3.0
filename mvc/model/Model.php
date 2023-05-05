<?php

namespace Models;

use PDO;

class Model
{
   private $table;
   private $pdo;

   public function __construct($table)
   {
      $this->table = $table;
      $this->pdo = new PDO('mysql:host=localhost;dbname=leveling2', 'root', '');
      //$this->pdo = new PDO('mysql:host=172.20.0.161;dbname=leveling2', 'root', 'btssio2023');
   }

   public function getAll()
   {
      return $this->pdo->query("SELECT * FROM $this->table")->fetchAll();
   }

   public function findById($id, $target)
   {
      return $this->pdo->query("SELECT * FROM $this->table WHERE $target = $id")->fetch();
   }

   public function findByIdPc($id, $target)
   {
      return $this->pdo->query("SELECT * FROM tblgamespc WHERE $target = $id")->fetch();
   }

   public function findByIdCs($id, $target)
   {
      return $this->pdo->query("SELECT * FROM tblgamescs WHERE $target = $id")->fetch();
   }
}

