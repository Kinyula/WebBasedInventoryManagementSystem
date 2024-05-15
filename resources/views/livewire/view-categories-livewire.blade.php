<div>

    <div class="card-box mb-40 p-3">

        @if (session()->has('deleteMessage'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('deleteMessage') }}</strong>
                <button class="btn btn-close"></button>
            </div>
        @endif

        <h2 class="h5 pd-5">View categories </h2>
        <table class="data-table table nowrap ">

            <thead>
                <tr>
                    <th class="datatable-nosort font-weight-bold">#</th>
                    <th class="font-weight-bold">Categories</th>

                    <th class=" font-weight-bold">Action</th>

                </tr>
                
            </thead>
            <tbody>

                @php
                    $srNo = 1;
                @endphp

                @foreach ($Categories as $category)
                    <tr>

                        <td>
                            {{ $srNo++ }}
                        </td>


                        <td>
                            {{ $category->category_type }}
                        </td>


                        <td>

                            <div class="dropdown">

                                <button class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                    href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                            </button>

                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                    <button type="submit" class="dropdown-item"
                                        wire:click = "deleteCategory({{ $category->id }})"
                                        onclick="confirm(`Are you sure you want to delete this {{$category->asset_type}} category  from the list ? `) || event.stopImmediatePropagation()"><i
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
