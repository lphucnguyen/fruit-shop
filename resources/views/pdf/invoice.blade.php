<html lang="en">

<head>
    <title>Invoice</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <div class="px-2 py-8 max-w-xl mx-auto">
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center">
                <div class="text-gray-700 font-semibold text-lg">{{ config('APP_NAME', env('APP_NAME')) }}</div>
            </div>
            <div class="text-gray-700">
                <div class="font-bold text-xl mb-2 uppercase">Invoice</div>
                <div class="text-sm text-right">Date: {{ date('d/m/Y', strtotime($invoice['created_at'])) }}</div>
                <div class="text-sm text-right">Invoice #: {{ $invoice['id'] }}</div>
                <div class="text-sm text-right">Staff   #: {{ $invoice['user']['name'] }}</div>
            </div>
        </div>
        <div class="border-b-2 border-gray-300 pb-8 mb-8">
            <h2 class="text-2xl font-bold mb-4">Bill To:</h2>
            <div class="text-gray-700 mb-2">{{ $invoice['customer_name'] }}</div>
        </div>
        <table class="w-full text-left mb-8">
            <thead>
                <tr>
                    <th class="text-gray-700 font-bold uppercase py-2">No</th>
                    <th class="text-gray-700 font-bold uppercase py-2">Category</th>
                    <th class="text-gray-700 font-bold uppercase py-2">Fruit</th>
                    <th class="text-gray-700 font-bold uppercase py-2">Unit</th>
                    <th class="text-gray-700 font-bold uppercase py-2">Price</th>
                    <th class="text-gray-700 font-bold uppercase py-2">Quantity</th>
                    <th class="text-gray-700 font-bold uppercase py-2">Amout</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoice['fruits'] as $key => $item)
                <tr>
                    <td class="py-4 text-gray-700">{{ $key + 1 }}</td>
                    <td class="py-4 text-gray-700">{{ $item['categoryName'] }}</td>
                    <td class="py-4 text-gray-700">{{ $item['name'] }}</td>
                    <td class="py-4 text-gray-700">{{ $item['unit'] }}</td>
                    <td class="py-4 text-gray-700">{{ number_format($item['price'], 0, "", ",") }}</td>
                    <td class="py-4 text-gray-700">{{ $item['quantity'] }}</td>
                    <td class="py-4 text-gray-700">{{ number_format($item['price'] * $item['quantity'], 0, "", ",") }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="flex justify-end items-end mb-8">
            <div class="text-gray-700 mr-2">Total:</div>
            <div class="text-gray-700 font-bold text-xl">{{ number_format($invoice['total'], 0, "", ",") }}</div>
        </div>
        <div class="border-t-2 border-gray-300 pt-8 mb-8">
            <div class="text-gray-700 mb-2">Payment is due within 30 days. Late payments are subject to fees.</div>
            <div class="text-gray-700 mb-2">Please make checks payable to {{ config('APP_NAME', env('APP_NAME')) }} and mail to:</div>
            <div class="text-gray-700">123, Hai Ba Trung, District 1, Ho Chi Minh city</div>
        </div>
    </div>

    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>