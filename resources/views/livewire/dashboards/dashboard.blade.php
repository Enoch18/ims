<div class="mt-5">
    <h4 class="text-xl">Dashboard</h4>

    <div class="grid grid-cols-4 gap-4 mt-2">
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
</div>