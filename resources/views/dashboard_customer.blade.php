<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{route('order.create')}}" class="btn btn-outline-success mb-2">create</a>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Product</th>
                            <th>Kg</th>
                            <th>Delete</th>
                        </tr>
                        @foreach ($orders as $order)
                        <tr>
                            <th>{{$loop->index+1}}</th>
                            <th>{{$order->user->name}}</th>
                            <th>{{$order->product->name}}</th>
                            <th>{{$order->kg}}</th>
                            <th>
                                <form action="{{route('order.delete',$order->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-outline-danger btn"> del</button>
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

