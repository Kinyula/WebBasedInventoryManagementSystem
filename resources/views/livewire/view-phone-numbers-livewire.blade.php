<div>

    <div class="card-box mb-30 p-3">
        <h2 class="h5 pd-20">View phone numbers</h2>
        <img src="{{ asset('vendors/images/udom.png') }}" class="float-end  udom-logo" alt="" srcset="">
    </div>

    <div class="card-box mb-30 p-3">

        @if (session()->has('deletePhoneNumber'))
            <div role="alert" class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('deletePhoneNumber') }}</strong>
                <button class="btn btn-close"></button>
            </div>
        @endif

        <table class="data-table table nowrap">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort font-weight-bold">Email</th>
                    <th class="font-weight-bold">Phone number</th>
                    <th class="datatable-nosort font-weight-bold">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($PhoneNumbers as $number)
                    <tr>

                        <td>
                            <h5 class="font-16">{{ $number->user->email }}</h5>

                        </td>

                        <td style="text-decoration:normal"><i class="bi bi-telephone p-2"></i>
                            {{ $number->phone_number }}</td>

                        <td>
                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                    href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <a class="dropdown-item" href="#"><i class="dw dw-eye"></i>
                                        View</a>
                                    <a class="dropdown-item"
                                        href="{{ asset('feruzi-shaving-machines/edit-admin-phone-number/' . $number->id) }}"><i
                                            class="dw dw-edit2"></i> Edit</a>

                                    <button type="submit" class="dropdown-item"
                                        onclick="confirm(`Are you sure you want to delete this {{ $number->user->email }} 's  phone number ? `) || event.stopImmediatePropagation()"wire:click="deletePhoneNumber({{ $number->id }})"><i
                                            class="dw dw-delete-3"></i>Delete</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
</div>
