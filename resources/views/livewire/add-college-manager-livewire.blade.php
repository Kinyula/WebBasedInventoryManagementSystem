<div>
    <div class="card-box mb-30 p-3">

        <h2 class="h4 pd-20 text-gray-600">Add college inventory manager.</h2>
        @if (session()->has('addCollegeManager'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('addCollegeManager') }}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form wire:submit.prevent = "importCollegeInventoryManagers">

            <div class="form-group display:block">
                <label for="">Upload the csv file</label>
                <input type="file" wire:model = "collegeInventoryManager">

                @error('collegeInventoryManager')
                    <small class="font-weight-bold text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" wire:loading.attr = "disabled"
                class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 cursor-pointer">
                <i class="bi bi-upload font-weight-bold p-1"></i>
                Import college invetory manager csv file
            </button>

        </form>

        <form wire:submit.prevent = "addCollegeInventoryManager">

            <div class=" mt-3 input-hidden">
                <input type="hidden" wire:model = 'role_id'>
            </div>

            <div class="mt-3">
                <label for="username" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Username
                </label>
                <input type="text" wire:model= "username"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                    placeholder="Username">
                @error('username')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-3">
                <label for="email" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Email
                </label>
                <input type="text" wire:model= "email"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                    placeholder="Email">
                @error('email')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-3">
                <label for="password" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Password
                </label>
                <input type="text" wire:model= "password" value="{{ $password }}"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                    placeholder="Password">
                @error('password')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>


            <div class="mt-3">
                <label for="college" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>
                    College</label>
                <select type="select" wire:model= "college"

                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                    <option value="">-- Select college --</option>

                        <option value="College of Informatics and Virtual Education ( CIVE )">"College of Informatics and Virtual Education ( CIVE )</option>
                        <option value="College of Natural Mathematical Science ( CNMS ) ">College of Natural Mathematical Science ( CNMS )</option>
                        <option value="College of Health and Allied Science ( CHAS )">College of Health and Allied Science ( CHAS )</option>
                        <option value="College of Education ( CoED )">College of Education ( CoED )</option>
                        <option value="College of Humanities and Social Science ( CHSS )">College of Humanities and Social Science ( CHSS )</option>
                        <option value="College of Business and Economics ( CoBE )">College of Business and Economics ( CoBE )</option>
                        <option value="College of Earth Sciences and Engineering ( CoESE )">College of Earth Sciences and Engineering ( CoESE )</option>

                </select>
                @error('college')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            {{-- Profile picture --}}
            <div class="mt-4">
                <label for="profile_image" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Profile
                    image/Optional
                </label>
                <input type="file" wire:model= "profile_image"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                @error('profile_image')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div>
                <br>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4">
                    add college manager
                </button>
            </div>
        </form>
    </div>
</div>
