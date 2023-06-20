<?php

namespace Models\Games;

use PDO;
use \Models\Model;

class Games
{
   private $pdo;
   private $model;
   private $modelpc;
   private $modelperf;
   public function __construct()
   {
      //$this->pdo = new PDO('mysql:host=localhost;dbname=leveling2', 'root', '');
      $this->pdo = new PDO('mysql:host=172.20.0.161;dbname=leveling2', 'root', 'btssio2023');
      $this->model = new Model('tblgames');
      $this->modelpc = new Model('tblgamespc');
      $this->modelperf = new Model('tblgamesperf');
   }

   //<!-------------------- PERFORMANCE -------------------->

   public function getPerf(){
      $sql="SELECT id, idGame, nbetoile, performance, gameName FROM tblgamesperf JOIN tblgames ON tblgamesperf.id = tblgames.FK_gamesperf";
      $stmt = $this->pdo->query($sql);
      $stmt->execute();
      return $stmt->fetchAll();
   }

   //<!-------------------- PERFORMANCE -------------------->
   public function getAll()
   {
      return $this->model->getAll();
   }

   public function findById($id, $target)
   {
      return $this->model->findById($id, $target);
   }

   public function findByIdPc($id, $target)
   {
      return $this->model->findByIdPc($id, $target);
   }

   public function findByIdCs($id, $target)
   {
      return $this->model->findByIdCs($id, $target);
   }
}
