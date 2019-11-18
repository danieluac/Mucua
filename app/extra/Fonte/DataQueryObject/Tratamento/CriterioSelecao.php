<?php
namespace Fonte\Basedados\Tratamento;

/**
 * CriterioSelecao, class que estabelece o critério para selecionar,
 * atualizar e deletar atráves da claúsula where
 *
 * @author Daniel-U-AC
 *
 * @abstract CriterioSelecao
 */
abstract class CriterioSelecao
{
    /**
     * contém o criterio de busca de dados na estrutura sql
     * @var string
     */
    protected $criterio;
    /**
     * contém os atributo e registos da entidade
     * @var array
     */
    protected $filtroValor;
    protected $OrderBy;
    protected $limit;
    /**
     * monta o criterio de seleção
     * @param type $atributo da entidade do banco ex: nome, id
     * @param type $filtro filtro de consulta ex: =, >, <=, >= !=
     * @param type $valor é o informação a ser comparada na intidade
     * @param string $operador permite fazer filtro multi-dimenssional
     *  ou +, apartir da 2ª chamada do metodo
     */
   final public function where($atributo, $filtro = "=", $valor, $operador = "AND")
   {
       static $cont =1;
       if(isset($this->criterio))
       {
            $this->filtroValor[$atributo.$cont] =$this->transforma($valor);
            // Junta  o criterio de seleçao
            $this->criterio .=" ".$operador." ". $atributo." ".$filtro." (:".$atributo.$cont.")";
       }
       else
       {
            $this->filtroValor[$atributo.$cont] =$this->transforma($valor);
            // Junta  o criterio de seleçao
            $this->criterio =" ". $atributo." ".$filtro." (:".$atributo.$cont.")" ;
       }
       $cont++;
       return $this;
   }
   /**
   * seta a ordem dos dados vindo da base de dados
   *@param type: string
   **/
   final public function setOrderBy($order)
   {
     $this->OrderBy = $order;
     return $this;
   }
   final public function setLimit($L)
   {
     $this->limit = $L;
     return $this;
   }
   /**
     * transforma o valor de acordo com o tipo
     * @param indeterminate $value indeterminate
     * @return indeterminate
     */
   final private function transforma($value)
    {
        if(is_array($value))
        {
            foreach ($value as $v)
            {
                //se for inteiro
                if(is_integer($v))
                    $data [] = $v;
               //se for string
                elseif (is_string($v))
                {
                  //  $data[] =  "'$v'";
                    $data[] =  $v;
                }
            }
            $result = '('.implode(",", $data). ')';
        }elseif (is_string($value))
            // adiciona aspas
            $result = $value;
        elseif(is_null($value))
            $result = 'NULL';
        elseif(is_bool($value))
            $result =$value? 'TRUE' : 'FALSE';
        else
            $result = $value;
        // retorno do resultado
        return $result;
    }
}
