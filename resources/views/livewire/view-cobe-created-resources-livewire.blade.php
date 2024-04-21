<div>

    <div class="card-box mb-30 p-3">
        <h2 class="h5 pd-20">View created items from the {{ auth()->user()->college_name }}</h2>
        <img src="{{ asset('vendors/images/udom.png') }}" class="float-end  udom-logo" alt="" srcset=""
            style="float:inline-end">
    </div>

    <div class="card-box mb-30 p-3">


        @if (session()->has('deleteResource'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('deleteResource') }}</strong>
                <button class="btn btn-close"></button>
            </div>
        @endif

        @if (session()->has('exportResource'))
        <div role="alert" class="alert alert-warning alert-dismissible fade show">
            <strong>{{ session('exportResource') }}</strong>
            <button class="btn btn-close"></button>
        </div>
    @endif

        <div style="float: inline-end">

            <button type="submit" wire:loading.attr = "disabled" wire:click = "printCobeQrCodePdf"
            onclick="confirm('Dont\'t forget to refresh the page to view files to be downloaded') || event.stopImmediatePropagation()"
                class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 float-end">
                <i class="bi bi-download font-weight-bold p-1"></i>
                print qr codes PDF
            </button>


            <button type="submit" wire:loading.attr = "disabled" wire:click = "exportCobeResourcesPdf"
                onclick="confirm('Dont\'t forget to refresh the page to view files to be downloaded') || event.stopImmediatePropagation()"
                class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 float-end">
                <i class="bi bi-download font-weight-bold p-1"></i>
                Export resources PDF
            </button>
        </div>

        <div class="header-search mb-5">
            <form class="d-flex">
                <div class="form-group mb-0">

                    <input type="search" class="form-control search-input" placeholder="Search Here..."
                        wire:model.live = 'cobeResourceSearch' />

                </div>
            </form>
        </div>



        <table class="data-table table nowrap ">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort font-weight-bold">College inventory manager</th>
                    <th class="font-weight-bold">Asset name</th>
                    <th class="font-weight-bold">Qr code</th>
                    <th class="font-weight-bold">College name</th>
                    <th class="font-weight-bold">Alocation status</th>
                    <th class="font-weight-bold">Asset status</th>
                    <th class="font-weight-bold">Select resource to print</th>
                    <th class="font-weight-bold">Alocation time</th>
                    <th class="datatable-nosort font-weight-bold">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($Resources as $resource)
                    <tr>

                        <td>
                            <h5 class="font-16">{{ $resource->user->email }}</h5>

                        </td>

                        <td style="text-decoration:normal"><i class="bi bi-pencil p-2"></i>
                            {{ $resource->resource_name }}
                        </td>


                        <td style="text-decoration:normal">
                            {{ QrCode::size('30')->generate($resource->id) }}
                        </td>

                        <td style="text-decoration:normal">
                            {{ $resource->college_name }}
                        </td>


                        <td style="text-decoration:normal">
                            <a href="{{ asset('UIMS/view-cive-resource-status/' . $resource->id) }}">
                                <button type="button"
                                    class="bg-gray-500 hover:bg-gray-400 text-white font-bold p-2 rounded">{{ $resource->status }}</button>
                            </a>
                        </td>

                        <td style="text-decoration:normal">
                            <a href="{{ asset('UIMS/view-cive-resource-status/' . $resource->id) }}">
                                <button type="button"
                                    class="bg-gray-500 hover:bg-gray-400 text-white font-bold p-2 rounded">{{ $resource->asset_status }}</button>
                            </a>
                        </td>

                        <td style="text-decoration: normal">

                            <input type="checkbox" wire:model = "resourceId" value="{{ $resource->id }}"
                                class="checked" onclick="checkAll()">

                        </td>

                        <td style="text-decoration:normal">

                            <span>{{ $resource->updated_at->format('d M Y h:i:s') }}</span>
                        </td>

                        <td>

                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                    href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                    <button type="submit" class="dropdown-item"
                                        wire:click = "deleteCobeCreatedResource({{ $resource->id }})"
                                        onclick="confirm(`Are you sure you want to delete this {{ $resource->resource_name }} asset  from the list ? `) || event.stopImmediatePropagation()"><i
                                            class="dw dw-delete-3"></i>Delete</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
        <span>{{ $Resources->links() }}</span>




    </div>

    <div class="card-box mb-40 p-3">

        <br>
        <br>

        @if (session()->has('downloadSuccessMessage'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('downloadSuccessMessage') }}</strong>
                <button class="btn btn-close"></button>
            </div>
        @endif

        @if (session()->has('downloadErrorMessage'))
            <div role="alert" class="alert alert-danger alert-dismissible fade show">
                <strong>{{ session('downloadErrorMessage') }}</strong>
                <button class="btn btn-close"></button>
            </div>
        @endif

        @if (session()->has('deleteErrorMessage'))
            <div role="alert" class="alert alert-danger alert-dismissible fade show">
                <strong>{{ session('deleteErrorMessage') }}</strong>
                <button class="btn btn-close"></button>
            </div>
        @endif

        <h2 class="h5 pd-5">View exported PDF files </h2>
        <table class="data-table table nowrap ">

            <thead>
                <tr>
                    <th class="datatable-nosort font-weight-bold">#</th>
                    <th class="font-weight-bold">Exported by</th>
                    <th class="font-weight-bold">Exported time</th>
                    <th class="font-weight-bold">College name</th>
                    <th class="font-weight-bold"> File download</th>
                    <th class=" font-weight-bold">Action</th>

                </tr>
            </thead>
            <tbody>

                @php
                    $srNo = 1;
                @endphp

                @foreach ($pdfFiles as $file)
                    <tr>

                        <td>
                            {{ $srNo++ }}
                        </td>


                        <td>
                            {{ auth()->user()->email }}
                        </td>

                        <td>
                            {{ \Carbon\Carbon::now() }}
                        </td>

                        <td >
                            {{ auth()->user()->college_name }}
                        </td>


                        <td>
                            <div class="dropdown">
                                <a wire:click = "deleteFiles('{{ basename($file) }}')"
                                    href="{{ asset('storage/resource_cobe_files/' . basename($file)) }}"
                                    class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                    onclick="confirm(`Please don't forget to refresh the page once you are done downloading`) || event.stopImmediatePropagation()"
                                    download="{{ basename($file) }}">{{ basename($file) }}</a>
                            </div>

                        </td>
                        
                        <td>

                            <div class="dropdown">

                                <button class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                    href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                            </button>

                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                    <button type="submit" class="dropdown-item"
                                        wire:click = "deleteFilesManually('{{ basename($file)}}')"
                                        onclick="confirm(`Are you sure you want to delete this {{basename($file)}} resource  from the list ? `) || event.stopImmediatePropagation()"><i
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
