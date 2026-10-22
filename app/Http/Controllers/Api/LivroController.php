<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LivroRequest;
use App\Http\Resources\LivroResource;
use App\Models\Livro;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class LivroController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return LivroResource::collection(
            Livro::latest()->paginate(10)
        );
    }

    public function store(LivroRequest $request): LivroResource
    {
        $livro = Livro::create($request->validated());

        return new LivroResource($livro);
    }

    public function show(Livro $livro): LivroResource
    {
        return new LivroResource($livro);
    }

    public function update(
        LivroRequest $request,
        Livro $livro
    ): LivroResource {
        $livro->update($request->validated());

        return new LivroResource($livro->refresh());
    }

    public function destroy(Livro $livro): Response
    {
        $livro->delete();

        return response()->noContent();
    }
}
