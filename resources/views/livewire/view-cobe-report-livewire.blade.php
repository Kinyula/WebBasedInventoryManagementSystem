<div>

    <div class="card-box mb-30 p-3 ">
        <h2 class="h5 pd-20">View created details from the {{ auth()->user()->college_name }}</h2>
        <img src="{{ asset('vendors/images/udom.png') }}" class="float-end  udom-logo" alt="" srcset=""
            style="float:inline-end">
    </div>


    <div class="card-box mb-30 p-3 nowrap">

        @if (session()->has('deleteCobeReport'))

            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('deleteCobeReport') }}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>

        @endif

        <div class="exportBtn mb-5 float-end">
            <button type="submit" wire:click="exportCobeReportPdf"
            class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 float-end mb-5">
            <i class="bi bi-download font-weight-bold p-1"></i>
            print report
        </button>
        </div>

        <div class="header-search mb-5 ">
            <form class="d-flex">
                <div class="form-group">

                    <input type="search" class="form-control search-input" placeholder="Search Here..."
                        wire:model.live = 'cobeReportSearch' />

                </div>
            </form>

        </div>

        <table class="data-table table nowrap bg-white">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort font-weight-bold">College inventory manager</th>
                    <th class="font-weight-bold">Category</th>
                    <th class="font-weight-bold">University store resource name</th>
                    <th class="font-weight-bold">College store resource name</th>
                    <th class="font-weight-bold">University store resource id</th>
                    <th class="font-weight-bold">College store resource id</th>

                    <th class="font-weight-bold">Resource image</th>

                    <th class="font-weight-bold">Resource description</th>

                    <th class="font-weight-bold">College name</th>

                    <th class="font-weight-bold">Submission time</th>
                    <th class="font-weight-bold">print report</th>
                    <th class="datatable-nosort font-weight-bold">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($Reports as $report)
                    <tr>

                        <td>

                            <h5 class="font-16">{{ $report->user->email }}</h5>

                        </td>

                        <td style="text-decoration:normal"><i class="bi bi-pencil p-2"></i>
                            {{ $report->cobeResources->category->category_type }}
                        </td>

                        <td style="text-decoration:normal">
                            {{ $report->cobeResources->assets->asset_type }}
                        </td>

                        <td style="text-decoration:normal">

                            {{ $report->cobeResources->resource_name }}
                        </td>

                        <td style="text-decoration:normal">
                            {{ $report->cobeResources->asset_id }}
                        </td>


                        <td style="text-decoration:normal">

                            {{ $report->cobeResources->id }}
                        </td>

                        <td style="text-decoration:normal;width:100px;">

                            <img src="{{ asset('storage/resource_images/' . $report->resource_image) }}" alt=""
                                srcset="">
                        </td>

                        <td>
                            {{ $report->description }}
                        </td>

                        <td>
                            {{ $report->college_name }}
                        </td>
                        <td>
                            <span>{{ $report->updated_at->format('d M Y h:i:s') }}</span>
                        </td>

                        <td style="text-decoration:normal">

                            <input type="checkbox" wire:model = "reportId" value="{{ $report->id }}" id="">

                        </td>

                        <td>

                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                    href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                    <button type="submit" class="dropdown-item"
                                        wire:click = "deleteCobeReport({{ $report->id }})"
                                        onclick="confirm(`Are you sure you want to delete this report  from the list ? `) || event.stopImmediatePropagation()"><i
                                            class="dw dw-delete-3"></i>Delete</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
        <span>{{ $Reports->links() }}</span>


    </div>
</div>
