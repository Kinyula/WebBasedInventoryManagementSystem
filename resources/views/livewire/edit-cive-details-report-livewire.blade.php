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
                <span class="font-weight-bold">Region : </span>
                <span class="font-weight-bold text-danger">{{ $Status->region }}</span>
            </div>

            <div class="previous-status">
                <span class="font-weight-bold">Branch/College : </span>
                <span class="font-weight-bold text-danger">{{ $Status->college_name }}</span>
            </div>

            <div class="previous-asset-status">
                <span class="font-weight-bold">Department : </span>
                <span class="font-weight-bold text-danger">{{ $Status->department }}</span>
            </div>

            <div class="previous-allocation-status">
                <span class="font-weight-bold">Building : </span>
                <span class="font-weight-bold text-danger">{{ $Status->building }}</span>
            </div>

            <div class="previous-allocation-status">
                <span class="font-weight-bold">Floor : </span>
                <span class="font-weight-bold text-danger">{{ $Status->specific_area }}</span>
            </div>


            <div class="previous-allocation-status">
                <span class="font-weight-bold">Previous resource cost : </span>
                <span class="font-weight-bold">Tsh </span>
                <span
                    class="font-weight-bold text-danger">{{ Illuminate\Support\Number::format($Status->resource_cost, precision: 2) }}/=</span>
            </div>

        </div>

        <br>

        @if (session()->has('detailStatusMessage'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('detailStatusMessage') }}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form wire:submit.prevent = "editDetailStatus({{ $id }})">

                <div class="mt-3">
                    <label for="region" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>
                        Region</label>
                    <select type="select" wire:model= "region"
                        class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                        <option value="">-- Update region --</option>

                        <option value="DODOMA">
                            DODOMA
                        </option>

                        <option value="DAR ES SALAAM">
                            DAR ES SALAAM
                        </option>

                        <option value="TANGA">
                            TANGA
                        </option>

                    </select>
                    @error('region')
                        <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                    @enderror
                </div>

                <div class="mt-3">
                    <label for="department" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>
                        Department</label>
                    <select type="select" wire:model= "department"
                        class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                        <option value="">-- Update department --</option>

                        <option value="department 1">
                            department 1
                        </option>

                        <option value="department 2">
                            department 2
                        </option>

                        <option value="department 3">
                            department 3
                        </option>

                        <option value="department 4">
                            department 4
                        </option>
                    </select>
                    @error('department')
                        <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                    @enderror
                </div>

                <div class="mt-3">
                    <label for="resource_status" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>
                        Resource status</label>
                    <select type="select" wire:model= "resource_status"
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
                    @error('resource_status')
                        <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                    @enderror
                </div>

                <div class="mt-3">
                    <label for="building" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>
                        Department</label>
                    <select type="select" wire:model= "building"
                        class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                        <option value="">-- Update building --</option>

                        <option value="Hostels/Blocks">
                            Hostels/Blocks
                        </option>

                        <option value="Administration block">
                            Administration block
                        </option>


                        <option value="Laboratory">
                            Laboratory
                        </option>


                        <option value="Library">
                            Library
                        </option>


                    </select>
                    @error('department')
                        <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="floor" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>
                        Department</label>
                    <select type="select" wire:model= "floor"
                        class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                        <option value="">-- Update floor --</option>

                        <option value="Ground floor">
                            Ground floor
                        </option>

                        <option value="First floor">
                            First floor
                        </option>

                        <option value="Second Floor">
                            Second Floor
                        </option>

                        <option value="Third floor">
                            Third floor
                        </option>

                        <option value="Higher floors">
                            Higher floors
                        </option>
                    </select>
                    @error('floor')
                        <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                    @enderror
                </div>

                <div class="mt-3">
                    <label for="resource_cost" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>
                        Resource cost
                    </label>
                    <input type="number" wire:model= "resource_cost"
                        class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                        placeholder="Update resource cost">
                    @error('resource_cost')
                        <strong
                            class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                    @enderror
                </div>


                <br>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4"
                    onclick="confirm(`Are you sure you want to update the status of this cive resource  ?`) || event.StopImmediatePropagation()">
                    <i class="bi bi-check text-xl"></i> Update details
                </button>

                <a href="{{ asset('UIMS/chas-details-report') }}" wire:loading.attr = 'disabled'
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-400 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 float-end">
                    <i class="bi bi-arrow-left px-1"></i> Back
                </a>



        </form>
    </div>
</div>
