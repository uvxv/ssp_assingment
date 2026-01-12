<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Payment;


class RevenueChart extends Component
{
    public function render()
    {
        $revenues = Payment::selectRaw('MONTH(created_at) as month, SUM(amount) as total')
            ->whereYear('created_at', date('Y'))
            ->groupByRaw('MONTH(created_at)')
            ->orderByRaw('MONTH(created_at)')
            ->get();
        
        $labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $data = array_fill(0, 12, 0);
        foreach ($revenues as $row) {
            
            $data[$row->month - 1] = $row->total;
        }
        return view('livewire.revenue-chart', ['labels' => $labels, 'data' => $data]);
    }
}
