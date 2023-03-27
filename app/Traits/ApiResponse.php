<?php

namespace App\Traits;


use Illuminate\Http\JsonResponse;

trait ApiResponse
{

    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseSuccess($message = '', $data = ''): JsonResponse
    {
        return response()->json([
            'status' => 200,
            'message' => $message,
            'data' => $data
        ], 200);
    }


    /**
     * @param string $errors
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseUnauthorized($message = '', $errors = 'Unauthorized.'): JsonResponse
    {
        return response()->json([
            'status' => 401,
            'message' => $message,
            'errors' => $errors,
        ], 401);
    }


    /**
     * @param $errors
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseNotFound($message = '', $errors = 'Not Found'): JsonResponse
    {
        return response()->json([
            'status' => 404,
            'message' => $message,
            'errors' => $errors,
        ], 200);
    }

    /**
     * @param string $errors
     * @return JsonResponse
     */
    public function responseServerError($errors = 'Error with server'): JsonResponse
    {
        return response()->json([
            'status' => 500,
            'errors' => $errors,
        ], 500);
    }

    /**
     * @param $errors
     * @return JsonResponse
     */
    public function responseBadRequest($errors): JsonResponse
    {
        return response()->json([
            'status' => 400,
            'errors' => $errors,
        ], 400);
    }
}
