@extends('layouts.admin')

@section('content')


<div class="flex justify-between align-center mt-10">

    <h2 class="intro-y text-lg font-medium">Tanlov tahrirlash</h2>



</div><br>
<div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2" style="background: white;
    padding: 20px 20px;
    border-radius: 20px">
    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
        <form id="science-paper-create-form" method="POST" action="{{ route("annoucement.update", ['annoucement'=>$annoucement->id]) }}" class="validate-form"
            enctype="multipart/form-data" novalidate="novalidate">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-12 gap-2">
                <div class="w-full col-span-12 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Title
                    </label>
                    <input type="text" name="title" value="{{ $annoucement->title }}" class="input w-full border mt-2" required="">
                    @error('title')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-4 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Boshlanish sanasi
                    </label>
                    <input type="datetime-local"  name="start_date" value="{{ $annoucement->start_date }}"   class=" input w-full border mt-2" required="">
                    @error('start_date')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-4 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tugash sanasi
                    </label>
                    <input type="datetime-local"  name="end_date" value="{{ $annoucement->end_date }}"   class=" input w-full border mt-2" required="">
                    @error('end_date')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-4">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Status
                    </label>
                    <select name="status" value="{{ $annoucement->status }}" id="science-sub-category" class="input border w-full mt-2" required="">

                        <option value="">status tanlang</option>

                        <option value="opened">Boshlandi</option>

                        <option value="finished">Tugadi</option>

                        <option value="coming_soon">Hali vaqt bor</option>

                    </select>
                    @error('status')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Web saytda ko'rinsinmi 
                    </label>
                    <select name="is_active" value="{{ $annoucement->is_active }}" id="science-sub-category" class="input border w-full mt-2" required="">

                        <option value="">Aktiveni tanlang</option>

                        <option value="1">active</option>

                        <option value="0">no active</option>

                    </select>
                    @error('is_active')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Rasm
                    </label>
                    <input type="file"  name="images" value="{{ $annoucement->images }}"   class=" input w-full border mt-2" >
                    @error('images')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div><br>
                <div class="w-full col-span-12 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Text
                    </label><br>
                    <form method="post"> <textarea data-feature="all" class="summernote" name="descriptions">{{ $annoucement->descriptions }}</textarea> </form> 
                    @error('descriptions')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

            </div>
        </form><br>
        <div class="px-5 pb-5 text-center">
            <a href="{{ route('xodimlar.index') }}"  class="button delete-cancel w-32 border text-gray-700 mr-1">
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