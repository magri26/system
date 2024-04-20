<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>System | Login</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <!-- component -->
<div class="bg-gray-100 flex justify-center items-center h-screen">
  <!-- Left: Image -->
<div class="w-1/2 h-screen hidden lg:block">
  <img src="img/6209999.jpg" alt="Placeholder Image" class="object-cover w-full h-full">
</div>
<!-- Right: Login Form -->
<div class="lg:p-36 md:p-52 sm:20 p-8 w-full lg:w-1/2">
<h1 class="text-2xl font-semibold mb-4">Inicie sesión</h1>
<form method="POST" action="{{ route('login') }}">
  @csrf
  <!-- Username Input -->
  <div class="mb-4">
    <label for="email" class="block text-gray-600">Usuario</label>
    <input type="text" id="email" name="email" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" autocomplete="off">
    @if ($errors->has('email'))
    <span class="text-danger">{{ $errors->first('email') }}</span>
    @endif
  </div>
  <!-- Password Input -->
  <div class="mb-4">
    <label for="password" class="block text-gray-600">Contraseña</label>
    <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" autocomplete="off">
    @if ($errors->has('password'))
    <span class="text-danger">{{ $errors->first('password') }}</span>
    @endif
  </div>
  <!-- Remember Me Checkbox -->
  <div class="mb-4 flex items-center">
    <input type="checkbox" id="remember" name="remember" class="text-blue-500">
    <label for="remember" class="text-gray-600 ml-2">Recuerdame</label>
  </div>
  <!-- Forgot Password Link -->
  <div class="mb-6 text-blue-500">
    <a href="#" class="hover:underline">¿Olvidaste tu contraseña?</a>
  </div>
  <!-- Login Button -->
  <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-md py-2 px-4 w-full">Iniciar sesión</button>
</form>
<!-- Sign up  Link -->
<div class="mt-6 text-blue-500 text-center">
  <a href="#" class="hover:underline">Registrate aquí</a>
</div>
</div>
</div>
</body>
</html>