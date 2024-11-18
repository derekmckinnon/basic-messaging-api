<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiException extends Exception
{
    private int $error_code;
    private string $error_title;
    private string $error_message;
    private int $status_code;

    public function __construct(int $error_code, string $error_title, string $error_message, int $status_code = 400)
    {
        parent::__construct();
        $this->error_code = $error_code;
        $this->error_title = $error_title;
        $this->error_message = $error_message;
        $this->status_code = $status_code;
    }

    /**
     * Render the exception as an HTTP response.
     */
    public function render(Request $request): JsonResponse
    {
        return response()->json([
            'error_code' => $this->error_code,
            'error_title' => $this->error_title,
            'error_message' => $this->error_message,
        ], $this->status_code);
    }
}
