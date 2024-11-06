<?php

function user()
{
    return \Illuminate\Support\Facades\Auth::guard()->user();
}

function getToken()
{
    return \Tymon\JWTAuth\Facades\JWTAuth::getToken();
}
