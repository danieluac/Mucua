<?php
namespace app\controller;

class ControllerMucua extends controller
{
  public function __construct()
  {
    
  }
  public function Index()
  {
    $this->setTitle("WELLCOME THE MÚCUA-API FRAMEWORK");
    $this->setView("__default/index");

  }

  public function contacto()
  {
    print "<h1>page of contact</h1>";
  }

}
