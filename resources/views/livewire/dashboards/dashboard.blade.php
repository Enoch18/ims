<div class="mt-5">
    <h4 class="text-xl">Dashboard</h4>

    <div class="grid xs:grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mt-2">
        @php 
            $dashboard_top_values = [
                ['title' => 'Sales Revenue', 'item_value' => 500, 'percentage' => 2.5, 'border_left_color' => 'purple-400'],
                ['title' => 'Gross Profit Margin', 'item_value' => 50, 'percentage' => 2.7, 'border_left_color' => 'green-700'],
                ['title' => 'Customer Satisfaction Score', 'item_value' => 5, 'percentage' => 2.5, 'border_left_color' => 'gray-500'],
                ['title' => 'Inventory Turnover', 'item_value' => 1600, 'percentage' => -10, 'border_left_color' => 'orange-500'],
            ] 
        @endphp

        @foreach($dashboard_top_values as $item)
            <x-admin.paper>
                <x-admin.dashboard-top-box 
                    :item="$item"
                />
            </x-admin.paper>
        @endforeach
    </div>

    <div class="grid xs:grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 mt-5">
        <div>
            @php 
                $chartId = "Chart1";
                $title = "Sales Revenue"; 
            @endphp
            <x-admin.chart 
                :title="$title"
                :chartData="$salesRevenueChart" 
                :chartId="$chartId"
            />
        </div>
        
        <div>
            @php 
                $chartId = "Chart3";
                $title = "Supplier Performance"; 
            @endphp
            <x-admin.chart 
                :title="$title"
                :chartData="$supplierPerformance" 
                :chartId="$chartId"
            />
        </div>

        <div>
            @php 
                $chartId = "Chart4";
                $title = "Stock Alerts"; 
            @endphp
            <x-admin.chart 
                :title="$title"
                :chartData="$salesRevenueChart" 
                :chartId="$chartId"
            />
        </div>

        <div>
            @php 
                $chartId = "Chart2";
                $title="Top Selling Products" ;
            @endphp

            <x-admin.chart 
                :title="$title"
                :chartData="$topSellingProducts" 
                :chartId="$chartId"
            />
        </div>

        <div>
            @php 
                $chartId = "Chart5";
                $title = "Inventory Value By Category"; 
            @endphp
            <x-admin.chart 
                :title="$title"
                :chartData="$inventoryValueByCategory" 
                :chartId="$chartId"
            />
        </div>
    </div>
</div>