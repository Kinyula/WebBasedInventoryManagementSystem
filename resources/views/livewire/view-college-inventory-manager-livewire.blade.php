<div>

    <div class="card-box mb-30 p-3">
        <h2 class="h4 pd-20">View college managers</h2>
        <img src="{{ asset('vendors/images/udom.png') }}" class="float-end  udom-logo" alt="" srcset=""
            style="float:inline-end">
    </div>

    <div class="card-box mb-30 p-3">

        @if (session()->has('deleteCollegeManager'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('deleteCollegeManager') }}</strong>
                <button class="btn btn-close"></button>
            </div>
        @endif

        <button type="submit" style="float:inline-end"
            class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 float-end">
            <i class="bi bi-download px-1"></i>
            Export csv file
        </button>

        <div class="header-search">
            <form class="d-flex">
                <div class="form-group mb-0">

                    <input type="search" class="form-control search-input" placeholder="Search Here..."
                        wire:model.live = 'collegeManagerSearch' />


                </div>
            </form>
        </div>

        <table class="data-table table nowrap">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort font-weight-bold">Username</th>
                    <th class="table-plus datatable-nosort font-weight-bold">Email</th>
                    <th class="font-weight-bold">Phone number</th>
                    <th class="font-weight-bold">College name</th>
                    <th class="datatable-nosort font-weight-bold">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($CollegeManagers as $college_manager)
                    <tr>

                        <td>
                            <h5 class="font-16">{{ $college_manager->username }}</h5>

                        </td>

                        <td>
                            <h5 class="font-16">{{ $college_manager->email }}</h5>

                        </td>

                        <td style="text-decoration:normal"><i class="bi bi-telephone p-2"></i>
                            @foreach ($college_manager->phone as $PhoneNumber)
                                {{ $PhoneNumber->phone_number }}
                            @endforeach

                        </td>
                        <td>
                            <h5 class="font-16">{{ $college_manager->college_name }}</h5>

                        </td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                    href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                    <a class="dropdown-item"
                                        href="{{ asset('UIMS/edit-college-name/' . $college_manager->id) }}"><i
                                            class="dw dw-edit2"></i> Edit</a>

                                    <button type="submit" class="dropdown-item"
                                        onclick="confirm(`Are you sure you want to delete  {{ $college_manager->email }} college inventory manager  ? `) || event.stopImmediatePropagation()"
                                        wire:click="deleteCollegeManager({{ $college_manager->id }})"><i
                                            class="dw dw-delete-3"></i>Delete</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                <span>{{ $CollegeManagers->links() }}</span>
            </tbody>
        </table>


    </div>
</div>
