<div>
    <div>
        <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex">
                    <div class="d-flex">
                        <p class="rounded bg-danger m-0 d-flex align-self-center p-2 text-white">{{$orders->total()}} </p>
                        <h1 class="m-0"> | Orders | </h1>
                    </div>
                </div>
                <div class="d-flex">
                    <a href="{{route('orders.index')}}" class="btn btn-primary m-2 rounded-pill">All Orders</a>
                </div>
            </div>
        </div>
        <table class="table table-striped shadow-lg p-3 mb-5 bg-body-tertiary rounded">
            <thead>
            <tr>
                <th>Id</th>
                <th>User</th>
                <th>Status</th>
                <th>Payment Intend</th>
                <th>Price</th>
                <th>Number of Products</th>
                <th>Created At</th>
                <th>actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->user->name}}</td>
                    <td class="@if($order->status == 'unpaid') text-danger @else text-success @endif" >{{$order->status}}</td>
                    <td>{{$order->payment_intent}}</td>
                    <td>&euro;{{$order->total_price}}</td>
                    <td>{{$order->products->count()}}</td>
                    <td>{{$order->created_at}}</td>
                    <td><a href="{{route('orders.show',$order->id)}}"><i class="fa-solid fa-eye"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $orders->links() }}
    </div>

</div>
