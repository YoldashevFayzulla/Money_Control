<!DOCTYPE html>
<html>
<head>
<style>
#customers {
font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Orders</h1>
<h1>{{today()}}</h1>

<table id="customers">
  <tr>
    <th>id</th>
    <th>name</th>
    <th>produce</th>
    <th>kg</th>
      <th>time</th>
  </tr>
  @foreach($orders as $order)
  <tr>
      <td>{{$loop->index+1}}</td>
    <td>{{$order->user->name}}</td>
    <td>{{$order->product->name}}</td>
    <td>{{$order->kg}}</td>
    <td>{{$order->created_at}}</td>
  </tr>
    @endforeach
</table>

</body>
</html>
