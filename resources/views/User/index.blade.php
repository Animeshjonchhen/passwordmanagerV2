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
                    @can('update user')
                        <th scope="col">Action</th>
                    @endcan
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row"> {{ $user->id }} </th>
                        <td> {{ $user->name }} </td>
                        <td> {{ $user->email }} </td>
                        @can('update user')
                            <td class="d-flex">
                                <a href="/users/update/{{ $user->id }}" class="flex btn btn-primary"> Edit</a>

                                @can('delete user')
                                    <form action="/users/delete/{{ $user->id }}" method="post" class="flex">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger mx-3">Delete</button>
                                    </form>
                                @endcan
                            </td>
                        @endcan
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
