<?php
declare(strict_types=1);

namespace App\Module\Shop\Infrastructure\Query;

use App\Module\Shop\App\Data\GetProductsDataInterface;
use App\Module\Shop\App\Data\ProductListItem;
use App\Module\Shop\App\Query\ProductQueryServiceInterface;
use Illuminate\Support\Facades\DB;

final class ProductQueryService implements ProductQueryServiceInterface
{
    public function getProductList(GetProductsDataInterface $params): array
    {
        $rows = DB::table('product')
            ->select('product.id', 'product.title', 'product.amount', 'product_property.code', 'product_property.value')
            ->leftJoin('product_property', 'product.id', '=', 'product_property.product_id')
            ->offset($params->getPageSize() * $params->getPageNum())
            ->limit($params->getPageSize())
            ->get()
            ->all();

        $products = [];
        foreach ($rows as $row)
        {
            if (!array_key_exists($row->id, $products))
            {
                $products[$row->id] = [
                    'id' => $row->id,
                    'title' => $row->title,
                    'amount' => $row->amount,
                    'properties' => $row->code ? [ [ 'code' => $row->code, 'value' => $row->value ] ] : [],
                ];
                continue;
            }
            $products[$row->id]['properties'][] = [
                'code' => $row->code,
                'value' => $row->value
            ];
        }

        return array_map(static function(array $item): ProductListItem {
            $properties = [];
            foreach ($item['properties'] as [ 'code' => $code, 'value' => $value ])
            {
                $properties[$code] = $value;
            }

            return new ProductListItem(
                (string) $item['id'],
                $item['title'],
                $item['amount'],
                $properties
            );
        }, $products);
    }
}
