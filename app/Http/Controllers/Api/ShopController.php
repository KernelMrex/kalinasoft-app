<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Common\HttpStatus;
use App\Module\Shop\Api\ApiInterface as ShopApiInterface;
use App\Module\Shop\Api\Input\GetProductsInput;
use App\Module\Shop\Api\Output\ProductListItemDataInterface;
use App\Module\Shop\Infrastructure\Factory\ShopModuleFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ShopController extends BaseController
{
    private ShopApiInterface $shopApi;

    public function __construct()
    {
        $this->shopApi = ShopModuleFactory::getInstance();
    }

    public function getProducts(Request $request): JsonResponse
    {
        try
        {
            Validator::make($request->all(), [
                'page_num' => ['numeric', 'min:0'],
                'page_size' => ['numeric', 'min:5', 'max:40'],
                'properties' => ['array'],
                'properties.*' => ['array'],
            ])->validate();

            $output = $this->shopApi->getProducts(new GetProductsInput(
                (int) $request->get('page_num', 0),
                (int) $request->get('page_size', 40),
                (array) $request->get('properties', []),
            ));

            return response()->json([
                'success' => true,
                'amount' => $output->getAmount(),
                'items' => self::productListAsAssoc($output->getProducts()),
            ], HttpStatus::OK);
        }
        catch (ValidationException $e)
        {
            return response()->json([
                'success' => false,
                'errors' => $e->errors(),
            ], HttpStatus::BAD_REQUEST);
        }
    }

    private static function productListAsAssoc(array $products): array
    {
        return array_map(static function(ProductListItemDataInterface $product): array {
            return [
                'title' => $product->getTitle(),
                'amount' => $product->getAmount(),
                'properties' => $product->getProperties(),
            ];
        }, $products);
    }
}
