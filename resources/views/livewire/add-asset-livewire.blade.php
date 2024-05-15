<div>
    <div class="card-box mb-30 p-3">

        <h2 class="h4 pd-20 text-gray-600"><i class="bi bi-plus"></i> Add items</h2>

        @if (session()->has('addItems'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('addItems') }}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

         <form wire:submit.prevent = "importAssets">

            <div class="form-group display:block">
                <label for="">Upload the csv file</label>
                <input type="file" wire:model = "cobeResourceImport">

                @error('cobeResourceImport')
                    <small class="font-weight-bold text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" wire:loading.attr="disabled"
                class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 mb-5 cursor-pointer">
                <i class="bi bi-upload font-weight-bold p-1"></i>
                Import resources file
            </button>

        </form>

        <form wire:submit.prevent = "addItemAsset">
            <div class="mt-3">
                <label for="category_type" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Category
                    name</label>
                <select type="select" wire:model= "category_type"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                    <option value="">-- Choose the item category --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_type }}</option>
                    @endforeach
                </select>
                @error('category_type')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-4">
                <label for="asset_type" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Asset
                    name</label>
                <input type="text" wire:model= "asset_type"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                    placeholder="Enter the asset type name eg. chair, Table, cupboard">
                @error('asset_type')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>



            <div class="mt-3">
                <label for="asset_status" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Asset
                    status
                    name</label>
                <select type="select" wire:model= "asset_status"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                    <option value="">-- Select status of an asset --</option>
                    <option value="Functional">Functional</option>
                    <option value="Non Functional">Non Functional</option>

                </select>
                @error('asset_status')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>
            {{-- <div class="mt-4">
                <label for="product_image" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Product
                    Image</label>

                <input type="file" wire:model= "product_image"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                    placeholder="Enter product name">
                @error('product_image')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div> --}}

            <div>
                <br>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4">
                    <i class="fas fa-plus px-1"></i> Create item
                </button>
            </div>
        </form>
    </div>
</div>
