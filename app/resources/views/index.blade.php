        @if(auth()->user())
        @if(isset($product->like_products[0]))
        <a class="toggle_wish" item_id="{{ $product->id }}" like_product="1">
            <i class="fas fa-heart"></i>
        </a>
        @else
        <a class="toggle_wish" item_id="{{ $product->id }}" like_product="0">
            <i class="far fa-heart"></i>
        </a>
        @endif
        @endif