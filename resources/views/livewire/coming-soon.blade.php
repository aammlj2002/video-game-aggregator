<div wire:init="loadComingSoon">
    {{-- coming section --}}
    <div class="text-blue-500 uppercase tracking-wide font-semibold mt-10">
        Coming Soon
    </div>
    <div class="most-anticipated-container space-y-10 mt-5">

        {{-- coming soon game card --}}
        @forelse ($comingSoon as $game)
        <div class="game flex">
            <a href="#">
                <img src="{{ Str::replaceFirst('thumb', 'cover_small' , isset($game['cover']) ? $game['cover']['url'] : asset('img/default.png') ) }}"
                    alt="game" class="w-16 hover:opacity-75 trasition ease-in-out duration-150">
            </a>
            <div class="ml-4">
                <a href="#" class="hover:text-gray-300">{{$game['name']}}</a>
                <div class="text-gray-400 text-sm mt-1">
                    {{Carbon\Carbon::parse($game['first_release_date'])->format("M d, Y")}}</div>
            </div>
        </div>{{-- end coming soon game card --}}
        @empty
        <div>loading</div>
        @endforelse

    </div>{{-- end coming section --}}
</div>