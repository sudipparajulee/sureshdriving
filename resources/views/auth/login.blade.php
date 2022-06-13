<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="font-[Poppins] text-gray-600 bg-gray-100">
    <div class="grid lg:grid-cols-2 relative">
        <div class="hidden lg:block">
            <img src="https://i.pinimg.com/736x/ec/fb/9f/ecfb9ffd184bceec03b3c19161eee7fd.jpg" alt="" class="h-screen object-cover w-full">
            <img src="{{ asset('images/logo.png') }}" alt="" class="w-52 mx-auto my-auto absolute top-0 bottom-0 right-0 left-0">
        </div>
        <div class="bg-gray-100 flex justify-center items-center h-screen">
            <div class="xl:mx-52 mx-4">
                <a href="" class="font-bold absolute top-2 left-2">&LeftArrow; Home</a>
            <img src="{{ asset('images/logo.png') }}" alt="" class="w-24 mx-auto mt-7">
            <h2 class="text-center font-bold text-2xl">Let's Login</h2>

            <div class="my-6">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="text-center text-gray-800">
                        <input type="email" name="email" value="{{old('email')}}" placeholder="Enter Email" class="outline-none block mx-auto mt-4 border focus:border-2 focus:border-b-transparent focus:border-r-transparent border-blue-400 rounded-lg placeholder:text-gray-400 p-3">
                        @error('email')
                            <p class="text-red-400 px-4">
                                {{$message}}
                            </p>
                        @enderror

                        <input type="password" name="password" placeholder="Password" class="outline-none block mx-auto mt-4 border focus:border-2 focus:border-b-transparent focus:border-r-transparent border-blue-400 rounded-lg placeholder:text-gray-400 p-3">
                        @error('password')
                            <p class="text-red-400 px-4">
                                {{$message}}
                            </p>
                        @enderror


                        <input type="submit" class="bg-indigo-600 text-white mt-6 px-4 py-2 rounded-lg cursor-pointer hover:bg-indigo-700">
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</body>
</html>