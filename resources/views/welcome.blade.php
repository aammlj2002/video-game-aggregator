<x-layout>
    <h2 class="text-blue-500 tracking-wide uppercase font-semibold ">Popular Games</h2>
    {{-- end popular game section --}}
    <div class="popular-game text-sm grid grid-cols-6 gap-12 border-b border-gray-800 pb-16">
        @foreach (range(1,9) as $item)
        <div class="game mt-8">
            <div class="relative inline-block">
                <a href="#">
                    <img src="{{asset('img/ff7.jpg')}}" alt="game"
                        class="w-48 hover:opacity-75 trasition ease-in-out duration-150">
                </a>
                <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                    style="right:-20px; bottom:-20px">
                    <div class="font-semibold text-xs flex justify-center items-center h-full">
                        88%
                    </div>
                </div>
            </div>
            <a href="" class="block text-base font-semibold leading-light hover:text-gray-400 mt-8">Final Fantasy 7
                Remake</a>
            <div class="text-gray-400 mt-1">Playstation 4</div>
        </div>
        @endforeach
    </div>{{-- end popular game section --}}

    {{-- review section section --}}
    <div class="flex my-10">
        <div class="recent-review w-3/4 mr-32">
            <div class="text-blue-500 uppercase tracking-wide font-semibold">
                Recent Reviewed
            </div>
            <div class="recently-reviewed-container space-y-12 mt-8">
                @foreach (range(1,4) as $item)
                {{-- game review card --}}
                <div class="game bg-gray-800 rounded-lg shadow-md flex p-6">
                    <div class="relative flex-none">
                        <a href="#">
                            <img src="{{asset('img/ff7.jpg')}}" alt="game"
                                class="w-48 hover:opacity-75 trasition ease-in-out duration-150">
                        </a>
                        <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full"
                            style="right:-20px; bottom:-20px">
                            <div class="font-semibold text-xs flex justify-center items-center h-full">
                                88%
                            </div>
                        </div>
                    </div>
                    <div class="ml-12">
                        <a href="" class="block text-base font-semibold leading-light hover:text-gray-400">Final
                            Fantasy 7 Remake</a>
                        <div class="text-gray-400 mt-1">Playstation 4</div>
                        <div class="mt-6 text-gray-400">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae itaque assumenda
                            officiis facilis, nulla eligendi, deleniti dolorum fugit, eaque tempora vitae. Officiis
                            laboriosam doloremque nesciunt molestiae eaque veniam aut omnis.
                        </div>
                    </div>
                </div>
                {{-- end game review card --}}
                @endforeach
            </div>
        </div>
        <div class="most-anticipated w-1/4">

            {{-- most-anticipated section --}}
            <div class="text-blue-500 uppercase tracking-wide font-semibold">
                Most Anticipated
            </div>
            <div class="most-anticipated-container space-y-10 mt-5">

                {{-- most-anticipated game card --}}
                @foreach (range(1,4) as $item)
                <div class="game flex">
                    <a href="#">
                        <img src="{{asset('img/ff7.jpg')}}" alt="game"
                            class="w-16 hover:opacity-75 trasition ease-in-out duration-150">
                    </a>
                    <div class="ml-4">
                        <a href="#" class="hover:text-gray-300">Final Fantasy 7 Remake</a>
                        <div class="text-gray-400 text-sm mt-1">Sept 16, 2020</div>
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
                @foreach (range(1,4) as $item)
                <div class="game flex">
                    <a href="#">
                        <img src="{{asset('img/ff7.jpg')}}" alt="game"
                            class="w-16 hover:opacity-75 trasition ease-in-out duration-150">
                    </a>
                    <div class="ml-4">
                        <a href="#" class="hover:text-gray-300">Final Fantasy 7 Remake</a>
                        <div class="text-gray-400 text-sm mt-1">Sept 16, 2020</div>
                    </div>
                </div>{{-- end coming soon game card --}}
                @endforeach

            </div>{{-- end coming section --}}

        </div>
    </div>{{-- end review section section --}}

</x-layout>