<?php

namespace Tests\Feature;

use App\Livewire\Invoice\Add;
use App\Livewire\Invoice\Edit;
use Livewire\Livewire;
use Tests\TestCase;

class InvoiceTest extends TestCase
{
    public function generateOrderFruits()
    {
        $category = \App\Models\Category::first();
        $fruits = $category->fruits->toArray();

        return array_map(function ($fruit) use ($category) {
            return [
                'id' => $fruit['id'],
                'order' => 1,
                'name' => $fruit['name'],
                'unit' => $fruit['unit'],
                'price' => $fruit['price'],
                'quantity' => 1,
                'categoryName' => $category['name'],
            ];
        }, $fruits);
    }

    public function getOrderDetails($invoice)
    {
        $fruits = $invoice->fruits->toArray();

        return array_map(function ($fruit) {
            return [
                'id' => $fruit['id'],
                'order' => 1,
                'name' => $fruit['name'],
                'unit' => $fruit['unit'],
                'price' => $fruit['price'],
                'quantity' => $fruit['pivot']['quantity'],
                'categoryName' => $fruit['pivot']['category_name'],
            ];
        }, $fruits);
    }

    public function testCreateCorrectInvoice()
    {
        $user = \App\Models\User::first();

        $orderFruits = $this->generateOrderFruits();

        Livewire::actingAs($user)
            ->test(Add::class)
            ->set('customerName', 'foo')
            ->set('orderFruits', $orderFruits)
            ->call('createInvoice')
            ->assertStatus(200);
    }

    public function testCreateCorrectInvoiceIncorrectCustomerName()
    {
        $user = \App\Models\User::first();

        $orderFruits = $this->generateOrderFruits();

        Livewire::actingAs($user)
            ->test(Add::class)
            ->set('customerName', '')
            ->set('orderFruits', $orderFruits)
            ->call('createInvoice')
            ->assertStatus(200)
            ->assertHasErrors(['customerName']);
    }

    public function testCreateCorrectInvoiceIncorrectOrderFruit()
    {
        $user = \App\Models\User::first();

        $orderFruits = [];

        Livewire::actingAs($user)
            ->test(Add::class)
            ->set('customerName', fake()->name())
            ->set('orderFruits', $orderFruits)
            ->call('createInvoice')
            ->assertStatus(200)
            ->assertHasErrors(['orderFruits']);
    }

    public function testUpdateCorrectInvoice()
    {
        $user = \App\Models\User::first();
        $invoice = \App\Models\Invoice::first();
        $orderFruits = $this->getOrderDetails($invoice);

        $newOrderFruits = array_slice($this->generateOrderFruits(), 5);

        Livewire::actingAs($user)
            ->test(Edit::class, [
                'orderFruits' => $orderFruits,
                'customerName' => $invoice->customer_name,
                'idOrder' => $invoice->id
            ])
            ->set('customerName', fake()->name())
            ->set('orderFruits', $newOrderFruits)
            ->call('updateInvoice')
            ->assertStatus(200);
    }

    public function testUpdateInvoiceIncorrectOrderFruit()
    {
        $user = \App\Models\User::first();
        $invoice = \App\Models\Invoice::first();
        $orderFruits = $this->getOrderDetails($invoice);

        $newOrderFruits = [];

        Livewire::actingAs($user)
            ->test(Edit::class, [
                'orderFruits' => $orderFruits,
                'customerName' => $invoice->customer_name,
                'idOrder' => $invoice->id
            ])
            ->set('customerName', fake()->name())
            ->set('orderFruits', $newOrderFruits)
            ->call('updateInvoice')
            ->assertStatus(200)
            ->assertHasErrors(['orderFruits']);
    }

    public function testUpdateInvoiceIncorrectCustomerName()
    {
        $user = \App\Models\User::first();
        $invoice = \App\Models\Invoice::first();
        $orderFruits = $this->getOrderDetails($invoice);

        $newOrderFruits = array_slice($this->generateOrderFruits(), 5);

        Livewire::actingAs($user)
            ->test(Edit::class, [
                'orderFruits' => $orderFruits,
                'customerName' => $invoice->customer_name,
                'idOrder' => $invoice->id
            ])
            ->set('customerName', '')
            ->set('orderFruits', $newOrderFruits)
            ->call('updateInvoice')
            ->assertStatus(200)
            ->assertHasErrors(['customerName']);
    }
}
