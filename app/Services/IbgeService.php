<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class IbgeService
{
    public function listarEstados(): array
    {
        $resposta = Http::timeout(10)
            ->get('https://servicodados.ibge.gov.br/api/v1/localidades/estados');

        $resposta->throw();

        return $resposta->json();
    }

    public function listarMunicipios(string $uf): array
    {
        $uf = strtoupper($uf);

        if (!preg_match('/^[A-Z]{2}$/', $uf)) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'uf' => 'Informe uma sigla de estado válida, como PR ou SP.',
            ]);
        }

        $resposta = Http::timeout(10)
            ->get("https://servicodados.ibge.gov.br/api/v1/localidades/estados/{$uf}/municipios");

        $resposta->throw();

        return $resposta->json();
    }
}

