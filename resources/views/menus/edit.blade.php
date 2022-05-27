<x-app-layout>
    <form action="{{ route('menus.update', $menu) }}" method="POST">
        @method('PUT')
        @csrf

        <label for="name">Name</label>
        <input id="name" type="text" name="name" value="{{ $menu->name }}">
        <input type="submit" value="Update">
    </form>
</x-app-layout>
