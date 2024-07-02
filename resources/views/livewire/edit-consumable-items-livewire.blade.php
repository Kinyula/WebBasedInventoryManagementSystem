<div>

    <div class="card-box mb-3 p-3">
        <h2 class="h5 pd-20">Update details from the {{ auth()->user()->college_name }}</h2>
        <img src="{{ asset('vendors/images/udom.png') }}" class="float-end  udom-logo" alt="" srcset=""
            style="float:inline-end">
    </div>


    <div class="card-box mb-30 p-3">



        <div class="previous-information">
            <span class="font-weight-bold text-2xl">Previous informations</span>
            <br>
            <div class="previous-allocation-status">
                <span class="font-weight-bold">Details : </span>
                <span class="font-weight-bold text-danger">{{ $Consumable->details }}</span>
            </div>

            <div class="previous-status">
                <span class="font-weight-bold">Quantity received : </span>
                <span class="font-weight-bold text-danger">{{ Illuminate\Support\Number::format($Consumable->quantity_received )}}</span>
            </div>

            <div class="previous-asset-status">
                <span class="font-weight-bold">Quantity issued : </span>
                <span class="font-weight-bold text-danger">{{ Illuminate\Support\Number::format($Consumable->quantity_issued )}}</span>
            </div>

            <div class="previous-allocation-status">
                <span class="font-weight-bold">Previous  cost : </span>
                <span class="font-weight-bold">Tsh </span>
                <span
                    class="font-weight-bold text-danger">{{ Illuminate\Support\Number::format($Consumable->cost, precision: 2) }}/=</span>
            </div>

        </div>

        <br>

        @if (session()->has('success'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('success') }}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form wire:submit.prevent = "editConsumableItem({{ $id }})">


            @if (auth()->user()->post === 'store')

            <div class="mt-3">
                <label for="cost" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>
                    Details
                </label>
                <input type="text" wire:model= "details"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                    placeholder="Update details">
                @error('details')
                    <strong
                        class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-3">
                <label for="quantity_received" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>
                    Quantity received
                </label>
                <input type="number" wire:model= "quantity_received"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                    placeholder="Update details">
                @error('quantity_received')
                    <strong
                        class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-3">
                <label for="quantity_issued" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>
                    Quantity issued
                </label>
                <input type="number" wire:model= "quantity_issued"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                    placeholder="Update details">
                @error('quantity_issued')
                    <strong
                        class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

                <div class="mt-3">
                    <label for="cost" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>
                        Cost
                    </label>
                    <input type="number" wire:model= "resource_cost"
                        class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                        placeholder="Update resource cost">
                    @error('cost')
                        <strong
                            class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                    @enderror
                </div>


                <br>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4"
                    onclick="confirm(`Are you sure you want to update the status of this cive resource  ?`) || event.StopImmediatePropagation()">
                    <i class="bi bi-check text-xl"></i> Update consumable item
                </button>

                <a href="{{ asset('UIMS/consumable-items') }}" wire:loading.attr = 'disabled'
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-400 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 float-end">
                    <i class="bi bi-arrow-left px-1"></i> Back
                </a>


                {{-- <div class="mt-4">
                <label for="quantity" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Asset
                    quantity</label>
                <input type="number" wire:model= "quantity"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                    placeholder="Enter the resource quantity ">
                @error('quantity')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div> --}}
            @else
            @endif


        </form>
    </div>
</div>
