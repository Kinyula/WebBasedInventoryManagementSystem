<div>

    <div class="card-box mb-30 p-3">
        <h2 class="h5 pd-20">Welcome again : <span class="text-danger">{{ auth()->user()->username }}</span></h2>
        <img src="{{ asset('vendors/images/udom.png') }}" class="float-end  udom-logo" alt="" srcset=""
            style="float:inline-end">
        <div class="role relative left-5">

            @if (!auth()->user()->post === 'Head of department ( HOD )')
            <span class="font-weight-bold">Position : </span>
            <span class="font-weight-bold text-danger uppercase">{{ auth()->user()->post }}</span>
            @else

            <span class="font-weight-bold">Position : </span>
            <span class="font-weight-bold text-danger uppercase">{{ auth()->user()->post }}</span>
            <br>
            @if (auth()->user()->college_name == 'Not set')
            <span class="font-weight-bold">Role: </span>
            <span class="font-weight-bold text-danger uppercase">Higher member of staff</span>
            @else
            <span class="font-weight-bold">College name : </span>
            <span class="font-weight-bold text-danger uppercase">{{ auth()->user()->college_name }}</span>
            <br>

            <span class="font-weight-bold">Department : </span>
            <span class="font-weight-bold text-danger uppercase">{{ auth()->user()->department }}</span>
            @endif



            @endif
        </div>
    </div>

    @if (!auth()->user()->post === 'Head of department ( HOD )')
    <div class="grid grid-cols-4">
        <div class="card-box mb-30 p-3 w-50">
            <span>Assets</span>
            <h4 class="font-weight-bold uppercase">College of Informatics and Virtual Education ( CIVE ) <br></h4>
            <span class="font-weight-bold text-danger">Total : </span>
            <span
                class="font-weight-bold text-success">{{ Illuminate\Support\Number::abbreviate($cive ?? 0, precision: 2) }}</span>
        </div>

        <div class="card-box mb-30 p-3 w-50">
            <span>Assets</span>
            <h4 class="font-weight-bold uppercase">College of Health and Allied Science ( CHAS ) <br></h4>
            <span class="font-weight-bold text-danger">Total : </span>
            <span
                class="font-weight-bold text-success">{{ Illuminate\Support\Number::abbreviate($chas ?? 0, precision: 2) }}</span>
        </div>

        <div class="card-box mb-30 p-3 w-50">
            <span>Assets</span>
            <h4 class="font-weight-bold uppercase">College of Humanities and Social Sciences ( CHSS )</h4>
            <span class="font-weight-bold text-danger">Total : </span>
            <span
                class="font-weight-bold text-success">{{ Illuminate\Support\Number::abbreviate($chss ?? 0, precision: 2) }}</span>
        </div>

        <div class="card-box mb-30 p-3 w-50">
            <span>Assets</span>
            <h4 class="font-weight-bold uppercase">College of Education ( CoEd)</h4>
            <span class="font-weight-bold text-danger">Total : </span>
            <span
                class="font-weight-bold text-success">{{ Illuminate\Support\Number::abbreviate($coed ?? 0, precision: 2) }}</span>
        </div>
        <div class="card-box mb-30 p-3 w-50">
            <span>Assets</span>
            <h4 class="font-weight-bold uppercase">College of Natural and Mathematical Science ( CNMS )</h4>
            <span class="font-weight-bold text-danger">Total : </span>
            <span
                class="font-weight-bold text-success">{{ Illuminate\Support\Number::abbreviate($cnms, precision: 2) ?? 0 }}</span>
        </div>

        <div class="card-box mb-30 p-3 w-50">
            <span>Assets</span>
            <h4 class="font-weight-bold uppercase">College of Business Education ( CoBE )</h4>
            <span class="font-weight-bold text-danger">Total : </span>
            <span
                class="font-weight-bold text-success">{{ Illuminate\Support\Number::abbreviate($cobe ?? 0, precision: 2) }}</span>
        </div>

        <div class="card-box mb-30 p-3 w-50">

            <span>Assets</span>
            <h4 class="font-weight-bold uppercase">College of Earth Science and Engineering ( CoESE )</h4>


            <span class="font-weight-bold text-danger">Total : </span>
            <span
                class="font-weight-bold text-success">{{ Illuminate\Support\Number::abbreviate($coese ?? 0, precision: 2) }}</span>
        </div>


    </div>

<div class="card-box p-3 mb-30">
    <span class=" font-weight-bold">Summary of total pending maintanance from the </span>
    <span class="text-danger font-weight-bold  uppercase">university of dodoma</span>
</div>

<div class="grid grid-cols-4">
    <div class="card-box mb-30 p-3 w-50">
        <span>Assets</span>
        <h4 class="font-weight-bold uppercase">College of Informatics and Virtual Education <br> ( CIVE ) <br></h4>
        <span class="font-weight-bold text-danger">Total : </span>
        <span
            class="font-weight-bold text-success">{{ Illuminate\Support\Number::abbreviate($civedefective ?? 0, precision: 2) }}</span>
    </div>

    <div class="card-box mb-30 p-3 w-50">
        <span>Assets</span>
        <h4 class="font-weight-bold uppercase">College of Health and Allied Science <br> ( CHAS ) <br></h4>
        <span class="font-weight-bold text-danger">Total : </span>
        <span
            class="font-weight-bold text-success">{{ Illuminate\Support\Number::abbreviate($chasdefective ?? 0, precision: 2) }}</span>
    </div>

    <div class="card-box mb-30 p-3 w-50">
        <span>Assets</span>
        <h4 class="font-weight-bold uppercase">College of Humanities and Social Sciences <br> ( CHSS )</h4>
        <span class="font-weight-bold text-danger">Total : </span>
        <span
            class="font-weight-bold text-success">{{ Illuminate\Support\Number::abbreviate($chssdefective ?? 0, precision: 2) }}</span>
    </div>

    <div class="card-box mb-30 p-3 w-50">
        <span>Assets</span>
        <h4 class="font-weight-bold uppercase">College of Education <br> ( CoEd )</h4>
        <span class="font-weight-bold text-danger">Total : </span>
        <span
            class="font-weight-bold text-success">{{ Illuminate\Support\Number::abbreviate($coeddefective ?? 0, precision: 2) }}</span>
    </div>
    <div class="card-box mb-30 p-3 w-50">
        <span>Assets</span>
        <h4 class="font-weight-bold uppercase">College of Natural and Mathematical Science <br> ( CNMS )</h4>
        <span class="font-weight-bold text-danger">Total : </span>
        <span
            class="font-weight-bold text-success">{{ Illuminate\Support\Number::abbreviate($cnmsdefective, precision: 2) ?? 0 }}</span>
    </div>

    <div class="card-box mb-30 p-3 w-50">
        <span>Assets</span>
        <h4 class="font-weight-bold uppercase">College of Business Education <br> ( CoBE )</h4>
        <span class="font-weight-bold text-danger">Total : </span>
        <span
            class="font-weight-bold text-success">{{ Illuminate\Support\Number::abbreviate($cobedefective ?? 0, precision: 2) }}</span>
    </div>

    <div class="card-box mb-30 p-3 w-50">

        <span>Assets</span>
        <h4 class="font-weight-bold uppercase">College of Earth Science and Engineering <br> ( CoESE )</h4>


        <span class="font-weight-bold text-danger">Total : </span>
        <span
            class="font-weight-bold text-success">{{ Illuminate\Support\Number::abbreviate($coesedefective ?? 0, precision: 2) }}</span>
    </div>


</div>
    @else


    <div class="grid grid-cols-4">


        <div class="card-box mb-30 p-3 w-50">
            <span>Assets</span>
            <h4 class="font-weight-bold uppercase">College of Health and Allied Science ( CHAS ) <br></h4>
            <span class="font-weight-bold text-danger">Total : </span>
            <span
                class="font-weight-bold text-success">{{ Illuminate\Support\Number::abbreviate($chas ?? 0, precision: 2) }}</span>
        </div>

    </div>

<div class="card-box p-3 mb-30">
    <span class=" font-weight-bold">Summary of total pending maintanance from the </span>
    <span class="text-danger font-weight-bold  uppercase">{{ auth()->user()->college_name }}</span>
</div>

<div class="grid grid-cols-4">


    <div class="card-box mb-30 p-3 w-50">
        <span>Assets</span>
        <h4 class="font-weight-bold uppercase">College of Health and Allied Science <br> ( CHAS ) <br></h4>
        <span class="font-weight-bold text-danger">Total : </span>
        <span
            class="font-weight-bold text-success">{{ Illuminate\Support\Number::abbreviate($chasdefective ?? 0, precision: 2) }}</span>
    </div>





</div>
    @endif


    {{-- <div class="card-box mb-30 p-3">
        <h2 class="h5 pd-20"><i class="bi bi-eye px-1"></i> View all reports across all colleges</h2>
        <img src="{{ asset('vendors/images/udom.png') }}" class="float-end  udom-logo" alt="" srcset=""
            style="float:inline-end">
    </div>


    <div class="card-box mb-30 p-3">

        @if (session()->has('deleteAsset'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('deleteAsset') }}</strong>
                <button class="btn btn-close"></button>
            </div>
        @endif

            <button type="submit" wire:click = "exportAssetsPdf"
                class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 float-end">
                <i class="bi bi-download font-weight-bold p-1"></i>
                Export assets PDF
            </button>


        <div class="header-search ">
            <form class="d-flex">
                <div class="form-group mb-0">

                    <input type="search" class="form-control search-input" placeholder="Search Here..."
                        wire:model.live = 'assetSearch' style="position: relative;bottom:20%" />

                </div>
            </form>
        </div>

        <table class="data-table table nowrap">
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
                            <h5 class="font-16">{{ $asset->category->category_type??NULL }}</h5>

                        </td>
                        <td style="text-decoration:normal"><i class="bi bi-pencil p-2"></i>
                            {{ $asset->asset_type }}</td>


                        <td style="text-decoration:normal">
                            {{ QrCode::size('30')->generate($asset->id) }}
                        </td>

                        <td style="text-decoration:normal">

                            <a href="{{ asset('UIMS/update-asset-status/' . $asset->assetStatus?->id) }}">
                                <button type="button"
                                    class="bg-gray-500 hover:bg-gray-400 text-white font-bold p-2 rounded">{{ $asset->asset_status }}</button>
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
    </div> --}}
@if (auth()->user()->post === 'Chief Supplier Officer ( CSO )')

@livewire('report-informations-livewire')

@else

@endif

</div>
