<div>
    <div class="card-box mb-30 p-3">
        <h2 class="h4 pd-20 text-gray-600"><i class="bi bi-plus"></i> Update college name</h2>

        @if (session()->has('addCollegeNameStatuses'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('addCollegeNameStatuses') }}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form wire:submit.prevent = "editCollegeName({{$id}})">


            <div class="mt-3">
                <label for="collegeName" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>
                    College name</label>
                <select type="select" wire:model= "collegeName"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                    <option value="">-- Select college --</option>

                    <option value="College of Informatics and Virtual Education ( CIVE )">"College of Informatics and
                        Virtual Education ( CIVE )</option>
                    <option value="College of Natural Mathematical Science ( CNMS ) ">College of Natural Mathematical
                        Science ( CNMS )</option>
                    <option value="College of Health and Allied Science ( CHAS )">College of Health and Allied Science (
                        CHAS )</option>
                    <option value="College of Education ( CoED )">College of Education ( CoED )</option>
                    <option value="College of Humanities and Social Science ( CHSS )">College of Humanities and Social
                        Science ( CHSS )</option>
                    <option value="College of Business and Economics ( CoBE )">College of Business and Economics ( CoBE
                        )</option>
                    <option value="College of Earth Sciences and Engineering ( CoESE )">College of Earth Sciences and
                        Engineering ( CoESE )</option>

                </select>
                @error('collegeName')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            {{-- <div class="mt-3">
                <label for="collegeName" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>
                    Post</label>
                <select type="select" wire:model= "post"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                    <option value="">-- Select post --</option>

                    <option value="Store">Store
                        </option>



                </select>
                @error('collegeName')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div> --}}

            <div>
                <br>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4"
                    onclick="confirm(`Are you sure you want to update the college name of this college inventory manager  ?`) || event.StopImmediatePropagation()">
                    <i class="fas fa-plus px-1"></i>
                    Update the college name
                </button>

                <a href="{{ asset('UIMS/view-college-managers') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 float-end">
                <i class="fas fa-arrow-left px-1"></i>
                Back
            </a>
            </div>
        </form>
    </div>
</div>
