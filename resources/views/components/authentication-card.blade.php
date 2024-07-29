<div class="h-screen bg-[url('{{ asset('/images/inventory.jpg') }}')] bg-cover bg-center">
    <div class="fixed top-0 bottom-0 left-0 right-0 bg-[rgba(0,0,0,0.6)] flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="flex flex-row justify-center mb-2">
                <div class="border p-3 rounded-md border-gray-600">
                    <h2 class="text-3xl text-orange-700">EdsoInv</h2>
                </div>
                {{-- {{ $logo }} --}}
            </div>

            <h4 class="text-2xl">Login</h4>

            <p class="text-gray-600">Please enter your login credentials</p>

            <div class="mt-2">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
