<?php
namespace app\model;
use Fonte\Basedados\modelo\Modelo as Models;

abstract class model extends Models
{
  abstract public function getJson();
}
