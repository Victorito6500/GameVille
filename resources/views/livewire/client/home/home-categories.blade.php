<div>
    <!-- Videogames Genres -->
    <section class="p-6 lg:p-8">
        <h2 class="text-2xl text-slate-100 text-center font-medium">
            Géneros de Videojuegos
        </h2>

        {{-- <article class="mt-6 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-5 text-slate-100"> --}}
        <article class="mt-6 flex flex-wrap items-center justify-center gap-5 text-slate-100">
            @foreach ($videogames_genres as $genre)
                @livewire('client.home.home-category-button', ['id' => $genre['id'], 'name' => $genre['name'], 'img_path' => $genre['img_path'], 'input_name' => 'genre_id'])
            @endforeach
        </article>
    </section>

    <!-- Categories -->
    <section class="mt-7 p-6 lg:p-8 sm:rounded-lg">
        <h2 class="text-2xl text-slate-100 text-center font-medium">
            Categorías
        </h2>

        <article class="mt-6 flex flex-wrap items-center justify-center gap-5 text-slate-100">
            @foreach ($categories as $category)
                @livewire('client.home.home-category-button', ['id' => $category['id'], 'name' => $category['name'], 'img_path' => $category['img_path'], 'input_name' => 'category_id'])
            @endforeach
        </article>
    </section>
</div>
