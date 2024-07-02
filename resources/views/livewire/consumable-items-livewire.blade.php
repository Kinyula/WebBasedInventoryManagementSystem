<div>
    <div class="card-box mb-30 p-3">
        <h2 class="h4 pd-20 text-gray-600"><i class="bi bi-plus"></i>Create consumable items</h2>

        @if (session()->has('success'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('success') }}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form wire:submit.prevent = "createConsumableItems">

            {{-- <div class="mt-3">
                <label for="consumable_type" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>consumable
                    name <span class="text-danger text-xl">*</span></label>
                <select type="select" wire:model= "consumable"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>


                        <option value="8">Consumable item</option>

                </select>
                @error('consumable')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div> --}}
            <div class="mt-3">
                <label for="resource_name" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Resource name</label>
                <input type="text" wire:model.live= "SearchConsumable"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                    placeholder="Enter resource name">
                @error('resource_name')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

             <div class="mt-3">
                <label for="details" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Details
                    </label>
                <select type="select" wire:model= "details"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                    <option value="">-- Choose a resource --</option>
                    @foreach ($ConsumableChasItems as $resource)
                        <option value="{{ $resource->id }}"> Resource name :
                            {{ $resource->resource_name }}</option>
                    @endforeach
                </select>
                @error('details')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-3">
                <label for="quantity_issued" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Quantity issued</label>
                <input type="text" wire:model= "quantity_issued"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                    placeholder="Enter quantity issued">
                @error('quantity_issued')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>




            <div>
                <br>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4">
                    <i class="fa-solid fa-plus px-1"></i>
                    create consumable items
                </button>
            </div>
        </form>
    </div>



        <div class="card-box mb-40 p-3">

            @if (session()->has('deleteMessage'))
                <div role="alert" class="alert alert-success alert-dismissible fade show">
                    <strong>{{ session('deleteMessage') }}</strong>
                    <button class="btn btn-close"></button>
                </div>
            @endif

            <h2 class="h5 pd-5">View consumable items </h2>
            <table class="data-table table nowrap ">

                <thead>
                    <tr>
                        <th class="datatable-nosort font-weight-bold">#</th>
                        <th class="font-weight-bold">Category name</th>
                        <th class="font-weight-bold">Details</th>
                        <th class="font-weight-bold">Quantity remained</th>
                        <th class="font-weight-bold">Quantity issued</th>
                        <th class="font-weight-bold">Cost</th>
                        <th class=" font-weight-bold">Action</th>

                    </tr>

                </thead>
                <tbody>

                    @php
                        $srNo = 1;
                    @endphp

                    @foreach ($consumableItems as $consumable)
                        <tr>

                            <td>
                                <span class="font-weight-bold">{{ $srNo++ }}</span>
                            </td>


                            <td>
                                <span class="font-weight-bold">{{ $consumable->chasResources->category->category_type }}</span>
                            </td>

                            <td>
                                <span class="font-weight-bold">{{ $consumable->chasResources->resource_name }}</span>
                            </td>


                            <td>
                                <span class="font-weight-bold text-danger">{{ Illuminate\Support\Number::format($consumable->chasResources->where('category_id', '8')->where('consumable_issue_status', '=', 'Not issued yet')->count()) }}</span>
                                <span class="font-weight-bold">{{ $consumable->chasResources->resource_name }} ( s )</span>
                            </td>

                            <td>
                                <span class="font-weight-bold text-danger">{{ Illuminate\Support\Number::format($consumable->quantity_issued) }}</span>
                                <span class="font-weight-bold">{{ $consumable->chasResources->resource_name }} ( s )</span>
                            </td>
                            <td>

                                <div class="dropdown">

                                    <button class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                        href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                </button>

                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                        <a class="dropdown-item" href="{{ asset('UIMS/edit-chas-consumable-items/' . $consumable->id) }}"><i
                                            class="dw dw-edit2"></i> Edit</a>

                                        <button type="submit" class="dropdown-item"
                                            wire:click = "deleteconsumable({{ $consumable->id }})"
                                            onclick="confirm(`Are you sure you want to delete this {{$consumable->chasResources->resource_name}} consumable  from the list ? `) || event.stopImmediatePropagation()"><i
                                                class="dw dw-delete-3"></i>Delete</button>
                                    </div>
                                </div>
                            </td>


                        </tr>


                    @endforeach
                </tbody>

            </table>


        </div>



</div>
