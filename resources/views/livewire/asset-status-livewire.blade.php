<div>
    <div class="card-box mb-30 p-3">
        <h2 class="h4 pd-20 text-gray-600"><i class="bi bi-plus"></i> Add asset status</h2>

        @if (session()->has('addStatuses'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('addStatuses') }}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form wire:submit.prevent = "addStatus">
            <div class="mt-3">
                <label for="asset" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>
                    Asset</label>
                <select type="select" wire:model= "asset"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                    <option value="">-- Choose an asset --</option>
                    @foreach ($assets as $single_asset)
                        <option value="{{ $single_asset->id }}">{{ $single_asset->asset_type }}</option>
                    @endforeach
                </select>
                @error('asset')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div>
                <br>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4"
                    onclick="confirm(`Are you sure you want to add the status of this  asset ?`) || event.StopImmediatePropagation()">
                    <i class="fa-solid fa-paper-plane"></i>
                    Add asset status
                </button>
            </div>
        </form>
    </div>
</div>
