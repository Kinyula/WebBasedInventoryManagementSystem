<div>
    <div class="card-box mb-30 p-3">

        @if (session()->has('addResources'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('addResources') }}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <h2 class="h4 pd-20 text-gray-600"><i class="bi bi-plus"></i> Add {{ auth()->user()->college_name }} resources
        </h2>

        {{-- <form wire:submit.prevent = "importCiveResources">

            <div class="form-group display:block">
                <label for="">Upload the csv, xlsx, xls file</label>
                <input type="file" wire:model = "civeResource">

                @error('civeResource')
                    <small class="font-weight-bold text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" wire:loading.attr="disabled"
                class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 mb-5 cursor-pointer">
                <i class="bi bi-upload font-weight-bold p-1"></i>
                Import resources file
            </button>

        </form> --}}

        <form wire:submit.prevent = "addCiveResources">
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


            <div class="mt-3">
                <label for="category_type" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>University
                    store resource
                    name</label>
                    <div class="search mt-50"><input type="search" wire:model.live = 'searchUniversityResourceName' class="w-100" placeholder="Search the ID of the resource or the RESOURCE NAME for the report"></div>
                <select type="select" wire:model= "university_store_resource_name"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                    <option value="">-- Select university store resource name ( It has to be the same as that of a
                        resource name. ) --</option>
                    @foreach ($Assets as $asset)
                        <option value="{{ $asset->id }}">ID : {{ $asset->id }} -- Resource name :  {{ $asset->asset_type }}</option>
                    @endforeach
                </select>
                @error('university_store_resource_name')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-4">
                <label for="resource_name" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Resource
                    name</label>
                <input type="text" wire:model= "resource_name"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                    placeholder="Enter the resource name eg. chair, Table, cupboard">
                @error('resource_name')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>


            <div class="mt-3">
                <label for="import_quantity" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Select
                    quantity to import</label>
                <input type="number" wire:model = "import_quantity">
                <br>
                @error('import_quantity')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div>
                <br>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4">
                    <i class="fas fa-plus px-1"></i>
                    Add cive resource
                </button>
            </div>
        </form>
    </div>

    <div class="card-box mb-30 p-3">

        <h2 class="h4 pd-20 text-gray-600"><i class="bi bi-plus"></i>
            View more tasks here
        </h2>
        <div class="d-grid space-x-5">
            <a wire:navigate href="{{ asset('UIMS/view-cive-created-resources') }}"><i class="fas fa-book-open px-1"></i> View created resources</a>
            <a wire:navigate href="{{ asset('UIMS/resource-allocation-to-areas') }}"><i class="fas fa-pencil px-1"></i> Allocate resources to areas</a>
            <a wire:navigate href="{{ asset('UIMS/view-resource-allocation-to-areas') }}"><i class="fas fa-eye px-1"></i> View allocated resources to areas</a>
        </div>

    </div>
</div>
