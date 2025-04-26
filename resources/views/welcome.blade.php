<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/tailwindcss">
        @layer utilities {
      .container {
        @apply px-10 mx-auto;
      }
    }
    </style>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="flex justify-between">
            <h2 class="text-red-500">Home</h2>
            <a href="/create" class="bg-green-600 text-white px-2 py-1 rounded">
                Add New Post
            </a>
        </div>
    </div>
</body>

</html>