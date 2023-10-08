<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("You're logged in as admin!") }} --}}

                    <table class="table">
                        <tr>
                            <th>id</th>
                            <th>user</th>
                            <th>view</th>
                        </tr>

                        @foreach ($users as $user)
                            <tr>
                                <th>{{$loop->index+1}}</th>
                                <th>{{$user->name}}</th>
                                <th>
                                        <form action="{{route('User.destroy',$user->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger ml-1">del</button>
                                        </form>

                                </th>
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
