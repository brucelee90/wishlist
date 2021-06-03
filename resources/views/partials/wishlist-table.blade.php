<table class="min-w-max w-full table-auto">
    <thead>
    <tr>
        <th>Title</th>
        <th>Created At</th>
    </tr>
    </thead>
    <tbody>

    @foreach ($products['body']->container['data']['nodes'] as $product)

        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
            <td class="py-3 px-6 text-left whitespace-nowrap">{{$product['title']}}</td>
            <td class="py-3 px-6 text-left whitespace-nowrap">{{$product['createdAt']}}</td>
        </tr>
    @endforeach

    </tbody>
</table>
