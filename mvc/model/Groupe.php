<?php

namespace Models\Groupe;

use \Models\Model;

use PDO;

class Groupe
{
   private $pdo;
   private $model;
   public function __construct()
   {
      $this->pdo = new PDO('mysql:host=localhost;dbname=leveling2', 'root', '');
      $this->model = new Model('tblGroups');
   }

   public function getAll(): array
   {
      return $this->model->getAll();
   }

   public function findById(int $id, string $target): array
   {
      return $this->model->findById($id, $target);
   }
}