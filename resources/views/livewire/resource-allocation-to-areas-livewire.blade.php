<div>

    <div class="card-box mb-30 p-3">

        <h2 class="h5 pd-20">Allocate resource</h2>
        <img src="{{ asset('vendors/images/udom.png') }}" class="float-end  udom-logo" alt="" srcset=""
            style="float:inline-end">
    </div>


    <div class="card-box mb-30 p-3">

        @if (session()->has('success'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('success') }}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form wire:submit = 'allocateResourceToAreas'>
            <div class="mt-3">
                <input type="search" wire:model.live = 'searchAsset'
                    placeholder="Search an asset by 'Category Or Asset name ' Or by ' ID ' Or Room number from the stock" class="w-full">
            </div>
            <div class="mt-3">
                <label for="resource_name" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Asset
                    name <span class="text-danger text-xl">*</span></label>
                <select type="select" wire:model= "resource_name"
                    class='border-gray-300  dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                    <option value="">-- Choose an asset --</option>
                    @foreach ($Assets as $asset)
                        <option value="{{ $asset->id }}" class="font-weight-bold">ID : <span class="font-weight-bold text-green-700">{{ $asset->id }}</span> <span class="font-weight-bold">-- Resource name :</span>
                            <span class="font-weight-bold text-green-700">{{ $asset->resource_name }}</span><span class="font-weight-bold"> -- Building </span>: <span class="font-weight-bold text-green-700">{{ $asset->building??'Not yet allocated' }}</span> <span class="font-weight-bold"> -- Floor </span>: <span class="font-weight-bold text-green-700">{{ $asset->specific_area_of_allocation??'Not yet allocated' }}</span><span class="font-weight-bold">-- Room number </span>: <span class="font-weight-bold text-green-700">{{ $asset->room??'Not yet allocated' }}</span></option>
                    @endforeach
                </select>
                @error('resource_name')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-4">
                <label for="quantity" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Asset
                    quantity<span class="text-danger text-xl">*</span></label>
                <input type="number" wire:model= "quantity"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                    placeholder="Enter the resource quantity ">
                @error('quantity')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-3">
                <label for="department"
                    class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Department <span class="text-danger text-xl">*</span></label>
                <select type="select" wire:model= "department"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                    <option value="">-- Select department --</option>

                    <option value="ESTATE">ESTATE</option>
                    <option value="DICT">DICT</option>
                    <option value="DSS">DSS</option>
                    <option value="DHRM">DHRM</option>
                    <option value="Finance/Accountancy">Department 4</option>


                </select>
                @error('department')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-3">
                <label for="area_of_allocation"
                    class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Building
                    <span class="text-danger text-xl">*</span></label>
                <select type="select" wire:model= "building"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                    <option value="">-- Select building --</option>

                    <option value="Administration block">Administration block</option>
                    <option value="Library">Library</option>
                    <option value="Laboratory">Laboratory</option>
                    <option value="Hostels/blocks">Hostels/blocks</option>


                </select>
                @error('building')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-3">
                <label for=""
                    class='block font-medium text-sm text-gray-700 dark:text-gray-300'>
                    floor <span class="text-danger text-xl">*</span></label>
                <select type="select" wire:model= "floor"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                    <option value="">-- Select floor --</option>

                    <option value="Ground floor">Ground floor</option>
                    <option value="First floor">First floor</option>
                    <option value="Second floor">Second floor</option>
                    <option value="Third floor">Third floor</option>
                    <option value="Higher floors">Higher floors</option>


                </select>
                @error('floor')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>
            <div class="mt-3">
                <label for="room"
                    class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Allocate to
                    rooms<span class="text-danger text-xl">*</span></label>
                    <input type="text" wire:model= "room" placeholder="Allocate to specific areas eg.room, library" class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                @error('room')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div>
                <br>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4">
                    <i class="fa-solid fa-paper-plane px-1"></i>
                    Allocate resource
                </button>
                <a wire:navigate href="{{ asset('UIMS/add-chas-resources') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 float-end">
                    <i class="fa-solid fa-arrow-left px-1"></i>
                    Back
                </a>
            </div>

        </form>
    </div>

    <div>

        <div class="card-box mb-30 p-3">
            <h2 class="h5 pd-20">View allocated items to areas </h2>
            <img src="{{ asset('vendors/images/udom.png') }}" class="float-end  udom-logo" alt="" srcset=""
                style="float:inline-end">
        </div>

        <div class="card-box mb-30 p-3">

            @if (session()->has('report'))
                <div role="alert" class="alert alert-success alert-dismissible fade show">
                    <strong>{{ session('report') }}</strong>
                    <button class="btn btn-close"></button>
                </div>
            @endif


            <form wire:submit.prevent = 'exportChasReportExcel'>


                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 float-end">
                    <i class="bi bi-download font-weight-bold p-1"></i>
                    Print report excel
                </button>

            </form>

            <div class="header-search mb-5">
                <form class="d-flex">
                    <div class="form-group mb-0">

                        <input type="search" class="form-control search-input" placeholder="Search Here..."
                            wire:model.live = 'chssReportSearch' />

                    </div>
                </form>
            </div>

            <table class="data-table table nowrap bg-white">
                <thead>
                    <tr>
                        <th class="table-plus datatable-nosort font-weight-bold">#</th>

                        <th class="table-plus datatable-nosort font-weight-bold">Category</th>

                        <th class="table-plus datatable-nosort font-weight-bold">Asset name</th>

                        <th class="table-plus datatable-nosort font-weight-bold">Asset quantity</th>

                        <th class="table-plus datatable-nosort font-weight-bold">Asset's cost</th>

                        <th class="table-plus datatable-nosort font-weight-bold">Building</th>

                        <th class="table-plus datatable-nosort font-weight-bold">Floor</th>

                        <th class="table-plus datatable-nosort font-weight-bold">Room</th>

                        <th class="table-plus datatable-nosort font-weight-bold">Department</th>

                        <th class="table-plus datatable-nosort font-weight-bold">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @dd($Resources) --}}
                    @php
                        $srNo = 1;

                    @endphp
                    @foreach ($Areas as $area)
                        <tr>

                            <td>
                                {{ $srNo++ }}
                            </td>

                            <td>
                                <h5 class="font-16 font-weight-bold">{{ $area->chasAreas->category->category_type }}</h5>

                            </td>
                            <td>
                                <h5 class="font-16 font-weight-bold">{{ $area->chasAreas->resource_name }}</h5>

                            </td>

                            <td style="text-decoration:normal"><i class="bi bi-pencil p-2"></i>
                                <span class="font-weight-bold text-danger">{{ $area->quantity }}</span>
                                <span class="font-weight-bold">{{ $area->chasAreas->resource_name }}(s)</span>
                            </td>

                            <td style="text-decoration:normal"><i class="bi bi-pencil p-2"></i>
                                <span class="font-weight-bold">Tsh</span>
                                <span class="font-weight-bold text-danger">{{ Illuminate\Support\Number::format($area->chasAreas->resource_cost??0, precision:2) }}/=</span>
                                <span class="font-weight-bold">for 1 {{ $area->chasAreas->resource_name }}</span>
                            </td>


                            <td style="text-decoration:normal" ><i class="bi bi-pencil p-2"></i>
                                <span class="font-weight-bold">{{ $area->chasAreas->building }}</span>
                            </td>

                            <td style="text-decoration:normal">
                                <span class="font-weight-bold text-danger">{{ $area->floor }}</span>
                            </td>

                            <td style="text-decoration:normal">
                                <span class="font-weight-bold text-danger">{{ $area->specific_area_of_allocations??'Not yet allocated' }}</span>
                            </td>
                            <td style="text-decoration:normal">
                                <span class="font-weight-bold">{{ $area->department??'Not yet specified' }}</span>
                            </td>


                            <td>

                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                        href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <a class="dropdown-item" href="{{ asset('UIMS/edit-chas-area-of-allocation/' . $area->id) }}"><i
                                            class="dw dw-edit2"></i> Edit</a>
                                        <button type="submit" class="dropdown-item"
                                            wire:click = "deleteChasArea({{ $area->id }})"
                                            onclick="confirm(`Are you sure you want to delete this report  from the list ? `) || event.stopImmediatePropagation()"><i
                                                class="dw dw-delete-3"></i>Delete</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>

            </table>
            <span>{{ $Areas->links() }}</span>


        </div>
    </div>

</div>
