<div>
    <div class="card-box mb-30 p-3">

        <h2 class="h5 pd-20"><i class="bi bi-cart px-1"></i> Move resources </h2>
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

        <form wire:submit = 'moveResourceToAreas'>
            <div class="mt-3">
                <input type="search" wire:model.live = 'searchAsset'
                    placeholder="Search an asset by ' Asset name ' Or by ' ID ' from the stock" class="w-full">
            </div>
            <div class="mt-3">
                <label for="resource_name" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Asset
                    name <span class="text-danger text-xl">*</span></label>
                <select type="select" wire:model= "resource_name"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                    <option value="">-- Choose an asset --</option>
                    @foreach ($Assets as $asset)
                        <option value="{{ $asset->id }}">ID : {{ $asset->id }} -- Resource name :
                            {{ $asset->resource_name }}</option>
                    @endforeach
                </select>
                @error('resource_name')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-4">
                <label for="" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>
                    Confirm selected asset name above <span class="text-danger text-xl">*</span></label>
                <input type="text" wire:model= "confirm_asset"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                    placeholder="Confirm the asset name selected above ">
                @error('confirm_asset')
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
                <label for="department" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Department
                    <span class="text-danger text-xl">*</span></label>
                <select type="select" wire:model= "department"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                    <option value="">-- Select department --</option>

                    <option value="Department 1">Department 1</option>
                    <option value="Department 2">Department 2</option>
                    <option value="Department 3">Department 3</option>
                    <option value="Department 4">Department 4</option>

                </select>
                @error('department')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-3">

                <label for="area_of_allocation"
                    class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Allocate
                    area <span class="text-danger text-xl">*</span></label>

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

            <div class="mt-3">
                <label for="specific_area" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Allocate
                    specific area <span class="text-danger text-xl">*</span></label>
                    <input type="text" wire:model = "specific_area" placeholder="Enter the specific area eg.Rooms , library" class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                @error('specific_area')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div>
                <br>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4">
                    <i class="fa-solid fa-paper-plane px-1"></i>
                    Move resource
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
            <h2 class="h5 pd-20">View moved items to areas </h2>
            <img src="{{ asset('vendors/images/udom.png') }}" class="float-end  udom-logo" alt="" srcset=""
                style="float:inline-end">
        </div>

        <div class="card-box mb-30 p-3">

            @if (session()->has('area'))
                <div role="alert" class="alert alert-success alert-dismissible fade show">
                    <strong>{{ session('area') }}</strong>
                    <button class="btn btn-close"></button>
                </div>
            @endif

            <form wire:submit.prevent = 'exportChasReportPdf'>


                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 float-end">
                    <i class="bi bi-download font-weight-bold p-1"></i>
                    Print report PDF
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

                        <th class="table-plus datatable-nosort font-weight-bold">College name</th>

                        <th class="table-plus datatable-nosort font-weight-bold">Department</th>

                        <th class="table-plus datatable-nosort font-weight-bold">Area allocated</th>

                        <th class="table-plus datatable-nosort font-weight-bold">Specific area allocated</th>

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
                                <span class="font-weight-bold">{{ $area->college_name }}</span>
                            </td>


                            <td style="text-decoration:normal">
                                <span class="font-weight-bold">{{ $area->department??'Not yet specified' }}</span>
                            </td>

                            <td style="text-decoration:normal">
                                <span class="font-weight-bold text-danger">{{ $area->area_of_allocation }}</span>
                            </td>

                            <td style="text-decoration:normal">
                                <span class="font-weight-bold text-danger">{{ $area->specific_area_of_allocations??'Not yet allocated' }}</span>
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
