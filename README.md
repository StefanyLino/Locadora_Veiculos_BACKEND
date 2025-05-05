# Locadora de Veículos ⋆｡°✩
Para a continuação do desenvolvimento do projeto SCRUM, continuei o projeto anterior de "Locadora de Veículos", mas agora desenvolvi o backend das páginas, de login, admin e usuário.
<hr>
O QUE USEI:
1. PHP e JSON
  Utilizei conceitos de PHP e JSON para armazenar, manipular e receber dados diferentes.
  ```
  <?php
namespace Models;
use Interfaces\Locavel;

// Classe que representa um carro

class Carro extends Veiculo implements Locavel{

    public function calcularAluguel(int $dias): float 
    {
        return $dias * DIARIA_CARRO;
    }

    public function alugar(): string {
        if ($this->disponivel){
            $this->disponivel = false;
            return "Carro '{$this->modelo}' alugado com sucesso!";
        }
        return "Carro '{$this->modelo}' não disponível.";
    }

    public function devolver(): string {
        if (!$this->disponivel){
            $this->disponivel = true;
            return "Carro '{$this->modelo}' devolvido com sucesso!";
        }
        return "Carro '{$this->modelo}' está disponível.";
    }
  ```
