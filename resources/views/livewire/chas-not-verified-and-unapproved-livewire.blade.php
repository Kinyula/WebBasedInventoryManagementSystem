<div>
    <div class="card-box p-3">
        <span class="float-end">
            <input type="checkbox" wire:model="allChecked" wire:click="markAll" class="cursor-pointer">
            <span>Mark all</span>
        </span>
        <h2 class="h5 pd-20">View Unapproved items</h2>
        @if (session()->has('done'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('done') }}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session()->has('error'))
        <div role="alert" class="alert alert-danger alert-dismissible fade show">
            <strong>{{ session('error') }}</strong>
            <button class="btn btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
        <table class="data-table table nowrap">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort font-weight-bold">Asset id</th>
                    <th class="table-plus datatable-nosort font-weight-bold">Class/Category</th>
                    <th class="font-weight-bold">Asset name</th>
                    <th class="font-weight-bold">Asset cost</th>
                    <th class="font-weight-bold">Asset condition</th>
                    <th class="font-weight-bold">Verification status</th>
                    <th class="font-weight-bold">Select asset</th>
                    {{-- <th class="datatable-nosort font-weight-bold">Action</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($NotVerifiedApproval as $verified)
                    <tr>
                        <td>
                            <h5 class="font-16 font-weight-bold">{{ $verified->id }}</h5>
                        </td>
                        <td>
                            <h5 class="font-16 font-weight-bold">{{ $verified->category->category_type }}</h5>
                        </td>
                        <td style="text-decoration:normal">
                            <i class="bi bi-pencil p-2"></i>
                            <span class="font-weight-bold">{{ $verified->resource_name }}</span>
                        </td>
                        <td>
                            <span class="font-weight-bold">Tsh</span>
                            <span class="font-weight-bold text-danger">
                                {{ Illuminate\Support\Number::format($verified->groupBy('resource_name')->where('resource_name', $verified->resource_name)->count() * $verified->resource_cost) }}/=
                            </span>
                        </td>
                        <td style="text-decoration:normal">
                            @if ($verified->asset_status == 'Very good')
                                <button type="button" class="bg-green-600 text-white font-bold p-2 rounded">
                                    {{ $verified->asset_status }}
                                </button>
                            @elseif ($verified->asset_status == 'Good')
                                <button type="button" class="bg-green-800 hover:bg-yellow-800 text-white font-bold p-2 rounded">
                                    {{ $verified->asset_status }}
                                </button>
                            @elseif ($verified->asset_status == 'Fair')
                                <button type="button" class="bg-yellow-600 text-white font-bold p-2 rounded">
                                    {{ $verified->asset_status }}
                                </button>
                            @elseif ($verified->asset_status == 'New')
                                <button type="button" class="bg-blue-600 text-white font-bold p-2 rounded">
                                    {{ $verified->asset_status }}
                                </button>
                            @else
                                <button type="button" class="bg-red-600 text-white font-bold p-2 rounded">
                                    {{ $verified->asset_status }}
                                </button>
                            @endif
                        </td>
                        <td style="text-decoration:normal">
                            <i class="bi bi-pencil p-2"></i>
                            <button type="button" class="bg-red-600 text-white font-bold p-2 rounded">
                                {{ $verified->verification_status }}
                            </button>
                        </td>
                        <td style="text-decoration: normal">
                            <input type="checkbox" wire:model="resourceId" value="{{ $verified->id }}" class="checked cursor-pointer">
                        </td>
                        {{-- <td>
                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <a class="dropdown-item" href="{{ asset('UIMS/edit-chas-resource/' . $verified->id) }}">
                                        <i class="dw dw-edit2"></i> Edit
                                    </a>
                                    <button type="submit" class="dropdown-item" wire:click="deleteChasCreatedResource({{ $verified->id }})" onclick="confirm(`Are you sure you want to delete this {{ $verified->resource_name }} asset from the list?`) || event.stopImmediatePropagation()">
                                        <i class="dw dw-delete-3"></i> Delete
                                    </button>
                                </div>
                            </div>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
        <span>{{ $NotVerifiedApproval->links() }}</span>
        <button wire:click = 'verifySelected' type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 mb-10"
        onclick="confirm(`Are you sure you want to approve the status of this resource  ?`) || event.StopImmediatePropagation()">
            <i class="fas fa-check p-1"></i>
            Verify
        </button>
    </div>
</div>
