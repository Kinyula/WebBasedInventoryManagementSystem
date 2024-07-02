<div>
    <div class="card-box mb-30 p-3">
        <h2 class="h5 pd-20">Welcome again : <span class="text-danger">{{ auth()->user()->username }}</span></h2>
        <img src="{{ asset('vendors/images/udom.png') }}" class="float-end  udom-logo" alt="" srcset=""
            style="float:inline-end">
        {{-- <div class="role relative left-5">
            <span class="font-weight-bold">Role : </span>
            <span class="font-weight-bold text-danger uppercase">{{ auth()->user()->post }}</span>
        </div> --}}
    </div>

    <div class="grid grid-cols-4">
        <div class="card-box mb-30 p-3 w-40">
            <h4 class="font-weight-bold uppercase">Vice Chansellor <br> ( VC )</h4>
            <span class="font-weight-bold text-danger">Total : </span>
            <span class="font-weight-bold text-success">{{ $vc??0 }}</span>
        </div>

        <div class="card-box mb-30 p-3 w-40">
            <h4 class="font-weight-bold uppercase">dean of finance <br> ( DOF )</h4>
            <span class="font-weight-bold text-danger">Total : </span>
            <span class="font-weight-bold text-success">{{ $dof??0 }}</span>
        </div>

        <div class="card-box mb-30 p-3 w-40">
            <h4 class="font-weight-bold uppercase">Chief supplier officer <br> ( CSO )</h4>
            <span class="font-weight-bold text-danger">Total : </span>
            <span class="font-weight-bold text-success">{{ $cso??0 }}</span>
        </div>

        <div class="card-box mb-30 p-3 w-40">
            <h4 class="font-weight-bold uppercase">Principals</h4>
            <span class="font-weight-bold text-danger">Total : </span>
            <span class="font-weight-bold text-success">{{ $principal??0 }}</span>
        </div>
        <div class="card-box mb-30 p-3 w-40">
            <h4 class="font-weight-bold uppercase">Store managers</h4>
            <span class="font-weight-bold text-danger">Total : </span>
            <span class="font-weight-bold text-success">{{ Illuminate\Support\Number::abbreviate($store, precision:2)??0 }}</span>
        </div>

        <div class="card-box mb-30 p-3 w-40">
            <h4 class="font-weight-bold uppercase">Accountants</h4>
            <span class="font-weight-bold text-danger">Total : </span>
            <span class="font-weight-bold text-success">{{ $accountant??0 }}</span>
        </div>

        <div class="card-box mb-30 p-3 w-40">
            <h4 class="font-weight-bold ">HEAD OF DEPARTMENTS <br> ( HOD's)</h4>
            <span class="font-weight-bold text-danger">Total : </span>
            <span class="font-weight-bold text-success">{{ $hod??0 }}</span>
        </div>

    </div>

    <div class="card-box mb-30 p-3">
        <h2 class="h4 pd-20"><i class="fas fa-users px-1"></i> View created staffs</h2>
        <img src="{{ asset('vendors/images/udom.png') }}" class="float-end  udom-logo" alt="" srcset=""
            style="float-end">
    </div>

    <div class="card-box mb-30 p-3">

        @if (session()->has('deleteUser'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('deleteUser') }}</strong>
                <button class="btn btn-close"></button>
            </div>
        @endif




        <button type="submit" wire:click = "exportStaffs"
            class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 float-end">
            <i class="bi bi-download font-weight-bold p-1"></i>
            Export staff csv
        </button>

        <a href="{{ asset('UIMS/staff-management') }}"
        class="inline-flex items-center px-4 py-2 bg-gray-800 dark:ibg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 float-end">
        <i class="fas fa-plus px-1"></i>
        create staff
    </a>

        <div class="header-search mb-5">
            <form class="d-flex">
                <div class="form-group mb-0">

                    <input type="search" class="form-control search-input" placeholder="Search Here..."
                        wire:model.live = 'staffSearch' />

                </div>
            </form>
        </div>

        <table class="data-table table nowrap">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort font-weight-bold">Username</th>
                    <th class="table-plus datatable-nosort font-weight-bold">Email</th>
                    <th class="table-plus datatable-nosort font-weight-bold"><i class="bi bi-telephone p-2"></i>Phone
                        number</th>
                    <th class="table-plus datatable-nosort font-weight-bold">Role</th>
                    <th class="table-plus datatable-nosort font-weight-bold">Post</th>
                    <th class="datatable-nosort font-weight-bold">Action</th>
                </tr>
            </thead>
            <tbody>


                    @foreach ($Staffs as $staff)
                        <tr>

                            <td>
                                <h5 class="font-16">{{ $staff->username }}</h5>

                            </td>


                            <td>
                                <h5 class="font-16">{{ $staff->email }}</h5>

                            </td>


                            <td style="text-decoration:normal">

                                @php
                                    $srNo = 1;
                                @endphp

                                @foreach ($staff->phone as $PhoneNumber)
                                    <br>

                                    <span class="text-danger font-weight-bold">{{ $srNo++ }} )</span>

                                    {{ $PhoneNumber->phone_number }}
                                @endforeach
                            </td>

                            <td>
                                @if ($staff->college_name === 'Not set')
                                <span>Administration staff</span>
                                @else
                                <h5 class="font-16">{{ $staff->college_name }} staff</h5>
                                @endif


                            </td>

                            <td>
                                @if ($staff->role_id === '3')
                                <span>Admin</span>
                                @else
                                <h5 class="font-16">{{ $staff->post }}</h5>
                                @endif


                            </td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                        href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                        <a class="dropdown-item" href="{{ asset('UIMS/edit-staff/' . $staff->id) }}"><i
                                            class="dw dw-edit2"></i> Edit</a>
                                        <button type="submit" class="dropdown-item"
                                            onclick="confirm(`Are you sure you want to delete  {{ $staff->email }}   staff ? `) || event.stopImmediatePropagation()" wire:click="deleteStaff({{ $staff->id }})"><i
                                                class="dw dw-delete-3"></i>Delete</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

            </tbody>


        </table>
        <span>{{ $Staffs->links() }}</span>

    </div>

</div>
