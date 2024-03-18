<div>
    <div class="card-box mb-30 p-3">
        <h2 class="h4 pd-20 text-gray-600">Asset status is updated here.</h2>
        @if (session()->has('updateStatus'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('updateStatus') }}</strong>
                <button class="btn btn-close"></button>
            </div>
        @endif
        <form wire:submit.prevent = "updateAssetStatus({{ $id }})">

            <div class="mt-3">
                <label for="asset_status" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Asset
                    category</label>
                <select type="select" wire:model= "asset_status"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                    <option value="">-- Select an asset status --</option>

                        <option value="pending">pending</option>
                        <option value="replaced">replaced</option>
                        <option value="repaired">repaired</option>
                        <option value="received">received</option>

                </select>
                @error('asset_status')
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
