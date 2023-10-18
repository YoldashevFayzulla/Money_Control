    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Orders') }}
            </h2>
        </x-slot>



        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <form action="{{ url('/generate-pdf') }}" method="GET">
                            @csrf
                            <button type="submit" class="btn text-dark btn-success">Generate PDF</button>
                        </form>

{{--                         {{ __("You're logged in as users!") }}--}}

                        <table class="table">
                        <tr>
                            <th>id</th>
                            <th>user</th>
                            <th>view</th>
                        </tr>

                        @foreach ($orders as $order)
                        <tr>
                            <th>{{$loop->index+1}}</th>
                            <th>{{$order->user->name}}</th>
                            <th>

                                <div class="d-flex">
                                {{-- view modal --}}
                                <button class="btn btn-outline-primary mr-1"   data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$order->id}}"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                </svg></button>

                                <div class="modal" id="staticBackdrop{{$order->id}}" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header ">
                                            <h1>Orders</h1>
                                        </div>
                                        <div class="modal-body">

                                            <h2>{{$order->user->name}}</h2>
                                            {{$order->kg.'   '}} kilo
                                            {{$order->product->name}}

                                        </div>
                                    </div>
                                    </div>
                                </div>

                                <form action="{{route('order.delete',$order->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger ml-1">del</button>
                                </form>
                            </div>

                            </th>
                        </tr>
                        @endforeach

                    </table>
                    </div>
{{--                    {{$orders->links()}}--}}
                </div>


{{--                <div style="width: 50%">--}}
{{--                    {!! $salesChart->container() !!}--}}
{{--                </div>--}}


            </div>
        </div>
    </x-app-layout>
