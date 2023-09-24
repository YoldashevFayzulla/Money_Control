<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="width: 700px">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    <center>
                    {{ __("You're logged in as customer!") }}
                    </center>
                    <br>
                    <br>

                <form action="{{route('order.store')}}" method="post">
                    @csrf


                    <input type="hidden" name= "user_id"value="{{auth()->user()->id}}">
                   
                    <x-input-label>mahsulotlar va narxlari</x-lable-input>
                   
                        <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm form-control" name="product_id">
                        @foreach ( $products as $product )
                            <option value="{{$product->id}}"> {{$product->name   }}  '='  {{$product->price}} </option>
                        @endforeach                 
                    </select>


                    
                    <br>
                   
                    <x-input-label for='kg'>kilogram</x-lable-input>
                   
                    <input type="text" id="kg"name="kg" class=" border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">   

                    
                    <button class="btn btn-warning m-4" type="submit">yuborish</button>
                </form>

                    


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
