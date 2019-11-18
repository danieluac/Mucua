<?php
use Fonte\Basedados\Capsula\Capsula;

$capsula = new Capsula();
$capsula->Conectando
        ([
            "socket" => "mysql",
            "endereco" => "localhost",
            "bdados" => "",
            "usuario" => "root",
            "senha" => "",
            "charset" => "utf8"
        ]);

        $capsula->Selado();
