<x-layout>
    <h1>Display all password of {{ $category->name }}</h1>

    <div class="container-fluid">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Password Id</th>
                    <th scope="col">Added By</th>
                    <th scope="col">Email</th>
                    <th scope="col">URL</th>
                    <th scope="col">Remarks</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                @isset($passwords)
                    @foreach ($passwords as $password)
                        <tr>
                            <td scope="col">{{ $password->id }} </td>
                            <td scope="col">{{ $password->user->name }}</td>
                            <td scope="col">{{ $password->email }}</td>
                            <td scope="col">{{ $password->url }}</td>
                            <td scope="col">{{ $password->remarks }}</td>
                            <td scope="col">{{ $password->category->name }}</td>

                            <td scope="col" class="d-flex">

                                <a href="/passwords/show/{{ $password->id }} " class="btn btn-primary">View</a>

                                <a href="/passwords/update/{{ $password->id }} " class="btn btn-primary mx-3">Edit</a>

                                <form action="/passwords/delete/{{ $password->id }} " method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger mx-3" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endisset()

            </tbody>
        </table>
</x-layout>
