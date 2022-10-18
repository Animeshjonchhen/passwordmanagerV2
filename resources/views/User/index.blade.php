<x-layout>
    Display all users.
    <div class="mt-3">
        <a href="/users/create" class="container">Create new user</a>
    </div>

    <div class="container-fluid">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">User Id</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row"> {{ $user->id }} </th>
                        <td> {{ $user->name }} </td>
                        <td> {{ $user->email }} </td>
                        <td class="d-flex">

                            <a href="/users/update/{{ $user->id }}" class="flex btn btn-primary"> Edit</a>

                            <form action="/users/delete/{{ $user->id }}" method="post" class="flex">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger mx-3">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
