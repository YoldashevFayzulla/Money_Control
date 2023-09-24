<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="width: 950px">
            <button class="btn btn-outline-success mb-3"  data-bs-toggle="modal" data-bs-target="#createModal" data-bs-whatever="@mdo">create</button>
        {{-- create modal--}}
            <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">create</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action="{{route('Products.store')}}" method="post">
                        @csrf

                        <div class="mb-3">
                        <label for="recipient-name"  class="col-form-label">Product`s Name:</label>
                        <input type="text" name="name" class="form-control" id="recipient-name">
                        </div>
                        
                        <div class="mb-3">
                        <label for="recipient"  class="col-form-label">Product`s Price:</label>
                        <input type="text" name="price" class="form-control" id="recipient">
                        </div>

                        <button type="button" class="btn btn-secondary text-black" data-bs-dismiss="modal">Close</button> 
                        <button type="submit" class="btn btn-primary text-black">save data</button>
                    </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
                </div>
            </div>
            {{-- end modal --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2 text-gray-900">
                
                    <table class="table-hover table">
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>price</th>
                            <th>action</th>
                        </tr>
                        @foreach ($products as $product)
                            
                        <tr>

                            <th>{{$loop->index+1}}</th>
                            <th>{{$product->name}}</th>
                            <th>{{$product->price}}</th>
                            <th>
                            <div class="d-flex">
                                <button class="btn btn-outline-success mb-1"  data-bs-toggle="modal" data-bs-target="#editModal{{$product->id}}" data-bs-whatever="@mdo">edit</button>
                                {{-- edit modal--}}
                                    <div class="modal fade" id="editModal{{$product->id}}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel"> edit</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="{{route('Products.update',$product->id)}}" method="post">
                                                @csrf
                                                @method('PUT')

                                                <div class="mb-3">
                                                <label for="recipien"  class="col-form-label">Product`s Name:</label>
                                                <input type="text" name="name" class="form-control" id="recipien" value="{{$product->name}}">
                                                </div>

                                                <div class="mb-3">
                                                <label for="recipientl"  class="col-form-label">Product`s price:</label>
                                                <input type="text" name="price" class="form-control" id="recipientl" value="{{$product->price}}">
                                                </div>
                                                
                                                <button type="button" class="btn btn-secondary text-black" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary text-black">save data</button>
                                            </form>
                                            </div>
                                            <div class="modal-footer">
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    {{-- end modal --}}
                                    
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
