<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-200 p-4">
    <div class="lg:w-2/4 mx-auto py-8 px-6 bg-white rounded-xl">
        <h1 class="font-bold text-5xl text-center mb-8">
            TodoApp

        </h1>
        <div class="mb-6">
            <form class="flex flex-col space-y-4" method="POST" action="/">
                @csrf
                <input type="text" name="title" placeholder="Todo Title" class="py-3 px-4 bg-gray-100 rounded-xl">

                <textarea name="description"placeholder="description" class="py-3 px-4 bg-gray-100 rounded-xl"></textarea>

                <button class="w-28 py-4 px-8 bg-green-500 text-white rounded-xl">Add</button>
            </form>

        </div>
        <div class="mt-2">
            @foreach ($todos as $todo)
                <div class="py-4 flex items-center border-b border-gray-300 px-3 @class(['bg-green-200' => $todo->completed])">
                    <div class="flex-1 pr-8">
                        <h3 class="text-lg font-semibold">
                            {{ $todo->title }}
                        </h3>
                        <p class="text-gray-500">{{ $todo->description }}</p>
                    </div>
                    <div class="flex space-x-3">
                        <form method="POST" action="/{{ $todo->id }}">
                            @csrf
                            @method('PATCH')
                            {{-- add heroicons here --}}
                            <button class="py-2 px-2 bg-green-500 text-white rounded-xl">
                                check
                            </button>
                        </form>
                        <form method="POST" action="/{{ $todo->id }}">
                            @csrf
                            @method('DELETE')
                            <button class="py-2 px-2 bg-red-500 text-white rounded-xl">
                                delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
</body>

</html>
