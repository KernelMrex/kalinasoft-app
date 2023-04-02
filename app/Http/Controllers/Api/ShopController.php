<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Common\HttpStatus;
use App\Module\Shop\Api\ApiInterface as ShopApiInterface;
use App\Module\Shop\Infrastructure\Factory\ShopModuleFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ShopController extends BaseController
{
    private ShopApiInterface $shopApi;

    public function __construct()
    {
        $this->shopApi = ShopModuleFactory::getInstance();
    }

    public function getProducts(Request $request): JsonResponse
    {
        return response()->json([
            'success' => true,
            'items' => [],
        ], HttpStatus::OK);
    }
}
