<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Common\HttpStatus;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class TestController extends BaseController
{
    public function protectedMethod(): JsonResponse
    {
        return response()->json(['success' => true], HttpStatus::OK);
    }
}
