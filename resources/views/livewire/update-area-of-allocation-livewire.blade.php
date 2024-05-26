<div>
    <div class="card-box mb-30 p-3">
        <h2 class="h4 pd-20 text-gray-600">Resources and their area's information is updated here.</h2>


        <h3 class="h4 pd-20 text-gray-600">Previous information about resources and their areas</h3>
        <div class="area-information">
            <div class="college-inventory-manager-name">
                <span>College inventory manager : </span>
                <span class="text-danger font-weight-bold">{{ $area->user->email }}</span>
            </div>

            <div class="company-location">
                <span>College name : </span>
                <span class="text-danger font-weight-bold">{{ $area->college_name }}</span>
            </div>

            <div class="resource-name">

                <span>Resource name : </span>
                <span class="text-danger font-weight-bold">{{ $area->resource }}</span>

            </div>

            <div class="quantity">

                <span>Quantity :  </span>
                <span class="text-danger font-weight-bold">{{ $area->quantity }}</span>

            </div>

            <div class="area-of-allocation">

                <span>Area of allocation :  </span>
                <span class="text-danger font-weight-bold">{{ $area->area_of_allocation }}</span>

            </div>
        </div>

        <br>
        @if (session()->has('success'))
        <div role="alert" class="alert alert-success alert-dismissible fade show">
            <strong>{{ session('success') }}</strong>
            <button class="btn btn-close"></button>
        </div>
    @endif

        <form wire:submit.prevent = "updateArea({{ $id }})">

            <div class="mt-4">
                <label for="resource_name" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Resource
                    name</label>
                <input type="text" wire:model = 'resource_name'
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                    placeholder="Enter resource name">
                @error('resource_name')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-4">
                <label for="quantity" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Quantity
                    </label>
                <input type="number" wire:model = 'quantity'
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                    placeholder="Enter quantity">
                @error('quantity')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-3">
                <label for="area_of_allocation"
                    class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Allocated
                    college</label>
                <select type="select" wire:model= "area_of_allocation"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                    <option value="">-- Select area of allocation --</option>

                    <option value="Administration block">Administration block</option>
                    <option value="Library">Library</option>
                    <option value="Laboratory">Laboratory</option>
                    <option value="Hostels/blocks">Hostels/blocks</option>


                </select>
                @error('area_of_allocation')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div class="flex items-center justify-end mt-4">


                <x-primary-button class="ms-4">
                    <i class="fas fa-paper-plane px-1"></i>
                    {{ __('Update') }}
                </x-primary-button>
            </div>
        </form>
    </div>

</div>


