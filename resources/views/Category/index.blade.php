<x-layout>
    <div class="mt-3">
        <a href="/categories/create" class="container">Create new Category</a>
    </div>

    <div class="container-fluid">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Category Id</th>
                    <th scope="col">Category Name</th>
                    @can('update category')
                        <th scope="col">Action</th>
                    @endcan
                </tr>
            </thead>

            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th scope="row"> {{ $category->id }} </th>
                        <td>
                            <a href="/categories/show/{{ $category->id }}">
                                {{ $category->name }}
                            </a>
                        </td>

                        @can('update category')
                            <td class="d-flex">
                                <a href="/update/category/{{ $category->id }}" class="flex btn btn-primary"> Edit</a>

                                @can('delete category')
                                    <form action="/delete/category/{{ $category->id }}" method="post" class="flex">
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
