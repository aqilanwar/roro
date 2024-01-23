<?php

namespace App\Livewire;

use App\Models\Bin;
use Livewire\Component;

class AddToCart extends Component
{
    public $productId = 0;

    public $cart = [];

    public function addToCart()
    {
        // Your logic to add the item to the cart goes here
        // Update $this->cart with the added item

        // For example:
        $this->cart[] = [
            'id' => $this->productId,
            'name' => 'Product Name', // Replace with actual product details
            'quantity' => 2, // Initial quantity
            'image' => 'product_image.jpg', // Replace with actual image path
        ];

        // Emit a Livewire event to update the cart on the frontend
        $this->emit('itemAddedToCart', $this->cart);
    }

    public function render()
    {
        $data = $this->cart[] = [
            'id' => $this->productId,
            'name' => 'Product Name', // Replace with actual product details
            'quantity' => 1, // Initial quantity
            'image' => 'product_image.jpg', // Replace with actual image path
        ];

        // Dispatch a Livewire event to update the cart on the frontend
        return view('livewire.add-to-cart', compact('data'));
    }
}
