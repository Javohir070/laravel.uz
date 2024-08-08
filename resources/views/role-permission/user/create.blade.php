@extends("layouts.admin")
@section("content")
<div class="flex justify-between align-center mt-10">

    <h2 class="intro-y text-lg font-medium">Users qo'shish </h2>

    @role('admin')
        <a href="/" class="button w-24 bg-theme-1 text-white">
            Orqaga
        </a>
    @endrole
    @role('super-admin')
        <a href="{{ url('users') }}" class="button w-24 bg-theme-1 text-white">
            Orqaga
        </a>
    @endrole
</div>


<div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2" style="background: white;
    padding: 20px 20px;
    border-radius: 20px">
    <!-- @if ($errors->any())
        <ul class="alert alert-warning">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif -->
    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
        <form id="science-paper-create-form" method="POST" action="{{ url('users') }}"
            class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
            @csrf
            <div class="grid grid-cols-12 gap-2">
                @role('super-admin')
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Tashkilotga mas'ul shaxs F.I.Sh
                        </label>
                        <input type="text" name="name" class="input w-full border mt-2" required="" >
                    </div>
                @endrole
                 @role('admin')
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Tashkilot malumotlar to'ldirish uchun mas'ul shaxs F.I.Sh
                        </label>
                        <input type="text" name="name" class="input w-full border mt-2" >
                    </div>
                  @endrole  
                    @role('admin1212')
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Xodimlar
                        </label>
                        <select name="name" class="input border w-full mt-2" >
                            <option value=""> Xodimlar tanlash</option>
                            @foreach ($xodimlar as $role)
                                <option value="{{ $role->fish }}">{{ $role->fish }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endrole
                    
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Email
                        </label>
                        <input type="email" name="email" class="input w-full border mt-2" required="">
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Password
                        </label>
                        <input type="text" name="password" class="input w-full border mt-2" required="">
                    </div>
                    @error('password')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Role
                        </label>
                        <select name="roles[]" class="input border w-full mt-2" required="">
                            <option value=""> Role tanlash</option>
                            @role('admin')
                                @foreach ($roles as $role)
                                @if ($role !== 'super-admin' && $role !== 'admin' && $role !== 'Itm-tashkilotlar')
                                    <option value="{{ $role }}">{{ $role }}</option>
                                @endif
                                @endforeach
                            @endrole
                            @role('super-admin')
                                @foreach ($roles as $role)
                                @if ($role !== 'super-admin')
                                    <option value="{{ $role }}">{{ $role }}</option>
                                @endif
                                @endforeach
                            @endrole
                        </select>
                        @error('roles')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    @role('super-admin')
                        <div class="w-full col-span-6">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tashkilotni tanlash
                            </label>
                            <input type="text" id="search" placeholder="Search..." class="input border w-full mt-2">
                            <select name="tashkilot_id" id="science-search-category" class="input border w-full mt-2" required="">
                                <option value="">Tashkilotni tanlash</option>
                                @foreach ($tashkilots as $tashkilot)
                                    <option value="{{ $tashkilot->id }}">{{ $tashkilot->name }}</option>
                                @endforeach
                            </select>
                            @error('tashkilot_id')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    @endrole
                    @role('admin')
                        <input type="hidden" name="tashkilot_id" value="{{ auth()->user()->tashkilot->id }}">
                    @endrole      
            </div><br>
        </form><br>
        <div class="px-5 pb-5 text-center">
            <a href="#"  class="button delete-cancel w-32 border text-gray-700 mr-1">
                Bekor qilish
            </a>
            <button type="submit" form="science-paper-create-form" class="update-confirm button w-24 bg-theme-1 text-white">
                Qo'shish
            </button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var searchInput = document.getElementById('search');
        var select = document.getElementById('science-search-category');
        
        searchInput.addEventListener('keyup', function() {
            var filter = searchInput.value.toLowerCase();
            for (var i = 0; i < select.options.length; i++) {
                var option = select.options[i];
                var text = option.text.toLowerCase();
                option.style.display = text.includes(filter) ? '' : 'none';
            }
        });
    });
    </script>
@endsection