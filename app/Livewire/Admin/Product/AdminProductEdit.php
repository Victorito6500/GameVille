<?php

namespace App\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Genre;
use App\Models\Platform;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminProductEdit extends Component
{
    use WithFileUploads;

    public $product_id;

    public $name;
    public $description;
    public $release_date;
    public $developers;
    public $category;
    public $genre;
    public $platform;
    public $image;
    public $price;
    public $stock;

    public $delete_image;

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'release_date' => 'nullable|date',
            'developers' => 'nullable|string|max:255',
            'category' => 'nullable|numeric',
            'genre' => 'nullable|numeric',
            'platform' => 'nullable|numeric',
            'image' => 'nullable|image|max:1024',
            'price' => 'required|numeric|decimal:0,2',
            'stock' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Un nombre es obligatorio',
            'name.max' => 'El nombre es demasiado largo',
            'release_date.date_format' => 'La fecha debe tener el formato AAAA-MM-DD',
            'developers.max' => 'El desarrollador es demasiado largo',
            'category.numeric' => 'El campo categoría no es válido',
            'genre.numeric' => 'El campo género no es válido',
            'platform.numeric' => 'El campo plataforma no es válido',
            'image.image' => 'El archivo debe ser una foto',
            'image.max' => 'El archivo no puede superar 1MB',
            'price.numeric' => 'El precio debe ser un número',
            'price.decimal' => 'El precio debe tener entre 0 y 2 decimales',
            'stock.numeric' => 'El stock debe ser un número'
        ];
    }

    public function deleteImage()
    {
        $this->image = null;

        $this->delete_image = true;
    }

    public function editProduct()
    {
        $this->validate();

        $product = Product::find($this->product_id);

        $product->name = $this->name;
        $product->description = $this->description;
        $product->release_date = $this->release_date;
        $product->developers = $this->developers;
        $product->category_id = $this->category;
        $product->genre_id = $this->genre ?: null;
        $product->platform_id = $this->platform;
        $product->price = $this->price;
        $product->stock = $this->stock;


        if ($this->image) {
            $image_path = time() . '_' . $this->image->getClientOriginalName();

            $this->image->storeAs(
                'public/images/products',
                $image_path,
                'local'
            );

            Storage::disk('local')->delete('public/images/products/' . $product->image_path);

            $product->image_path = $image_path;
        }

        if ($this->delete_image) {
            Storage::disk('local')->delete('public/images/products/' . $product->image_path);
            $product->image_path = null;
        }

        $product->save();

        return redirect()->route('admin.product')->with('product_edited', true);
    }

    public function mount($product_id)
    {
        $this->product_id = $product_id;

        $product = Product::find($this->product_id);

        $this->name = $product->name;
        $this->description = $product->description;
        $this->release_date = $product->release_date;
        $this->developers = $product->developers;
        $this->category = $product->category_id;
        $this->genre = $product->genre_id;
        $this->platform = $product->platform_id;
        $this->image = null;
        $this->price = $product->price;
        $this->stock = $product->stock;

        $this->delete_image = false;
    }

    public function render()
    {
        $product = Product::find($this->product_id);
        $categories = Category::all();
        $genres = Genre::all();
        $platforms = Platform::all();

        if ($this->delete_image) {
            $product->image_path = null;
        }

        return view('livewire.admin.product.admin-product-edit', [
            'product' => $product,
            'categories' => $categories,
            'genres' => $genres,
            'platforms' => $platforms
        ]);
    }
}
