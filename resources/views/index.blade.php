<x-layout>
    <h2 class="text-blue-500 tracking-wide uppercase font-semibold ">Popular Games</h2>
    {{-- end popular game section --}}
    <div
        class="popular-game text-sm grid grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16">
        @foreach ($popularGames as $game)
        <div class="game mt-8">
            <div class="relative inline-block">
                <a href="#">
                    <img src="{{ Str::replaceFirst('thumb', 'cover_big' , isset($game['cover']) ? $game['cover']['url'] : asset('img/default.png') ) }}"
                        alt="game" class="w-48 hover:opacity-75 trasition ease-in-out duration-150">
                </a>

                @if (isset($game['rating']))
                <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                    style="right:-20px; bottom:-20px">
                    <div class="font-semibold text-xs flex justify-center items-center h-full">
                        {{round($game['rating'])}}%
                    </div>
                </div>
                @endif
            </div>
            <a href=""
                class="block text-base font-semibold leading-light hover:text-gray-400 mt-8">{{$game['name']}}</a>
            <div class="text-gray-400 mt-1">
                @foreach ($game['platforms'] as $platform)
                @if (array_key_exists("abbreviation", $platform))
                {{$platform['abbreviation']}},
                @endif
                @endforeach
            </div>
        </div>
        @endforeach
    </div>{{-- end popular game section --}}

    {{-- review section section --}}
    <div class="flex flex-col lg:flex-row my-10">
        <div class="recent-review w-full lg:w-3/4 mr:0 lg:mr-32">
            <div class="text-blue-500 uppercase tracking-wide font-semibold">
                Recent Reviewed
            </div>
            <div class="recently-reviewed-container space-y-12 mt-8">
                @foreach ($recentlyReviewed as $game)
                {{-- game review card --}}
                <div class="game bg-gray-800 rounded-lg shadow-md flex p-6">
                    <div class="relative flex-none">
                        <a href="#">
                            <img src="{{ Str::replaceFirst('thumb', 'cover_big' , isset($game['cover']) ? $game['cover']['url'] : asset('img/default.png') ) }}"
                                alt="game" class="w-48 hover:opacity-75 trasition ease-in-out duration-150">
                        </a>
                        @if (isset($game['rating']))
                        <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full"
                            style="right:-20px; bottom:-20px">
                            <div class="font-semibold text-xs flex justify-center items-center h-full">

                                {{round($game['rating'])}}%
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="ml-12">
                        <a href="" class="block text-base font-semibold leading-light hover:text-gray-400">
                            {{$game['name']}}
                        </a>
                        <div class="text-gray-400 mt-1">@foreach ($game['platforms'] as $platform)
                            @if (array_key_exists("abbreviation", $platform))
                            {{$platform['abbreviation']}},
                            @endif
                            @endforeach</div>
                        <div class="mt-6 text-gray-400">
                            {{$game["summary"]}}
                        </div>
                    </div>
                </div>
                {{-- end game review card --}}
                @endforeach
            </div>
        </div>
        <div class="most-anticipated w-full lg:w-1/4 mt-8 lg:mt-0">

            {{-- most-anticipated section --}}
            <div class="text-blue-500 uppercase tracking-wide font-semibold">
                Most Anticipated
            </div>
            <div class="most-anticipated-container space-y-10 mt-5">

                {{-- most-anticipated game card --}}
                @foreach ($mostAnticipated as $game)
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
                @endforeach
                {{-- end most-anticipated game card --}}
            </div>
            {{-- end most-anticipated section --}}

            {{-- coming section --}}
            <div class="text-blue-500 uppercase tracking-wide font-semibold mt-10">
                Coming Soon
            </div>
            <div class="most-anticipated-container space-y-10 mt-5">

                {{-- coming soon game card --}}
                @foreach ($commingSoon as $game)
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
                @endforeach

            </div>{{-- end coming section --}}

        </div>
    </div>{{-- end review section section --}}

</x-layout>