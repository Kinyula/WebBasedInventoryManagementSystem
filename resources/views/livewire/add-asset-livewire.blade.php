<div>
    <div class="card-box mb-30 p-3">

        <h2 class="h4 pd-20 text-gray-600"><i class="bi bi-plus"></i> Add asset here</h2>

        @if (session()->has('addItems'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong><i class="fas fa-check px-1"></i>{{ session('addItems') }}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session()->has('message'))
        <div role="alert" class="alert alert-success alert-dismissible fade show">
            <strong><i class="fas fa-check px-1"></i> {{ session('message') }}</strong>
            <button class="btn btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
        <form wire:submit.prevent = "importAssets">

            <div class="form-group display:block">
                <label for="">Upload the csv file</label>
                <input type="file" wire:model = "resourceImport">

                @error('resourceImport')
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
                    <i class="fas fa-plus px-1"></i> Create asset
                </button>
            </div>
        </form>
    </div>

    <div class="card-box mb-30 p-3">

        <h2 class="h4 pd-20 text-gray-600"><i class="bi bi-plus"></i> Add asset's cost</h2>

        @if (session()->has('addItems'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong><i class="fas fa-check px-1"></i>{{ session('addItems') }}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session()->has('addCost'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong><i class="fas fa-check px-1"></i>{{ session('addCost') }}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif



        <form wire:submit.prevent = "addItemAssetCost">

            <div class="mt-3">
                <input type="search" wire:model.live = 'searchAsset'
                    placeholder="Search an asset by ' Asset name ' Or by ' ID '" class="w-full">
            </div>

            <div class="mt-3">
                <label for="asset" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Asset's
                    name</label>
                <select type="select" wire:model= "asset"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                    <option value="">-- Choose an asset --</option>
                    @foreach ($Assets as $asset)
                        <option value="{{ $asset->id }}">{{ $asset->asset_type }}</option>
                    @endforeach
                </select>
                @error('asset')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-4">
                <label for="asset_type" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Asset's
                    cost</label>
                <input type="number" wire:model= "asset_cost"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                    placeholder="Enter the asset's cost">
                @error('asset_cost')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div>
                <br>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4">
                    <i class="fas fa-plus px-1"></i> Create asset cost
                </button>
            </div>
        </form>
    </div>

    <div class="card-box mb-30 p-3">

        <h2 class="h4 pd-20 text-gray-600"><i class="bi bi-eye"></i> View asset's cost</h2>

        @if (session()->has('addItems'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong><i class="fas fa-check px-1"></i>{{ session('addItems') }}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif


        @if (session()->has('addCost'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong><i class="fas fa-check px-1"></i>{{ session('addCost') }}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif


        <div>

            <div>

                @if (session()->has('deleteSupplier'))
                    <div role="alert" class="alert alert-success alert-dismissible fade show">
                        <strong><i class="fas fa-check px-1"></i>{{ session('deleteSupplier') }}</strong>
                        <button class="btn btn-close"></button>
                    </div>
                @endif

                <form wire:submit.prevent = 'exportAssetPdf'>

                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 float-end">
                        <i class="bi bi-download font-weight-bold p-1"></i>
                        Export asset PDF
                    </button>

                </form>

                <div class="header-search ">

                    <form class="d-flex">

                        <div class="form-group mb-0">

                            <input type="search" class="form-control search-input" placeholder="Search Here..."
                                wire:model.live = 'searchAsset' style="position: relative;bottom:20%" />

                        </div>
                    </form>

                </div>

                <table class="data-table table nowrap">
                    <thead>
                        <tr>
                            <th class="table-plus datatable-nosort font-weight-bold">Asset name</th>
                            <th class="font-weight-bold">Asset's price</th>

                            <th class="datatable-nosort font-weight-bold">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Assets as $asset)
                            <tr>

                                <td>
                                    <h5 class="font-16">{{ $asset->asset_type }}</h5>

                                </td>


                                <td>

                                    <h5 class="font-16">Tsh : {{ $asset->cost->cost??'-- NIL --' }}/=</h5>

                                </td>

                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                            href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>

                                    </div>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $Assets->links() }}
            </div>
        </div>

    </div>
</div>
