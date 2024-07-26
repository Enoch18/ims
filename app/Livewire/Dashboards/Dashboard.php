<?php

namespace App\Livewire\Dashboards;

use Livewire\Component;

class Dashboard extends Component
{
    public $salesRevenueChart;
    public $topSellingProducts;
    public $supplierPerformance;
    public $inventoryValueByCategory;

    public function mount(){
        $this->salesRevenueChart = $this->getsalesRevenueChart();
        $this->topSellingProducts = $this->topSellingProductsChart();
        $this->supplierPerformance = $this->supplierPerformanceChart();
        $this->inventoryValueByCategory = $this->inventoryValueByCategory();
    }

    public function getSalesRevenueChart(){
        return [
            'type' => 'bar',
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            'datasets' => [
                [
                    'label' => 'Sales',
                    'backgroundColor' => '#42A5F5',
                    'data' => [65, 59, 80, 81, 56, 55, 40]
                ],
                [
                    'label' => 'Revenue',
                    'backgroundColor' => '#66BB6A',
                    'data' => [28, 48, 40, 19, 86, 27, 90]
                ]
            ]
        ];
    }

    public function topSellingProductsChart(){
        return [
            'type' => 'pie',
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            'datasets' => [
                [
                    'label' => 'Top Selling Products',
                    'data' => [65, 59, 80, 81, 56, 55, 40]
                ]
            ]
        ];
    }

    public function supplierPerformanceChart(){
        return [
            'type' => 'line',
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            'datasets' => [
                [
                    'label' => 'Top Selling Products',
                    'data' => [65, 59, 80, 81, 56, 55, 40]
                ]
            ]
        ];
    }

    public function inventoryValueByCategory(){
        return [
            'type' => 'doughnut',
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            'datasets' => [
                [
                    'label' => 'Top Selling Products',
                    'data' => [65, 59, 80, 81, 56, 55, 40]
                ]
            ]
        ];
    }

    public function render()
    {
        return view('livewire.dashboards.dashboard');
    }
}
