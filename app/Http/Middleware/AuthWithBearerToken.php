<?php

namespace App\Http\Middleware;

use App\Http\Common\HttpStatus;
use App\Module\User\Api\ApiInterface;
use App\Module\User\Infrastructure\Factory\UserModuleFactory;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthWithBearerToken
{
    private ApiInterface $userApi;

    public function __construct()
    {
        $this->userApi = UserModuleFactory::getInstance();
    }

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return Response|RedirectResponse|JsonResponse
     */
    public function handle(Request $request, Closure $next): Response|RedirectResponse|JsonResponse
    {
        $token = $request->bearerToken();
        if (!$token)
        {
            return self::unauthorizedWithMessage('token not found');
        }

        $userId = $this->userApi->getUserIdByToken($token);
        if (!$userId)
        {
            return self::unauthorizedWithMessage();
        }

        return $next($request);
    }

    private static function unauthorizedWithMessage(string $message = 'unauthorized'): JsonResponse
    {
        return response()->json([
            'success' => false,
            'errors' => [
                'authorized' => $message,
            ]
        ], HttpStatus::UNAUTHORIZED);
    }
}
