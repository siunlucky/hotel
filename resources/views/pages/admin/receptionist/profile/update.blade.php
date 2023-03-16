@extends('layouts.receptionist-main')

@section('pages')
<div class="h-auto px-4 pt-6">
    <h1 class="text-[20px] text-[#34495e] font-semibold pb-5">Profile</h1>
    <div class="grid grid-cols-4 gap-7">
        <div class="bg-white rounded-md h-fit">
            <div class="bg-[#AFAFAF] flex rounded-t-md p-5 items-center">
                <img src="/storage/profilePhoto/{{ auth()->user()->photo }}"
                    class="object-cover object-center rounded-full w-[70px] h-[70px]" alt="">
                <h4 class="ml-4 text-[20px] font-semibold text-white">Receptionist</h4>
            </div>
            <ul>
                <li class="flex justify-between px-5 py-2 text-[15px] border border-[#20202020]">
                    Name
                    <span class="font-bold text-[#5b6e88]">{{ auth()->user()->name }}</span>
                </li>
                <li class="flex justify-between px-5 py-2 text-[15px] border border-[#20202020]">
                    Username
                    <span class="font-bold text-[#5b6e88]">{{ auth()->user()->username }}</span>
                </li>
                <li class="flex justify-between px-5 py-2 rounded-b-md text-[15px] border border-[#20202020]">
                    Email
                    <span class="font-bold text-[#5b6e88]">{{ auth()->user()->email }}</span>
                </li>
            </ul>
        </div>
        <div class="col-span-3 bg-white rounded-md">
            <div class="p-4 card">
                <h5 class="pb-2 border-b mb-[50px] text-[20px] font-semibold">Profile Information</h5>
                <form action="/hotel/receptionist/profile/{{ auth()->user()->id }}/update" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-2 gap-8 mb-5">
                        <div class="flex flex-col">
                            <img src="/assets/image/400x400.jpeg" id="selected-photo"
                            class="shadow-lg w-full border-[3px] border-[#f1f1f1] rounded-md" alt="Selected Photo">

                            <input type="file" class="hidden" id="photo"  name="photo">

                            <label for="photo"
                                class="shadow-xl text-center w-full mb-2 mt-10 rounded-md p-3 text-white text-[20px] font-semibold bg-[#28C76F] ">Upload
                                Image
                            </label>
                            <span>Supported files: <b>jpeg, jpg.</b> Image will be resized into
                                400x400px</span>
                            @error('photo')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="">
                            @error('name')
                                {{ $message }}
                            @enderror
                            <div class="mb-4">
                                <label for="name" class="font-semibold">Name <span class="text-red-600">*</span></label>
                                <input type="text" name="name" value="{{ auth()->user()->name }}"
                                    class="block w-full text-[16px] px-5 py-2 mt-1 text-lg bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1">
                            </div>
                            @error('email')
                                {{ $email }}
                            @enderror
                            <div class="mb-4">
                                <label for="email" class="font-semibold">Email <span
                                        class="text-red-600">*</span></label>
                                <input type="email" name="email" value="{{ auth()->user()->email }}"
                                    class="block w-full text-[16px] px-5 py-2 mt-1 text-lg bg-white border rounded-md shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1">
                            </div>
                        </div>
                    </div>
                    <button type="submit"
                        class="bg-[#4634FF] w-full p-3 text-white font-semibold rounded-md">Submit</button>
                </form>

            </div>

        </div>
    </div>


</div>
@endsection

@section('scripts')
<script>
    const label = document.querySelector('label[for="photo"]');
const input = document.getElementById('photo');
const image = document.getElementById('selected-photo');

label.addEventListener('click', () => {
  input.click();
});

input.addEventListener('change', () => {
  const file = input.files[0];
  const reader = new FileReader();

  reader.addEventListener('load', () => {
    image.setAttribute('src', reader.result);
  });

  if (file) {
    reader.readAsDataURL(file);
  } else {
    image.setAttribute('src', '/assets/image/400x400.jpeg');
  }
});

// Check if input value is empty on page load
if (!input.value) {
  image.setAttribute('src', '/assets/image/400x400.jpeg');
}
</script>
@endsection
