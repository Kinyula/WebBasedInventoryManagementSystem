<div>
    <div class="card-box mb-30 p-3">
        @if (auth()->user()->college_name == 'Not set')
        <h2 class="h5 pd-20">Allocated items to colleges</h2>
        @else
        <h2 class="h5 pd-20">Allocated items to {{auth()->user()->college_name}}</h2>
        @endif

        <img src="{{ asset('vendors/images/udom.png') }}" class="float-end  udom-logo" alt="" srcset="">
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

@if (session()->has('error'))
    <div role="alert" class="alert alert-success alert-dismissible fade show">
        <strong>{{ session('error') }}</strong>
        <button class="btn btn-close"></button>
    </div>
@endif

        <form wire:submit.prevent = 'exportResourcesPdf'>


            <button type="submit" style="float:inline-end"
                class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 float-end">
                <i class="bi bi-download font-weight-bold p-1"></i>
                Export resources PDF
            </button>

        </form>




        <div class="header-search">
            <form class="d-flex">
                <div class="form-group mb-0">

                    <input type="search" class="form-control search-input" placeholder="Search Here"
                        wire:model.live = 'resourceSearch' />

                </div>
            </form>
        </div>




        <table class="data-table table nowrap ">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort font-weight-bold">Assistant inventory manager</th>
                    <th class="font-weight-bold">Asset name</th>
                    <th class="font-weight-bold">Qr code</th>
                    <th class="font-weight-bold">Asset quantity</th>
                    <th class="font-weight-bold">Resource allocated college</th>
                    <th class="font-weight-bold">Alocation status</th>
                    <th class="font-weight-bold">Asset status</th>
                    <th class="font-weight-bold">Confirm status</th>
                    <th class="font-weight-bold">Alocation time</th>
                    <th class="datatable-nosort font-weight-bold">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- @dd($Resources) --}}
                @foreach ($Resources as $resource)
                    <tr>

                        <td>
                            <h5 class="font-16">{{ $resource->user->email }}</h5>

                        </td>

                        <td style="text-decoration:normal"><i class="bi bi-pencil p-2"></i>
                            {{ $resource->assets->asset_type }}
                        </td>


                        <td style="text-decoration:normal">
                            {{ QrCode::size('30')->generate($resource->id) }}
                        </td>

                        <td style="text-decoration:normal">
                            {{ $resource->asset_quantity }}
                        </td>

                        <td style="text-decoration:normal">
                            {{ $resource->resource_allocated_college }}
                        </td>


                        <td style="text-decoration:normal">

                            <button type="button"
                                class="bg-gray-500 hover:bg-gray-400 text-white font-bold p-2 rounded">{{ $resource->status }}</button>


                        </td>

                        <td style="text-decoration:normal">

                            <button type="button"
                                class="bg-gray-500 hover:bg-gray-400 text-white font-bold p-2 rounded">{{ $resource->asset_status }}</button>


                        </td>

                        <td style="text-decoration:normal ">

                            @if ($resource->confirm_status == 'Not received')
                                <button type="submit" wire:click = "updateSuccessConfirmStatus({{ $resource->id }})"
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 text-danger">{{ $resource->confirm_status }}</button>
                            @else
                                <button wire:click = "updateErrorConfirmStatus({{ $resource->id }})"
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 text-danger">{{ $resource->confirm_status }}</button>
                            @endif



                        </td>


                        <td style="text-decoration:normal">

                            <span>{{ $resource->updated_at->format('d M Y h:i:s a') }}</span>
                        </td>


                        <td>

                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                    href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                    <button type="submit" class="dropdown-item"
                                        wire:click = "deleteResources({{ $resource->id }})"
                                        onclick="confirm(`Are you sure you want to delete this {{ $resource->assets->asset_type }} asset  from the list ? `) || event.stopImmediatePropagation()"><i
                                            class="dw dw-delete-3"></i>Delete</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
        <span>{{ $Resources->links() }}</span>
    </div>
</div>
