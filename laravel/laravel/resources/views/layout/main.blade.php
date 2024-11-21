<div>
    @foreach( $all_menu as $item)
        <div class="{{ $item->CLASS }}">
            {!! \Livewire\Livewire::mount($item->CLASS) !!}
        </div>
    @endforeach
</div>