<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Document</title>
</head>

<body>
    <div class="px-10 mx-auto mt-8">
        <div class="flex justify-between">
            <h2 class="text-red-500">Home</h2>
            <a href="/" class="bg-green-600 text-white px-2 py-1 rounded">
                Back to home
            </a>
        </div>

        <div class="max-w-md mx-auto mt-10">
            <form method="POST" action="{{ route('store') }}">
                @csrf
                <div class="flex flex-col gap-5">
                    <label for="">Name</label>
                    <input type="text" name="name" placeholder="Name"
                        class="border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    @error('name')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                    
                    <label for="">Description</label>
                    <input type="text" name="description" placeholder="Description"
                        class="border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    @error('description')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                    <label for="">Select Image</label>
                    <input type="file" name="image"
                        class="border border-gray-300 rounded px-4 py-2 file:bg-blue-600 file:text-white file:px-4 file:py-2 file:rounded file:border-0" />
                    @error('image')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                    <input type="submit" value="Submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded w-32 hover:bg-blue-700 transition-all duration-200 cursor-pointer" />
                </div>
            </form>
        </div>

    </div>
</body>

</html>