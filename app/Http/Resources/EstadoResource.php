<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EstadoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this['id'],
            'sigla' => $this['sigla'],
            'nome' => $this['nome'],
            'regiao' => [
                'id' => $this['regiao']['id'],
                'sigla' => $this['regiao']['sigla'],
                'nome' => $this['regiao']['nome'],
            ],
        ];
    }
}
