<?php

namespace App\Http\Controllers;

use App\Models\CiveResource;


class ApiController extends Controller
{
    public function successResponse($id)
    {
        $data = CiveResource::findOrFail($id);

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function errorResponse($message = 'Request failed', $statusCode = 400)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,

        ], $statusCode);
    }

    public function arrayResponse(array $data)
    {
        return response()->json($data);
    }

    public function dataResponse($data)
    {
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }
}
