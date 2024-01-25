<?php

namespace App\Livewire\Invoice;

use App\DTOs\Invoice\InvoiceUpdateDTO;
use App\Services\Contracts\CategoryServiceInterface;
use App\Services\Contracts\InvoiceServiceInterface;
use Livewire\Component;

class Edit extends Component
{
    public $categories;
    public $orderFruits;
    public $customerName;
    public $idOrder;

    public $idCategorySelected;
    public $idFruitSelected;
    public $fruitByCategory;
    public $successfullyMessage;
    public $quantity;
    public $total;

    private CategoryServiceInterface $categoryService;
    private InvoiceServiceInterface $invoiceService;

    public function boot(
        CategoryServiceInterface $categoryService,
        InvoiceServiceInterface $invoiceService
    ) {
        $this->categoryService = $categoryService;
        $this->invoiceService = $invoiceService;
    }

    public function mount()
    {
        $this->categories = $this->categoryService->all();
        $this->quantity = 1;
        $this->successfullyMessage = '';

        $this->orderFruits = array_column($this->orderFruits, null, 'id');
        $this->total = array_sum(
            array_map(function ($orderFruit) {
                return $orderFruit['price'] * $orderFruit['quantity'];
            }, $this->orderFruits)
        );

        $this->fruitByCategory = [];
        if (count($this->categories) > 0) {
            $this->idCategorySelected = $this->categories[0]->id;
            $this->changeCategory();
        }
    }

    public function changeCategory()
    {
        $category = $this->categoryService->find($this->idCategorySelected);

        if (!$category) {
            $this->fruitByCategory = [];
        } else {
            $this->fruitByCategory = $category->fruits;
            $this->idFruitSelected = $this->fruitByCategory[0]->id ?? null;
        }
    }

    public function addFruit()
    {
        $idFruitSelected = $this->idFruitSelected;

        if ($this->quantity <= 0) {
            return;
        }

        if (isset($this->orderFruits[$idFruitSelected])) {
            $this->orderFruits[$idFruitSelected]['quantity'] += $this->quantity;
            $this->total += $this->orderFruits[$idFruitSelected]['price'] * $this->quantity;
        } else {
            $fruit = $this->fruitByCategory->first(function ($item) use ($idFruitSelected) {
                return $item->id == $idFruitSelected;
            });
            $fruit->quantity = $this->quantity;
            $fruit->categoryName = $this->getCurrentCategoryName();
            $fruit->order = count($this->orderFruits) + 1;
            $this->orderFruits[$idFruitSelected] = $fruit->toArray();
            $this->total += $fruit->price * $this->quantity;
        }
    }

    public function getCurrentCategoryName()
    {
        $idCategory = $this->idCategorySelected;
        $category = $this->categories->first(function ($item) use ($idCategory) {
            return $item->id == $idCategory;
        });

        return $category ? $category->name : '';
    }

    public function removeFruit($idFruitSelected)
    {
        $price = $this->orderFruits[$idFruitSelected]['price'];
        $quantity = $this->orderFruits[$idFruitSelected]['quantity'];
        $this->total -= $price * $quantity;
        unset($this->orderFruits[$idFruitSelected]);
    }

    public function changeQuantity()
    {
        $this->total = 0;
        foreach ($this->orderFruits as $orderFruit) {
            $this->total += $orderFruit['price'] * $orderFruit['quantity'];
        }
    }

    public function updateInvoice()
    {
        $this->validate([
            'customerName' => 'required|min:1|max:255',
            'orderFruits' => 'array|min:1',
            'orderFruits.*.quantity' => 'required|numeric|min:1',
            'orderFruits.*.categoryName' => 'required|string|min:1'
        ]);

        $orderInvoiceDTO = InvoiceUpdateDTO::create([
            'customer_name' => $this->customerName
        ]);

        $orderFruits = array_map(function ($orderFruit) {
            return [
                'fruit_id' => $orderFruit['id'],
                'quantity' => $orderFruit['quantity'],
                'category_name' => $orderFruit['categoryName']
            ];
        }, $this->orderFruits);

        $this->invoiceService->updateInvoice(
            $orderInvoiceDTO,
            $this->idOrder,
            $orderFruits
        );

        $this->successfullyMessage = 'Update invoice success!';
    }

    public function render()
    {
        return view('livewire.invoice.edit');
    }
}
