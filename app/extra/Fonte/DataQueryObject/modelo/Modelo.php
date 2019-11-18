<?php
namespace Fonte\Basedados\modelo;
use Fonte\Basedados\Tratamento\Select as DML;
/**
 * Description of modelo
 *
 * @author Daniel-U-AC
 */
abstract class Modelo extends DML
{   
    public function __construct()
    {
        $this->get_table();        
    }
}
