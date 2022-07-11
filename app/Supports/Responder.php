<?php

namespace App\Supports;

class Responder
{
    public static function success($data, string $message)
    {
        return response()->json([
            'status' => true,
            'data' => $data,
            'message' => $message
        ]);
    }

    public static function fail($data, string $message)
    {
        return response()->json([
            'status' => false,
            'data' => $data,
            'message' => $message
        ]);
    }
}
