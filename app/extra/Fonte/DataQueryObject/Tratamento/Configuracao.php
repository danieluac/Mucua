<?php
namespace Fonte\Basedados\Tratamento;
/**
 *  Configuracao, class principal que configura
 * a tabela a ser usado e os respectivos atributos
 * @author Daniel-U-AC
 *
 * @abstract Configuracao
 */
abstract class Configuracao extends CriterioSelecao
{
    protected  $sql;
    /**
     * Contém os atributos da tabela em uso e os seus valores num array
     * @var array
     */
    protected $atributoValor;
    /**
     * Contém o nome da tabela do banco de dados
     * @var string
     */
    protected $tabela;
    /**
     * Contém a chave primária da tabela em uso
     * @var string
     */
    protected $chavePrimaria;
    /**
     * metodo mágico da classe que cria uma propriedade e lhe atribui um valor
     * @param string
     * @param string
     */
    final public function __set($atributo, $valor)
    {
      $this->atributoValor[$atributo] = $valor;
    }
    /**
     * metodo mágico que retorna uma propriedade
     * @param string
     * @return string
     */
     public function __get($atributo)
    {
        return $this->atributoValor[$atributo];
    }

    /**
     * adiciona em um array, os indices do array são os atributos da tabela em uso,
     * os valores contidos são os registos
     * @param array
     * @return void
     */
    public function Criar (array $atributos)
   {
      $this->atributoValor = (array) $atributos;
      return $this;
   }
    /**
     * pega o nome da class em referência no namespace e atribui como nome da tabela
     * @param void
     * @return void
     */
    final protected function get_table()
    {
       for($a=1;$a<=count($get= explode("\\",get_class($this)));$a +=1)
       {
            if($a === count($get))
            {
                $this->tabela = $get[$a-1];
              //  $this->chavePrimaria = "id".$this->tabela;
                $this->chavePrimaria = "Id".$this->tabela;
            }
       }
    }
}
