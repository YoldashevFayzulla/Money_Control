<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="width: 950px">
            <button class="btn btn-outline-success mb-3">create</button>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2 text-gray-900">
                
                    <table class="table-hover table">
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>action</th>
                        </tr>
                        @foreach ($products as $product)
                            
                        <tr>

                            <th>{{$loop->index+1}}</th>
                            <th>{{$product->name}}</th>
                            <th>
                            <div class="d-flex">
                                <a class="btn btn-outline-warning m-1" href="{{'Products.edit'}}">edit</a>
                                <form action="{{route('Products.destroy',$product->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger m-1">delete</button>  
                                </form>
                            </div>
                            </th>   

                        </tr>

                        @endforeach

                    </table>
            
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
