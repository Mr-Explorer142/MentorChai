<x-layout>
    <h1>Student Dashbord Page</h1>
    <div class="flex flex-col justify-center items-center min-h-screen">
        <h1 class="text-2xl font-bold my-5">Hello, {{ Auth::user()->name }} 👋</h1>
        <p class="mb-2 text-lg font-semibold">ID : {{ Auth::user()->id }}</p>
        <p class="mb-2 text-lg font-semibold">Email: {{ Auth::user()->email }}</p>
        <p class="mb-2 text-lg font-semibold">Role : {{ Auth::user()->role }}</p>
    </div>
</x-layout>
