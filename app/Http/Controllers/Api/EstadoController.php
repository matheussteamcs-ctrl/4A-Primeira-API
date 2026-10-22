<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EstadoResource;
use App\Services\IbgeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EstadoController extends Controller
{
    public function __construct(
        private IbgeService $service
    ) {}

    public function index(): AnonymousResourceCollection
    {
        return EstadoResource::collection(
            collect($this->service->listarEstados())
        );
    }

    public function municipios(string $uf): JsonResponse
    {
        return response()->json(
            $this->service->listarMunicipios($uf)
        );
    }
}
