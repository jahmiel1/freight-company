<x-app-layout>


    {{-- <div id="container">
        <input type="text" id="input">
        <button id="kg">Convert to (Kg)</button><button id="pound">Convert to (Pound)</button>
        <input type="text" id="output">
    </div> --}}


    <div id="container" class="mx-auto flex w-3/6 justify-between rounded-md bg-gray-500 mt-15">
        <input type="text" id="input" class="bg-blue-300 w-28 text-black ml-5">
        <button class="bg-red-500 p-2 rounded-md" id="kg">Convert to (Kg)</button><button
            class="bg-red-500 p-2 rounded-md" id="pound">Convert to (Pound)</button>
        <input type="text" id="output" class="bg-blue-300 w-48 text-black mr-5">
    </div>

    <div class="mt-10 mx-auto pl-10 ml-96">
        <div class="flex flex-wrap -mx-6">
            <button>

                <a class="m-2 py-1.5 px-3 bg-blue-700 hover:bg-blue-600 rounded text-white" href="/dashboard">Back</a>

            </button>
        </div>
    </div>

    <script src="{{ asset('js/convert.js') }}" defer></script>

</x-app-layout>
