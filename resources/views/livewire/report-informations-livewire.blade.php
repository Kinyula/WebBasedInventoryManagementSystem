<div>


    <div class="card-box mb-30 p-3">

        @if (auth()->user()->college_name == 'Not set')
            <h2 class="h5 pd-20">View resources from each college</h2>
            <img src="{{ asset('vendors/images/udom.png') }}" class="float-end  udom-logo" alt="" srcset=""
                style="float:inline-end">
        @else
        @endif

    </div>

    <div class="card-box mb-30 p-3 font-weight-bold grid grid-rows-3 grid-flow-col gap-4">

        <a wire:navigate href="{{ asset('UIMS/view-cive-created-resources') }}" class="hover:px-5 hover:transition ease-in-out duration-700 visited:text-gray-400"><i class="bi bi-eye px-1"></i> View CIVE resources</a>

        <a wire:navigate href="{{ asset('UIMS/view-chas-created-resources') }}" class="hover:px-5 hover:transition ease-in-out duration-700 visited:text-gray-400"><i class="bi bi-eye px-1"></i> View CHAS resources</a>

        <a wire:navigate href="{{ asset('UIMS/view-chss-created-resources') }}" class="hover:px-5 hover:transition ease-in-out duration-700 visited:text-gray-400"><i class="bi bi-eye px-1"></i> View CHSS resources</a>

        <a wire:navigate href="{{ asset('UIMS/view-cnms-created-resources') }}" class="hover:px-5 hover:transition ease-in-out duration-700 visited:text-gray-400"><i class="bi bi-eye px-1"></i> View CNMS resources</a>

        <a wire:navigate href="{{ asset('UIMS/view-coed-created-resources') }}" class="hover:px-5 hover:transition ease-in-out duration-700 visited:text-gray-400"><i class="bi bi-eye px-1"></i> View CoED resources</a>

        <a wire:navigate href="{{ asset('UIMS/view-cobe-created-resources') }}" class="hover:px-5 hover:transition ease-in-out duration-700 visited:text-gray-400"><i class="bi bi-eye px-1"></i> View CoBE resources</a>

        <a wire:navigate href="{{ asset('UIMS/view-coese-created-resources') }}" class="hover:px-5 hover:transition ease-in-out duration-700 visited:text-gray-400"><i class="bi bi-eye px-1"></i> View CoESE resources</a>
    </div>




</div>
