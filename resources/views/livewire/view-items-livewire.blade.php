<div>

    <div class="card-box mb-30 p-3">
        <h2 class="h5 pd-20">View items ordered from manufacturers</h2>
        <img src="{{ asset('vendors/images/udom.png') }}" class="float-end  udom-logo" alt="" srcset="" style="float:inline-end">
    </div>

    <div class="card-box mb-30 p-3">

        <form wire:submit.prevent = 'exportAssetsPdf'>

            <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 float-end">
                <i class="bi bi-download font-weight-bold p-1"></i>
                Export assets PDF
            </button>

        </form>

        <div class="header-search ">
            <form class="d-flex">
                <div class="form-group mb-0">

                    <input type="search" class="form-control search-input" placeholder="Search Here..."
                        wire:model.live = 'assetSearch' style="position: relative;bottom:20%" />

                </div>
            </form>
        </div>

        @if (session()->has('deleteAsset'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('deleteAsset') }}</strong>
                <button class="btn btn-close"></button>
            </div>
        @endif
        <table class="data-table table nowrap ">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort font-weight-bold">Category type</th>
                    <th class="font-weight-bold">Asset type</th>
                    <th class="font-weight-bold">Qr code</th>
                    <th class="font-weight-bold">Asset status</th>
                    <th class="font-weight-bold">Resource received time</th>
                    <th class="datatable-nosort font-weight-bold">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Assets as $asset)
                    <tr>

                        <td>
                            <h5 class="font-16">{{ $asset->category->category_type }}</h5>

                        </td>
                        <td style="text-decoration:normal"><i class="bi bi-pencil p-2"></i>
                            {{ $asset->asset_type }}</td>


                        <td style="text-decoration:normal">
                            {{ QrCode::size('30')->generate($asset->id) }}
                        </td>

                        <td style="text-decoration:normal">

                            <a href="{{ asset('UIMS/update-asset-status/' . $asset->assetStatus?->id) }}">
                                <button type="button"
                                    class="bg-gray-500 hover:bg-gray-400 text-white font-bold p-2 rounded">{{ $asset->assetStatus?->status }}</button>
                            </a>

                        </td>

                        <td style="text-decoration:normal">

                            <span> {{ $asset->updated_at->format('d, M Y- h:i:s a') }} <i
                                    class="bi bi-clock"></i></span>
                        </td>

                        <td>

                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                    href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                    <a class="dropdown-item" href="{{ asset('UIMS/edit-assets/' . $asset->id) }}"><i
                                            class="dw dw-edit2"></i> Edit</a>

                                    <button type="submit" class="dropdown-item"
                                        wire:click = "deleteItems({{ $asset->id }})"
                                        onclick="confirm(`Are you sure you want to delete this {{ $asset->asset_type }} asset  from the list ? `) || event.stopImmediatePropagation()"><i
                                            class="dw dw-delete-3"></i>Delete</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
        <span>{{ $Assets->links() }}</span>
    </div>
</div>
