<div>

    <div class="card-box mb-30 p-3">
        <h2 class="h5 pd-20">View resources and their areas allocated </h2>
        <img src="{{ asset('vendors/images/udom.png') }}" class="float-end  udom-logo" alt="" srcset=""
            style="float:inline-end">
    </div>

    <div class="card-box mb-30 p-3">

        @if (session()->has('success_delete'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('success_delete') }}</strong>
                <button class="btn btn-close"></button>
            </div>
        @endif

        <button type="submit" wire:click = "exportAreaPdf"
            class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 float-end">
            <i class="bi bi-download font-weight-bold p-1"></i>
            Export PDF
        </button>


        <div class="header-search ">
            <form class="d-flex">
                <div class="form-group mb-0">

                    <input type="search" class="form-control search-input" placeholder="Search Here..."
                        wire:model.live = 'areaSearch' style="position: relative;bottom:20%" />

                </div>
            </form>
        </div>

        <table class="data-table table nowrap">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort font-weight-bold">College inventory manager</th>
                    <th class="font-weight-bold">College name</th>
                    <th class="font-weight-bold">Resource name</th>
                    <th class="font-weight-bold">Quantity</th>
                    <th class="font-weight-bold">Area of allocation</th>
                    <th class="font-weight-bold">Allocated time</th>
                    <th class="datatable-nosort font-weight-bold">Action</th>
                </tr>
            </thead>
            <tbody>


                @if (auth()->user()->college_name == 'College of Informatics and Virtual Education ( CIVE )')


                    @foreach ($Areas as $area)
                        <tr>

                            <td>
                                <h5 class="font-16">{{ $area->user->email }}</h5>

                            </td>
                            <td style="text-decoration:normal"><i class="bi bi-pencil p-2"></i>
                                {{ $area->college_name }}</td>


                            <td style="text-decoration:normal">
                                {{ $area->resource }}
                            </td>

                            <td style="text-decoration:normal">
                                {{ $area->quantity }}
                            </td>

                            <td style="text-decoration:normal">
                                {{ $area->area_of_allocation }}
                            </td>


                            <td style="text-decoration:normal">

                                <span> {{ $area->updated_at->format('d, M Y- h:i:s a') }} <i
                                        class="bi bi-clock"></i></span>
                            </td>

                            <td>

                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                        href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                        <a class="dropdown-item" href="{{ asset('UIMS/update-areas/' . $area->id) }}"><i
                                                class="dw dw-edit2"></i> Edit</a>

                                        <button type="submit" class="dropdown-item"
                                            wire:click = "deleteAreaOfAllocation({{ $area->id }})"
                                            onclick="confirm(`Are you sure you want to delete this {{ $area->area_of_allocation }} asset  from the list ? `) || event.stopImmediatePropagation()"><i
                                                class="dw dw-delete-3"></i>Delete</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                @endif


                @if (auth()->user()->college_name == 'College of Natural Mathematical Science ( CNMS ) ')


                    @foreach ($Areas as $area)
                        <tr>

                            <td>
                                <h5 class="font-16">{{ $area->user->email }}</h5>

                            </td>
                            <td style="text-decoration:normal"><i class="bi bi-pencil p-2"></i>
                                {{ $area->college_name }}</td>


                            <td style="text-decoration:normal">
                                {{ $area->resource }}
                            </td>

                            <td style="text-decoration:normal">
                                {{ $area->quantity }}
                            </td>

                            <td style="text-decoration:normal">
                                {{ $area->area_of_allocation }}
                            </td>


                            <td style="text-decoration:normal">

                                <span> {{ $area->updated_at->format('d, M Y- h:i:s a') }} <i
                                        class="bi bi-clock"></i></span>
                            </td>

                            <td>

                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                        href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                        <a class="dropdown-item" href="{{ asset('UIMS/edit-assets/' . $area->id) }}"><i
                                                class="dw dw-edit2"></i> Edit</a>

                                        <button type="submit" class="dropdown-item"
                                            wire:click = "deleteAreaOfAllocation({{ $area->id }})"
                                            onclick="confirm(`Are you sure you want to delete this {{ $area->area_of_allocation }} asset  from the list ? `) || event.stopImmediatePropagation()"><i
                                                class="dw dw-delete-3"></i>Delete</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                @endif

                @if (auth()->user()->college_name == 'College of Health and Allied Science ( CHAS )')


                @foreach ($Areas as $area)
                    <tr>

                        <td>
                            <h5 class="font-16">{{ $area->user->email }}</h5>

                        </td>
                        <td style="text-decoration:normal"><i class="bi bi-pencil p-2"></i>
                            {{ $area->college_name }}</td>


                        <td style="text-decoration:normal">
                            {{ $area->resource }}
                        </td>

                        <td style="text-decoration:normal">
                            {{ $area->quantity }}
                        </td>

                        <td style="text-decoration:normal">
                            {{ $area->area_of_allocation }}
                        </td>


                        <td style="text-decoration:normal">

                            <span> {{ $area->updated_at->format('d, M Y- h:i:s a') }} <i
                                    class="bi bi-clock"></i></span>
                        </td>

                        <td>

                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                    href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                    <a class="dropdown-item" href="{{ asset('UIMS/edit-assets/' . $area->id) }}"><i
                                            class="dw dw-edit2"></i> Edit</a>

                                    <button type="submit" class="dropdown-item"
                                        wire:click = "deleteAreaOfAllocation({{ $area->id }})"
                                        onclick="confirm(`Are you sure you want to delete this {{ $area->area_of_allocation }} asset  from the list ? `) || event.stopImmediatePropagation()"><i
                                            class="dw dw-delete-3"></i>Delete</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

            @endif
            </tbody>

        </table>
        <span>{{ $Areas->links() }}</span>
    </div>
</div>
