<div>

    <div class="card-box mb-30 p-3">

        @if (auth()->user()->college_name === 'Not set' && auth()->user()->post === 'store')
            <h2 class="h5 pd-20">View created items</h2>
            <img src="{{ asset('vendors/images/udom.png') }}" class="float-end  udom-logo" alt="" srcset=""
                style="float:inline-end">
            <div class="role relative left-5">
                <span class="font-weight-bold">Role : </span>
                <span class="font-weight-bold text-danger uppercase">Dean of Finance ( DOF )</span>
            </div>
        @else

            <h2 class="h5 pd-20">View inventory sheet details of the {{ auth()->user()->college_name }}</h2>
            <img src="{{ asset('vendors/images/udom.png') }}" class="float-end  udom-logo" alt="" srcset=""
                style="float:inline-end">
            <div class="role relative left-5">
                <span class="font-weight-bold">Role : </span>
                <span class="font-weight-bold text-danger uppercase">{{ auth()->user()->post }}</span>
            </div>
        @endif

    </div>

    <div class="card-box mb-30 p-3">

        @if (session()->has('deletedetail'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('deletedetail') }}</strong>
                <button class="btn btn-close"></button>
            </div>
        @endif

        @if (session()->has('done'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('done') }}</strong>
                <button class="btn btn-close"></button>
            </div>
        @endif

        <div style="float: inline-end">


            <button type="submit" wire:loading.attr = "disabled" wire:click = "exportChasInventorySheetExcel"
                onclick="confirm('Dont\'t forget to refresh the page to view files to be downloaded') || event.stopImmediatePropagation()"
                class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 float-end">
                <i class="bi bi-download font-weight-bold p-1"></i>
                Export details in excel
            </button>

            @if (auth()->user()->post === 'store')
                <a wire:navigate href="{{ asset('UIMS/add-chas-details') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 float-end">
                    <i class="fa-solid fa-arrow-left px-1"></i>
                    Back
                </a>
            @else
            @endif

        </div>

        <div class="header-search mb-5">
            <form class="d-flex">
                <div class="form-group mb-0">

                    <input type="search" class="form-control search-input" placeholder="Search Here..."
                        wire:model.live = 'chasdetailSearch' />

                </div>
            </form>
        </div>

        <table class="data-table table nowrap ">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort font-weight-bold">SNO</th>
                    <th class="table-plus datatable-nosort font-weight-bold">ASSET ID</th>
                    <th class="table-plus datatable-nosort  font-weight-bold">Class/Category</th>
                    <th class="table-plus datatable-nosort  font-weight-bold">UNIT</th>
                    {{-- <th class="font-weight-bold">Qr code</th> --}}
                    <th class="font-weight-bold">QUANTITY</th>
                    <th class="font-weight-bold">CONDITION</th>

                    {{-- <th class="datatable-nosort font-weight-bold">Action</th> --}}
                </tr>
            </thead>
            <tbody>

                @php
                    $srNo = 1;
                @endphp
                @foreach ($Details as $detail)
                    <tr>



                        <td>

                            <span class="font-weight-bold text-danger">{{ $srNo++ }}</span>

                        </td>

                        {{-- <td style="text-decoration:normal">
                            {{ QrCode::size('30')->generate($detail->id) }}
                        </td> --}}

                        <td>
                            <span class="font-weight-bold text-danger">{{ $detail->id }}</span>
                        </td>

                        <td style="text-decoration:normal">
                            <span class="font-weight-bold"> {{ $detail->category->category_type }} </span>
                        </td>

                        <td style="text-decoration:normal">

                            <span class="font-weight-bold text-danger text-lg">pc</span>
                        </td>

                        <td style="text-decoration:normal">
                            <span
                                class="font-weight-bold text-danger">1</span>
                            <span class="font-weight-bold">item</span>
                        </td>

                        <td style="text-decoration:normal">
                            <span
                                class="font-weight-bold text-danger">{{ $detail->asset_status }}</span>

                        </td>


                        {{-- <td>

                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                    href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                    <a class="dropdown-item"
                                        href="{{ asset('UIMS/edit-chas-detail/' . $detail->id) }}"><i
                                            class="dw dw-edit2"></i> Edit</a>



                                    <button type="submit" class="dropdown-item"
                                        wire:click = "deleteChasCreateddetail({{ $detail->id }})"
                                        onclick="confirm(`Are you sure you want to delete this {{ $detail->resource_name }} asset  from the list ? `) || event.stopImmediatePropagation()"><i
                                            class="dw dw-delete-3"></i>Delete</button>



                                </div>
                            </div>
                        </td> --}}
                    </tr>
                @endforeach

            </tbody>

        </table>
        <span>{{ $Details->links() }}</span>




    </div>


</div>
