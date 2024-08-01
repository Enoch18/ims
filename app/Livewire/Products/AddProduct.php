<?php

namespace App\Livewire\Products;

use Livewire\Component;

use App\Models\Product;

use App\Models\Category;

use App\Models\Supplier;

use Livewire\WithFileUploads;

class AddProduct extends Component
{
    use WithFileUploads;

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

    // SKU should be system generated.

    public function render()
    {
        return view('livewire.products.add-product', [
            'categories' => Category::all(),
            'suppliers' => Supplier::all()
        ]);
    }

    /**
     * Saving the product
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
            $product = new Product;
            $product->name = $this->name;
            $product->sku = $this->generateSKU($this->category_id, $this->name);
            $product->description = $this->description;
            $product->price = $this->price;
            $product->cost = $this->cost;
            $product->quantity = $this->quantity;
            $product->reorder_level = $this->reorder_level;
            $product->manufacturer = $this->manufacturer;
            $product->barcode = $this->barcode;
            $product->image_url = $this->saveImage() ?? "/images/no_product.png";
            $product->status = $this->status;
            $product->supplier_id = $this->supplier_id;
            $product->category_id = $this->category_id;
            $product->save();

            // Resetting the image after saving.
            $this->image = null;

            session()->flash('message', 'Form submitted successfully.');

            // Redirect to products page
            return redirect(route('products.list'));
        }catch(\Exception $e){
            session()->flash('error', 'An error occurred! ' . $e->getMessage());
        }
    }

    /**
     * Generating the SKU for the product
     * 
     * @return Sku
     */
    private function generateSKU($category_id, $name){
        $category = Category::find($category_id)->first()?->name;

        $timestamp = now()->timestamp;
        return strtoupper(substr($category, 0, 3)) . '-' . strtoupper(substr($name, 0, 3)) . '-' . $timestamp;
    }

    private function saveImage(){
        // Create a new file name with timestamp
        $timestamp = now()->timestamp;
        $extension = $this->image->getClientOriginalExtension();
        $fileName = $timestamp . '.' . $extension;

        // Save the image to a directory with the new file name
        $path = $this->image->storeAs('images', $fileName, 'public');

        return $path;
    }
}
