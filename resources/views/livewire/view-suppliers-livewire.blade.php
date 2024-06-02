<div>

    <div class="card-box mb-30 p-3">
        <h2 class="h5 pd-20">View suppliers</h2>
        <img src="{{ asset('vendors/images/udom.png') }}" class="float-end  udom-logo" alt="" srcset="">
    </div>

    <div class="card-box mb-30 p-3">

        @if (session()->has('deleteSupplier'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('deleteSupplier') }}</strong>
                <button class="btn btn-close"></button>
            </div>
        @endif

        <form wire:submit.prevent = 'exportSuppliersPdf'>

            <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 float-end">
                <i class="bi bi-download font-weight-bold p-1"></i>
                Export suppliers PDF
            </button>

        </form>

        <div class="header-search ">
            <form class="d-flex">
                <div class="form-group mb-0">

                    <input type="search" class="form-control search-input" placeholder="Search Here..."
                        wire:model.live = 'supplierSearch' style="position: relative;bottom:20%" />

                </div>
            </form>
        </div>

        <table class="data-table table nowrap">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort font-weight-bold">Supplier name</th>
                    <th class="font-weight-bold">Supplier location</th>
                    <th class="font-weight-bold">Supplier contacts</th>
                    <th class="font-weight-bold">Supplier services</th>
                    <th class="datatable-nosort font-weight-bold">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Suppliers as $supplier)
                    <tr>

                        <td>
                            <h5 class="font-16">{{ $supplier->company_name }}</h5>

                        </td>

                        <td>
                            <h5 class="font-16">{{ $supplier->company_location }}</h5>

                        </td>

                        <td style="text-decoration:normal">
                            @php
                                $srNo = 1;
                            @endphp
                            @foreach ($supplier->phone as $supplier_phone_number)
                            <br>
                            <span class="text-danger">{{ $srNo++ }})</span>
                            <i class="bi bi-telephone p-2 text-danger"></i>
                                {{ $supplier_phone_number->phone_number }}

                            @endforeach

                        </td>

                        <td style="text-decoration:normal">
                            @foreach ($supplier->services as $supplier_services)
                                {{ $supplier_services->services_offered }}
                                <br>
                            @endforeach

                        </td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                    href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <a class="dropdown-item" href="#"><i class="dw dw-eye"></i>
                                        View</a>
                                    <a class="dropdown-item" wire:navigate
                                        href="{{ asset('UIMS/update-supplier/' . $supplier->id) }}"><i
                                            class="dw dw-edit2"></i> Edit</a>

                                    <button type="submit" class="dropdown-item"
                                        onclick="confirm(`Are you sure you want to delete this {{ $supplier->compant_name }} 's  phone supplier ? `) || event.stopImmediatePropagation()"wire:click="deleteSupplier({{ $supplier->id }})"><i
                                            class="dw dw-delete-3"></i>Delete</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>

    </div>
</div>
