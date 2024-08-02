<div>
    <h4 class="text-xl">Add Inventory</h4>

    <x-admin.add-edit-inventory 
        :products="$products"
        :warehouses="$warehouses"
        :locations="$locations"
        defaultValue=""
    />
</div>
