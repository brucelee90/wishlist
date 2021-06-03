<table class="min-w-max w-full table-auto">
    <thead>
    <tr>
        <th>Title</th>
        <th>Inventory</th>
        <th>Price</th>
        <th>View Product</th>
    </tr>
    </thead>
    <tbody>

    @foreach ($products['body']->container['data']['nodes'] as $product)
{{--    {{dd($product['priceRange']['maxVariantPrice']['amount'])}}--}}
        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
            <td class="py-3 px-6 text-left whitespace-nowrap">
                <div class="flex items-center">
                    <img src="{{$product['featuredImage']['originalSrc']}}" class="w-24" />
                    <p>{{$product['title']}}</p>
                </div>
            </td>
            <td class="py-3 px-6 text-left whitespace-nowrap">{{$product['totalInventory']}}</td>
            <td class="py-3 px-6 text-left whitespace-nowrap">{{$product['priceRange']['maxVariantPrice']['currencyCode']}} {{ number_format($product['priceRange']['maxVariantPrice']['amount']/100, 2, '.', '')}}</td>
            <td class="py-3 px-6 text-left whitespace-nowrap"><a target="_blank" rel="noopener noreferrer" href="{{$product['onlineStorePreviewUrl']}}">View in new tab</a></td>
        </tr>
    @endforeach

    </tbody>
</table>
