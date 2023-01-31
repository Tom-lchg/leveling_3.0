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
   }

   public function getAll(): array
   {
      return $this->pdo->query("SELECT * FROM $this->table")->fetchAll();
   }

   public function findById(int $id, string $target): array
   {
      return $this->pdo->query("SELECT * FROM $this->table WHERE $target = $id")->fetch();
   }
}