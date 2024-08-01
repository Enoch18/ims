<div>
    <h4 class="text-xl">Add Product</h4>
    
    <x-admin.add-edit-product 
        :categories="$categories"
        :suppliers="$suppliers"
        :image="$image"
        :current_image="$current_image"
    />
</div>
