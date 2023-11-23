<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BaseApiController extends Controller
{
    public function successResponse($data,$massage='',$code=200): JsonResponse
    {
        return response()->json([
            'data'=>$data,
            'massage'=>$massage,
            'code'=>$code
        ]);
    }


    public function errorResponse($massage,$code=400): JsonResponse
    {
        return response()->json([
            'massage'=>$massage,
            'code'=>$code
        ]);
    }
}
