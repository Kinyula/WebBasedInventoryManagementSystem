<div>

    <div class="card-box mb-3 p-3">
        <h2 class="h5 pd-20">Update status from the {{ auth()->user()->college_name }}</h2>
        <img src="{{ asset('vendors/images/udom.png') }}" class="float-end  udom-logo" alt="" srcset=""
            style="float:inline-end">
    </div>

    <div class="card-box mb-30 p-3">

        <div class="previous-information">

            <div class="previous-allocation-status">
                <span class="font-weight-bold">Resource name : </span>
                <span class="font-weight-bold text-danger">{{ $Status->resource_name }}</span>
            </div>

            <div class="previous-status">
                <span class="font-weight-bold">Previous status : </span>
                <span class="font-weight-bold text-danger">{{ $Status->status }}</span>
            </div>

            <div class="previous-asset-status">
                <span class="font-weight-bold">Previous asset status : </span>
                <span class="font-weight-bold text-danger">{{ $Status->asset_status }}</span>
            </div>

            <div class="previous-allocation-status">
                <span class="font-weight-bold">Previous allocation status : </span>
                <span class="font-weight-bold text-danger">{{ $Status->allocation_status }}</span>
            </div>

            <div class="previous-allocation-status">
                <span class="font-weight-bold">Previous repair status : </span>
                <span class="font-weight-bold text-danger">{{ $Status->repair_status }}</span>
            </div>
            <div class="previous-allocation-status">
                <span class="font-weight-bold">Previous resource cost : </span>
                <span class="font-weight-bold">Tsh </span>
                <span class="font-weight-bold text-danger">{{ Illuminate\Support\Number::format($Status->resource_cost, precision:2) }}/=</span>
            </div>

            <div class="previous-asset-status">
                <span class="font-weight-bold">Previous room number : </span>
                <span class="font-weight-bold text-danger">{{ $Status->room }}</span>
            </div>

        </div>

        <br>
        @if (session()->has('resourceStatusMessage'))
        <div role="alert" class="alert alert-success alert-dismissible fade show">
            <strong>{{ session('resourceStatusMessage') }}</strong>
            <button class="btn btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

        <form wire:submit.prevent = "editResourceStatus({{ $id }})">


            @if (auth()->user()->post === 'accountant')
            <div class="mt-3">
                <label for="approvalStatus" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>
                    Status</label>
                <select type="select" wire:model= "approvalStatus"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                    <option value="">-- Confirm your action --</option>

                    <option value="Approved">
                        Approved
                    </option>

                    <option value="In progress">
                        In progress
                    </option>


                </select>
                @error('approvalStatus')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

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

            <div class="mt-3">
                <label for="resourceStatus" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>
                    Asset status</label>
                <select type="select" wire:model= "resourceStatus"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                    <option value="">-- Update asset status --</option>

                    <option value="New">
                        New
                    </option>

                    <option value="Very good">
                        Very good
                    </option>

                    <option value="Good">
                        Good
                    </option>

                    <option value="Fair">
                        Fair
                    </option>

                    <option value="Poor">
                        Poor
                    </option>
                </select>
                @error('resourceStatus')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>


            <div class="mt-3">
                <label for="allocationStatus" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>
                    Allocation status</label>
                <select type="select" wire:model= "allocationStatus"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                    <option value="">-- Update allocation status --</option>

                    <option value="Not Allocated">
                        Not Allocated
                    </option>

                    <option value="Transfered">
                        Transfered
                    </option>


                </select>
                @error('allocationStatus')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div>

                <div class="mt-3">
                    <label for="repair_status" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>
                        Repair status</label>
                    <select type="select" wire:model= "repair_status"
                        class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                        <option value="">-- Update repair status --</option>

                        <option value="Repair">
                            Repair
                        </option>


                        <option value="Repaired">
                            Repaired
                        </option>

                        <option value="Normal">
                            Normal
                        </option>


                    </select>
                    @error('repair_status')
                        <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                    @enderror
                </div>

                <div class="mt-3">
                    <label for="resource_cost" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>
                        Resource cost
                        </label>
                    <input type="number" wire:model= "resource_cost"
                        class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                        placeholder="Enter resource cost">
                    @error('resource_cost')
                        <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                    @enderror
                </div>

                <div class="mt-3">
                    <label for="room" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>
                        Room number
                        </label>
                    <input type="text" wire:model= "room"
                        class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                        placeholder="Enter room number">
                    @error('room')
                        <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                    @enderror
                </div>
                <br>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4"
                    onclick="confirm(`Are you sure you want to update the status of this College of Health and Allied Science ( CHAS ) resource  ?`) || event.StopImmediatePropagation()">
                    <i class="bi bi-check"></i> Update status
                </button>

                <a href="{{ asset('UIMS/view-chas-created-resources') }}" wire:loading.attr = 'disabled'
                class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-400 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 float-end">
                <i class="bi bi-arrow-left px-1"></i> Back
            </a>
            </div>
        </form>
    </div>
</div>
