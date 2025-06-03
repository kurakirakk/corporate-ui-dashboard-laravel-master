<?php

namespace App\Helpers;

class ResponseHandler
{
    public static function success($data = [], $code = 200)
    {
        return response()->json([
            'success' => true,
            'data' => $data
        ], $code);
    }

    public static function created($data = [])
    {
        return self::success($data, 201);
    }

    public static function error($message = 'Terjadi kesalahan.', $code = 500)
    {
        return response()->json([
            'success' => false,
            'message' => $message
        ], $code);
    }

    public static function validationErrors($errors)
    {
        return response()->json([
            'success' => false,
            'errors' => $errors
        ], 422);
    }

    public static function notFound($message = 'Data tidak ditemukan.')
    {
        return self::error($message, 404);
    }
}
