@extends("layouts.admin")
@section("content")
<div class="flex justify-between align-center mt-10">

<h2 class="intro-y text-lg font-medium">Role : {{ $role->name }} </h2>

@can('create user')
    <a href="{{ url('roles') }}" class="button w-24 bg-theme-1 text-white">
        Orqaga
    </a>
@endcan
</div>
@if (session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
@endif

<div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2" style="background: white;
padding: 20px 20px;
border-radius: 20px">
<div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
    <form id="science-paper-create-form" method="POST" action="{{ url('roles/'.$role->id.'/give-permissions') }}"
        class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-12 gap-2">
            @foreach ($permissions as $permission)
            <div class="w-full col-span-2">
                        <label>
                            <input
                                type="checkbox"
                                name="permission[]"
                                value="{{ $permission->name }}"
                                {{ in_array($permission->id, $rolePermissions) ? 'checked':'' }}
                            />
                            {{ $permission->name }}
                        </label>
                </div>
                    @endforeach

        </div><br>
    </form><br>
    <div class="px-5 pb-5 text-center">
        <a href="{{ url('roles') }}"  class="button delete-cancel w-32 border text-gray-700 mr-1">
            Bekor qilish
        </a>
        <button type="submit" form="science-paper-create-form" class="update-confirm button w-24 bg-theme-1 text-white">
            Qo'shish
        </button>
    </div>
</div>

</div><br>

@endsection
