<?php

interface AtividadeVoluntariado{
public function registrarAtividade();
public function gerarRelatiorio();  
    
}
abstract class Voluntario implements AtividadeVoluntariado
{

    protected string $nome;
    protected int $idade ;

    protected string $disponibilidade;

    public function __construct($nome,$idade,$disponibilidade){
        $this->nome=$nome;
        $this->idade=$idade;
        $this->disponibilidade=$disponibilidade;
    }

    abstract public function exibirPerfil();
    abstract  public function registrarAtividade();

    abstract public function gerarRelatiorio();  
}

class VoluntarioPresencial extends Voluntario{
    protected string $endereco;
    protected string $telefone;

    protected  string $descicaoAtividade;

    protected  bool $realizouAtividade;

    protected  string $horasTrabalhadas;
    
    

    public function __construct($endereco,$telefone,$nome,$idade,$disponibilidade,$descicaoAtividade,$realizouAtividade,$horasTrabalhadas){
        parent:: __construct($nome,$idade,$disponibilidade);
        $this->endereco=$endereco;
        $this->telefone=$telefone;
        $this->descicaoAtividade=$descicaoAtividade;
        $this->realizouAtividade=$realizouAtividade;
        $this->horasTrabalhadas=$horasTrabalhadas;
 
     }

    public function exibirPerfil(){
        return $this->nome.PHP_EOL.$this->idade.PHP_EOL.$this->disponibilidade.PHP_EOL.$this->endereco.PHP_EOL. $this->telefone;    
    }
    public function registrarAtividade(){
        return $this->realizouAtividade.PHP_EOL.$this->descicaoAtividade.PHP_EOL.$this->horasTrabalhadas;
    }
    public function gerarRelatiorio(){
        return $this->registrarAtividade();
    }

}

class VoluntarioRemoto extends Voluntario{

    protected string $HorasDisponiVeis;

    protected string $PlataformaColaboracao;

    protected  string $descicaoAtividade;

    protected  bool $realizouAtividade;

    protected  string $horasTrabalhadas;

    


   
     public function __construct($HorasDisponiVeis,$PlataformaColaboracao,$descicaoAtividade,$realizouAtividade,$horasTrabalhadas,$nome,$idade,$disponibilidade){
        parent:: __construct($nome,$idade,$disponibilidade);
        $this->HorasDisponiVeis=$HorasDisponiVeis;
        $this->PlataformaColaboracao=$PlataformaColaboracao;
        $this->descicaoAtividade=$descicaoAtividade;
        $this->realizouAtividade=$realizouAtividade;
        $this->horasTrabalhadas=$horasTrabalhadas;
 
     }

    public function exibirPerfil(){
        return $this->nome.PHP_EOL.$this->idade.PHP_EOL.$this->disponibilidade.PHP_EOL.$this->HorasDisponiVeis.PHP_EOL.$this->PlataformaColaboracao;
    }

    public function registrarAtividade(){
     return $this->descicaoAtividade.PHP_EOL.$this->realizouAtividade.PHP_EOL.$this->horasTrabalhadas;
     
    }

    public function gerarRelatiorio(){
        return $this->registrarAtividade();
    }
    
}

class CordenadorVoluntariado implements AtividadeVoluntariado{

    protected string $nome;
    protected int $idade ;

    protected string $disponibilidade;

    public function __construct($nome,$idade,$disponibilidade){
        $this->nome=$nome;
        $this->idade=$idade;
        $this->disponibilidade=$disponibilidade;
    }


    public function gerenciarAtividades(){
        $this->monitorarAtividades();
        $this->registrarAtividade();
        $this->gerarRelatiorio();
        echo("sucesso");
    }

    public function monitorarAtividades(){
        echo("monitorando atividades");
    }

    public function registrarAtividade(){
        echo("registrando atividades");
    }

    public function gerarRelatiorio(){
        echo("gerando realtorios");
    }
}

$voluntarioRemoto1 = new VoluntarioRemoto("zoom","realizou entrega de alimentos","foi uma atividade boa",true,"5 horas","Gabriel",24,"disponivel todos dias");

$voluntarioPresencial = new VoluntarioPresencial("Rua Passarinho-1","1999933-2122","Pedro",29,"todos dias","fez a entrega de produtos para rifas",true,"6 horas");


$CordenadorVolunatario1  = new CordenadorVoluntariado("Mayara",28,"segunda , quarta, sexta");

?>