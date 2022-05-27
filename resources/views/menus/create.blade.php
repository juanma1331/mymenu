<x-app-layout>
    <form action="{{ route('menus.store') }}" method="POST">
        @csrf

        <label for="name">Name</label>
        <input id="name" type="text" name="name">
        <input type="submit" value="Create">
    </form>
</x-app-layout>
