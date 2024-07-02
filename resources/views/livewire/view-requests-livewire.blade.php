<div>

    @if (auth()->user()->college_name == 'Not set')
        <div class="card-box mb-30 p-3">
            <h2 class="h5 pd-20">View sent request details</h2>
            <img src="{{ asset('vendors/images/udom.png') }}" class="float-end  udom-logo" alt="" srcset=""
                style="float:inline-end">
        </div>
    @else
        <div class="card-box mb-30 p-3">
            <h2 class="h5 pd-20">View sent request details from the {{ auth()->user()->college_name }}</h2>
            <img src="{{ asset('vendors/images/udom.png') }}" class="float-end  udom-logo" alt="" srcset=""
                style="float:inline-end">
        </div>
    @endif


    <div class="card-box mb-30 p-3">

        @if (session()->has('deleteRequest'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('deleteRequest') }}</strong>
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
        <div class="header-search mb-5">
            <form class="d-flex">
                <div class="form-group mb-0">

                    <input type="search" class="form-control search-input" placeholder="Search Here..."
                        wire:model.live = 'cnmsReportSearch' />

                </div>
            </form>
        </div>

        <table class="data-table table nowrap ">

            <thead>
                <tr>
                    <th class="table-plus datatable-nosort font-weight-bold">College inventory manager's email</th>

                    <th class="font-weight-bold">College name</th>

                    <th class="font-weight-bold">Request submitted</th>

                    <th class="font-weight-bold">Submission time</th>

                    <th class="font-weight-bold">Confirm status</th>

                    <th class="datatable-nosort font-weight-bold">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- @dd($Resources) --}}
                @foreach ($Requests as $request)
                    <tr>

                        <td>
                            <h5 class="font-16">{{ $request->user->email }}</h5>

                        </td>

                        <td style="text-decoration:normal"><i class="bi bi-pencil p-2"></i>
                            {{ $request->college_name }}
                        </td>

                        {{-- <td style="text-decoration: normal">

                            <img src="{{ asset('storage/report_image_files/' . $report->resource_image) }}" alt=""
                                srcset="" width="200px;">
                        </td> --}}

                        <td>
                            {{ $request->request }}
                        </td>

                        <td>
                            <span>{{ $request->updated_at->format('d M Y h:i:s') }}</span>
                        </td>


                        <td style="text-decoration:normal ">

                            @if ($request->confirm_status == 'Not received')
                                <button type="submit" wire:click = "updateSuccessConfirmStatus({{ $request->id }})"
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 text-danger">{{ $request->confirm_status }}</button>
                            @else
                                <button wire:click = "updateErrorConfirmStatus({{ $request->id }})"
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 text-danger">{{ $request->confirm_status }}</button>
                            @endif

                        </td>

                        <td>

                            <div class="dropdown">
                                
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                    href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                    <button type="submit" class="dropdown-item"
                                        wire:click = "deleteRequestSent({{ $request->id }})"
                                        onclick="confirm(`Are you sure you want to delete this request  from the list ? `) || event.stopImmediatePropagation()"><i
                                            class="dw dw-delete-3"></i>Delete</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
        <span>{{ $Requests->links() }}</span>


    </div>


</div>
