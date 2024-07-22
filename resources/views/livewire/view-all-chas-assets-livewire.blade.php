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
            <h2 class="h5 pd-20">View created items from the {{ auth()->user()->college_name }}</h2>
            <img src="{{ asset('vendors/images/udom.png') }}" class="float-end  udom-logo" alt="" srcset=""
                style="float:inline-end">
            <div class="role relative left-5">
                <span class="font-weight-bold">Role : </span>
                <span class="font-weight-bold text-danger uppercase">{{ auth()->user()->post }}</span>
            </div>

            @if (auth()->user()->post == 'store')
            @else
                <div class="role relative left-5">
                    <span class="font-weight-bold">Department : </span>
                    <span class="font-weight-bold text-danger uppercase">{{ auth()->user()->department }}</span>
                </div>
            @endif

        @endif

    </div>

    <br>
    <br>


    <div class="card-box p-2">

        <h2 class="h5 pd-20">View un allocated items</h2>
        @if (auth()->user()->post == 'Head of department ( HOD )' || auth()->user()->post == 'store')
            <span class="float-end">
                <input type="checkbox" wire:model="allChecked" wire:click="allMark" class="cursor-pointer">
                <span>Mark all</span>
            </span>
        @else
        @endif

        <br>
        <br>

        @if ($NotAllocatedResources->count() > 0)
            <div style="float: inline-end">

                <button type="submit" wire:loading.attr = "disabled" wire:click = "printChasQrCodePdf"
                    onclick="confirm('Dont\'t forget to refresh the page to view files to be downloaded') || event.stopImmediatePropagation()"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 float-end">
                    <i class="bi bi-download font-weight-bold p-1"></i>
                    print qr codes PDF
                </button>

                <button type="submit" wire:loading.attr = "disabled" wire:click = "exportChasResourcesPdf"
                    onclick="confirm('Dont\'t forget to refresh the page to view files to be downloaded') || event.stopImmediatePropagation()"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 float-end">
                    <i class="bi bi-download font-weight-bold p-1"></i>
                    Export resources PDF
                </button>

                @if (auth()->user()->post === 'store' &&
                        auth()->user()->college_name === 'College of Health and Allied Science ( CHAS )')
                    <a wire:navigate href="{{ asset('UIMS/add-chas-resources') }}"
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
                            wire:model.live = 'chasResourceSearch' />

                    </div>
                </form>
            </div>
        @else
            <div style="float: inline-end">

                <button disabled type="submit" wire:loading.attr = "disabled" wire:click = "printChasQrCodePdf"
                    onclick="confirm('Dont\'t forget to refresh the page to view files to be downloaded') || event.stopImmediatePropagation()"
                    class="inline-flex items-center px-4 py-2 bg-gray-300 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-300 uppercase tracking-widest hover:bg-gray-300 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-300 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-300 transition ease-in-out duration-150 ms-4 float-end">
                    <i class="bi bi-download font-weight-bold p-1"></i>
                    print qr codes PDF
                </button>

                <button disabled type="submit" wire:loading.attr = "disabled" wire:click = "exportChasResourcesPdf"
                    onclick="confirm('Dont\'t forget to refresh the page to view files to be downloaded') || event.stopImmediatePropagation()"
                    class="inline-flex items-center px-4 py-2 bg-gray-300 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-300 uppercase tracking-widest hover:bg-gray-300 dark:hover:bg-white focus:bg-gray-300 dark:focus:bg-white active:bg-gray-300 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 float-end">
                    <i class="bi bi-download font-weight-bold p-1"></i>
                    Export resources PDF
                </button>

                @if (auth()->user()->post === 'store' &&
                        auth()->user()->college_name === 'College of Health and Allied Science ( CHAS )')
                    <button
                        class="inline-flex items-center px-4 py-2 bg-gray-300 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-300 uppercase tracking-widest hover:bg-gray-300 dark:hover:bg-white focus:bg-gray-300 dark:focus:bg-white active:bg-gray-300 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 float-end">
                        <i class="fa-solid fa-arrow-left px-1"></i>
                        Back
                    </button>
                @else
                @endif

            </div>



            <div class="header-search mb-5">
                <form class="d-flex">
                    <div class="form-group mb-0">

                        <input disabled type="search" class="form-control search-input" placeholder="Search Here..."
                            wire:model.live = 'chasResourceSearch' />

                    </div>
                </form>
            </div>

        @endif


        @if (session()->has('done'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('done') }}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session()->has('error'))
            <div role="alert" class="alert alert-danger alert-dismissible fade show">
                <strong>{{ session('error') }}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <table class="data-table table nowrap ">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort font-weight-bold">Asset id</th>
                    <th class="font-weight-bold">Description</th>
                    <th class="font-weight-bold">Asset cost</th>
                    {{-- <th class="font-weight-bold">Qr code</th> --}}
                    <th class="font-weight-bold">Class/Category</th>
                    @if (
                        (auth()->user()->post == 'Head of department ( HOD )' && auth()->user()->department == 'DICT') ||
                            auth()->user()->post == 'store')
                        <th class="font-weight-bold">Department</th>
                    @else
                    @endif

                    @if (
                        (auth()->user()->post == 'Head of department ( HOD )' && auth()->user()->department == 'DICT') ||
                            auth()->user()->post == 'store')
                        <th class="font-weight-bold">Condition</th>
                    @else
                    @endif

                    @if (
                        (auth()->user()->post == 'Head of department ( HOD )' && auth()->user()->department == 'DICT') ||
                            auth()->user()->post == 'store')
                        <th class="font-weight-bold">Select asset</th>
                    @else
                    @endif

                    @if (
                        (auth()->user()->post == 'Head of department ( HOD )' && auth()->user()->department == 'department 1') ||
                            auth()->user()->post == 'store')
                        <th class="font-weight-bold">Building</th>
                        <th class="font-weight-bold">Floor</th>
                        <th class="font-weight-bold">Room</th>
                    @else
                    @endif

                    @if (
                        (auth()->user()->post == 'Head of department ( HOD )' && auth()->user()->department == 'department 1') ||
                            auth()->user()->post == 'store')
                        <th class="font-weight-bold">Alocation time created at</th>
                        <th class="font-weight-bold">Alocation time updated at</th>
                        <th class="datatable-nosort font-weight-bold">Action</th>
                    @else
                    @endif

                </tr>
            </thead>
            <tbody>

                @foreach ($NotAllocatedResources as $resource)
                    <tr>

                        <td style="text-decoration:normal">

                            <h5 class="font-16">{{ $resource->id }}</h5>

                        </td>

                        <td style="text-decoration:normal"><i class="bi bi-pencil p-2"></i>
                            <span class="font-weight-bold">{{ $resource->resource_name }}</span>
                        </td>

                        <td style="text-decoration:normal"><i class="bi bi-dollar p-2"></i>
                            <span class="font-weight-bold ">Tsh</span>
                            <span
                                class="font-weight-bold text-danger">{{ Illuminate\Support\Number::format($resource->resource_cost, precision: 2) }}/=</span>
                        </td>


                        {{-- <td style="text-decoration:normal">
                            {{ QrCode::size('30')->generate($resource->id) }}
                        </td> --}}

                        <td style="text-decoration:normal">
                            <span class="font-weight-bold">{{ $resource->category->category_type }}</span>
                        </td>

                        @if (
                            (auth()->user()->post == 'Head of department ( HOD )' && auth()->user()->department == 'DICT') ||
                                auth()->user()->post == 'store')
                            <td style="text-decoration:normal">
                                <span class="font-weight-bold">{{ $resource->department }}</span>
                            </td>
                        @else
                        @endif

                        @if (auth()->user()->post == 'Head of department ( HOD )' && auth()->user()->department == 'DICT')
                            <td style="text-decoration:normal">
                                <span class="font-weight-bold">{{ $resource->repair_status }}</span>
                            </td>
                        @else
                        @endif
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


                        <td style="text-decoration:normal">

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
                </td>

                <td style="text-decoration: normal">

                    <input type="checkbox" wire:model = "resourceId" value="{{ $resource->id }}"
                        class="checked cursor-pointer" onclick="checkAll()">

                </td>

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

                @if (auth()->user()->department == 'department 1' || auth()->user()->post == 'store')
                    <td style="text-decoration:normal">
                        <span class="font-weight-bold">{{ $resource->building }}</span>
                    </td>

                    <td style="text-decoration:normal">
                        <span class="font-weight-bold">{{ $resource->specific_area }}</span>
                    </td>

                    <td style="text-decoration:normal">
                        <span class="font-weight-bold">{{ $resource->room }}</span>
                    </td>

                    <td style="text-decoration:normal">

                        <span>{{ $resource->created_at->format('d M Y h:i:s') }}</span>
                    </td>


                    <td style="text-decoration:normal">

                        <span>{{ $resource->updated_at->format('d M Y h:i:s') }}</span>
                    </td>


                    <td>

                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                <a class="dropdown-item"
                                    href="{{ asset('UIMS/edit-chas-resource/' . $resource->id) }}"><i
                                        class="dw dw-edit2"></i> Edit</a>



                                <button type="submit" class="dropdown-item"
                                    wire:click = "deleteChasCreatedResource({{ $resource->id }})"
                                    onclick="confirm(`Are you sure you want to delete this {{ $resource->resource_name }} asset  from the list ? `) || event.stopImmediatePropagation()"><i
                                        class="dw dw-delete-3"></i>Delete</button>



                            </div>
                        </div>
                    </td>
                @else
                @endif





                </tr>
                @endforeach

            </tbody>

        </table>

        <span>{{ $NotAllocatedResources->links() }}</span>
        @if ($NotAllocatedResources->count() > 0)
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
                <label for="" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>
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
                <label for="Room/Office name"
                    class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Room/Office name
                    number</label>
                <input type="text" wire:model= "room"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                    placeholder="Enter room/office name eg.AC 102 etc.">
                @error('room')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2 '>{{ $message }}</strong>
                @enderror
            </div>

            <br>
            <button wire:click = 'allocateSelected' type="submit"
                class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 mb-10"
                onclick="confirm(`Are you sure you want to approve the status of this resource  ?`) || event.StopImmediatePropagation()">
                <i class="fas fa-check p-1"></i>
                Allocate
            </button>
        @else
            <button disabled wire:click = 'allocateSelected' type="submit"
                class="inline-flex items-center px-4 py-2 bg-gray-300 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-300 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 mb-10"
                onclick="confirm(`Are you sure you want to allocate resource  ?`) || event.StopImmediatePropagation()">
                <i class="fas fa-check p-1"></i>
                Allocate
            </button>
        @endif
    </div>
    <br>
    <br>
    <div class="card-box mb-30 p-3">
        @if (auth()->user()->post == 'Head of department ( HOD )' && auth()->user()->department == 'DICT')
            <span class="float-end">
                <input type="checkbox" wire:model="allChecked" wire:click="markAll" class="cursor-pointer">
                <span>Mark all</span>
            </span>
        @else
        @endif

        @if (session()->has('deleteResource'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('deleteResource') }}</strong>
                <button class="btn btn-close"></button>
            </div>
        @endif

        @if (session()->has('exportResource'))
            <div role="alert" class="alert alert-warning alert-dismissible fade show">
                <strong>{{ session('exportResource') }}</strong>
                <button class="btn btn-close"></button>
            </div>
        @endif


        <div style="float: inline-end">

            <button type="submit" wire:loading.attr = "disabled" wire:click = "printChasQrCodePdf"
                onclick="confirm('Dont\'t forget to refresh the page to view files to be downloaded') || event.stopImmediatePropagation()"
                class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 float-end">
                <i class="bi bi-download font-weight-bold p-1"></i>
                print qr codes PDF
            </button>

            <button type="submit" wire:loading.attr = "disabled" wire:click = "exportChasResourcesPdf"
                onclick="confirm('Dont\'t forget to refresh the page to view files to be downloaded') || event.stopImmediatePropagation()"
                class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 float-end">
                <i class="bi bi-download font-weight-bold p-1"></i>
                Export resources PDF
            </button>

            @if (auth()->user()->post === 'store' &&
                    auth()->user()->college_name === 'College of Health and Allied Science ( CHAS )')
                <a wire:navigate href="{{ asset('UIMS/add-chas-resources') }}"
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
                        wire:model.live = 'chasResourceSearch' />

                </div>
            </form>
        </div>



        <table class="data-table table nowrap ">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort font-weight-bold">Asset id</th>
                    <th class="font-weight-bold">Description</th>
                    <th class="font-weight-bold">Asset cost</th>
                    {{-- <th class="font-weight-bold">Qr code</th> --}}
                    <th class="font-weight-bold">Class/Category</th>
                    @if (
                        (auth()->user()->post == 'Head of department ( HOD )' && auth()->user()->department == 'DICT') ||
                            auth()->user()->post == 'store')
                        <th class="font-weight-bold">Department</th>
                    @else
                    @endif

                    @if (
                        (auth()->user()->post == 'Head of department ( HOD )' && auth()->user()->department == 'DICT') ||
                            auth()->user()->post == 'store')
                        <th class="font-weight-bold">Condition</th>
                    @else
                    @endif

                    @if (
                        (auth()->user()->post == 'Head of department ( HOD )' && auth()->user()->department == 'DICT') ||
                            auth()->user()->post == 'store')
                        <th class="font-weight-bold">Select asset</th>
                    @else
                    @endif

                    @if (
                        (auth()->user()->post == 'Head of department ( HOD )' && auth()->user()->department == 'department 1') ||
                            auth()->user()->post == 'store')
                        <th class="font-weight-bold">Building</th>
                        <th class="font-weight-bold">Floor</th>
                        <th class="font-weight-bold">Room</th>
                    @else
                    @endif

                    @if (
                        (auth()->user()->post == 'Head of department ( HOD )' && auth()->user()->department == 'department 1') ||
                            auth()->user()->post == 'store')
                        <th class="font-weight-bold">Alocation time created at</th>
                        <th class="font-weight-bold">Alocation time updated at</th>
                        <th class="datatable-nosort font-weight-bold">Action</th>
                    @else
                    @endif

                </tr>
            </thead>
            <tbody>

                @foreach ($Resources as $resource)
                    <tr>

                        <td style="text-decoration:normal">

                            <h5 class="font-16">{{ $resource->id }}</h5>

                        </td>

                        <td style="text-decoration:normal"><i class="bi bi-pencil p-2"></i>
                            <span class="font-weight-bold">{{ $resource->resource_name }}</span>
                        </td>

                        <td style="text-decoration:normal"><i class="bi bi-dollar p-2"></i>
                            <span class="font-weight-bold ">Tsh</span>
                            <span
                                class="font-weight-bold text-danger">{{ Illuminate\Support\Number::format($resource->resource_cost, precision: 2) }}/=</span>
                        </td>


                        {{-- <td style="text-decoration:normal">
                            {{ QrCode::size('30')->generate($resource->id) }}
                        </td> --}}

                        <td style="text-decoration:normal">
                            <span class="font-weight-bold">{{ $resource->category->category_type }}</span>
                        </td>

                        @if (
                            (auth()->user()->post == 'Head of department ( HOD )' && auth()->user()->department == 'DICT') ||
                                auth()->user()->post == 'store')
                            <td style="text-decoration:normal">
                                <span class="font-weight-bold">{{ $resource->department }}</span>
                            </td>

                         <td style="text-decoration:normal">

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
                        </td>

                        <td style="text-decoration: normal">

                            <input type="checkbox" wire:model = "resourceId" value="{{ $resource->id }}"
                                class="checked" onclick="checkAll()">

                        </td>
                        @else
                        @endif

                        @if (auth()->user()->post == 'Head of department ( HOD )' && auth()->user()->department == 'DICT')
                            <td style="text-decoration:normal">
                                <span class="font-weight-bold">{{ $resource->repair_status }}</span>
                            </td>


                        @else
                        @endif
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


                        @if (auth()->user()->department == 'department 1' || auth()->user()->post == 'store')
                            <td style="text-decoration:normal">
                                <span class="font-weight-bold">{{ $resource->building }}</span>
                            </td>

                            <td style="text-decoration:normal">
                                <span class="font-weight-bold">{{ $resource->specific_area }}</span>
                            </td>

                            <td style="text-decoration:normal">
                                <span class="font-weight-bold">{{ $resource->room }}</span>
                            </td>

                            <td style="text-decoration:normal">

                                <span>{{ $resource->created_at->format('d M Y h:i:s') }}</span>
                            </td>


                            <td style="text-decoration:normal">

                                <span>{{ $resource->updated_at->format('d M Y h:i:s') }}</span>
                            </td>


                            <td>

                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                        href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                        <a class="dropdown-item"
                                            href="{{ asset('UIMS/edit-chas-resource/' . $resource->id) }}"><i
                                                class="dw dw-edit2"></i> Edit</a>



                                        <button type="submit" class="dropdown-item"
                                            wire:click = "deleteChasCreatedResource({{ $resource->id }})"
                                            onclick="confirm(`Are you sure you want to delete this {{ $resource->resource_name }} asset  from the list ? `) || event.stopImmediatePropagation()"><i
                                                class="dw dw-delete-3"></i>Delete</button>



                                    </div>
                                </div>
                            </td>
                        @else
                        @endif





                    </tr>
                @endforeach

            </tbody>

        </table>
        <span>{{ $Resources->links() }}</span>


        @if (auth()->user()->post == 'Head of department ( HOD )' && auth()->user()->department == 'DICT')

            @if ($Resources->count() > 0)
                <button wire:click = 'verifySelected' type="submit"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 mb-10"
                    onclick="confirm(`Are you sure you want to approve the status of this resource  ?`) || event.StopImmediatePropagation()">
                    <i class="fas fa-check p-1"></i>
                    set to repaired condition
                </button>
            @else
                <button disabled wire:click = 'verifySelected' type="submit"
                    class="inline-flex items-center px-4 py-2 bg-gray-300 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-300 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 mb-10"
                    onclick="confirm(`Are you sure you want to approve the status of this resource  ?`) || event.StopImmediatePropagation()">
                    <i class="fas fa-check p-1"></i>
                    set to repaired condition
                </button>
            @endif

        @endif



    </div>

    <br>
    <div class="card-box p-3">
        <br>
        <h2 class="h5 pd-5">View exported PDF files </h2>
        <table class="data-table table nowrap ">

            <thead>
                <tr>
                    <th class="datatable-nosort font-weight-bold">#</th>
                    <th class="font-weight-bold">Exported by</th>
                    <th class="font-weight-bold">Exported time</th>
                    <th class="font-weight-bold">College name</th>
                    <th class="font-weight-bold"> File download</th>
                    <th class=" font-weight-bold">Action</th>

                </tr>
            </thead>
            <tbody>

                @php
                    $srNo = 1;
                @endphp

                @foreach ($pdfFiles as $file)
                    <tr>

                        <td>
                            {{ $srNo++ }}
                        </td>


                        <td>
                            {{ auth()->user()->email }}
                        </td>

                        <td>
                            {{ \Carbon\Carbon::now() }}
                        </td>

                        <td>
                            {{ auth()->user()->college_name }}
                        </td>


                        <td>
                            <div class="dropdown">
                                <a wire:click = "deleteFiles('{{ basename($file) }}')"
                                    href="{{ asset('storage/resource_files/' . basename($file)) }}"
                                    class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                    onclick="confirm(`Please don't forget to refresh the page once you are done downloading`) || event.stopImmediatePropagation()"
                                    download="{{ basename($file) }}">{{ basename($file) }}</a>
                            </div>

                        </td>

                        <td>

                            <div class="dropdown">

                                <button class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                    href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </button>

                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                    <button type="submit" class="dropdown-item"
                                        wire:click = "deleteFilesManually('{{ basename($file) }}')"
                                        onclick="confirm(`Are you sure you want to delete this {{ basename($file) }} resource  from the list ? `) || event.stopImmediatePropagation()"><i
                                            class="dw dw-delete-3"></i>Delete</button>
                                </div>
                            </div>
                        </td>


                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>



    @if (auth()->user()->post == 'Head of department ( HOD )' && auth()->user()->department == 'department 1')


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
    @else
    @endif





</div>
