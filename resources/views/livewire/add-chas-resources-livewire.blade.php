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

    <div class="card-box mb-30 p-3">
        <h2 class="h4 pd-20 text-gray-600"><i class="bi bi-plus"></i> Add {{ auth()->user()->college_name }} resources
        </h2>

        @if (session()->has('addResources'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('addResources') }}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session()->has('message'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('message') }}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session()->has('error'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('error') }}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        <form wire:submit.prevent = "importChasResources">

            <div class="form-group display:block">
                <label for="">Upload the csv file</label>
                <input type="file" wire:model = "chasResourceImport">

                @error('chasResourceImport')
                    <small class="font-weight-bold text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" wire:loading.attr="disabled"
                class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 mb-5 cursor-pointer">
                <i class="bi bi-upload font-weight-bold p-1"></i>
                Import resources excel file
            </button>

        </form>

        <form wire:submit.prevent = "addChasResources">
            <div class="mt-3">
                <label for="category_type" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Category
                    name  <span class="text-danger text-xl">*</span></label>
                <select type="select" wire:model= "category_type"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                    <option value="">-- Choose the item category --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_type }}</option>
                    @endforeach
                </select>
                @error('category_type')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>



            <div class="mt-4">
                <label for="resource_name" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Resource
                    name  <span class="text-danger text-xl">*</span></label>
                <input type="text" wire:model= "resource_name"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                    placeholder="Enter the resource name eg. chair, Table, cupboard">
                @error('resource_name')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>



            <div class="mt-4">
                <label for="resource_cost" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Resource
                    cost  <span class="text-danger text-xl">*</span></label>
                <input type="number" wire:model= "resource_cost"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                    placeholder="Enter the resource cost">
                @error('resource_cost')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-3">
                <label for="region"
                    class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Region <span class="text-danger text-xl">*</span></label>
                <select type="select" wire:model= "region"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                    <option value="">-- Select region --</option>

                    <option value="DODOMA">DODOMA</option>
                    <option value="DAR ES SALAAM">DAR ES SALAAM</option>
                    <option value="TANGA">TANGA</option>
                    <option value="MWANZA">MWANZA</option>
                    <option value="TABORA">TABORA</option>

                    <option value="GEITA">GEITA</option>
                    <option value="LINDI">LINDI</option>
                    <option value="SONGEA">SONGEA</option>
                    <option value="PWANI">PWANI</option>
                    <option value="ARUSHA">ARUSHA</option>

                    <option value="MOSHI">MOSHI</option>
                    <option value="KILIMANJARO">KILIMANJARO</option>
                    <option value="KIGOMA">KIGOMA</option>
                    <option value="SHINYANGA">SHINYANGA</option>
                    <option value="NJOMBE">NJOMBE</option>
                    <option value="MBEYA">MBEYA</option>
                    <option value="BUKOBA">BUKOBA</option>
                    <option value="KAGERA">KAGERA</option>
                </select>
                @error('region')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-3">
                <label for="region"
                    class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Department/Optional</label>
                <select type="select" wire:model= "department"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                    <option value="">-- Select department --</option>

                    <option value="department 1">department 1</option>
                    <option value="department 2">department 2</option>
                    <option value="department 3">department 3</option>
                    <option value="department 4">department 4</option>
                    <option value="department 5">Hdepartment 5</option>

                </select>
                @error('department')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>
            <div>

                <div class="mt-3">
                    <label for="import_quantity"
                        class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Select
                        quantity to import  <span class="text-danger text-xl">*</span></label>
                    <input type="number" wire:model = "import_quantity">
                    <br>
                    @error('import_quantity')
                        <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                    @enderror
                </div>

                <br>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4">
                    <i class="me-2 fa-solid fa-plus"></i>
                    Create chas resource
                </button>
            </div>
        </form>
    </div>
    <span></span>
    {{-- <div class="card-box mb-30 p-3">

        <h2 class="h4 pd-20 text-gray-600"><i class="bi bi-plus"></i>
            View {{ auth()->user()->college_name }} more tasks here
        </h2>
        <div class="d-grid space-x-5">
            <a wire:navigate.hover href="{{ asset('UIMS/view-chas-created-resources') }}"><i
                    class="fas fa-eye px-1"></i>
                Created resources</a>
            <a wire:navigate href="{{ asset('UIMS/resource-allocation-to-areas') }}"><i class="fas fa-house px-1"></i>
                Resource allocation to areas</a>
        </div>

    </div> --}}
</div>
