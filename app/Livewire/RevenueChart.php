<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use App\Models\Payment;


class RevenueChart extends Component
{
    public function render()
    {
        // Retreive monthly revenue data for the authenticated admin by joining orders and products
        $revenues = Order::selectRaw('MONTH(orders.created_at) as month, SUM(orders.total_amount) as total')
            ->join('products', 'orders.product_id', '=', 'products.product_id')
            ->where('products.admin_id', auth('admin')->id())
            ->where('orders.status', 'completed')
            ->groupByRaw('MONTH(orders.created_at)')
            ->get();
        
        $labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $data = array_fill(0, 12, 0);
        foreach ($revenues as $row) {
            
            $data[$row->month - 1] = $row->total;
        }
        return view('livewire.revenue-chart', ['labels' => $labels, 'data' => $data]);
    }
}
