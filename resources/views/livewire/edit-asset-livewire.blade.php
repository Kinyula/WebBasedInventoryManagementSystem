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
                <span class="text-danger">Asset name : </span>
                <span class="font-weight-bold">{{ $Asset->asset_type }}</span>
            </div>

            <div class="category">
                <span class="text-danger">Asset status : </span>
                <span class="font-weight-bold">{{ $Asset->asset_status }}</span>
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
                    type</label>

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

            <div class="flex items-center justify-end mt-4">


                <x-primary-button class="ms-4">
                    {{ __('Update') }}
                </x-primary-button>
            </div>
        </form>
    </div>


</div>

{{-- update product's price --}}


