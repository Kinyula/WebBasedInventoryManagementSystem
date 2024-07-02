<div>

    <div class="card-box mb-3 p-3">
        <h2 class="h5 pd-20">Update user's credentials</h2>
        <img src="{{ asset('vendors/images/udom.png') }}" class="float-end  udom-logo" alt="" srcset=""
            style="float:inline-end">
    </div>


    <div class="card-box mb-30 p-3">



        <div class="previous-information">
            <span class="font-weight-bold py-5">Previous information</span>
            <div class="previous-allocation-status">
                <span class="font-weight-bold">Username : </span>
                <span class="font-weight-bold text-danger">{{ $Staff->username }}</span>
            </div>

            <div class="previous-status">
                <span class="font-weight-bold">Email : </span>
                <span class="font-weight-bold text-danger">{{ $Staff->email }}</span>
            </div>

        </div>

        <br>
        @if (session()->has('userMessage'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('userMessage') }}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form wire:submit.prevent = "editUserCredentials({{ $id }})">


            <div class="mt-3">
                <label for="password" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>
                    New password</label>
                <input type="text" wire:model= "password" value="{{ $password }}"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                @error('password')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror

            </div>




            <div>
                <br>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4"
                    onclick="confirm(`Are you sure you want to update this user's info ?`) || event.StopImmediatePropagation()">
                    <i class="bi bi-check"></i> Update
                </button>

                <a href="{{ asset('UIMS/dashboard') }}" wire:loading.attr = 'disabled'
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-400 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 float-end">
                    <i class="bi bi-arrow-left px-1"></i> Back
                </a>
            </div>
        </form>
    </div>
</div>
