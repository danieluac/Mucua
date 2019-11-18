<?php
namespace Fonte\Basedados\Tratamento;
use Fonte\Basedados\Capsula\Capsula;
/**
 * Description of Select
 *
 * @author Daniel-U-AC
 */
class Select extends Delete
{
    /**
     * monta a estrutura SQL para o SELECT
     * @return string da estrutura sql montada
     */
    private function InstrucaoSelect()
    {
         $this->sql = " SELECT ";
         // adiciona os atributos da tabela, que são os valores do array
        // This->colunas deve ser declarado em cada model para identificar os atributos na tabela
        // Também adiciona os criterios de segurança do PDO
         $this->sql .=$this->chavePrimaria.", ". implode(", ", $this->colunas);
            $this->sql .= " FROM ".$this->tabela;//.strtoupper($this->tabela);
        //Adiciona a(as) claúsula(as) para o Update
            if($this->criterio)
            {
                 $this->sql .=" WHERE ( ".$this->criterio." )";
            }
       // retorna a estrutura sql para update montada
        return $this->sql;
    }
    /**
     * permite buscar registro no banco de dados atraves da chave primaria
     * @param int $find é a chave a ser procurado na tabela do banco
     * @param string $filtro é o filtro de consulta ex: id>1 ou id=1
     * @return Objecto da consulta
     */
    public  function buscar($find, $filtro = "=")
    {
       if(!empty($find) and $this->colunas)
       {
            $this->where($this->chavePrimaria, $filtro, $find);
            if(!empty($this->OrderBy))
              $add = Capsula::get_conect()->prepare(" ".$this->InstrucaoSelect()." ".$this->OrderBy." ".$this->limit);
            else
              $add = Capsula::get_conect()->prepare(" ".$this->InstrucaoSelect()." ".$this->limit);
            // cria um array contendo os indeces do array $filtroValor
            $this->filtroValor ? $filtro = array_keys($this->filtroValor) : "";
            for($a =0; $a< count($this->filtroValor);$a++):
                  $add->BindValue(":{$filtro[$a]}", $this->filtroValor[$filtro[$a]]);
            endfor;
            $add->execute();
            // retona um obejecto com os dados do usuario;
            return $add->fetchObject();
       }
       else
           return ;
    }
    /**
     * busca todos os registros na tabela, excepto se existir um criterio de busca ira apenas trazer de acoro
     * com o critério
     * @param void
     * @return array com todos os registos da tabela no caso de não existir um critério de busca
     */
    public function selects ()
    {
      if(!empty($this->OrderBy))
        $add = Capsula::get_conect()->prepare(" ".$this->InstrucaoSelect()." ".$this->OrderBy);
      else
         $add = Capsula::get_conect()->prepare(" ".$this->InstrucaoSelect()." ".$this->limit);
            // cria um array contendo os indeces do array $filtroValor
            $this->filtroValor ? $filtro = array_keys($this->filtroValor) : "";
            for($a =0; $a< count($this->filtroValor);$a++):
                  $add->BindValue(":{$filtro[$a]}", $this->filtroValor[$filtro[$a]]);
            endfor;
            $add->execute();
            // retona um obejecto com os dados do usuario;
            return $add->fetchAll();
    }
}
