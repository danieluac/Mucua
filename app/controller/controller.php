<?php
namespace app\controller;
use app\config\view;
use app\config\defined;

abstract class controller extends view
{
  protected function setModel ($model)
  {
      if(file_exists(__DIR__.'/../model/'.$model.'.php'))
      {
         date_default_timezone_set('Africa/Luanda');
         
           require_once __DIR__.'/../model/'.$model.'.php';
           $model = str_replace("/","\\",$model);
           // it is the namespace of model
           $model ="app\model\\".$model;
          return new $model();
      }
  }
  protected function requireFile($require)
  {
      if(file_exists(__DIR__.'/../'.$require.'.php'))
      {
          require_once __DIR__.'/../'.$require.'.php';
      }
  }
  public function route($route)
  {
      return defined::HOST_PUBLIC.$route;
  }
  protected function redirect($path= null)
  {
      header("location: ".defined::HOST_PUBLIC.$path);
  }
  protected function Meses($mes)
  {
      switch ($mes)
      {
          case 1: return "Janeiro"; break;
          case 2: return "Fevereiro"; break;
          case 3: return "Março"; break;
          case 4: return "Abril"; break;
          case 5: return "Maio"; break;
          case 6: return "Junho"; break;
          case 7: return "Julho"; break;
          case 8: return "Agosto"; break;
          case 9: return "Setembro"; break;
          case 10: return "Outubro"; break;
          case 11: return "Novembro"; break;
          case 12: return "Dezembro"; break;
          default : return date("M");
      }
  }
}
