<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Common\HttpStatus;
use App\Module\User\Api\ApiInterface as UserApiInterface;
use App\Module\User\Api\Data\UserRegistrationData;
use App\Module\User\Api\Exception\ApiException;
use App\Module\User\Infrastructure\Factory\UserModuleFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class AuthController extends BaseController
{
    private UserApiInterface $userApi;

    public function __construct()
    {
        $this->userApi = UserModuleFactory::getInstance();
    }

    public function register(Request $request): JsonResponse
    {
        try
        {
            Validator::make($request->post(), [
                'first_name' => ['required', 'max:255'],
                'middle_name' => ['required', 'max:255'],
                'last_name' => ['required', 'max:255'],
                'email' => ['required', 'email'],
                'phone' => ['required', 'regex:/^\+7\d{10}$/i'],
                'password' => ['required', Password::min(6)->letters()->mixedCase()->numbers()->symbols()],
            ])->validate();

            $this->userApi->registerUser(new UserRegistrationData(
                $request->post('first_name'),
                $request->post('middle_name'),
                $request->post('last_name'),
                $request->post('email'),
                $request->post('phone'),
                Hash::make($request->post('password')),
            ));

            return response()->json([
                'success' => true,
            ], HttpStatus::OK);
        }
        catch (ValidationException $e)
        {
            return response()->json([
                'success' => false,
                'errors' => $e->errors(),
            ], HttpStatus::BAD_REQUEST);
        }
        catch (ApiException $e)
        {
            return response()->json([
                'success' => false,
                'errors' => [ 'internal' => 'internal error' ],
            ], HttpStatus::OK);
        }
    }
}
