<div>

    
    <div class="py-12 rounded-md">
        <div class="w-11/12 mx-auto sm:px-6 lg:px-8">
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
                    class="ml-72 my-4 inline-flex justify-center w-1/2 rounded border border-transparent px-4 py-2 bg-gray-700 text-base font-bold text-white shadow-sm hover:bg-red-700">
                    Create A Package
                </button>
                @if($isModalOpen)
                @include('livewire.create-package')
                @endif
                <table class="table-fixed rounded w-full">
                    <thead class="text-center">
                        <tr class="bg-gray-400">
                            <th class="px-4 py-2 w-20">No.</th>
                            <th class="px-4 py-2">Member's Name</th>
                            <th class="px-4 py-2">Package Type</th>
                            <th class="px-4 py-2">Weight of Package</th>
                            <th class="px-4 py-2">Shipper</th>
                            <th class="px-4 py-2">Shipping Address</th>
                            <th class="px-4 py-2">Estimated Cost</th>
                            <th class="px-4 py-2">Tracking Number</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($goods as $good)
                        <tr>
                            <td class="border px-4 py-2">{{ $good->id }}</td>
                            <td class="border px-4 py-2">{{ $good->member_id }}</td>
                            <td class="border px-4 py-2">{{ $good->type }}</td>
                            <td class="border px-4 py-2">{{ $good->weight }}</td>
                            <td class="border px-4 py-2">{{ $good->shipper }}</td>
                            <td class="border px-4 py-2">{{ $good->shipper_address }}</td>
                            <td class="border px-4 py-2">{{ $good->estimated_cost }}</td>
                            <td class="border px-4 py-2">{{ $good->tracking_id }}</td>
                            <td class="border px-4 py-2">
                                <button wire:click="edit({{ $good->id }})"
                                    class="flex px-4 py-2 bg-blue-600 hover:bg-blue-500 text-gray-900 cursor-pointer rounded">Update</button>
                                <button wire:click="delete({{ $good->id }})"
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

                {{ $goods->links() }}

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
