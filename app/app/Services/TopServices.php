<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\item;
use App\Category;
use App\User;
use Illuminate\Database\Eloquent\Collection;


class TopServices
{
    /**
     * 商品リスト取得
     * @param string|null $keyword キーワード
     * @param　string|null $size　サイズ
     * @param　int|null $category カテゴリー
     * @return Collection
     */
    public function getItemList(
        ?string $keyword,
        ?string $size,
        ?int $category
    ): Collection {

        $query = item::query();

        if (!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%")->orWhere('text', 'LIKE', "%{$keyword}%");
        }
        if (!empty($size)) {
            $query->where('size', 'LIKE', "%{$size}%");
        }
        if (!empty($category)) {
            $query->where('category_id', 'LIKE', "%{$category}%");
        }

        $items = $query->where('del_flg', 0)->get();

        return $items;
    }
}
