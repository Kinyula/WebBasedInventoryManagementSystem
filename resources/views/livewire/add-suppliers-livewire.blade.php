<div>
    <div class="card-box mb-30 p-3">
        <h2 class="h4 pd-20 text-gray-600">Add new supplier.</h2>

        @if (session()->has('supplier'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('supplier') }}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <button type="submit"
            class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4">
            <i class="bi bi-upload font-weight-bold p-1"></i>
            Import suppliers from csv file
        </button>



        <form wire:submit.prevent = "addNewSupplier">
            <div class="mt-3">
                <label for="suppliers" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Supplier
                    name / Company name</label>
                <input type="text" wire:model= "SupplierName"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                    placeholder="Enter supplier's name or company's name">
                @error('SupplierName')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-3">
                <label for="suppliers" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Supplier
                    location / Company location</label>
                <input type="text" wire:model= "SupplierLocation"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                    placeholder="Enter supplier's location or company's location">
                @error('SupplierLocation')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div>
                <br>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4">
                    <i class="fa-solid fa-plus px-1"></i>
                    Add supplier
                </button>
            </div>
        </form>
    </div>

    <div class="card-box mb-30 p-3">

        <h2 class="h4 pd-20 text-gray-600"><i class="bi bi-plus"></i>
            @if (auth()->user()->email == auth()->user()->email)
            View your more tasks here
            @else

            @endif

        </h2>
        <div class="d-grid space-x-5">
            <a wire:navigate href="{{ asset('UIMS/register-supplier-phone-numbers') }}"><i class="fas fa-phone px-1"></i> Add supplier ' s contacts</a>
            <a wire:navigate href="{{ asset('UIMS/register-supplier-services') }}"><i class="fas fa-tasks px-1"></i> Add supplier ' s services</a>
            <a wire:navigate href="{{ asset('UIMS/view-suppliers') }}"><i class="fas fa-user"></i> View suppliers</a>
        </div>

    </div>
</div>
