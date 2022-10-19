<x-layout>

    <div class="container-fluid">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">URL</th>
                    <th scope="col">Remarks</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                @isset($password)
                    <tr>
                        <td scope="col">{{ $password->email }}</td>
                        <td scope="col">{{ Crypt::decryptString($password->password) }}</td>
                        <td scope="col">{{ $password->url }}</td>
                        <td scope="col">{{ $password->remarks }}</td>

                        <td scope="col" class="d-flex">

                            <a href="/passwords/update/{{ $password->id }} " class="btn btn-primary mx-3">Edit</a>

                            @if (auth()->user()->hasRole('Super-Admin') || auth()->user()->hasRole('admin'))
                                <form action="/passwords/delete/{{ $password->id }} " method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger mx-3" type="submit">Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endisset()

            </tbody>
        </table>
</x-layout>
