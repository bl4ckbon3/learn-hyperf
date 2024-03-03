<?php

declare(strict_types=1);

namespace App\GraphQL\Query;

use App\Model\Product;
use App\Repository\ProductRepository;
use GraphQL\Type\Definition\ResolveInfo;
use Hyperf\Collection\Collection;
use Hyperf\Di\Annotation\Inject;
use Hyperf\Paginator\LengthAwarePaginator;
use Menumbing\GraphQL\Trait\InteractWithRepository;
use TheCodingMachine\GraphQLite\Annotations\Query;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class GetAllProducts
{
    use InteractWithRepository;

    #[Inject]
    protected ProductRepository $productRepository;

    /**
     * @return Product[]
     */
    #[Query]
    public function getProducts(ResolveInfo $info, int $page = 1): LengthAwarePaginator
    {
        return $this->mount($info, $this->productRepository)->paginate(1, page: $page);
    }

    protected function relations(): array
    {
        return [
            'items.user' => 'user',
        ];
    }
}
