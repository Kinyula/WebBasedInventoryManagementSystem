@if (auth()->user()->role_id === '0')

@livewire('layout-livewire')

@elseif (auth()->user()->role_id === '1')

@livewire('layout2-assistant-livewire')

@else

@livewire('layout3-college-manager-livewire')

@endif
