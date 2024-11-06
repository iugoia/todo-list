<?php

function user(): \App\Models\User|\Illuminate\Contracts\Auth\Authenticatable|null
{
    return auth()->user();
}

function isLogged(): bool
{
    return auth()->check();
}
