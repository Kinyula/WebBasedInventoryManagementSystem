<div>
    <div class="card-box mb-30 p-3">
        <h2 class="h5 pd-20">Welcome again : <span class="text-danger">{{ auth()->user()->username }}</span></h2>
        <img src="{{ asset('vendors/images/udom.png') }}" class="float-end  udom-logo" alt="" srcset=""
            style="float:inline-end">
        <div class="role relative left-5">
            <span class="font-weight-bold">Role : </span>
            <span class="font-weight-bold text-danger uppercase">{{ auth()->user()->post }}</span>
<br>
            <span class="font-weight-bold">College name : </span>
            <span class="font-weight-bold text-danger uppercase">{{ auth()->user()->college_name }}</span>
        </div>
    </div>



    <div class="grid grid-cols-4">
        <div class="card-box mb-30 p-3 w-50">
            <span>Category</span>
            <h4 class="font-weight-bold uppercase">Office Equipment <br></h4>
            <span class="font-weight-bold text-danger">Total : </span>
            <span
                class="font-weight-bold text-success">{{ Illuminate\Support\Number::abbreviate($office_equipment ?? 0, precision: 2) }}</span>
        </div>

        <div class="card-box mb-30 p-3 w-50">
            <span>Category</span>
            <h4 class="font-weight-bold uppercase">Laboratory <br></h4>
            <span class="font-weight-bold text-danger">Total : </span>
            <span
                class="font-weight-bold text-success">{{ Illuminate\Support\Number::abbreviate($laboratory ?? 0, precision: 2) }}</span>
        </div>

        <div class="card-box mb-30 p-3 w-50">
            <span>Category</span>
            <h4 class="font-weight-bold uppercase">Camera & Studio</h4>
            <span class="font-weight-bold text-danger">Total : </span>
            <span
                class="font-weight-bold text-success">{{ Illuminate\Support\Number::abbreviate($camera_studio ?? 0, precision: 2) }}</span>
        </div>

        <div class="card-box mb-30 p-3 w-50">
            <span>Category</span>
            <h4 class="font-weight-bold uppercase">Motor vehicle</h4>
            <span class="font-weight-bold text-danger">Total : </span>
            <span
                class="font-weight-bold text-success">{{ Illuminate\Support\Number::abbreviate($motor_vehicle ?? 0, precision: 2) }}</span>
        </div>
        <div class="card-box mb-30 p-3 w-50">
            <span>Category</span>
            <h4 class="font-weight-bold uppercase">Land & Buildings</h4>
            <span class="font-weight-bold text-danger">Total : </span>
            <span
                class="font-weight-bold text-success">{{ Illuminate\Support\Number::abbreviate($land_buildings, precision: 2) ?? 0 }}</span>
        </div>

        <div class="card-box mb-30 p-3 w-50">
            <span>Category</span>
            <h4 class="font-weight-bold uppercase">Consumable items</h4>
            <span class="font-weight-bold text-danger">Total : </span>
            <span
                class="font-weight-bold text-success">{{ Illuminate\Support\Number::abbreviate($consumable_items ?? 0, precision: 2) }}</span>
        </div>

        <div class="card-box mb-30 p-3 w-50">

            <span>Category</span>
            <h4 class="font-weight-bold uppercase">Furniture</h4>


            <span class="font-weight-bold text-danger">Total : </span>
            <span
                class="font-weight-bold text-success">{{ Illuminate\Support\Number::abbreviate($furniture ?? 0, precision: 2) }}</span>
        </div>

        <div class="card-box mb-30 p-3 w-50">
            <span>Category</span>
            <h4 class="font-weight-bold uppercase">Computer & Laptops</h4>
            <span class="font-weight-bold text-danger">Total : </span>
            <span
                class="font-weight-bold text-success">{{ Illuminate\Support\Number::abbreviate($computer_laptops ?? 0, precision: 2) }}</span>
        </div>

        <div class="card-box mb-30 p-3 w-50">
            <span>Category</span>
            <h4 class="font-weight-bold uppercase">Computer & Laptops</h4>
            <span class="font-weight-bold text-danger">Total : </span>
            <span
                class="font-weight-bold text-success">{{ Illuminate\Support\Number::abbreviate($computer_laptops ?? 0, precision: 2) }}</span>
        </div>

        <div class="card-box mb-30 p-3 w-50">
            <span>Resource status</span>
            <h4 class="font-weight-bold uppercase">Need of maintainance resources</h4>
            <span class="font-weight-bold text-danger">Total : </span>
            <span
                class="font-weight-bold text-success">{{ Illuminate\Support\Number::abbreviate($maintanance ?? 0, precision: 2) }}</span>
        </div>

        <div class="card-box mb-30 p-3 w-50">
            <span>Allocation status <small class="text-danger font-weight-bold">( Not Allocated )</small></span>
            <h4 class="font-weight-bold uppercase">Upcoming allocations</h4>
            <span class="font-weight-bold text-danger">Total : </span>
            <span
                class="font-weight-bold text-success">{{ Illuminate\Support\Number::abbreviate($unallocated ?? 0, precision: 2) }}</span>
        </div>
    </div>


    <div class="card-box mb-30 p-3">
        <div class="defective-information text-center">
            <i class="fas fa-eye text-xl"></i>
            <span class="font-weight-bold text-2xl">View resources needed to be maintained</span>
        </div>
        <div class="header-search">
            <form class="d-flex">
                <div class="form-group mb-0">

                    <input type="search" class="form-control search-input" placeholder="Search Here"
                        wire:model.live = 'resourceSearch' />

                </div>
            </form>
        </div>

        <table class="data-table table nowrap ">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort font-weight-bold">Store manager</th>
                    <th class="font-weight-bold">Category</th>
                    <th class="font-weight-bold">Resource name</th>
                    <th class="font-weight-bold">Resource status</th>
                    <th class="font-weight-bold">Repair status</th>
                    <th class="font-weight-bold">College name</th>
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
                            {{ $resource->category->category_type }}
                        </td>

                        <td style="text-decoration:normal"><i class="bi bi-pencil p-2"></i>
                            {{ $resource->resource_name }}
                        </td>

                        <td style="text-decoration:normal">

                            @if ($resource->asset_status == 'Very good')
                                <button type="button"
                                    onclick="confirm(`Ooops!! this action can't be done here `) || event.stopImmediatePropagation()"
                                    class="bg-green-600 text-white font-bold p-2 rounded">{{ $resource->asset_status }}</button>
                            @elseif ($resource->asset_status == 'Good')
                                <button type="button"
                                    onclick="confirm(`Ooops!! this action can't be done here `) || event.stopImmediatePropagation()"
                                    class="bg-green-800 hover:bg-yellow-800 text-white font-bold p-2 rounded">{{ $resource->asset_status }}</button>
                            @elseif ($resource->asset_status == 'Fair')
                                <button type="button"
                                    onclick="confirm(`Ooops!! this action can't be done here `) || event.stopImmediatePropagation()"
                                    class="bg-yellow-600 text-white font-bold p-2 rounded">{{ $resource->asset_status }}</button>
                            @elseif ($resource->asset_status == 'New')
                                <button type="button"
                                    onclick="confirm(`Ooops!! this action can't be done here `) || event.stopImmediatePropagation()"
                                    class="bg-blue-600 text-white font-bold p-2 rounded">{{ $resource->asset_status }}</button>
                            @elseif($resource->asset_status == 'Poor')
                                <button type="button"
                                    onclick="confirm(`Ooops!! this action can't be done here `) || event.stopImmediatePropagation()"
                                    class="bg-red-600 text-white font-bold p-2 rounded">{{ $resource->asset_status }}</button>
                            @endif
                        </td>

                        {{-- <td style="text-decoration:normal">
                            {{ QrCode::size('30')->generate($resource->id) }}
                        </td> --}}

                        <td style="text-decoration:normal">
                            <button type="button"
                            onclick="confirm(`Ooops!! this action can't be done here `) || event.stopImmediatePropagation()"
                            class="bg-red-800 text-white font-bold p-2 rounded">{{ $resource->repair_status }}</button>
                        </td>
                        <td style="text-decoration:normal">
                            {{ $resource->college_name }}
                        </td>

                        {{--
                        <td style="text-decoration:normal">
                            @if (auth()->user()->post === 'store')
                                @if ($resource->status == 'Approved')
                                    <button type="button"
                                        onclick="confirm(`Ooops!! this action can't be done here `) || event.stopImmediatePropagation()"
                                        class="bg-green-600 text-white font-bold p-2 rounded">{{ $resource->status }}</button>
                                @else
                                    <button type="button"
                                        onclick="confirm(`Ooops!! this action can't be done here `) || event.stopImmediatePropagation()"
                                        class="bg-red-600 text-white font-bold p-2 rounded">{{ $resource->status }}</button>
                                @endif
                            @else
                                @if ($resource->status == 'Approved')
                                    <button type="button"
                                        onclick="confirm(`Ooops!! this action can't be done here `) || event.stopImmediatePropagation()"
                                        class="bg-green-600 text-white font-bold p-2 rounded">{{ $resource->status }}</button>
                                @else
                                    <button type="button"
                                        onclick="confirm(`Ooops!! this action can't be done here `) || event.stopImmediatePropagation()"
                                        class="bg-red-600 text-white font-bold p-2 rounded">{{ $resource->status }}</button>
                                @endif
                            @endif

                        </td> --}}



                        {{-- <td style="text-decoration:normal">

                            @if ($resource->allocation_status == 'Not Allocated')
                                <button type="button"
                                    onclick="confirm(`Ooops!! this action can't be done here `) || event.stopImmediatePropagation()"
                                    class="bg-green-600 hover:bg-green-800 text-white font-bold p-2 rounded">{{ $resource->allocation_status }}</button>
                            @else
                                <button type="button"
                                    onclick="confirm(`Ooops!! this action can't be done here `) || event.stopImmediatePropagation()"
                                    class="bg-red-600 hover:bg-red-800 text-white font-bold p-2 rounded">{{ $resource->allocation_status }}</button>
                            @endif


                        </td> --}}

                        {{-- <td style="text-decoration: normal">

                            <input type="checkbox" wire:model = "resourceId" value="{{ $resource->id }}"
                                class="checked" onclick="checkAll()">

                        </td> --}}

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
                                    @if (auth()->user()->post === 'accountant')
                                        <a class="dropdown-item"
                                            href="{{ asset('UIMS/edit-chas-resource/' . $resource->id) }}"><i
                                                class="dw dw-edit2"></i> Edit</a>
                                    @else
                                    @endif

                                    @if (auth()->user()->post === 'store')
                                        <button type="submit" class="dropdown-item"
                                            wire:click = "deleteChasCreatedResource({{ $resource->id }})"
                                            onclick="confirm(`Are you sure you want to delete this {{ $resource->resource_name }} asset  from the list ? `) || event.stopImmediatePropagation()"><i
                                                class="dw dw-delete-3"></i>Delete</button>
                                    @else
                                    @endif


                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
        <span>{{ $Resources->links() }}</span>
    </div>
</div>
