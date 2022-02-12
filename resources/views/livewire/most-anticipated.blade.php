<div wire:init="loadMostAnticipated">
    {{-- most-anticipated section --}}
    <div class="text-blue-500 uppercase tracking-wide font-semibold">
        Most Anticipated
    </div>
    <div class="most-anticipated-container space-y-10 mt-5">

        {{-- most-anticipated game card --}}
        @forelse ($mostAnticipated as $game)
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
        </div>
        @empty
        <div>loading</div>
        @endforelse
        {{-- end most-anticipated game card --}}
    </div>
    {{-- end most-anticipated section --}}
</div>