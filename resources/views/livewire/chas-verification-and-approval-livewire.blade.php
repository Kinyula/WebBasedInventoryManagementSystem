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
            <h2 class="h5 pd-20">Verification and Approval from the {{ auth()->user()->college_name }}</h2>
            <img src="{{ asset('vendors/images/udom.png') }}" class="float-end  udom-logo" alt="" srcset=""
                style="float:inline-end">
            <div class="role relative left-5">
                <span class="font-weight-bold">Role : </span>
                <span class="font-weight-bold text-danger uppercase">{{ auth()->user()->post }}</span>
            </div>
        @endif

    </div>

    @livewire('chas-not-verified-and-unapproved-livewire')
    <br>



    {{-- <div class="card-box p-2">

        @if (session()->has('approved'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('approved') }}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session()->has('unapproved'))
            <div role="alert" class="alert alert-danger alert-dismissible fade show">
                <strong>{{ session('unapproved') }}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif


        @if (session()->has('notfound'))
            <div role="alert" class="alert alert-danger alert-dismissible fade show">
                <strong>{{ session('notfound') }}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <h2 class="h5 pd-20">Verify and approve here</h2>
        <form wire:submit=submit>
            <div class="mt-4">
                <label for="resource_name" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Resource
                    name</label>
                <input type="text" wire:model= "resource_name"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                    placeholder="Enter the resource name eg. chair, Table, cupboard">
                @error('resource_name')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-3">
                <label for="batch_quantity" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Enter
                    Batch quantity</label>
                <input type="number" placeholder="Enter the batch quantity"
                    wire:model = "batch_quantity"class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                <br>
                @error('batch_quantity')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <br>
            <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4">
                <i class="me-2 fa-solid fa-check"></i>
                Verify and approve
            </button>
        </form>

    </div> --}}
    <br>
    <div class="card-box p-3">

        <h2 class="h5 pd-20">View approved items</h2>

        <div class="header-search mb-5">
            <form class="d-flex">
                <div class="form-group mb-0">

                    <input type="search" class="form-control search-input" placeholder="Search Here..."
                        wire:model.live = 'chasResourceSearch' />

                </div>
            </form>
        </div>

        <table class="data-table table nowrap ">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort font-weight-bold">Asset id</th>
                    <th class="table-plus datatable-nosort font-weight-bold">Class/Category</th>
                    <th class="font-weight-bold">Asset name</th>
                    <th class="font-weight-bold">Asset cost</th>
                    <th class="font-weight-bold">Asset condition</th>
                    <th class="font-weight-bold">Verification status</th>
                    <th class="font-weight-bold">Status</th>

                    <th class="datatable-nosort font-weight-bold">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($VerifiedApproval as $verified)
                    <tr>

                        <td>
                            <h5 class="font-16 font-weight-bold">{{ $verified->id }}</h5>

                        </td>

                        <td>
                            <h5 class="font-16 font-weight-bold">{{ $verified->category->category_type }}</h5>

                        </td>

                        <td style="text-decoration:normal"><i class="bi bi-pencil p-2"></i>
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
                            <button type="button" class="bg-green-600 text-white font-bold p-2 rounded">
                                {{ $verified->verification_status }}
                            </button>
                        </td>

                        <td style="text-decoration:normal">
                            <i class="bi bi-pencil p-2"></i>
                            <button type="button" class="bg-green-600 text-white font-bold p-2 rounded">
                                {{ $verified->status }}
                            </button>
                        </td>
                        <td>

                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                    href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                    <a class="dropdown-item"
                                        href="{{ asset('UIMS/edit-chas-resource/' . $verified->id) }}"><i
                                            class="dw dw-edit2"></i> Edit</a>



                                    <button type="submit" class="dropdown-item"
                                        wire:click = "deleteChasCreatedResource({{ $verified->id }})"
                                        onclick="confirm(`Are you sure you want to delete this {{ $verified->resource_name }} asset  from the list ? `) || event.stopImmediatePropagation()"><i
                                            class="dw dw-delete-3"></i>Delete</button>



                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
        <span>{{ $VerifiedApproval->links() }}</span>
    </div>

</div>
