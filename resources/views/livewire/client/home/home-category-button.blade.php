<div class="grow min-w-40 max-w-40">
    <form method="POST" action="{{ route('catalog') }}">
        @csrf
        <button type="submit" name="{{ $input_name }}" value="{{ $id }}"
            class="w-full h-40 flex flex-col justify-center items-center gap-3 bg-zinc-700 py-3 lg:py-5 group relative overflow-hidden shadow-lg shadow-gray-950 hover:bg-red-600">
            <!-- Hover Borders -->
            <span
                class="ease absolute left-0 top-0 h-0 w-0 border-t-2 border-slate-100 transition-all duration-300 group-hover:w-full"></span>
            <span
                class="ease absolute right-0 top-0 h-0 w-0 border-r-2 border-slate-100 transition-all duration-300 group-hover:h-full"></span>
            <span
                class="ease absolute bottom-0 right-0 h-0 w-0 border-b-2 border-slate-100 transition-all duration-300 group-hover:w-full"></span>
            <span
                class="ease absolute bottom-0 left-0 h-0 w-0 border-l-2 border-slate-100 transition-all duration-300 group-hover:h-full"></span>

            <!-- Content -->
            <h3 class="text-lg font-medium text-slate-100">{{ $name }}</h3>

            <img src="{{ asset('storage/icons/' . $img_path) }}" class="w-12 fill-red-600" alt="button-logo"
                onerror="this.src='{{ asset('storage/images/no-image.svg') }}'">
        </button>
    </form>
</div>
