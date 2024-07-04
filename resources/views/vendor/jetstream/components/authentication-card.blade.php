<x-app-layout>

<style>

.header {
  height: 100vh;
  background-image: linear-gradient(
    to right bottom, rgb(43, 83, 57), 
    rgba(64, 38, 17, 0.8)),
    url('');
  background-size: cover;
  bacground-position: center;
  position: relative;
}


</style>

<div class="header">
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
    <div>
        <img class= "" src="logoAgro.png" width="190px">
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
</div>
</x-app-layout>
