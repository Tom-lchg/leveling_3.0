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

   public function getAll()
   {
      return $this->model->getAll();
   }

   public function findById($id, $target)
   {
      return $this->model->findById($id, $target);
   }

   public function createGroupe($data)
   {
      // on vérifie si le groupe est en publique ou en privé
      if ($data->privacy === 'publique') {
         $this->pdo->query("call insertGroupePublic(
            1,
            0,
            '$data->idUser',
            '$data->nomGroupe',
            '$data->description',
            '$data->idUser',
            '$data->privacy',
            '$data->pp',
            '$data->pptype',
            '$data->banner',
            '$data->bannertype'
         )");
      } else {
         $this->pdo->query("call insertGroupePrivate(
            0,
            0,
            '$data->idUser',
            '$data->nomGroupe',
            '$data->description',
            '$data->idUser',
            '$data->privacy',
            '$data->pp',
            '$data->pptype',
            '$data->banner',
            '$data->bannertype'
         )");
      }
   }
}
