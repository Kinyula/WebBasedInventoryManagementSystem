@if (auth()->user()->role_id === '0')

@livewire('layout-livewire')

@elseif (auth()->user()->role_id === '1')

@livewire('layout2-assistant-livewire')

@elseif(auth()->user()->role_id === '2' && auth()->user()->post === 'store')

@livewire('layout3-college-manager-livewire')

@elseif(auth()->user()->role_id === '2' && auth()->user()->post === 'accountant')

@livewire('accountant-layout-livewire')

@elseif (auth()->user()->role_id === '3')

@livewire('super-admin-layout-livewire')

@else



<div class="alert alert-danger dismisible fade show">

    <strong class="text-danger">PAGE NOT FOUND | ERROR | 404</strong>

    <button class="btn btn-close"></button>

</div>

@endif
