<x-layout>
    <livewire:popular-games />

    {{-- review section section --}}
    <div class="flex flex-col lg:flex-row my-10">
        <div class="recent-review w-full lg:w-3/4 mr:0 lg:mr-32">
            <livewire:recently-reviewed />
        </div>
        <div class="most-anticipated w-full lg:w-1/4 mt-8 lg:mt-0">

            <livewire:most-anticipated />

            <livewire:coming-soon />

        </div>
    </div>{{-- end review section section --}}

</x-layout>