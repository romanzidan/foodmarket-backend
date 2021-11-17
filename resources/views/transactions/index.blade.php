<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaction') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Food</th>
                            <th scope="col">User</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transaction as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->food->name }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->total) }}</td>
                            <td>{{ $item->status }}</td>
                            <td class="d-flex">
                                <a href="{{ route('transactions.show', $item->id) }}" class="inline-block btn btn-info">
                                    View
                                </a>
                                <form action="{{ route('transactions.destroy', $item->id) }}" method="POST"
                                    class="inline-block">
                                    {!! method_field('delete') . csrf_field() !!}
                                    <button type="submit" class="btn btn-danger ml-2">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="border text-center p-5">
                                Data Tidak Ditemukan
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-5">
                {{ $transaction->links() }}
            </div>
        </div>
    </div>
</x-app-layout>