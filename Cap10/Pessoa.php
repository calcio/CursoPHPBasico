<?php
class Pessoa
{
    public $nome;
    public $idade;
    public $sexo;

    public function __construct($nome, $idade, $sexo)
    {
        $this->nome  = $nome;
        $this->idade = $idade;
        $this->$sexo = $sexo;
    }

    public function comer($alimento, $qtd = 0)
    {
        echo utf8_decode($this->nome . ' esta comendo ' . $alimento . '<br /><br />');

        for ($i=1; $qtd >= $i; $i++) {
            echo utf8_decode($this->nome . ' comeu ' . $i . ' ' . $alimento . '(s)<br />');
        }
    }
}

$pessoa = new Pessoa('Cálcio', 35, 'Masculino');

echo $pessoa->comer('Maça', 5);
