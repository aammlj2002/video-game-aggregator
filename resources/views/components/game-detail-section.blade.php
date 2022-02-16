<div class="game-detail border-b border-gray-800 pb-12 flex flex-col lg:flex-row">

    {{-- cover image --}}
    <div class="flex-none mb-4 lg-mb-0">
        <img class="w-72" src="{{ $game['coverImage'] }}" alt="game">
    </div>

    {{-- game name and some detail --}}
    <div class="lg:ml-12 lg:mr-64 mx-0">
        <div class="font-semibold text-4xl">{{$game['name']}}</div>
        <div class="text-gray-400">

            @if ($game["genres"])
            <div>
                <span>Genres &dash; </span>
                <span>{{$game["genres"]}}</span>
            </div>
            @endif

            @if ( $game["companies"] )
            <div>
                <span>Company &dash; </span>
                <span>{{$game["companies"]}}</span>
            </div>
            @endif

            @if ( $game["platforms"] )
            <div>
                <span>Platforms &dash; </span>
                <span>{{$game["platforms"]}}</span>
            </div>
            @endif
        </div>

        <div class="flex flex-wrap item-center mt-8">

            {{-- ratings --}}
            <div class="flex items-center">
                <div id="memberRating" class="w-16 h-16 bg-gray-800 rounded-full relative">
                    @push('scripts')
                    <x-rating-progress slug="memberRating" :rating="$game['rating']" :event="null">
                    </x-rating-progress>
                    @endpush
                </div>
                <div class="ml-4 text-xs">Member <br> Score</div>
            </div>
            <div class="flex items-center mr-5">
                <div id="criticRating" class="w-16 h-16 bg-gray-800 rounded-full ml-12 relative">
                    @push('scripts')
                    <x-rating-progress slug="criticRating" :rating="$game['aggregated_rating']" :event="null">
                    </x-rating-progress>
                    @endpush
                </div>
                <div class="ml-4 text-xs">Critic <br> Score</div>
            </div>

            {{-- website links --}}
            @if ($game['website_link'])
            <div class="flex items-center space-x-4 mt-2 lg:mt-0 ml-0 lg:ml-12">
                <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                    <a href="{{$game['website_link']}}" class="hover:text-gray-400">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 16 17" fill="none">
                            <path
                                d="M8 .266C3.582.266 0 3.952 0 8.5s3.582 8.234 8 8.234 8-3.686 8-8.234S12.418.266 8 .266zm2.655 11.873l-.365.375a.8.8 0 00-.2.355c-.048.188-.087.378-.153.56l-.561 1.556c-.444.1-.903.156-1.376.156v-.91c.055-.418-.246-1.203-.73-1.701-.194-.2-.302-.47-.302-.752v-1.062c0-.387-.203-.742-.531-.93a52.733 52.733 0 00-1.575-.866 4.648 4.648 0 01-1.02-.722l-.027-.024a3.781 3.781 0 01-.582-.689c-.303-.457-.796-1.209-1.116-1.698a6.581 6.581 0 013.33-3.383l.774.399c.343.177.747-.08.747-.475v-.375c.257-.043.52-.07.787-.08l.912.939a.542.542 0 010 .751l-.15.156-.334.343c-.101.104-.101.272 0 .376l.15.155c.102.104.102.272 0 .376l-.257.265a.255.255 0 01-.183.078h-.29a.254.254 0 00-.18.076l-.32.32a.269.269 0 00-.05.31l.502 1.035c.086.176-.039.384-.23.384h-.182a.253.253 0 01-.17-.065l-.299-.268a.51.51 0 00-.501-.102l-1.006.345a.386.386 0 00-.19.144.405.405 0 00.14.587l.357.184c.304.156.639.238.978.238.34 0 .729.906 1.032 1.062h2.153c.274 0 .537.112.73.311l.442.455c.184.19.288.447.288.716a1.584 1.584 0 01-.442 1.095zm2.797-3.033a.775.775 0 01-.457-.331l-.58-.896a.812.812 0 010-.883l.632-.976a.78.78 0 01.298-.27l.419-.216c.436.894.688 1.9.688 2.966 0 .288-.024.57-.06.848l-.94-.242z" />
                        </svg>
                    </a>
                </div>
            </div>
            @endif

            {{-- game summary --}}
            @if ($game['summary'])
            <div class="mt-12">{{$game['summary']}}</div>
            @endif

            {{-- game trailer video --}}
            @if ($game['video'])
            <div class="mt-12" x-data="{ trailerModalVisible : false }">
                <button @click="trailerModalVisible=true" @keydown.window.escape="trailerModalVisible=false"
                    class="flex bg-blue-500 text-white font-semibold p-4 hover:bg-blue-600 rounded transition ease-in-out duration-150">
                    <svg class="w-6 fill-current" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0z" fill="none"></path>
                        <path
                            d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z">
                        </path>
                    </svg>
                    <span class="ml-2">Play Trailer</span>
                </button>
                {{-- this is trailer modal --}}
                <template x-if="trailerModalVisible">
                    <div x-show="trailerModalVisible" style="background-color: rgba(0, 0, 0, .5);"
                        class="z-50 fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                        @click="trailerModalVisible=false" @keydown.window.escape="imageModalVisible=false">
                        <div class="fixed container mx-auto my-10 lg:px-60 rounded-lg overflow-y-auto">
                            <div class="bg-gray-900 rounded">
                                <div class="flex justify-end pr-4 pt-2">
                                    <button class="text-3xl leading-none hover:text-gray-300"
                                        @click="trailerModalVisible=false">
                                        &times;
                                    </button>
                                </div>
                                <div class="modal-body px-8 py-8">
                                    <div class="responsive-container overflow-hidden relative"
                                        style="padding-top: 56.25%">
                                        <iframe width="560" height="315"
                                            class="responsive-iframe absolute top-0 left-0 w-full h-full"
                                            src="https://youtube.com/embed/{{ $game['video'] }}" style="border:0;"
                                            allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
            @endif
        </div>
    </div>
</div>