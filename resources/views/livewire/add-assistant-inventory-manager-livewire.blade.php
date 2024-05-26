<div>
    <div class="card-box mb-30 p-3">
        <h2 class="h4 pd-20 text-gray-600"><i class="fas fa-user-plus px-1"></i> Create assistant inventory manager.</h2>

        @if (session()->has('addAnAssistant'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong><i class="fas fa-check px-1"></i>{{ session('addAnAssistant') }}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session()->has('message'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong><i class="fas fa-check px-1"></i>{{ session('message') }}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        <form wire:submit.prevent = "importAssistantInventoryManagers">

            <div class="form-group display:block">
                <label for="">Upload the csv file</label>
                <input type="file" wire:model = "assistantInventoryManager">

                @error('assistantInventoryManager')
                    <small class="font-weight-bold text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" wire:loading.attr="disabled"
                class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 mb-5 cursor-pointer">
                <i class="bi bi-upload font-weight-bold p-1"></i>
                Import assistants csv file
            </button>

        </form>

        <form wire:submit.prevent = "addAssistantInventoryManager">

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

            {{-- <div class="mt-3">
                <label for="confirm_password" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Confirm
                    password
                </label>
                <input type="password" wire:model= "password_confirmation"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'
                    placeholder="Confirm password">
                @error('password_confirmation')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div> --}}

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
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:ibg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4">
                    <i class="fas fa-plus px-1"></i>
                    add assistant
                </button>
            </div>
        </form>
    </div>



    <div class="card-box mb-30 p-3">
        <h2 class="h4 pd-20"><i class="fas fa-users px-1"></i> View created assistants</h2>
        <img src="{{ asset('vendors/images/udom.png') }}" class="float-end  udom-logo" alt="" srcset=""
            style="float-end">
    </div>

    <div class="card-box mb-30 p-3">

        @if (session()->has('deleteAssistant'))
        <div role="alert" class="alert alert-success alert-dismissible fade show">
            <strong>{{ session('deleteAssistant') }}</strong>
            <button class="btn btn-close"></button>
        </div>
        @endif



        <button type="submit" wire:click = "exportAssistantInventoryManagers"
            class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4 float-end">
            <i class="bi bi-download font-weight-bold p-1"></i>
            Export assistants csv
        </button>

        <div class="header-search mb-5">
            <form class="d-flex">
                <div class="form-group mb-0">

                    <input type="search" class="form-control search-input" placeholder="Search Here..."
                        wire:model.live = 'assistantSearch' />

                </div>
            </form>
        </div>

            <table class="data-table table nowrap">
                <thead>
                    <tr>
                        <th class="table-plus datatable-nosort font-weight-bold">Username</th>
                        <th class="table-plus datatable-nosort font-weight-bold">Email</th>
                        <th class="font-weight-bold"><i class="bi bi-telephone p-2"></i>Phone number</th>
                        <th class="datatable-nosort font-weight-bold">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($Assistants as $assistant)
                        <tr>

                            <td>
                                <h5 class="font-16">{{ $assistant->username }}</h5>

                            </td>


                            <td>
                                <h5 class="font-16">{{ $assistant->email }}</h5>

                            </td>

                            <td style="text-decoration:normal">
                                @foreach ($assistant->phone as $PhoneNumber)
                                    <br>
                                    {{ $PhoneNumber->phone_number }}
                                @endforeach

                            </td>

                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                        href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                        <button type="submit" class="dropdown-item"
                                            onclick="confirm(`Are you sure you want to delete  {{ $assistant->email }}   assistant inventory manager ? `) || event.stopImmediatePropagation()"wire:click="deleteAssistant({{ $assistant->id }})"><i
                                                class="dw dw-delete-3"></i>Delete</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>


            </table>
            <span>{{ $Assistants->links() }}</span>

    </div>

</div>
