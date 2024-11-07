<?php

namespace App\Http\Controllers\Commons;

use App\Http\Controllers\Controller;
use App\Http\Requests\BoardStoreRequest;
use App\Http\Resources\Commons\BoardResource;
use App\Models\Board;
use Illuminate\Support\Facades\Gate;

class BoardController extends Controller
{

    public function index()
    {
        return BoardResource::collection(user()->boards);
    }

    public function show(Board $board)
    {
        Gate::authorize('view', $board);
        return new BoardResource($board);
    }

    public function store(BoardStoreRequest $request)
    {
        Gate::authorize('create', Board::class);
        $board = user()->boards_owner()->create($request->all());
        return response()->json(new BoardResource($board), 201);
    }

    public function update(BoardStoreRequest $request, Board $board)
    {
        Gate::authorize('update', $board);
        $board->update($request->all());
        return new BoardResource($board);
    }

    public function delete(Board $board)
    {
        Gate::authorize('update', $board);
        $board->delete();
        return response()->noContent();
    }

    public function forceDelete(string $id)
    {
        $board = Board::withTrashed()->findOrFail($id);
        Gate::authorize('forceDelete', $board);
        if ($board->trashed()) {
            $board->forceDelete();
            return response()->noContent();
        }
        abort(400, 'Board not deleted');
    }

    public function restore(string $id)
    {
        $board = Board::withTrashed()->findOrFail($id);
        Gate::authorize('restore', $board);
        if ($board->trashed()) {
            $board->restore();
            return response()->noContent();
        }
        abort(400, 'Board not deleted');
    }
}
