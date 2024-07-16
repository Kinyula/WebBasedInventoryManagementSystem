<div>

    <div class="card-box mb-30 p-3">

        @if (auth()->user()->college_name === 'Not set' && auth()->user()->post === 'store')

        <h2 class="h5 pd-20">View created items</h2>
        <img src="{{ asset('vendors/images/udom.png') }}" class="float-end  udom-logo" alt="" srcset=""
            style="float:inline-end">
        <div class="role relative left-5">
            <span class="font-weight-bold">Role : </span>
            <span class="font-weight-bold text-danger uppercase">Dean of Finance ( DOF )</span>
        </div>
        @else
        @if (auth()->user()->college_name === 'Not set' && auth()->user()->post === 'store')

        @endif
        <h2 class="h5 pd-20">View items that need repair and already repaired</h2>
        <img src="{{ asset('vendors/images/udom.png') }}" class="float-end  udom-logo" alt="" srcset=""
            style="float:inline-end">
        <div class="role relative left-5">
            <span class="font-weight-bold">Role : </span>
            <span class="font-weight-bold text-danger uppercase">{{ auth()->user()->post }}</span>
        </div>
        @endif

    </div>

    <div class="card-box mb-30 p-3">

        @if (session()->has('deleteResource'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('deleteResource') }}</strong>
                <button class="btn btn-close"></button>
            </div>
        @endif

        @if (session()->has('success'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('success') }}</strong>
                <button class="btn btn-close"></button>
            </div>
        @endif

        <div style="float: inline-end">

            {{-- <button type="submit" wire:loading.attr = "disabled" wire:click = "printChasQrCodePdf"
                onclick="confirm('Dont\'t forget to refresh the page to view files to be downloaded') || event.stopImmediatePropagation()"
                class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 float-end">
                <i class="bi bi-download font-weight-bold p-1"></i>
                print qr codes PDF
            </button> --}}

            <button type="submit" wire:loading.attr = "disabled" wire:click = "exportRepair"
                onclick="confirm('Are you sure you want to export these data ?') || event.stopImmediatePropagation()"
                class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 float-end">
                <i class="bi bi-download font-weight-bold p-1"></i>
                Export resources excel
            </button>

            @if (auth()->user()->post === 'store' && auth()->user()->college_name === 'College of Health and Allied Science ( CHAS )')
                <a wire:navigate href="{{ asset('UIMS/add-cive-resources') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 float-end">
                    <i class="fa-solid fa-arrow-left px-1"></i>
                    Back
                </a>
            @else
            @endif

        </div>

        <div class="header-search mb-5">
            <form class="d-flex">
                <div class="form-group mb-0">

                    <input type="search" class="form-control search-input" placeholder="Search Here..."
                        wire:model.live = 'civeResourceSearch' />

                </div>
            </form>
        </div>



        <table class="data-table table nowrap ">
            <thead>
                <tr>
                    @if (auth()->user()->post == 'Chief Supplier Officer ( CSO )')

                    <th class="table-plus datatable-nosort font-weight-bold">Asset id</th>
                    <th class="font-weight-bold">Description</th>
                    <th class="table-plus datatable-nosort font-weight-bold">Condition</th>
                    <th class="font-weight-bold">Alocation time created at</th>
                    <th class="font-weight-bold">Alocation time updated at</th>
                    <th class="font-weight-bold">Select resource to print</th>
                    <th class="datatable-nosort font-weight-bold">Action</th>

                    @else

                    <th class="table-plus datatable-nosort font-weight-bold">Asset id</th>
                    <th class="font-weight-bold">Description</th>
                    <th class="font-weight-bold">Asset cost</th>
                    {{-- <th class="font-weight-bold">Qr code</th> --}}
                    <th class="font-weight-bold">Class/Category</th>
                    <th class="font-weight-bold">Building</th>
                    <th class="font-weight-bold">Floor</th>
                    <th class="font-weight-bold">Room</th>
                    <th class="font-weight-bold">Status</th>
                    <th class="font-weight-bold">Alocation time created at</th>
                    <th class="font-weight-bold">Alocation time updated at</th>
                    <th class="font-weight-bold">Select resource to print</th>
                    <th class="datatable-nosort font-weight-bold">Action</th>
                    @endif

                </tr>
            </thead>
            <tbody>

                @foreach ($Resources as $resource)
                    <tr>

                        @if (auth()->user()->post == 'Chief Supplier Officer ( CSO )')

                        <td style="text-decoration:normal"><i class="bi bi-pencil p-2"></i>
                            <span class="font-weight-bold">{{ $resource->id }}</span>
                        </td>

                        <td style="text-decoration:normal"><i class="bi bi-pencil p-2"></i>
                            <span class="font-weight-bold">{{ $resource->resource_name }}</span>
                        </td>

                        @if ($resource->repair_status == 'Repair')
                        <td style="text-decoration:normal"><i class="bi bi-pencil p-2"></i>
                            <span class="font-weight-bold bg-red-500 p-2 text-white rounded">{{ $resource->repair_status }}</span>
                        </td>
                        @else
                        <td style="text-decoration:normal"><i class="bi bi-pencil p-2"></i>
                            <span class="font-weight-bold bg-green-500 p-2 text-white rounded">{{ $resource->repair_status }}</span>
                        </td>
                        @endif


                        <td style="text-decoration:normal">

                            <span>{{ $resource->created_at->format('d M Y h:i:s') }}</span>
                        </td>


                        <td style="text-decoration:normal">

                            <span>{{ $resource->updated_at->format('d M Y h:i:s') }}</span>
                        </td>

                        <td style="text-decoration: normal">

                            <input type="checkbox" wire:model = "resourceId" value="{{ $resource->id }}"
                                class="checked" onclick="checkAll()">

                        </td>

                        <td>

                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                    href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                        <a class="dropdown-item"
                                            href="{{ asset('UIMS/edit-cive-resource/' . $resource->id) }}"><i
                                                class="dw dw-edit2"></i> Edit</a>



                                        <button type="submit" class="dropdown-item"
                                            wire:click = "deleteCiveCreatedResource({{ $resource->id }})"
                                            onclick="confirm(`Are you sure you want to delete this {{ $resource->resource_name }} asset  from the list ? `) || event.stopImmediatePropagation()"><i
                                                class="dw dw-delete-3"></i>Delete</button>



                                </div>
                            </div>
                        </td>
                        @else
                        <td style="text-decoration:normal">

                            <h5 class="font-16">{{ $resource->id }}</h5>

                        </td>

                        <td style="text-decoration:normal"><i class="bi bi-pencil p-2"></i>
                            <span class="font-weight-bold">{{ $resource->resource_name }}</span>
                        </td>

                        <td style="text-decoration:normal"><i class="bi bi-dollar p-2"></i>
                            <span class="font-weight-bold ">Tsh</span>
                            <span class="font-weight-bold text-danger">{{ Illuminate\Support\Number::format($resource->resource_cost, precision:2) }}/=</span>
                        </td>


                        {{-- <td style="text-decoration:normal">
                            {{ QrCode::size('30')->generate($resource->id) }}
                        </td> --}}

                        <td style="text-decoration:normal">
                            <span class="font-weight-bold">{{ $resource->category->category_type }}</span>
                        </td>

{{--
                        <td style="text-decoration:normal">
                            @if (auth()->user()->post === 'store')
                                @if ($resource->status == 'Approved')
                                    <button type="button"
                                        onclick="confirm(`Ooops!! this action can't be done here `) || event.stopImmediatePropagation()"
                                        class="bg-green-600 text-white font-bold p-2 rounded">{{ $resource->status }}</button>
                                @else
                                    <button type="button"
                                        onclick="confirm(`Ooops!! this action can't be done here `) || event.stopImmediatePropagation()"
                                        class="bg-red-600 text-white font-bold p-2 rounded">{{ $resource->status }}</button>
                                @endif
                            @else
                                @if ($resource->status == 'Approved')
                                    <button type="button"
                                        onclick="confirm(`Ooops!! this action can't be done here `) || event.stopImmediatePropagation()"
                                        class="bg-green-600 text-white font-bold p-2 rounded">{{ $resource->status }}</button>
                                @else
                                    <button type="button"
                                        onclick="confirm(`Ooops!! this action can't be done here `) || event.stopImmediatePropagation()"
                                        class="bg-red-600 text-white font-bold p-2 rounded">{{ $resource->status }}</button>
                                @endif
                            @endif

                        </td> --}}

                        {{-- <td style="text-decoration:normal">

                            @if ($resource->asset_status == 'Very good')
                                <button type="button"
                                    onclick="confirm(`Ooops!! this action can't be done here `) || event.stopImmediatePropagation()"
                                    class="bg-green-600 text-white font-bold p-2 rounded">{{ $resource->asset_status }}</button>
                            @elseif ($resource->asset_status == 'Good')
                                <button type="button"
                                    onclick="confirm(`Ooops!! this action can't be done here `) || event.stopImmediatePropagation()"
                                    class="bg-green-800 hover:bg-yellow-800 text-white font-bold p-2 rounded">{{ $resource->asset_status }}</button>
                            @elseif ($resource->asset_status == 'Fair')
                                <button type="button"
                                    onclick="confirm(`Ooops!! this action can't be done here `) || event.stopImmediatePropagation()"
                                    class="bg-yellow-600 text-white font-bold p-2 rounded">{{ $resource->asset_status }}</button>
                            @elseif ($resource->asset_status == 'New')
                                <button type="button"
                                    onclick="confirm(`Ooops!! this action can't be done here `) || event.stopImmediatePropagation()"
                                    class="bg-blue-600 text-white font-bold p-2 rounded">{{ $resource->asset_status }}</button>
                            @else
                                <button type="button"
                                    onclick="confirm(`Ooops!! this action can't be done here `) || event.stopImmediatePropagation()"
                                    class="bg-red-600 text-white font-bold p-2 rounded">{{ $resource->asset_status }}</button>
                            @endif
                        </td> --}}

                        {{-- <td style="text-decoration:normal">

                            @if ($resource->allocation_status == 'Not Allocated')
                                <button type="button"
                                    onclick="confirm(`Ooops!! this action can't be done here `) || event.stopImmediatePropagation()"
                                    class="bg-green-600 hover:bg-green-800 text-white font-bold p-2 rounded">{{ $resource->allocation_status }}</button>
                            @else
                                <button type="button"
                                    onclick="confirm(`Ooops!! this action can't be done here `) || event.stopImmediatePropagation()"
                                    class="bg-red-600 text-white font-bold p-2 rounded">{{ $resource->allocation_status }}</button>
                            @endif


                        </td> --}}

                        <td style="text-decoration:normal">
                            <span class="font-weight-bold">{{ $resource->building }}</span>
                        </td>

                        <td style="text-decoration:normal">
                            <span class="font-weight-bold">{{ $resource->specific_area }}</span>
                        </td>

                        <td style="text-decoration:normal">
                            <span class="font-weight-bold">{{ $resource->room }}</span>
                        </td>

                        @if ($resource->repair_status == 'Repair')
                        <td style="text-decoration:normal"><i class="bi bi-pencil p-2"></i>
                            <span class="font-weight-bold bg-red-500 p-2 text-white rounded">{{ $resource->repair_status }}</span>
                        </td>
                        @else
                        <td style="text-decoration:normal"><i class="bi bi-pencil p-2"></i>
                            <span class="font-weight-bold bg-green-500 p-2 text-white rounded">{{ $resource->repair_status }}</span>
                        </td>
                        @endif

                        <td style="text-decoration:normal">

                            <span>{{ $resource->created_at->format('d M Y h:i:s') }}</span>
                        </td>


                        <td style="text-decoration:normal">

                            <span>{{ $resource->updated_at->format('d M Y h:i:s') }}</span>
                        </td>

                        <td style="text-decoration: normal">

                            <input type="checkbox" wire:model = "resourceId" value="{{ $resource->id }}"
                                class="checked" onclick="checkAll()">

                        </td>
                        <td>

                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                    href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                        <a class="dropdown-item"
                                            href="{{ asset('UIMS/edit-cive-resource/' . $resource->id) }}"><i
                                                class="dw dw-edit2"></i> Edit</a>



                                        <button type="submit" class="dropdown-item"
                                            wire:click = "deleteCiveCreatedResource({{ $resource->id }})"
                                            onclick="confirm(`Are you sure you want to delete this {{ $resource->resource_name }} asset  from the list ? `) || event.stopImmediatePropagation()"><i
                                                class="dw dw-delete-3"></i>Delete</button>


                                </div>
                            </div>
                        </td>
                        @endif

                    </tr>
                @endforeach

            </tbody>

        </table>
        <span>{{ $Resources->links() }}</span>

    </div>

    <div class="card-box mb-40 p-3">

        <br>
        <br>

        @if (session()->has('downloadSuccessMessage'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('downloadSuccessMessage') }}</strong>
                <button class="btn btn-close"></button>
            </div>
        @endif

        @if (session()->has('downloadErrorMessage'))
            <div role="alert" class="alert alert-danger alert-dismissible fade show">
                <strong>{{ session('downloadErrorMessage') }}</strong>
                <button class="btn btn-close"></button>
            </div>
        @endif

        @if (session()->has('deleteErrorMessage'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('deleteErrorMessage') }}</strong>
                <button class="btn btn-close"></button>
            </div>
        @endif

        <div class="flex justify-center align-middle">
            <span class="font-weight-bold flex justify-center align-middle">copyright</span>
            <span class="font-weight-bold flex justify-center align-middle uppercase ms-1">

                &copy;2024

                University of Dodoma</span>
        </div>

    </div>



</div>


