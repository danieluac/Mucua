<?php 
namespace app\model;

/*
está model user é apenas uma demostração de como deve-se cria uma model
*/
class user extends model 
{
    protected $colunas = ["fullname","username","password"];

    public function __construct()
    { 
        parent::__construct();
        $this->chavePrimaria = "idusuario";
    }
    public function AddUser($fullname = "",$username = "", $password = "")
    {
        $this->Criar
        ([
       "fullname" => $fullname,
       "username" => $username,
       "password" => $password
        ]);

        $this->inserts();
    }
    public function getJson()
    {
        return json_encode($this->selects());
    }

}