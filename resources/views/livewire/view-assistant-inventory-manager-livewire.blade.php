<div>

    <div class="card-box mb-30 p-3">
        <h2 class="h4 pd-20">View assistants</h2>
        <img src="{{ asset('vendors/images/udom.png') }}" class="float-end  udom-logo" alt="" srcset=""
            style="float-end">
    </div>

    <div class="card-box mb-30 p-3">

        <div role="alert" class="alert alert-success alert-dismissible fade show">
            <strong>{{ session('deleteAssistant') }}</strong>
            <button class="btn btn-close"></button>
        </div>
        @endif

        <button type="submit" wire:click = "exportAssistantInventoryManagers"
            class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 float-end">
            <i class="bi bi-download font-weight-bold p-1"></i>
            Export assistants csv
        </button>

        <div class="header-search mb-5">
            <form class="d-flex">
                <div class="form-group mb-0">

                    <input type="search" class="form-control search-input" placeholder="Search Here..."
                        wire:model.live = 'assistantSearch' />

                </div>
            </form>
        </div>

            <table class="data-table table nowrap">
                <thead>
                    <tr>
                        <th class="table-plus datatable-nosort font-weight-bold">Username</th>
                        <th class="table-plus datatable-nosort font-weight-bold">Email</th>
                        <th class="font-weight-bold"><i class="bi bi-telephone p-2"></i>Phone number</th>
                        <th class="datatable-nosort font-weight-bold">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($Assistants as $assistant)
                        <tr>

                            <td>
                                <h5 class="font-16">{{ $assistant->username }}</h5>

                            </td>


                            <td>
                                <h5 class="font-16">{{ $assistant->email }}</h5>

                            </td>

                            <td style="text-decoration:normal">
                                @foreach ($assistant->phone as $PhoneNumber)
                                    <br>
                                    {{ $PhoneNumber->phone_number }}
                                @endforeach

                            </td>

                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                        href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                        <button type="submit" class="dropdown-item"
                                            onclick="confirm(`Are you sure you want to delete  {{ $assistant->email }}   assistant inventory manager ? `) || event.stopImmediatePropagation()"wire:click="deleteAssistant({{ $assistant->id }})"><i
                                                class="dw dw-delete-3"></i>Delete</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>


            </table>
            <span>{{ $Assistants->links() }}</span>

    </div>
</div>
