<?php
namespace app\config;
use app\config\defined as def;

class view extends assets
{
  private $title;
  private $data = [];
  protected function setTitle($title)
  {
    $this->title = (string) $title;
  }
  protected function getTitle()
  {
    return $this->title;
  }
  /**
  *
  **/
  public function setView($view = null,$data =[])
  {
    $view = str_replace('../','', $view);
    $view = str_replace('.','/', $view);

    if(file_exists('../app/views/'.$view.'.php'))
    {
      return require_once '../app/views/'.$view.'.php';
    }
  }
}
