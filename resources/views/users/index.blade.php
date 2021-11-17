<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('User') }}
    </h2>
  </x-slot>

  <div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="py-2">
        <a href="{{ route('users.create') }}" class="btn btn-success">
          + Create User
        </a>
      </div>
      <div class="bg-white">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Roles</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse($user as $item)
            <tr>
              <td>{{ $item->id }}</td>
              <td>{{ $item->name }}</td>
              <td>{{ $item->email }}</td>
              <td>{{ $item->roles }}</td>
              <td class="d-flex">
                <a href="{{ route('users.edit', $item->id) }}" class="inline-block btn btn-primary">
                  Edit
                </a>
                <form action="{{ route('users.destroy', $item->id) }}" method="POST" class="inline-block">
                  {!! method_field('delete') . csrf_field() !!}
                  <button type="submit" class="btn btn-danger ml-2">
                    Delete
                  </button>
                </form>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="6" class="border text-center p-5">
                Data Tidak Ditemukan
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <div class="text-center mt-5">
        {{ $user->links() }}
      </div>
    </div>
  </div>
</x-app-layout>