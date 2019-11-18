<?php
namespace Fonte\Basedados\Tratamento;
use Fonte\Basedados\Capsula\Capsula;
/**
 * Description of Update
 *
 * @author Daniel-U-AC
 */
class Update extends Insert
{
    /**
     * monta a estrutura SQL para o UPDATE dado no Banco
     * @param void
     * @return string da estrutura sql montada
     */
    private function InstrucaoUpdate()
    {
         $this->sql = " UPDATE ".$this->tabela;//strtoupper($this->tabela);
         // adiciona os atributos da tabela, que são os valores do array
        // This->colunas deve ser declarado em cada model para identificar os atributos na tabela
        // Também adiciona os criterios de segurança do PDO
         for($a =0; $a< count($this->colunas);$a++):
            if(array_key_exists($this->colunas[$a], $this->atributoValor)):
               isset($atributoTabela) ? $atributoTabela .= ", ".$this->colunas[$a]."=:".$this->colunas[$a]
                                      : $atributoTabela = " SET ".$this->colunas[$a]."=:".$this->colunas[$a];
            endif;
        endfor;
        isset($atributoTabela) ? $this->sql .=$atributoTabela : "";
        //Adiciona a(as) claúsula(as) para o Update
        $this->sql .=" WHERE ( ".$this->criterio." )";
       // retorna a estrutura sql para update montada
        return $this->sql;
    }
    /**
     * atualiza a informação na tabela do banco de dados
     * @param void
     * @return  bool true or false
     */
    public function updates ()
    {
        if((!$this->atributoValor OR !$this->colunas))
            return ;

        $add = Capsula::get_conect()->prepare(" ".$this->InstrucaoUpdate()." ");
        // Adiciona os bindValue de cada atributo montado na estrutura
        for($a =0; $a< count($this->colunas);$a++):
              if(array_key_exists($this->colunas[$a], $this->atributoValor)):
                $add->BindValue(":{$this->colunas[$a]}",$this->atributoValor[$this->colunas[$a]]);
              endif;
        endfor;
         // cria um array contendo os indeces do array $filtroValor
         $this->filtroValor ? $filtro = array_keys($this->filtroValor) : "";
        for($a =0; $a< count($this->filtroValor);$a++):
              $add->BindValue(":{$filtro[$a]}", $this->filtroValor[$filtro[$a]]);
        endfor;
        return $add->execute();
    }
}
