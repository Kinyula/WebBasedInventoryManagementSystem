<div>
    <div class="card-box mb-30 p-3">


            <h2 class="h4 pd-20 text-gray-600"><i class="bi bi-plus"></i>
                Reply is sent here...
            </h2>


        <img src="{{ asset('vendors/images/udom.png') }}" class="float-end  udom-logo" alt="" srcset=""
            style="float-end">
    </div>

    <div class="card-box mb-30 p-3">
        <h2 class="h4 pd-20 text-gray-600">Send report.</h2>

        @if (session()->has('replyReportMessage'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('replyReportMessage') }}</strong>
                <button class="btn btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif


        <form wire:submit.prevent = "replyReports">

            {{-- Attach a Report file --}}

            <div class="mt-4">
                <label for="report_file" class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Attach a
                    report file
                </label>
                <input type="file" wire:model= "report_file"
                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full'>
                @error('report_file')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>


            <div class="mt-3">
                <label for="resource_allocated_college"
                    class='block font-medium text-sm text-gray-700 dark:text-gray-300'>Allocated
                    college</label>
                <select type="select" wire:model= "college_name"
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
                @error('college_name')
                    <strong class= 'text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>{{ $message }}</strong>
                @enderror
            </div>
            <div>
                <br>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4">
                    <i class="fa-solid fa-paper-plane p-1"></i>
                    Send
                </button>
            </div>
        </form>
    </div>
</div>
