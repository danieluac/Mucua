<?php

namespace app\kernel;
use app\controller\controller;
/**
 * @Descrição of app
 *  class Main of framework
 * @author Daniel-U-AC
 */
class kernel extends controller
 {
    /**
     * @var type string
     */
    protected $controllers = 'Mucua';
    /**
     * @var type string
     */
    protected $method ='Index';
    /**
     * @var type array
     */
    protected $param  = [];
    /**
     * @method __construct
     * @param void
     * return void
     */
    private $UrlPage;
    /**
     * method that request url of App
     * @param type void
     * @return type array
     */
    protected function KernelUrl()
    {
        if(isset($_GET['kernel']))
        {
            return $url = explode('/', filter_var(rtrim($_GET['kernel'],'/'), FILTER_DEFAULT));
        }
    }
    /**
     * method that verify request file controller in directory of App Controller
     * @param type void
     * @unset drop the index of $UrlPage array
     * @return type void
     */
    protected function FileRequestDirectory()
    {
        if(isset($this->UrlPage[0]) and file_exists(__DIR__.'/../controller/Controller'.$this->UrlPage[0].'.php'))
        {
            $this->UrlPage[0] = str_replace("-","",$this->UrlPage[0]);
            $this->requireFile('controller/Controller'.$this->UrlPage[0]);

            $this->controllers= $this->UrlPage[0];
            unset($this->UrlPage[0]);
        }else
        {
           $this->requireFile('controller/Controller'.$this->controllers);
        }
    }
    /**
     * method that get file controller in directory of App and create a object controller
     * @param type void
     * @unset drop the index of $UrlPage array
     * @return type void
     */
    protected function GetControllersFIle()
    {
        $this->controllers = "\app\controller\Controller".$this->controllers;

        $this->controllers = $this->controllers ? new $this->controllers : null;

        if(isset($this->UrlPage[1]))
        { $this->UrlPage[1] = str_replace("-","",$this->UrlPage[1]);
            if(method_exists($this->controllers, $this->UrlPage[1]))
            {
                $this->method = $this->UrlPage[1];
                unset($this->UrlPage[1]);
            }else
            {
            }
        }
        // verify if there is more index in $UrlPage array
        $this->param = $this->UrlPage? array_values($this->UrlPage): [];
        $this->controllers ? call_user_func_array([$this->controllers, $this->method], $this->param) : '';
    }
    /**
     * Construct kernel
     * @param type void
     * return type void
     */
    public function __construct()
    {
        $this->UrlPage = $this->KernelUrl();
        $this->FileRequestDirectory();
        $this->GetControllersFile();
    }
}
