<div>

    <div class="card-box mb-30 p-3">
        <h2 class="h6 pd-20">View sent report details from the {{ auth()->user()->college_name }}</h2>
        <img src="{{ asset('vendors/images/udom.png') }}" class="float-end  udom-logo" alt="" srcset=""
            style="float:inline-end">
    </div>

    <div class="card-box mb-30 p-3">

        @if (session()->has('deleteReplies'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('deleteReplies') }}</strong>
                <button class="btn btn-close"></button>
            </div>
        @endif

        <button type="submit" wire:loading.attr = "disabled" wire:click = "exportSendingReportPdf"
            class=" btn inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 float-end">
            <i class="fa-solid fa-plus p-1"></i>
            generate report
        </button>

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
                    <th class="table-plus datatable-nosort font-weight-bold">College inventory manager</th>

                    <th class="font-weight-bold">College name</th>

                    <th class="font-weight-bold">Submission time</th>

                    <th class="font-weight-bold">Select report to generate</th>

                    <th class="datatable-nosort font-weight-bold">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- @dd($Resources) --}}

                @if (auth()->user()->college_name == 'College of Health and Allied Science ( CHAS )')
                    @foreach ($Reports as $report)
                        <tr>

                            <td>
                                <h5 class="font-16">{{ $report->user->email }}</h5>

                            </td>

                            <td style="text-decoration:normal"><i class="bi bi-pencil p-2"></i>
                                {{ $report->college_name }}
                            </td>

                            <td>
                                <span>{{ $report->updated_at->format('d M Y h:i:s') }}</span>
                            </td>

                            <td style="text-decoration:normal">
                                <input type="checkbox" wire:model = "reportId" value="{{ $report->id }}">
                            </td>
                            <td>

                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                        href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                        <button type="submit" class="dropdown-item"
                                            wire:click = "deleteReplies({{ $report->id }})"
                                            onclick="confirm(`Are you sure you want to delete this report  from the list ? `) || event.stopImmediatePropagation()"><i
                                                class="dw dw-delete-3"></i>Delete</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                @endif


                @if (auth()->user()->college_name == 'College of Informatics and Virtual Education ( CIVE )')
                @foreach ($Reports as $report)
                    <tr>

                        <td>
                            <h5 class="font-16">{{ $report->user->email }}</h5>

                        </td>

                        <td style="text-decoration:normal"><i class="bi bi-pencil p-2"></i>
                            {{ $report->college_name }}
                        </td>

                        <td>
                            <span>{{ $report->updated_at->format('d M Y h:i:s') }}</span>
                        </td>

                        <td style="text-decoration:normal">
                            <input type="checkbox" wire:model = "reportId" value="{{ $report->id }}">
                        </td>
                        <td>

                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                    href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                    <button type="submit" class="dropdown-item"
                                        wire:click = "deleteReplies({{ $report->id }})"
                                        onclick="confirm(`Are you sure you want to delete this report  from the list ? `) || event.stopImmediatePropagation()"><i
                                            class="dw dw-delete-3"></i>Delete</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

            @endif
                @if (auth()->user()->college_name == 'College of Natural Mathematical Science ( CNMS ) ')
                    @foreach ($Reports as $report)
                        <tr>

                            <td>
                                <h5 class="font-16">{{ $report->user->email }}</h5>

                            </td>

                            <td style="text-decoration:normal"><i class="bi bi-pencil p-2"></i>
                                {{ $report->college_name }}
                            </td>

                            <td>
                                <span>{{ $report->updated_at->format('d M Y h:i:s') }}</span>
                            </td>

                            <td style="text-decoration:normal">
                                <input type="checkbox" wire:model = "reportId" value="{{ $report->id }}">
                            </td>

                            <td>

                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                        href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                        <button type="submit" class="dropdown-item"
                                            wire:click = "deleteReplies({{ $report->id }})"
                                            onclick="confirm(`Are you sure you want to delete this report  from the list ? `) || event.stopImmediatePropagation()"><i
                                                class="dw dw-delete-3"></i>Delete</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif

                @if (auth()->user()->college_name == 'College of Business and Economics ( CoBE )')
                    @foreach ($Reports as $report)
                        <tr>

                            <td>
                                <h5 class="font-16">{{ $report->user->email }}</h5>

                            </td>

                            <td style="text-decoration:normal"><i class="bi bi-pencil p-2"></i>
                                {{ $report->college_name }}
                            </td>

                            <td>
                                <span>{{ $report->updated_at->format('d M Y h:i:s') }}</span>
                            </td>

                            <td style="text-decoration:normal">
                                <input type="checkbox" wire:model = "reportId" value="{{ $report->id }}">
                            </td>

                            <td>

                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                        href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                        <button type="submit" class="dropdown-item"
                                            wire:click = "deleteReplies({{ $report->id }})"
                                            onclick="confirm(`Are you sure you want to delete this report  from the list ? `) || event.stopImmediatePropagation()"><i
                                                class="dw dw-delete-3"></i>Delete</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif

                @if (auth()->user()->college_name == 'College of Education ( CoED )')
                    @foreach ($Reports as $report)
                        <tr>

                            <td>
                                <h5 class="font-16">{{ $report->user->email }}</h5>

                            </td>

                            <td style="text-decoration:normal"><i class="bi bi-pencil p-2"></i>
                                {{ $report->college_name }}
                            </td>

                            <td>
                                <span>{{ $report->updated_at->format('d M Y h:i:s') }}</span>
                            </td>

                            <td style="text-decoration:normal">
                                <input type="checkbox" wire:model = "reportId" value="{{ $report->id }}">
                            </td>

                            <td>

                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                        href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                        <button type="submit" class="dropdown-item"
                                            wire:click = "deleteReplies({{ $report->id }})"
                                            onclick="confirm(`Are you sure you want to delete this report  from the list ? `) || event.stopImmediatePropagation()"><i
                                                class="dw dw-delete-3"></i>Delete</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
                @if (auth()->user()->college_name == 'College of Humanities and Social Science ( CHSS )')
                    @foreach ($Reports as $report)
                        <tr>

                            <td>
                                <h5 class="font-16">{{ $report->user->email }}</h5>

                            </td>

                            <td style="text-decoration:normal"><i class="bi bi-pencil p-2"></i>
                                {{ $report->college_name }}
                            </td>

                            <td>
                                <span>{{ $report->updated_at->format('d M Y h:i:s') }}</span>
                            </td>

                            <td style="text-decoration:normal">
                                <input type="checkbox" wire:model = "reportId" value="{{ $report->id }}">
                            </td>

                            <td>

                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                        href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                        <button type="submit" class="dropdown-item"
                                            wire:click = "deleteReplies({{ $report->id }})"
                                            onclick="confirm(`Are you sure you want to delete this report  from the list ? `) || event.stopImmediatePropagation()"><i
                                                class="dw dw-delete-3"></i>Delete</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif

                @if (auth()->user()->college_name == 'College of Earth Sciences and Engineering ( CoESE )')
                @foreach ($Reports as $report)
                    <tr>

                        <td>
                            <h5 class="font-16">{{ $report->user->email }}</h5>

                        </td>

                        <td style="text-decoration:normal"><i class="bi bi-pencil p-2"></i>
                            {{ $report->college_name }}
                        </td>

                        <td>
                            <span>{{ $report->updated_at->format('d M Y h:i:s') }}</span>
                        </td>

                        <td style="text-decoration:normal">
                            <input type="checkbox" wire:model = "reportId" value="{{ $report->id }}">
                        </td>

                        <td>

                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                    href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                    <button type="submit" class="dropdown-item"
                                        wire:click = "deleteReplies({{ $report->id }})"
                                        onclick="confirm(`Are you sure you want to delete this report  from the list ? `) || event.stopImmediatePropagation()"><i
                                            class="dw dw-delete-3"></i>Delete</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif

                @if (auth()->user()->college_name == 'Not set')

                    @foreach ($Reports as $report)
                        <tr>

                            <td>
                                <h5 class="font-16">{{ $report->user->email }}</h5>

                            </td>

                            <td style="text-decoration:normal"><i class="bi bi-pencil p-2"></i>
                                {{ $report->college_name }}
                            </td>

                            <td>
                                <span>{{ $report->updated_at->format('d M Y h:i:s') }}</span>
                            </td>

                            <td style="text-decoration:normal">
                                <input type="checkbox" wire:model = "reportId" value="{{ $report->id }}">
                            </td>

                            <td>

                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                        href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                        <button type="submit" class="dropdown-item"
                                            wire:click = "deleteReplies({{ $report->id }})"
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
        <span>{{ $Reports->links() }}</span>


    </div>


</div>
