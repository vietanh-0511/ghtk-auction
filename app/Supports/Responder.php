<?php

class Responder
{
    public static function success($data, string $message): array
    {
        return [
            'status' => true,
            'data' => $data,
            'message' => $message
        ];
    }
}
