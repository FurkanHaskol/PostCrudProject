<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <button class="py-2 px-4 rounded">
                <a href="{{ route('post.create') }}">
                    Create Post
                </a>
            </button>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100">
                <table class="table" id="datatable">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>                                  
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->description}}</td>
                                    <td>{{$post->category->name}}</td>
                                <td>
    <div class="flex space-x-2">             
         <form action="{{ route('post.edit', ['id' => $post->id]) }}" method="GET" style="display:inline;">
            @csrf
            <button type="submit">Edit</button>
        </form>
        <form action="{{ route('post.delete', ['id' => $post->id]) }}" method="POST" style="display:inline;">
            @csrf
            @method('post')
            <button type="submit" onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
        </form>
    </div>
</td>

                                </tr>
                                @endforeach
                            </tbody>
                </table>
                 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
        });
    </script>