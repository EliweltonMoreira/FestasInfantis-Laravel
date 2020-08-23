<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    /** @test */
    public function performanceClientes()
    {
        for($c = 1; $c <= 5000; $c++){
            \App\Cliente::create([
                'nome' => 'SHA',
                'telefone' => '(81) 99324-7653'
            ]);
        }

        $clientes = \App\Cliente::all();

        $this->assertEquals(5000, count($clientes));
    }

    /** @test */
    public function performanceTemas()
    {
        for($c = 1; $c <= 5000; $c++){
            \App\Tema::create([
                'nome' => 'Penadinho',
                'valorAluguel' => '1499.90',
                'corDestaque' => 'Branco'
            ]);
        }

        $temas = \App\Tema::all();

        $this->assertEquals(5000, count($temas));
    }

    /** @test */
    public function performanceAluguels()
    {
        for($c = 1; $c <= 5000; $c++){
            \App\Aluguel::create([
                'cliente_id' => '16056',
                'tema_id' => '15036',
                'dataFesta' => '2020-11-30',
                'horarioInicio' => '19:00:00',
                'horarioTermino' => '23:00:00',
                'valorCobrado' => '2099.90',
                'endereco' => 'Rua Oliveira, 123',
                'complemento' => 'Casa',
                'cidade' => 'Ferreiros',
                'uf' => 'Pernambuco'
            ]);
        }

        $aluguels = \App\Aluguel::all();

        $this->assertEquals(5000, count($aluguels));
    }

    /** @test */
    public function performanceItems()
    {
        for($c = 1; $c <= 5000; $c++){
            \App\Item::create([
                'tema_id' => '15036',
                'nome' => 'Foice da Dona Morte',
                'descricao' => 'Foice decorativa de isopor da Dona Morte'
            ]);
        }

        $items = \App\Item::all();

        $this->assertEquals(5000, count($items));
    }
}
