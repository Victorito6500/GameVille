<?php

namespace App\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Genre;
use App\Models\Platform;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminProductCreate extends Component
{
    use WithFileUploads;

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
    }

    public function createProduct()
    {
        $this->validate();

        $product = Product::create([
            'name' => $this->name,
            'description' => $this->description,
            'release_date' => $this->release_date,
            'developers' => $this->developers,
            'category_id' => $this->category,
            'genre_id' => $this->genre,
            'platform_id' => $this->platform,
            'image' => null,
            'price' => $this->price,
            'stock' => $this->stock
        ]);

        if ($this->image) {
            $image_path = time() . '_' . $this->icon->getClientOriginalName();

            $this->image->storeAs(
                'public/images/products',
                $image_path,
                'local'
            );

            Storage::disk('local')->delete('public/images/products/' . $product->image_path);

            $product->image_path = $image_path;
        }

        $product->save();

        return redirect()->route('admin.product')->with('product_created', true);
    }

    public function render()
    {
        $categories = Category::all();
        $genres = Genre::all();
        $platforms = Platform::all();

        return view('livewire.admin.product.admin-product-create', [
            'categories' => $categories,
            'genres' => $genres,
            'platforms' => $platforms
        ]);
    }
}
