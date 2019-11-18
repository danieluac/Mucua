<?php
namespace Fonte\Basedados\Capsula;
use PDO;
use PDOException;
/**
 * Description of Conectando
 * Classe principal para  a conexao
 * @author Daniel-U-AC
 */
class Capsula
{
    /**
     * vai guardar a instância da conexão
     * @var type objecto
     */
    private static $conn;
    /**
     * vai armazenar os parametros da conexão
     * @var type array
     */
    private  $param = array();
    /**
     * retorna a conexão com o banco de dados
     * @return type objecto
     */
    final public static function get_conect()
    {
        return self::$conn;
    }
    /**
     * atualiza os paramentros da conexão
     * @param array $parametros
     * return type void
     */
    final public function Conectando (array $parametros)
    {
        $this->param = $parametros;
    }
    /**
     * Conecta com o banco de dados
     * @param type void
     * @return type void
     */
    final public  function Selado ()
    {
        if(!self::$conn)
        {
            try
                {
                self::$conn = new PDO(
                            $this->param['socket'].
                            ":host=".$this->param['endereco'].
                            ";dbname=".$this->param['bdados'].
                            ";charset=".$this->param['charset'].
                            ";",$this->param['usuario']
                            ,$this->param['senha']);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                } catch (PDOException $e)
                {
                  print "***********<br/><h3>Servidor de dados não responde!. <br/><a href=''>tente novamente...</a></h3> ";
                   die("****************************");
                }
        }
    }
}
