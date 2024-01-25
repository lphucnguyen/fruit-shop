<div>
    <form wire:submit.prevent="updateInvoice">
        <label class="form-label">Customer name</label>
        <input type="text" wire:model="customerName" placeholder="Customer name" class="form-input w-100" />
        @error('customerName') <span class="text-danger">{{ $message }}</span> @enderror
        <table class="table-fill margin-y">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Category</th>
                    <th>Fruit</th>
                    <th>Unit</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orderFruits as $orderFruit)
                <tr>
                    <td>{{ $orderFruit['order'] }}</td>
                    <td>
                        {{ $orderFruit['categoryName'] }}
                    </td>
                    <td>
                        {{ $orderFruit['name'] }}
                    </td>
                    <td>
                        {{ $orderFruit['unit'] }}
                    </td>
                    <td>{{ number_format($orderFruit['price'], 0,"", ",") }}</td>
                    <td>
                        <input type="number" wire:change="changeQuantity({{ $orderFruit['id'] }})"
                            name="quantity[{{ $orderFruit['id'] }}][quantity]" min="1"
                            wire:model="orderFruits.{{ $orderFruit['id'] }}.quantity" />
                    </td>
                    <td>{{ number_format($orderFruit['price'] * $orderFruit['quantity'], 0,"", ",") }}</td>
                    <td>
                        <button wire:click.prevent="removeFruit({{ $orderFruit['id'] }})"
                            class="btn button-secondary">Remove</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="margin-y">
            <div class="invoice-form">
                <div class="invoice-form-item">
                    <label class="form-label">Category</label>
                    <div>
                        <select wire:change="changeCategory" wire:model="idCategorySelected" class="form-input w-100"
                            name="category" id="category">
                            <optio disabled>Select category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                        </select>
                    </div>
                </div>
                <div class="invoice-form-item margin-x">
                    <label class="form-label">Fruit</label>
                    <div>
                        <select name="country" wire:model="idFruitSelected" id="fruit" class="form-input w-100">
                            <option disabled>Select fruit</option>
                            @foreach($fruitByCategory as $fruit)
                            <option value="{{ $fruit->id }}">{{ $fruit->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="invoice-form-item">
                    <label class="form-label">Quantity</label>
                    <input wire:model="quantity" type="number" class="form-input w-100" min="1" />
                </div>
            </div>
            <button wire:click.prevent="addFruit" class="btn button-primary margin-y w-100">Add Fruit</button>
        </div>
        @error('orderFruits') <span class="text-danger">{{ $message }}</span> @enderror
        <h3 class="text-right">Total: {{ number_format($total, 0,"", ",") }}</h3>
        @if(session('success'))
        <div class="text-success">
            {{ session('success') }}
        </div>
        @endif
        @if($successfullyMessage !== '')
        <div class="text-success">
            {{ $successfullyMessage }}
        </div>
        @endif
        <div>
            <button class="btn button-primary">Update invoice</button>
            <a target="_blank" href={{ route('invoice.print', ['id' => $idOrder]) }} class="btn button-primary">Print invoice</a>
            <a href="{{ route('invoice.index') }}" class="btn button-secondary">Cancel</a>
        </div>
    </form>
</div>
