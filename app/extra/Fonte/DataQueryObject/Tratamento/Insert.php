<?php
namespace Fonte\Basedados\Tratamento;
use Fonte\Basedados\Capsula\Capsula;
/**
 * Description of tabela
 *
 * @author Daniel-U-AC
 */
class Insert extends Configuracao
{
    /**
     * monta a estrutura SQL para o INSERT dado no Banco
     * @return string da estrutura sql montada
     */
    private function InstrucaoInsert()
    {
        $this->sql = " INSERT INTO ".$this->tabela;
        // adiciona os atributos da tabela, que são os valores do array
        // This->colunas deve ser declarado em cada model para identificar os atributos na tabela
        for($a =0; $a< count($this->colunas);$a++):
            if(array_key_exists($this->colunas[$a], $this->atributoValor)):
               isset($atributoTabela) ? $atributoTabela .= ", ".$this->colunas[$a]
                                      : $atributoTabela = " ( ".$this->colunas[$a];
            endif;
        endfor;
        isset($atributoTabela) ? $this->sql .=$atributoTabela. " )" : "";
         // estrutura de segurança PDO
        for($a =0; $a< count($this->colunas);$a++):
            if(array_key_exists($this->colunas[$a], $this->atributoValor)):
               isset($atributovalor) ? $atributovalor .= ", :".$this->colunas[$a]
                                     : $atributovalor = "VALUES ( :".$this->colunas[$a];
            endif;
        endfor;
        isset($atributovalor) ? $this->sql .= $atributovalor." )" : "";
         //retorna a estrutura sql para o insert montada
        return $this->sql;
    }
    /**
     * Insere os dados na tabela do banco de dados
     * @return bool true false
     */
    final public function inserts ()
    {
        if(!$this->atributoValor OR !$this->colunas)
            return ;
        $add = Capsula::get_conect()->prepare($this->InstrucaoInsert());
        // Adiciona os bindValue de cada atributo montado na estrutura
        for($a =0; $a< count($this->colunas);$a++):
              if(array_key_exists($this->colunas[$a], $this->atributoValor)):
                $add->BindValue(":{$this->colunas[$a]}",$this->atributoValor[$this->colunas[$a]]);
              endif;
        endfor;
        return $add->execute();
    }
}
