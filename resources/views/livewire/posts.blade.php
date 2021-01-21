<div>
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8 mt-5">
                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <button wire:click="showModal()" class="bg-green-400 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                  
                    Create Posts
                </button>
                @if($isOpen)
                        @include('livewire.create')
                    @endif
                    <table class="table-fixed w-full">
                        <thead class="bg-blue-100">
                            <tr>
                                <th class="px-4 py-2">No</th>
                                <th class="px-4 py-2">Title</th>
                                <th class="px-4 py-2">Description</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <!-- melakukan fungsi perulangan untuk get data -->
                        <!-- variable $posts disini yaitu variable yang telah di buat di
                            controllers
                         -->
                        @foreach($posts as $post)
                            <tr>
                                <td class="px-4 py-2">{{$post->id}}</td>
                                <td class="px-4 py-2">{{$post->title}}</td>
                                <td class="px-4 py-2">{{$post->description}}</td>
                                <td class="px-4 py-2">
                                <button wire:click="edit({{$post->id}})" class="bg-blue-400 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Edit
                                </button>
                                <button wire:click="delete({{$post->id}})" class="bg-red-400 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Delete
                                </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

              
            </div>
</div>
