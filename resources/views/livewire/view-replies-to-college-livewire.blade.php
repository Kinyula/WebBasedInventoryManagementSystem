<div>

    <div class="card-box mb-30 p-3">
        <h2 class="h5 pd-20">View sent report details from the {{ auth()->user()->college_name }}</h2>
        <img src="{{ asset('vendors/images/udom.png') }}" class="float-end  udom-logo" alt="" srcset=""
            style="float:inline-end">
    </div>

    <div class="card-box mb-30 p-3">

        @if (session()->has('deleteReply'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('deleteReply') }}</strong>
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
                        wire:model.live = 'cReportSearch' />

                </div>
            </form>
        </div>

        <table class="data-table table nowrap ">

            <thead>
                <tr>
                    <th class="table-plus datatable-nosort font-weight-bold">College inventory manager</th>

                    <th class="font-weight-bold">College name</th>

                    {{-- <th class="font-weight-bold">Report image</th> --}}

                    <th class="font-weight-bold">Download report file</th>

                    <th class="font-weight-bold">Submission time</th>

                    <th class="datatable-nosort font-weight-bold">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- @dd($Resources) --}}

                @if (auth()->user()->college_name == 'College of Informatics and Virtual Education ( CIVE )')

                    @foreach ($Replies as $reply)
                        <tr>

                            <td>
                                <h5 class="font-16">{{ $reply->user->email }}</h5>

                            </td>

                            <td style="text-decoration:normal"><i class="bi bi-pencil p-2"></i>
                                {{ $reply->reply_to_specified_college }}
                            </td>

                            {{-- <td style="text-decoration: normal">

                        <img src="{{ asset('storage/report_image_files/' . $report->resource_image) }}" alt=""
                            srcset="" width="200px;">
                    </td> --}}

                            <td class="flex px-4" style="text-decoration:normal">

                                @if ($reply->reply_status == 'unread')
                                    <p class="font-weight-bold text-red-500">NEW</p>
                                @endif

                                <button wire:click = "download({{ $reply->id }})"
                                    class="bg-gray-500 hover:bg-gray-400 text-white font-bold p-2 rounded ms-2">

                                    <i class="fas fa-download "></i>

                                </button>

                            </td>
                            <td>
                                <span>{{ $reply->updated_at->format('d M Y h:i:s') }}</span>
                            </td>
                            <td>

                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                        href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                        <button type="submit" class="dropdown-item"
                                            wire:click = "deleteReplyReport({{ $reply->id }})"
                                            onclick="confirm(`Are you sure you want to delete this report  from the list ? `) || event.stopImmediatePropagation()"><i
                                                class="dw dw-delete-3"></i>Delete</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif

                @if (auth()->user()->college_name == 'College of Health and Allied Science ( CHAS )')

                    @foreach ($Replies as $reply)
                        <tr>

                            <td>
                                <h5 class="font-16">{{ $reply->user->email }}</h5>

                            </td>

                            <td style="text-decoration:normal"><i class="bi bi-pencil p-2"></i>
                                {{ $reply->reply_to_specified_college }}
                            </td>

                            {{-- <td style="text-decoration: normal">

                        <img src="{{ asset('storage/report_image_files/' . $report->resource_image) }}" alt=""
                            srcset="" width="200px;">
                    </td> --}}

                            <td class="flex px-4" style="text-decoration:normal">

                                @if ($reply->reply_status == 'unread')
                                    <p class="font-weight-bold text-red-500">NEW</p>
                                @endif

                                <button wire:click = "download({{ $reply->id }})"
                                    class="bg-gray-500 hover:bg-gray-400 text-white font-bold p-2 rounded ms-2">

                                    <i class="fas fa-download "></i>

                                </button>

                            </td>
                            <td>
                                <span>{{ $reply->updated_at->format('d M Y h:i:s') }}</span>
                            </td>
                            <td>

                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                        href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                        <button type="submit" class="dropdown-item"
                                            wire:click = "deleteReplyReport({{ $reply->id }})"
                                            onclick="confirm(`Are you sure you want to delete this report  from the list ? `) || event.stopImmediatePropagation()"><i
                                                class="dw dw-delete-3"></i>Delete</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                @endif
            </tbody>

        </table>
        <span>{{ $Replies->links() }}</span>


    </div>


</div>
