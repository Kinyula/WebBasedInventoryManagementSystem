<div>

    <div class="card-box mb-30 p-3">

        <h2 class="h5 pd-20"><i class="bi bi-cart px-1"></i> Move resources from college to college</h2>
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

        <form wire:submit = 'MoveResourceToAreas'>
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
                        <option value="{{ $asset->id }}">-- Resource name :
                            {{ $asset->chasAreas->resource_name }}</option>
                    @endforeach
                </select>
                @error('resource_name')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>


            <div class="mt-4">
                <label for="quantity" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Asset
                    quantity  <span class="text-danger text-xl">*</span></label>
                <input type="number" wire:model= "quantity"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                    placeholder="Enter the resource quantity ">
                @error('quantity')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>



            <div class="mt-3">
                <label for="receiver" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Receiver
                    <span class="text-danger text-xl">*</span>
                </label>
                <select type="select" wire:model= "receiver"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                    <option value="">-- Select receiver --</option>

                    <option value="College of Informatics and Virtual Education ( CIVE )">"College of Informatics and
                        Virtual Education ( CIVE )</option>
                    <option value="College of Natural Mathematical Science ( CNMS ) ">College of Natural Mathematical
                        Science ( CNMS )</option>
                    <option value="College of Health and Allied Science ( CHAS )">College of Health and Allied Science (
                        CHAS )</option>
                    <option value="College of Education ( CoED )">College of Education ( CoED )</option>
                    <option value="College of Humanities and Social Science ( CHSS )">College of Humanities and Social
                        Science ( CHSS )</option>
                    <option value="College of Business and Economics ( CoBE )">College of Business and Economics ( CoBE
                        )</option>
                    <option value="College of Earth Sciences and Engineering ( CoESE )">College of Earth Sciences and
                        Engineering ( CoESE )</option>

                </select>
                @error('receiver')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>


            {{-- <div class="mt-3">
                <label for="specific_area"
                    class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Allocate
                    specific area</label>
                <select type="select" wire:model= "specific_area"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                    <option value="">-- Select specific area of allocation --</option>

                    <option value="Administration block">Administration block</option>
                    <option value="Block A">Block A</option>
                    <option value="Block B">Block B</option>
                    <option value="Laboratory">Laboratory</option>
                    <option value="Library">Library</option>
                </select>
                @error('specific_area')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div> --}}

            <div>
                <br>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4">
                    <i class="fa-solid fa-paper-plane px-1"></i>
                    move resource
                </button>
                <a wire:navigate href="{{ asset('UIMS/dashboard') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 float-end">
                    <i class="fa-solid fa-arrow-left px-1"></i>
                    Back
                </a>
            </div>

        </form>
    </div>

    <div>

        <div class="card-box mb-30 p-3">
            <h2 class="h5 pd-20"><i class="fas fa-eye px-1"></i> View moved items </h2>
            <img src="{{ asset('vendors/images/udom.png') }}" class="float-end  udom-logo" alt="" srcset=""
                style="float:inline-end">
        </div>

        <div class="card-box mb-30 p-3">

            @if (session()->has('delete'))
                <div role="alert" class="alert alert-success alert-dismissible fade show">
                    <strong>{{ session('delete') }}</strong>
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
                            wire:model.live = 'search' />

                    </div>
                </form>
            </div>

            <table class="data-table table nowrap bg-white">
                <thead>
                    <tr>
                        <th class="table-plus datatable-nosort font-weight-bold">#</th>

                        <th class="table-plus datatable-nosort font-weight-bold">Store keeper</th>

                        <th class="table-plus datatable-nosort font-weight-bold">Asset name</th>

                        <th class="table-plus datatable-nosort font-weight-bold">Asset quantity</th>

                        <th class="table-plus datatable-nosort font-weight-bold">From</th>

                        <th class="table-plus datatable-nosort font-weight-bold">To</th>

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
                                <h5 class="font-16 font-weight-bold">{{ auth()->user()->email }}
                                </h5>

                            </td>
                            <td>
                                <h5 class="font-16 font-weight-bold">{{ $area->chasAreas?->resource_name }}</h5>

                            </td>

                            <td style="text-decoration:normal"><i class="bi bi-pencil p-2"></i>
                                <span class="font-weight-bold text-danger">{{ $area->quantity }}</span>
                                <span class="font-weight-bold">{{ $area->chasAreas?->resource_name }}</span>
                            </td>




                            <td style="text-decoration:normal"><i class="bi bi-pencil p-2"></i>
                                <span class="font-weight-bold">{{ $area->from }}</span>
                            </td>


                            <td style="text-decoration:normal"><i class="bi bi-pencil p-2"></i>
                                <span class="font-weight-bold">{{ $area->to }}</span>
                            </td>

                            <td>

                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                        href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <a class="dropdown-item"
                                            href="{{ asset('UIMS/edit-chas-area-of-allocation/' . $area->id) }}"><i
                                                class="dw dw-edit2"></i> Edit</a>
                                        <button type="submit" class="dropdown-item"
                                            wire:click = "deleteChasAreaMoved({{ $area->id }})"
                                            onclick="confirm(`Are you sure you want to delete this document from the list ? `) || event.stopImmediatePropagation()"><i
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
