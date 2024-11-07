<?php

namespace App\Http\Controllers\Commons;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColumnStoreRequest;
use App\Http\Resources\ColumnResource;
use App\Models\Board;
use App\Models\Column;
use Illuminate\Support\Facades\Gate;

class ColumnController extends Controller
{
    public function index(Board $board)
    {
        Gate::authorize('viewAny', [Column::class, $board]);
        return ColumnResource::collection($board->columns);
    }

    public function store(ColumnStoreRequest $request, Board $board)
    {
        Gate::authorize('create', [Column::class, $board]);
        $column = $board->columns()->create($request->all());
        return response()->json(new ColumnResource($column), 201);
    }

    public function show(Board $board, Column $column)
    {
        Gate::authorize('view', [$column, $board]);
        return new ColumnResource($column);
    }

    public function update(ColumnStoreRequest $request, Board $board, Column $column)
    {
        Gate::authorize('update', [$column, $board]);
        $column->update($request->all());
        return new ColumnResource($column);
    }

    public function destroy(Board $board, Column $column)
    {
        Gate::authorize('delete', [$column, $board]);
        $column->delete();
        return response()->noContent();
    }
}
