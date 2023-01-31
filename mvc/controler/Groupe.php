<?php

namespace Groupes;

use \Models\Model;
use \Models\Groupe\Groupe as GroupeModel;

class Groupe
{
   private $model;
   public $groupeModel;

   public function __construct()
   {
      $this->model = new Model('tblGroups');
      $this->groupeModel = new GroupeModel();
   }
}
