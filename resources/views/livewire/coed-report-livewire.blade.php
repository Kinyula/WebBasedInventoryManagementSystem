<div>
    <div class="card-box mb-30 p-3">
        <h2 class="h4 pd-20 text-gray-600"><i class="bi bi-plus"></i> Compose {{ auth()->user()->college_name }} report
        </h2>
        <img src="{{ asset('vendors/images/udom.png') }}" class="float-end  udom-logo" alt="" srcset=""
            style="float-end">
    </div>

    <div class="card-box mb-30 p-3">

        @if (session()->has('addResources'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('addResources') }}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session()->has('errorMessage'))
            <div role="alert" class="alert alert-danger alert-dismissible fade show">
                <strong>{{ session('errorMessage') }}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form wire:submit.prevent = "addCoedReport">
            <h2 class="h4 pd-20 text-gray-600">Report form
            </h2>
            <div class="mt-3">
                <label for="resource_name" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Resource
                    name</label>
                <select type="select" wire:model= "resource_name"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                    <option value="">-- Select resource --</option>
                    @foreach ($coedResources as $resource)
                        <option value="{{ $resource->id }}">ID : {{ $resource->id }}--Resource name : {{ $resource->resource_name }}</option>
                    @endforeach
                </select>
                @error('resource_name')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-4">
                <label for="resource_image" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Resource
                    image
                </label>
                <input type="file" wire:model= "resource_image"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                @error('resource_image')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-4">
                <label for="description" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Resource
                    description</label>
                <textarea type="text" wire:model= "description"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                    placeholder="Enter the description of the incident caused for an asset status to be updated eg. by writting the cause of a resource to be non functional as the updated status."></textarea>
                @error('description')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div>
                <br>
                <button type="submit" wire:loading.attr = "disabled"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4">
                    <i class="fa-solid fa-paper-plane me-2"></i>
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>
