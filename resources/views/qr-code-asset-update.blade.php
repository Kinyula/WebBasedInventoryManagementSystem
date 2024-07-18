@extends('layouts.app')

@section('content')
<body>

    <div class="card-box mb-30 p-3">

        <h5 class="h5 pd-20">{{auth()->user()->college_name}}</h5>


        <img src="{{ asset('vendors/images/udom.png') }}" class="float-end   udom-logo" alt="" srcset="">
    </div>

    <div class="card-box p-3">
        @if (Session::has('message'))

        <div role="alert" class="alert alert-success alert-dismissible fade show">
            <strong>{{ Session::get('message') }}</strong>
            <button class="btn btn-close" data-bs-dismiss="alert"></button>
        </div>

        @else

        @endif
        <h2 class="h5 pd-20">Status update</h2>
        <form method="post" action="{{ route('resource-update', ['id' => $resource->id]) }}" class="mt-6 space-y-6">
            @csrf
            @method('patch')



            {{-- <div>
                <x-input-label for="category_type" :value="__('Category')" />
                <x-text-input id="category" name="category" type="text" class="mt-1 block w-full" :value="old('category', $resource->category->category_type)"
                    autofocus autocomplete="category" />
                <x-input-error class="mt-2" :messages="$errors->get('category')" />
            </div> --}}


            <div>
                <x-input-label for="resource_name" :value="__('Resource name')" />
                <x-text-input id="resource_name" name="resource_name" type="text" class="mt-1 block w-full"
                    :value="old('resource_name', $resource->resource_name)" autocomplete="resource_name" />
                <x-input-error class="mt-2" :messages="$errors->get('resource_name')" />


            </div>


            <div class="mt-3">

                <label for="college_name" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Status
                    update</label>
                <select type="select" name="resource_status"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                    <option value="">-- Select status --</option>

                    <option value="Repair">Repair</option>

                </select>

                @error('resource_status')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
                <a href="{{ asset('UIMS/dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 float-end"><i class="fas fa-arrow-left px-1"></i> Back</a>
                @if (session('status') === 'profile-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
    </div>


</body>
@endsection



</html>
