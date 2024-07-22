<div>
    <div class="card-box mb-30 p-3">
        <h2 class="h4 pd-20 text-gray-600"><i class="fas fa-user-plus px-1"></i> Create staff.</h2>

        @if (session()->has('addStaff'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong><i class="fas fa-check px-1"></i>{{ session('addStaff') }}</strong>
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

            <button type="submit" wire:loading.attr="disabled" class="btn btn-primary">
                <i class="bi bi-upload font-weight-bold p-1"></i>
                Import staff csv file
            </button>
        </form>

        <form wire:submit.prevent="addStaffs">
            <div class="mt-3">
                <label for="username" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Username
                    <span class="text-danger text-xl">*</span>
                </label>
                <input type="text" wire:model="username" class="form-control" placeholder="Username">
                @error('username')
                    <strong class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2">{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-3">
                <label for="email" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Email
                    <span class="text-danger text-xl">*</span>
                </label>
                <input type="text" wire:model="email" class="form-control" placeholder="Email">
                @error('email')
                    <strong class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2">{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-3">
                <label for="password" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Password
                    <span class="text-danger text-xl">*</span>
                </label>
                <input type="text" wire:model="password" value="{{ $password }}" class="form-control" placeholder="Password" disabled>
                @error('password')
                    <strong class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2">{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-3">
                <label for="role_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Role
                    <span class="text-danger text-xl">*</span>
                </label>
                <select wire:model="role_id" class="form-control">
                    <option value="">-- Select role type --</option>
                    <option value="0">Vice Chancellor</option>
                    <option value="0">Director of Finance ( DoF )</option>
                    <option value="0">Chief Supplier Officer ( CSO )</option>
                    <option value="0">Estate</option>
                    <option value="1">Principal</option>
                    <option value="0">Head of department</option>
                    <option value="2">Store manager</option>
                    <option value="2">Accountant</option>
                </select>
                @error('role_id')
                    <strong class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2">{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-3">
                <label for="post" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Post
                    <span class="text-danger text-xl">*</span>
                </label>
                <select wire:model="post" class="form-control">
                    <option value="">-- Select post type --</option>
                    <option value="Vice Chancellor ( VC )">Vice Chancellor ( VC )</option>
                    <option value="Principal">Principal</option>
                    <option value="Head of department ( HOD )">Head of department ( HOD )</option>
                    <option value="Director of Finance ( DoF )">Director of Finance ( DoF )</option>
                    <option value="Store Manager">Store Manager</option>
                    <option value="Accountant">Accountant</option>
                    <option value="Chief Supplier Officer ( CSO )">Chief Supplier Officer ( CSO )</option>
                    <option value="Estate">Estate</option>
                </select>
                @error('post')
                    <strong class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2">{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-3">
                <label for="college" class="block font-medium text-sm text-gray-700 dark:text-gray-300">College</label>
                <select wire:model.change="college" class="form-control">
                    <option value="">-- Select college --</option>
                    <option value="College of Informatics and Virtual Education ( CIVE )">College of Informatics and Virtual Education ( CIVE )</option>
                    <option value="College of Natural Mathematical Science ( CNMS )">College of Natural Mathematical Science ( CNMS )</option>
                    <option value="College of Health and Allied Science ( CHAS )">College of Health and Allied Science ( CHAS )</option>
                    <option value="College of Education ( CoED )">College of Education ( CoED )</option>
                    <option value="College of Humanities and Social Science ( CHSS )">College of Humanities and Social Science ( CHSS )</option>
                    <option value="College of Business and Economics ( CoBE )">College of Business and Economics ( CoBE )</option>
                    <option value="College of Earth Sciences and Engineering ( CoESE )">College of Earth Sciences and Engineering ( CoESE )</option>
                </select>
            </div>

            <div class="mt-3">
                <label for="department" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Department</label>
                <select wire:model="department" class="form-control">
                    <option value="">-- Select department --</option>
                    @foreach($departments as $department)
                        <option value="{{ $department }}">{{ $department }}</option>
                    @endforeach
                </select>
                @error('department')
                    <strong class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2">{{ $message }}</strong>
                @enderror
            </div>

            <div class="mt-3">
                <label for="profile_image" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Profile image</label>
                <input type="file" wire:model="profile_image" class="form-control">
                @error('profile_image')
                    <strong class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2">{{ $message }}</strong>
                @enderror
            </div>

            <button type="submit" wire:loading.attr="disabled" class="btn btn-primary my-3">
                <i class="fas fa-user-plus p-1"></i>
                Create new staff
            </button>
        </form>
    </div>
</div>
