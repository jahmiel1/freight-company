<div>

    @livewire('tracking-search-bar')

     {{-- <div class="flex items-center ml-10 mt-5">
                    <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </button>
    
                    <div class="relative mx-4 lg:mx-0">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                            <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </svg>
                        </span>
    
                        <input class="form-input w-32 sm:w-64 rounded-md pl-10 pr-4 focus:border-indigo-600" type="text"
                            placeholder="Search via Tracking Number">
                    </div>
                </div> --}}
    
    <div class="py-12 rounded-md">
        <div class="w-4/6 mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-300 overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                    role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
                @endif
                <button wire:click="create()"
                    class="ml-52 my-4 inline-flex justify-center w-1/2 rounded-md border border-transparent px-4 py-2 bg-gray-700 text-base font-bold text-white shadow-sm hover:bg-red-700">
                    Create Tracking
                </button>
                @if($isModalOpen)
                @include('livewire.create-tracking')
                @endif
                <table class="table-fixed rounded w-full">
                    <thead class="text-center">
                        <tr class=" bg-gray-400">
                            <th class="px-4 py-2 w-20">No.</th>
                            <th class="px-4 py-2">Member's Name</th>
                            <th class="px-4 py-2">Tracking Number</th>
                            <th class="px-4 py-2">Package ID</th>
                            <th class="px-4 py-2">Branch ID</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($trucks as $truck)
                        <tr>
                            <td class="border px-4 py-2">{{ $truck->id }}</td>
                            <td class="border px-4 py-2">{{ $truck->member_id }}</td>
                            <td class="border px-4 py-2">{{ $truck->tracking_number }}</td>
                            <td class="border px-4 py-2">{{ $truck->package_type }}</td>
                            <td class="border px-4 py-2">{{ $truck->branch_name }}</td>
                            <td class="border px-4 py-2">
                                <button wire:click="edit({{ $truck->id }})"
                                    class="flex px-4 py-2 bg-blue-600 hover:bg-blue-500 text-gray-900 cursor-pointer rounded">Update</button>
                                <button wire:click="delete({{ $truck->id }})"
                                    class="mt-2 flex px-4 py-2 bg-red-600 hover:bg-red-500 text-gray-900 cursor-pointer rounded">Delete</button>
                            </td>
                        </tr>

                        @empty
                            
                        <tr>

                            <td colspan="5" class="text-center px-4 py-2">This table is <strong class="text-bold text-red-600">Empty</strong> !!!</td>
                        

                        </tr>


                        @endforelse

                    </tbody>
                    
                </table>

                {{-- {{ $goods->links() }} --}}

                <div class="mt-4 pl-10 ml-64">
                    <div class="flex flex-wrap -mx-6">
                        <button>
                            
                            <a class="m-2 py-1.5 px-3 bg-blue-700 hover:bg-blue-600 rounded text-white" href="/dashboard">Back</a>

                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>
