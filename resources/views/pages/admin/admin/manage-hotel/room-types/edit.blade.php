@extends('layouts.admin-main')

@section('styles')
    <style>
        .select2-selection__rendered {
            line-height: 31px !important;

        }

        .select2-container .select2-selection--single {
            height: 35px !important;

        }

        .select2-selection__arrow {
            height: 34px !important;

        }
    </style>
@endsection

@section('pages')
    <div class="h-auto px-4 pt-6">
        <form action="/hotel/admin/room-types/edit/update" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex justify-between">
                <h1 class="text-[20px] font-bold">Edit Room Type</h1>
                <a href="{{ url()->previous() }}"
                    class="text-[#4634ff] flex ease-in duration-100 items-center border border-[#4634ff] fill-[#4634ff] hover:fill-white hover:bg-[#4634ff] hover:text-white py-0.5 px-2 rounded-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 mr-2 -rotate-90 -translate-y-[1px] "
                        viewBox="0 0 384 512">
                        <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M350 177.5c3.8-8.8 2-19-4.6-26l-136-144C204.9 2.7 198.6 0 192 0s-12.9 2.7-17.4 7.5l-136 144c-6.6 7-8.4 17.2-4.6 26s12.5 14.5 22 14.5h88l0 192c0 17.7-14.3 32-32 32H32c-17.7 0-32 14.3-32 32v32c0 17.7 14.3 32 32 32l80 0c70.7 0 128-57.3 128-128l0-192h88c9.6 0 18.2-5.7 22-14.5z" />
                    </svg>
                    <span class="">Back</span>
                </a>
            </div>

            <div class="mt-10 bg-white rounded-md">
                <h1 class="px-4 py-2 border-b text-[18px] font-medium">General Information</h1>
                <div class="grid grid-cols-6 gap-4 px-4 py-2 mt-5">
                    @error('name')
                        {{ $message }}
                    @enderror
                    <div class="flex flex-col col-span-2 mb-5">
                        <label for="name"
                            class="text-[14px] after:content-['*'] after:ml-0.5 after:text-red-500 text-slate-700 font-medium">
                            Name</label>
                        <input type="text" id="name" name="name" required value="{{ $room_type->name }}"
                            class="block placeholder:text-[16px] text-[16px] px-5 py-3 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 sm:text-sm focus:ring-1">
                    </div>
                    @error('person')
                        {{ $message }}
                    @enderror
                    <div class="flex flex-col col-span-2 mb-5">
                        <label for="person"
                            class="text-[14px] after:content-['*'] after:ml-0.5 after:text-red-500 text-slate-700 font-medium">
                            Total Person</label>
                        <input type="number" min="1" id="person" name="person" required
                            value="{{ $room_type->person }}"
                            class="block placeholder:text-[16px] text-[16px] px-5 py-3 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 sm:text-sm focus:ring-1">
                    </div>
                    @error('price')
                        {{ $message }}
                    @enderror
                    <div class="flex flex-col col-span-2 mb-5">
                        <label for="price"
                            class="text-[14px] after:content-['*'] after:ml-0.5 after:text-red-500 text-slate-700 font-medium">
                            Fare</label>
                        <input type="number" min='1' id="price" name="price" required
                            value="{{ $room_type->price }}"
                            class="block placeholder:text-[16px] text-[16px] px-5 py-3 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 sm:text-sm focus:ring-1">
                    </div>
                    @error('amenities')
                        {{ $message }}
                    @enderror
                    <div class="flex flex-col col-span-2 mb-5">
                        <label for="amenities"
                            class="text-[14px] after:content-['*'] after:ml-0.5 after:text-red-500 text-slate-700 font-medium">
                            Amenities</label>
                        <select class="amenities js-states form-control" style="width: 100%" name="amenities[]"
                            data-allow-clear="false" multiple="multiple" required>
                            @foreach ($amenities as $amenity)
                                <option value="{{ $amenity->id }}" @if ($room_type->amenities->contains($amenity->id)) selected @endif>
                                    {{ $amenity->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('complements')
                        {{ $message }}
                    @enderror
                    <div class="flex flex-col col-span-2 mb-5">
                        <label for="complements"
                            class="text-[14px] after:content-['*'] after:ml-0.5 after:text-red-500 text-slate-700 font-medium">
                            Complements</label>
                        <select
                            class="complements js-states form-control block placeholder:text-[16px] h-10 text-[16px] px-5 py-3 mt-1 bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 sm:text-sm focus:ring-1"
                            name="complements[]" data-allow-clear="false" required style="width:100%" id='complements'
                            multiple="multiple">
                            @foreach ($complements as $complement)
                                <option value="{{ $complement->id }}" @if ($room_type->complements->contains($complement->id)) selected @endif>
                                    {{ $complement->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="pb-5 mt-5 bg-white rounded-md">
                <h1 class="px-4 py-2 border-b text-[18px] font-medium">Room Information</h1>
                <div class="flex justify-center py-2 mt-5">
                    <div class="flex flex-col col-span-2 mb-5">
                        <label for="total-room"
                            class="text-[20px] after:content-['*'] after:ml-0.5 after:text-red-500 text-slate-700 font-medium">
                            Total Room</label>
                        <input type="number" name="total-room" readonly id="total-room" min="1" max="15" required value="{{ count($room_type->rooms) }}"
                            class="block placeholder:text-[16px] w-[300px] text-[16px] px-5 py-3 mt-1 bg-[#E9ECEF] border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 sm:text-sm focus:ring-1">
                    </div>
                </div>
                <div id="room-forms" class="grid grid-cols-4 gap-4 px-4 py-2">
                    @foreach ($room_type->rooms as $room_type_room)
                    <div class="flex flex-col">
                        <label for="room-{{ $room_type_room->id }}" class="font-medium">Room - {{ $loop->iteration }} <span class="text-red-500">*<span></label>
                        <div class="relative">
                            <input type="text" class="w-full rounded-md" name="rooms[]" value="{{ $room_type_room->room_number }}" id="room-{{ $room_type_room->id }}">
                            <button class="room-remove absolute top-0 right-0 h-full rounded-r-md w-[40px] items-center flex justify-center bg-red-500">
                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path fill="#ffffff" d="M310.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 210.7 54.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L114.7 256 9.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 301.3 265.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L205.3 256 310.6 150.6z"/></svg>
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="pb-5 mt-5 bg-white rounded-md">
                <h1 class="px-4 py-2 border-b text-[18px] font-medium">Bed Per Room</h1>
                <div class="flex justify-center py-2 mt-5">
                    <div class="flex flex-col col-span-2 mb-5">
                        <label for="total-bed"
                            class="text-[20px] after:content-['*'] after:ml-0.5 after:text-red-500 text-slate-700 font-medium">
                            Total Bed</label>
                        <input type="number" name="total-bed" id="total-bed" min="1" max="15" required readonly value="{{ count($room_type->beds) }}"
                            class="block placeholder:text-[16px] w-[300px] text-[16px] px-5 py-3 mt-1 bg-[#E9ECEF] border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 sm:text-sm focus:ring-1">
                    </div>
                </div>
                <div id="bed-forms" class="grid grid-cols-4 gap-4 px-4 py-2">
                    @foreach ($room_type->beds as $room_type_bed)
                    <div class="flex flex-col">
                        <label for="bed-{{ $room_type_bed->id }}" class="font-medium">Bed - {{ $loop->iteration }} <span class="text-red-500">*<span></label>
                        <div class="relative">
                            <select type="text" name="beds[]" required class="w-full rounded-md">
                                <option class="hidden"></option>
                                @foreach ($beds as $bed)
                                    <option class="text-[16px] py-2" id="bed-{{ $bed->id }}" value="{{ $bed->id }}" @if ($room_type->beds->contains($bed->id)) selected @endif>{{ $bed->name }}</option>
                                @endforeach
                            </select
                            <button class="bed-remove absolute top-0 right-0 h-full rounded-r-md w-[40px] items-center flex justify-center bg-red-500">
                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path fill="#ffffff" d="M310.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 210.7 54.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L114.7 256 9.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 301.3 265.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L205.3 256 310.6 150.6z"/></svg>
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="my-5 bg-white rounded-md">
                <h1 class="px-4 py-2 border-b text-[18px] font-medium">Images</h1>
                <div x-data="dataFileDnD()" class="relative flex flex-col p-4 pb-10 text-gray-400">
                    <div x-ref="dnd"
                        class="relative flex flex-col text-gray-400 border border-gray-200 rounded cursor-pointer">
                        <input accept="*" type="file" multiple name="photos[]" required
                            class="absolute inset-0 z-50 w-full h-full p-0 m-0 outline-none opacity-0 cursor-pointer"
                            @change="addFiles($event)"
                            @dragover="$refs.dnd.classList.add('border-blue-400'); $refs.dnd.classList.add('ring-4'); $refs.dnd.classList.add('ring-inset');"
                            @dragleave="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');"
                            @drop="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');"
                            title="" />

                        <div class="flex flex-col items-center justify-center py-10 text-center">
                            <svg class="w-6 h-6 mr-1 text-current-50" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <p class="m-0">Drag your files here or click in this area.</p>
                        </div>
                    </div>


                    <template x-if="files.length > 0">
                        <div class="grid grid-cols-2 gap-4 mt-4 md:grid-cols-6" @drop.prevent="drop($event)"
                            @dragover.prevent="$event.dataTransfer.dropEffect = 'move'">
                            <template x-for="(_, index) in Array.from({ length: files.length })">
                                <div class="relative flex flex-col items-center overflow-hidden text-center bg-gray-100 border rounded cursor-move select-none"
                                    style="padding-top: 100%;" @dragstart="dragstart($event)"
                                    @dragend="fileDragging = null" :class="{ 'border-blue-600': fileDragging == index }"
                                    draggable="true" :data-index="index">
                                    <button class="absolute top-0 right-0 z-50 p-1 bg-white rounded-bl focus:outline-none"
                                        type="button" @click="remove(index)">
                                        <svg class="w-4 h-4 text-gray-700" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                    <template x-if="files[index].type.includes('audio/')">
                                        <svg class="absolute w-12 h-12 text-gray-400 transform top-1/2 -translate-y-2/3"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                                        </svg>
                                    </template>
                                    <template
                                        x-if="files[index].type.includes('application/') || files[index].type === ''">
                                        <svg class="absolute w-12 h-12 text-gray-400 transform top-1/2 -translate-y-2/3"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>
                                    </template>
                                    <template x-if="files[index].type.includes('image/')">
                                        <img class="absolute inset-0 z-0 object-cover w-full h-full border-4 border-white preview"
                                            x-bind:src="loadFile(files[index])" />
                                    </template>
                                    <template x-if="files[index].type.includes('video/')">
                                        <video
                                            class="absolute inset-0 object-cover w-full h-full border-4 border-white pointer-events-none preview">
                                            <fileDragging x-bind:src="loadFile(files[index])" type="video/mp4">
                                        </video>
                                    </template>

                                    <div
                                        class="absolute bottom-0 left-0 right-0 flex flex-col p-2 text-xs bg-white bg-opacity-50">
                                        <span class="w-full font-bold text-gray-900 truncate"
                                            x-text="files[index].name">Loading</span>
                                        <span class="text-xs text-gray-900"
                                            x-text="humanFileSize(files[index].size)">...</span>
                                    </div>

                                    <div class="absolute inset-0 z-40 transition-colors duration-300"
                                        @dragenter="dragenter($event)" @dragleave="fileDropping = null"
                                        :class="{ 'bg-blue-200 bg-opacity-80': fileDropping == index && fileDragging != index }">
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>
                </div>
            </div>
            <div class="pb-5 mt-5 bg-white rounded-md">
                <h1 class="px-4 py-2 border-b text-[18px] font-medium after:content-['*'] after:ml-0.5 after:text-red-500">
                    Description</h1>
                <div class="px-4 mt-5">
                    <textarea name="description" id="description" required
                        class="block w-full h-[150px] placeholder:text-[16px] text-[16px] bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1">{{ $room_type->description }}</textarea>
                </div>
                <div id="room-forms" class="grid grid-cols-4 gap-4 px-4 py-2"></div>
            </div>
            <div class="px-4 py-5 mt-5 bg-white rounded-md">
                <button class="bg-[#4634FF] text-white w-full h-[50px] rounded-md">Submit</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://unpkg.com/create-file-list"></script>
    <script>
        function dataFileDnD() {
            return {
                files: [],
                fileDragging: null,
                fileDropping: null,
                humanFileSize(size) {
                    const i = Math.floor(Math.log(size) / Math.log(1024));
                    return (
                        (size / Math.pow(1024, i)).toFixed(2) * 1 +
                        " " + ["B", "kB", "MB", "GB", "TB"][i]
                    );
                },
                remove(index) {
                    let files = [...this.files];
                    files.splice(index, 1);

                    this.files = createFileList(files);
                },
                drop(e) {
                    let removed, add;
                    let files = [...this.files];

                    removed = files.splice(this.fileDragging, 1);
                    files.splice(this.fileDropping, 0, ...removed);

                    this.files = createFileList(files);

                    this.fileDropping = null;
                    this.fileDragging = null;
                },
                dragenter(e) {
                    let targetElem = e.target.closest("[draggable]");

                    this.fileDropping = targetElem.getAttribute("data-index");
                },
                dragstart(e) {
                    this.fileDragging = e.target
                        .closest("[draggable]")
                        .getAttribute("data-index");
                    e.dataTransfer.effectAllowed = "move";
                },
                loadFile(file) {
                    const preview = document.querySelectorAll(".preview");
                    const blobUrl = URL.createObjectURL(file);

                    preview.forEach(elem => {
                        elem.onload = () => {
                            URL.revokeObjectURL(elem.src); // free memory
                        };
                    });

                    return blobUrl;
                },
                addFiles(e) {
                    const files = createFileList([...this.files], [...e.target.files]);
                    this.files = files;
                    this.form.formData.files = [...files];
                }
            };
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.complements').select2();
            $('.amenities').select2();
        });

        $(document).ready(function() {
            // Listen for changes to the total room input field
            $('#total-room').on('input', function() {

                // Clear any existing forms
                $('#room-forms').empty();

                // Get the new total number of rooms
                var totalRooms = parseInt($(this).val());

                // Generate the forms
                for (var i = 1; i <= totalRooms; i++) {
                    var formHtml =
                        '<div class="flex flex-col"> \
                            <label for="room-' + i + '" class="font-medium">Room - ' + i + ' <span class="text-red-500">*<span></label> \
                            <div class="relative"> \
                                <input type="text" class="w-full rounded-md" name="rooms[]" id="room-' + i + '"> \
                                <button class="room-remove absolute top-0 right-0 h-full rounded-r-md w-[40px] items-center flex justify-center bg-red-500"> \
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path fill="#ffffff" d="M310.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 210.7 54.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L114.7 256 9.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 301.3 265.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L205.3 256 310.6 150.6z"/></svg> \
                                </button> \
                            </div> \
                        </div>';
                    $('#room-forms').append(formHtml);
                }
            });
        });

        $(document).on('click', '.room-remove', function() {
            // Get the current total number of rooms
            var totalRooms = parseInt($('#total-room').val());

            // Remove the last form
            $('#room-forms').children().last().remove();

            // Decrease the total number of rooms by 1
            totalRooms--;

            // Update the total room input field
            $('#total-room').val(totalRooms);
        });

        $(document).ready(function() {
            // Listen for changes to the total room input field
            $('#total-bed').on('input', function() {
                // Clear any existing forms
                $('#bed-forms').empty();

                // Get the new total number of rooms
                var totalBeds = parseInt($(this).val());

                // Generate the forms
                for (var i = 1; i <= totalBeds; i++) {
                    var formHtml =
                        '<div class="flex flex-col"> \
                            <label for="bed-' + i + '" class="font-medium">Bed - ' + i + ' <span class="text-red-500">*<span></label> \
                            <div class="relative"> \
                                <select type="text" name="beds[]" required class="w-full rounded-md"> \
                                    <option class="hidden"></option> \
                                    @foreach ($beds as $bed) \
                                        <option class="text-[16px] py-2" id="bed-' + i + '" value="{{ $bed->id }}">{{ $bed->name }}</option> \
                                    @endforeach \
                                </select>\
                                <button class="bed-remove absolute top-0 right-0 h-full rounded-r-md w-[40px] items-center flex justify-center bg-red-500"> \
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path fill="#ffffff" d="M310.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 210.7 54.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L114.7 256 9.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 301.3 265.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L205.3 256 310.6 150.6z"/></svg> \
                                </button> \
                            </div> \
                        </div>';
                    $('#bed-forms').append(formHtml);
                }
            });
        });

        $(document).on('click', '.bed-remove', function() {
            // Get the current total number of rooms
            var totalBeds = parseInt($('#total-bed').val());

            // Remove the last form
            $('#bed-forms').children().last().remove();

            // Decrease the total number of rooms by 1
            totalBeds--;

            // Update the total room input field
            $('#total-bed').val(totalBeds);
        });
    </script>
@endsection
