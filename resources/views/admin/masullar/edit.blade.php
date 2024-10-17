@extends('layouts.admin')

@section('content')


<div class="flex justify-between align-center mt-10">

    <h2 class="intro-y text-lg font-medium">Masul tahrirlash</h2>



</div><br>
<div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2" style="background: white;
    padding: 20px 20px;
    border-radius: 20px">
    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
        <form id="science-paper-create-form" method="POST" action="{{ route("responsible.update", ['responsible'=>$responsible->id]) }}" class="validate-form"
            enctype="multipart/form-data" novalidate="novalidate">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-12 gap-2">
                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Bo'lim nomi
                    </label>
                    <input type="text" name="department" value="{{ $responsible->department }}" class="input w-full border mt-2" required="">
                    @error('department')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> F.I.Sh
                    </label>
                    <input type="text"  name="fish" value="{{ $responsible->fish }}"   class=" input w-full border mt-2" required="">
                    @error('fish')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Lavozimi
                    </label>
                    <input type="text"  name="position" value="{{ $responsible->position }}"   class=" input w-full border mt-2" required="">
                    @error('position')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Telefon raqami
                    </label>
                    <input type="text"  name="phone" value="{{ $responsible->phone }}"   class=" input w-full border mt-2" required="">
                    @error('phone')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Email
                    </label>
                    <input type="text"  name="email" value="{{ $responsible->email }}"   class=" input w-full border mt-2" required="">
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                
                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Rasm
                    </label>
                    <input type="file"  name="image" value="{{ $responsible->image }}"   class=" input w-full border mt-2" required="">
                    @error('image')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

            </div>
        </form><br>
        <div class="px-5 pb-5 text-center">
            <a href="{{ route('responsible.index') }}"  class="button delete-cancel w-32 border text-gray-700 mr-1">
                Bekor qilish
            </a>
            <button type="submit" form="science-paper-create-form"
                class="update-confirm button w-24 bg-theme-1 text-white">
                Qo'shish
            </button>
        </div>
    </div>
</div><br>



@endsection