<?php

namespace App\Livewire\Products;

use Livewire\Component;

use App\Models\Product;

use App\Models\Category;

use App\Models\Supplier;

use Livewire\WithFileUploads;

class EditProduct extends Component
{
    use WithFileUploads;

    public $product_id;
    public $name;
    public $description;
    public $price;
    public $cost;
    public $quantity;
    public $reorder_level;
    public $manufacturer;
    public $barcode;
    public $image;
    public $current_image;
    public $status;
    public $supplier_id;
    public $category_id;

    public function mount($id){
        $product = Product::findOrFail($id);
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->cost = $product->cost;
        $this->quantity = $product->quantity;
        $this->reorder_level = $product->reorder_level;
        $this->manufacturer = $product->manufacturer;
        $this->barcode = $product->barcode;
        $this->current_image = str_contains($product->image_url, '.') ? "/storage/$product->image_url" : '/images/no_product.png';
        $this->status = $product->status;
        $this->supplier_id = $product->supplier_id;
        $this->category_id = $product->category_id;

        $this->product_id = $product->id;
    }

    public function render()
    {
        return view('livewire.products.edit-product', [
            'categories' => Category::all(),
            'suppliers' => Supplier::all()
        ]);
    }

    /**
     * Updating the product
     */
    public function submitProduct(){
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|sometimes|string|max:1000',
            'price' => 'required|numeric',
            'cost' => 'nullable|sometimes|numeric',
            'quantity' => 'required|integer',
            'reorder_level' => 'required|integer',
            'manufacturer' => 'required|string|max:255',
            'barcode' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'supplier_id' => 'required|integer',
            'status' => 'required|string|in:active,discontinued'
        ]);

        try{
            $product = Product::findOrFail($this->product_id);
            $product->name = $this->name;
            $product->description = $this->description;
            $product->price = $this->price;
            $product->cost = $this->cost;
            $product->quantity = $this->quantity;
            $product->reorder_level = $this->reorder_level;
            $product->manufacturer = $this->manufacturer;
            $product->barcode = $this->barcode;
            $product->image_url = $this->saveImage() ?? $product->image_url;
            $product->status = $this->status;
            $product->supplier_id = $this->supplier_id;
            $product->category_id = $this->category_id;
            $product->save();

            session()->flash('message', 'Form submitted successfully.');

            // Redirect to products page
            return redirect(route('products.list'));
        }catch(\Exception $e){
            session()->flash('error', 'An error occurred! ' . $e->getMessage());
        }
    }

    private function saveImage(){
        if($this->image){
            // Create a new file name with timestamp
            $timestamp = now()->timestamp;
            $extension = $this->image->getClientOriginalExtension();
            $fileName = $timestamp . '.' . $extension;

            // Save the image to a directory with the new file name
            $path = $this->image->storeAs('images', $fileName, 'public');

            return $path;
        }else{
            return null;
        }
    }
}
