<div>
    <div class="card-box mb-30 p-3">
        <h2 class="h4 pd-20 text-gray-600"><i class="fas fa-user-plus px-1"></i> Create staff.</h2>

        @if (session()->has('addStaff'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong><i class="fas fa-check px-1"></i>{{ session('addStaff') }}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session()->has('message'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong><i class="fas fa-check px-1"></i>{{ session('message') }}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        <form wire:submit.prevent="importStaffs">

            <div class="form-group display:block">
                <label for="">Upload the csv file</label>
                <input type="file" wire:model="accountant">
                @error('accountant')
                    <small class="font-weight-bold text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" wire:loading.attr="disabled"
                class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 mb-5 cursor-pointer">
                <i class="bi bi-upload font-weight-bold p-1"></i>
                Import staff csv file
            </button>

        </form>

        <form wire:submit.prevent="addStaffs">

            <div class="mt-3">
                <label for="username" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Username
                    <span class="text-danger text-xl">*</span>
                </label>
                <input type="text" wire:model="username"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                    placeholder="Username">
                @error('username')
                    <strong class='text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-3">
                <label for="email" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Email
                    <span class="text-danger text-xl">*</span>
                </label>
                <input type="text" wire:model="email"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                    placeholder="Email">
                @error('email')
                    <strong class='text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-3">
                <label for="password" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Password
                    <span class="text-danger text-xl">*</span>
                </label>
                <input type="text" wire:model="password" value="{{ $password }}"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                    placeholder="Password" disabled>
                @error('password')
                    <strong class='text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-3">
                <label for="role_id" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Role
                    <span class="text-danger text-xl">*</span>
                </label>
                <select wire:model="role_id"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                    <option value="">-- Select role type --</option>
                    <option value="0">Vice Chansellor</option>
                    <option value="0">Director of Finance ( DoF )</option>
                    <option value="0">Chief Supplier Officer ( CSO )</option>
                    <option value="0">Estate</option>
                    <option value="1">Principal</option>
                    <option value="0">Head of department</option>
                    <option value="2">Store manager</option>
                    <option value="2">Accountant</option>
                </select>
                @error('role_id')
                    <strong class='text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-3">
                <label for="post" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Post
                    <span class="text-danger text-xl">*</span>
                </label>
                <select wire:model="post"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                    <option value="">-- Select post type --</option>
                    <option value="Vice Chansellor ( VC )">Vice Chansellor ( VC )</option>
                    <option value="Principal">Principal</option>
                    <option value="Head of department ( HOD )">Head of department ( HOD )</option>
                    <option value="Director of Finance ( DoF )">Director of Finance ( DoF )</option>
                    <option value="Chief Supplier Officer ( CSO )">Chief Supplier Officer ( CSO )</option>
                    <option value="Accountant">Accountant</option>
                    <option value="Store manager">Store manager</option>
                    <option value="Estate">Estate</option>
                </select>
                @error('post')
                    <strong class='text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-3">
                <label for="college" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>College
                    <span class="text-danger text-xl">*</span>
                </label>
                <select wire:model="college"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                    <option value="">-- Select college --</option>
                    @foreach(array_keys($colleges) as $college)
                        <option value="{{ $college }}">{{ $college }}</option>
                    @endforeach
                </select>
                @error('college')
                    <strong class='text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            @if(!empty($departments))
                <div class="mt-3">
                    <label for="department" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Department
                        <span class="text-danger text-xl">*</span>
                    </label>
                    <select wire:model="department"
                        class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                        <option value="">-- Select department --</option>
                        @foreach($departments as $department)
                            <option value="{{ $department }}">{{ $department }}</option>
                        @endforeach
                    </select>
                    @error('department')
                        <strong class='text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                    @enderror
                </div>
            @endif

            <div class="mt-3">
                <label for="profile_image" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Profile
                    Image</label>
                <input type="file" wire:model="profile_image"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                    placeholder="Profile Image">
                @error('profile_image')
                    <strong class='text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 mb-5 cursor-pointer">
                    <i class="fas fa-plus-circle p-1"></i>
                    Add new staff
                </button>
            </div>

        </form>
    </div>
</div>
