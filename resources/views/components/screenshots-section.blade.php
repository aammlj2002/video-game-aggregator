<div class="images-container border-b border-gray-800 pb-12 my-8" x-data="{ imageModalVisible:false, image: null }">
    <div class="text-blue-500 uppercase tracking-wide font-semibold">Images</div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8">
        @foreach ($screenshots as $screenshot)
        <div>
            <div @click="imageModalVisible=true; image='{{$screenshot['huge']}}'">
                <img src="{{ $screenshot['big'] }}" alt="image"
                    class="hover:opacity-75 transition ease-in-out duration-150">
            </div>
        </div>
        @endforeach
        {{-- this is screenshot modal --}}
        <template x-if="imageModalVisible">
            <div x-show="imageModalVisible" style="background-color: rgba(0, 0, 0, .5);"
                class="z-50 fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                @click="imageModalVisible=false" @keydown.window.escape="imageModalVisible=false">
                <div class="fixed container mx-auto my-10 lg:px-60 rounded-lg overflow-y-auto">
                    <div class="bg-gray-900 rounded">
                        <div class="flex justify-end pr-4 pt-2">
                            <button class="text-3xl leading-none hover:text-gray-300" @click="imageModalVisible=false">
                                &times;
                            </button>
                        </div>
                        <div class="modal-body px-8 py-8">
                            <img :src="image" alt="screenshot">
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>
</div>