<div>

    <div class="relatitive ml-10 mt-6">

        <input type="text" class="form-input" placeholder="Search Tracking..." wire:model="query"
            wire:keydown.escape="reset" wire:keydown.ArrowUp="decrementHighlight" wire:keydown.ArrowDown="incrementHighlight" wire:keydown.enter="SelectTracking">

            <div wire:loading class="absolute z-10 list-group bg-gray-500 w-full rounded-t-none shadow-lg">

                <div class="list-item">Searching Trackings...</div>

            </div>

        @if (!empty($query))

            <div class="fixed top-0 right-0 bottom-0 left-0" wire:click="reset"></div>

            
            <div class="absolute z-10 list-group bg-blue-100 w-40 rounded-md shadow-lg ml-5">
                
                @if (!empty($trackings))


                @foreach ($trackings as $i => $tracking)

                    <a href="" class="block rounded-md text-center {{ $highlightIndex == $i ? 'bg-blue-100' : '' }}">{{ $tracking['tracking_number'] }}</a>
                    
                @endforeach
 

                @else

                    <div class="list-item">No Result!</div>

                @endif
            
            </div>

        @endif

        

    </div>

</div>
