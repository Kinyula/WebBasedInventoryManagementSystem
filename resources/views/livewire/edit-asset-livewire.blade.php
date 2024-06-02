<div>
    <div class="card-box mb-30 p-3">
        <h2 class="h4 pd-20 text-gray-600">Assets are updated here.</h2>
        <h4 class=" mb-5">Previous information</h4>

        <div class="previous-information">
            <div class="category">
                <span class="text-danger">Category type : </span>
                <span class="font-weight-bold">{{ $Asset->category?->category_type }}</span>
            </div>

            <div class="category">
                <span class="text-danger">Asset's name : </span>
                <span class="font-weight-bold">{{ $Asset->asset_type }}</span>
            </div>

            <div class="asset-status">
                <span class="text-danger">Asset's status : </span>
                <span class="font-weight-bold">{{ $Asset->asset_status }}</span>
            </div>

            <div class="asset-status">
                <span class="text-danger">Asset's supplier : </span>
                <span class="font-weight-bold">{{ $Asset->supplier?->company_name }}</span>
            </div>

            <div class="asset-status">
                <span class="text-danger">Asset's quantity : </span>
                <span class="font-weight-bold">{{ $Asset->quantity }} {{ $Asset->asset_type }}(s)</span>
            </div>

            <div class="asset-cost">
                <span class="text-danger">Asset's cost : </span>
                <span class="font-weight-bold"> Tsh : {{ Illuminate\Support\Number::format($Asset->asset_cost, precision:2) }}/= <span class="text-danger">Or in otherwords :</span> Tsh :  {{ Illuminate\Support\Number::forHumans($Asset->asset_cost, precision:2) }}</span>
                <span class="text-danger font-weight-bold">( For 1 {{ $Asset->asset_type }} )</span>
            </div>

            <div class="asset-status">
                <span class="text-danger">Total asset cost : </span>
                <span class="font-weight-bold">Tsh : {{ Illuminate\Support\Number::format($Asset->quantity * $Asset->asset_cost, precision:2) }}/=</span>
            </div>
        </div>

        <br>

        @if (session()->has('editAssets'))

        <div role="alert" class="alert alert-success alert-dismissible fade show">
            <strong>{{ session('editAssets') }}</strong>
            <button class="btn btn-close"></button>
        </div>

    @endif
        <form wire:submit.prevent = "editAssets({{ $id }})">
            <div class="mt-3">
                <label for="category_type" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Asset
                    category</label>
                <select type="select" wire:model= "category_type"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                    <option value="">-- Choose an asset category --</option>
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

                <input type="text" wire:model = "asset_type" value="{{$asset_type}}"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                    placeholder="Edit asset name">
                @error('asset_type')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-3">
                <label for="assetStatus" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>

                    Status

                </label>
                <select type="select" wire:model= "assetStatus"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                    <option value="">-- Update status --</option>

                    <option value="Functional">
                        Functional
                    </option>

                    <option value="Non functional">
                        Non functional
                    </option>


                </select>
                @error('assetStatus')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-4">
                <label for="cost" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Asset
                    cost</label>

                <input type="number" wire:model = "cost"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                    placeholder="Edit asset's cost">
                @error('cost')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-4">
                <label for="quantity" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Asset
                    quantity</label>

                <input type="number" wire:model = "quantity"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                    placeholder="Edit asset's quantity">
                @error('quantity')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>


            <div class="mt-3">
                <label for="supplier" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Asset
                    supplier</label>
                <select type="select" wire:model= "supplier"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                    <option value="">-- Choose an asset's supplier --</option>

                        <option value="{{ $Asset->supplier?->company_name }}">{{ $Asset->supplier?->company_name}}</option>

                </select>
                @error('supplier')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div class="flex items-center justify-end mt-4">
                <a wire:navigate href="{{ asset('UIMS/add-asset') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 float-end">
                <i class="fa-solid fa-arrow-left px-1"></i>
                Back
        </a>

                <x-primary-button class="ms-4">
                    <i class="fas fa-plus px-1"></i>
                    {{ __('Update') }}
                </x-primary-button>
            </div>
        </form>
    </div>


</div>

{{-- update product's price --}}


