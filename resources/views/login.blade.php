@extends('products.layout')

@section('content')
<form action="{{ url('login') }}" method="POST">
    @csrf
    <div class="mb-10">
        @if($errors->any())
        <div class="bg-red-200 p-3">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="mb-5">
            <label for="email" class="block">Email: </label>
            <input
                type="text"
                id="email"
                name="email"
                class="border border-gray-300 p-1"
            />
        </div>
        <div class="mb-5">
            <label for="password" class="block">Password: </label>
            <input
                type="password"
                name="password"
                id="password"
                class="border border-gray-300 p-1"
            />
        </div>

        <div class="mb-5">
          <label for="remember" class="block">
            <input type="checkbox" name="remember" id="remmeber"> Remember Me
          </label>
        </div>

        <button type="submit" class="rounded bg-blue-800 text-white px-4 py-2">
            Log in
        </button>
    </div>
</form>
@endsection
