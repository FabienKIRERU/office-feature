<?php

namespace App\Repositories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;

class OrderRepository {

    protected $order;

    public function __construct(?Order $order = null)
    {
       $this->order = $order ?? new Order();
    }
    
    public function getAll(): Collection {
        return Order::with(['user', 'orderItems.property'])->latest()->get();
    }

    public function findById(int $id): ?Order {
        return Order::with(['user', 'orderItems.property'])->findOrFail($id);
    }

    public function create(array $data): Order {
        return Order::create($data);
    }

    public function update(Order $order, array $data): Order {
        $order->update($data);
        return $order;
    }

    public function delete(Order $order): bool {
        return $order->delete();
    }
}
