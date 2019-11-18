<?php
namespace Fonte\Basedados\modelo;
use Fonte\Basedados\Tratamento\Insert;
use Fonte\Basedados\Tratamento\Update;
use Fonte\Basedados\Tratamento\Select;
use Fonte\Basedados\Tratamento\Delete;
/**
 * Description of ConfigModelo
 *
 * @author Daniel-U-AC
 */
abstract class ConfigModelo
{
    private static $insert;
    public static $update;
    private static $select;
    private static $delete;
    /**
     * instância todos os DML
     */
    protected function __construct()
    {
      if(!isset(self::$insert))
        self::$insert = new Insert;
      if(!isset(self::$update))
        self::$update = new Update();
      if(!isset(self::$select))
        self::$select = new Select;
      if(!isset(self::$delete))
        self::$delete =new Delete;
    }
}
