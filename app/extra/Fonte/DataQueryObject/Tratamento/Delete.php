<?php
namespace Fonte\Basedados\Tratamento;
use Fonte\Basedados\Capsula\Capsula;
/**
 * Description of Delete
 *
 * @author Daniel-U-AC
 */
class Delete extends Update
{
    /**
     * monta a estrutura SQL para o DELETE dado no Banco
     * @return string da estrutura sql montada
     */
    private function InstrucaoDelete()
    {
        $this->sql = " DELETE FROM ".$this->tabela;//strtoupper($this->tabela);
        isset($atributoTabela) ? $this->sql .=$atributoTabela : "";
        //Adiciona a(as) claúsula(as) para o Update
        $this->sql .=" WHERE ( ".$this->criterio." )";
       // retorna a estrutura sql para update montada
        return $this->sql;
    }
    /**
     * Apaga dados na tabela do bando de dados
     * @return bool verdadeiro ou falso
     */
    public function Deletes()
    {
        $add = Capsula::get_conect()->prepare(" ".$this->InstrucaoDelete()." ");
        // cria um array contendo os indeces do array $filtroValor
         $this->filtroValor ? $filtro = array_keys($this->filtroValor) : "";
        for($a =0; $a< count($this->filtroValor);$a++):
              $add->BindValue(":{$filtro[$a]}", $this->filtroValor[$filtro[$a]]);
        endfor;
        return $add->execute();
    }
}
