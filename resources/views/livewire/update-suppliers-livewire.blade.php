<div>
    <div class="card-box mb-30 p-3">
        <h2 class="h4 pd-20 text-gray-600">Supplier information is updated here.</h2>
        @if (session()->has('updateResource'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('updateResource') }}</strong>
                <button class="btn btn-close"></button>
            </div>
        @endif

        <h3 class="h4 pd-20 text-gray-600">Previous supplier information</h3>
        <div class="supplier-information">
            <div class="company-name">
                <span>Company name : </span>
                <span class="text-danger">{{ $supplier->company_name }}</span>
            </div>

            <div class="company-location">
                <span>Company location : </span>
                <span class="text-danger">{{ $supplier->company_location }}</span>
            </div>

            <div class="company-contact">
                <span>Company contacts  </span>
                @foreach ($supplier->phone as $number)
                <br>
                <span class="text-danger">{{ $number->phone_number }}</span>
                @endforeach

            </div>
        </div>
        <form wire:submit.prevent = "updateSupplier({{ $id }})">

            <div class="mt-4">
                <label for="company_name" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Company
                    name</label>
                <input type="text" wire:model = 'company_name'
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                    value="{{ $supplier->company_name }}">
                @error('company_name')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-4">
                <label for="company_location" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Company
                    location</label>
                <input type="text" wire:model = 'company_location'
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                    placeholder="Company's location">
                @error('company_location')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-4">
                <label for="contact" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Company's
                    contact</label>

                    <input type="text" wire:model = 'contact'
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                    placeholder="Enter contacts">


                @error('contact')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div class="flex items-center justify-end mt-4">


                <x-primary-button class="ms-4">
                    {{ __('Update') }}
                </x-primary-button>
            </div>
        </form>
    </div>

</div>


