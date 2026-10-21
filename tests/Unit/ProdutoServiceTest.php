<?php

namespace Tests\Unit;

use App\Models\Produto;
use App\Services\ProdutoService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class ProdutoServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_update_atualiza_produto_com_margem_valida(): void
    {
        $produto = Produto::create([
            'nome' => 'Caderno',
            'preco_custo' => 100,
            'preco' => 110,
            'estoque' => 10,
        ]);

        $service = new ProdutoService();

        $atualizado = $service->update($produto, [
            'preco' => 120,
        ]);

        $this->assertEquals(120, (float) $atualizado->preco);
    }

    public function test_update_rejeita_preco_abaixo_da_margem(): void
    {
        $produto = Produto::create([
            'nome' => 'Caderno',
            'preco_custo' => 100,
            'preco' => 110,
            'estoque' => 10,
        ]);

        $service = new ProdutoService();

        try {
            $service->update($produto, [
                'preco' => 105,
            ]);

            $this->fail('Era esperada uma exceção de validação.');
        } catch (ValidationException $e) {
            $this->assertArrayHasKey('preco', $e->errors());
        }

        $this->assertEquals(
            110,
            (float) $produto->fresh()->preco
        );
    }
}
