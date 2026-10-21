<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\IbgeService;
use Illuminate\Http\JsonResponse;

class EstadoController extends Controller
{
    public function __construct(
        private IbgeService $service
    ) {}

    public function index(): JsonResponse
    {
        return response()->json(
            $this->service->listarEstados()
        );
    }

    public function municipios(string $uf): JsonResponse
    {
        return response()->json(
            $this->service->listarMunicipios($uf)
        );
    }
}
