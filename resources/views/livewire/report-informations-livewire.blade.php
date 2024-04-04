<div>

    <div class="card-box mb-30 p-3">

        @if (auth()->user()->college_name == 'Not set')
        <h2 class="h5 pd-20">View reports from the college managers</h2>
        <img src="{{ asset('vendors/images/udom.png') }}" class="float-end  udom-logo" alt="" srcset=""
            style="float:inline-end">
        @else

        @endif

    </div>

    <div class="card-box mb-30 p-3">

        @if (session()->has('deleteReport'))

        <div role="alert" class="alert alert-success alert-dismissible fade show">
            <strong>{{ session('deleteReport') }}</strong>
            <button class="btn btn-close"></button>
        </div>
    @endif

    @if (session()->has('message'))

    <div role="alert" class="alert alert-success alert-dismissible fade show">
        <strong>{{ session('message') }}</strong>
        <button class="btn btn-close"></button>
    </div>
@endif

        <div class="header-search mb-5">
            <form class="d-flex">
                <div class="form-group mb-0">

                    <input type="search" class="form-control search-input" placeholder="Search Here..."
                        wire:model.live = 'ReportSearch' />

                </div>
            </form>
        </div>

        <table class="data-table table nowrap ">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort font-weight-bold">College inventory manager</th>

                    <th class="font-weight-bold">College name</th>

                    <th class="font-weight-bold">Download report file</th>

                    <th class="font-weight-bold">Submission time</th>

                    <th class="datatable-nosort font-weight-bold">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- @dd($Resources) --}}
                @foreach ($Reports as $report)
                    <tr>

                        <td>
                            <h5 class="font-16">{{ $report->user->email }}</h5>

                        </td>

                        <td style="text-decoration:normal"><i class="bi bi-pencil p-2"></i>
                            {{ $report->college_name }}
                        </td>

                        <td style="text-decoration:normal">

                            {{ $report->report_file }}

                            <button wire:click = "download({{$report->id}})" class="bg-gray-500 hover:bg-gray-400 text-white font-bold p-2 rounded ms-2">

                                <i class="fas fa-download "></i>

                            </button>

                        </td>
                        <td>
                            <span>{{ $report->updated_at->format('d M Y h:i:s') }}</span>
                        </td>
                        <td>

                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                    href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                    <button type="submit" class="dropdown-item"
                                        wire:click = "deleteReport({{ $report->id }})"
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
