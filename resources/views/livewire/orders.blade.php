<div>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');body{background-color:
        #eeeeee;font-family: 'Open Sans',serif}.container{margin-top:50px;margin-bottom: 50px}.card{position: relative;display:
        -webkit-box;display: -ms-flexbox;display: flex;-webkit-box-orient: vertical;-webkit-box-direction:
        normal;-ms-flex-direction: column;flex-direction: column;min-width: 0;word-wrap: break-word;background-color:
        #fff;background-clip: border-box;border: 1px solid rgba(0, 0, 0, 0.1);border-radius:
        0.10rem}.card-header:first-child{border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0}.card-header{padding:
        0.75rem 1.25rem;margin-bottom: 0;background-color: #fff;border-bottom: 1px solid rgba(0, 0, 0, 0.1)}.track{position:
        relative;background-color: #ddd;height: 7px;display: -webkit-box;display: -ms-flexbox;display: flex;margin-bottom:
        60px;margin-top: 50px}.track .step{-webkit-box-flex: 1;-ms-flex-positive: 1;flex-grow: 1;width: 25%;margin-top:
        -18px;text-align: center;position: relative}.track .step.active:before{background: #FF5722}.track .step::before{height:
        7px;position: absolute;content: "";width: 100%;left: 0;top: 18px}.track .step.active .icon{background: #ee5435;color:
        #fff}.track .icon{display: inline-block;width: 40px;height: 40px;line-height: 40px;position: relative;border-radius:
        100%;background: #ddd}.track .step.active .text{font-weight: 400;color: #000}.track .text{display: block;margin-top:
        7px}.itemside{position: relative;display: -webkit-box;display: -ms-flexbox;display: flex;width: 100%}.itemside
        .aside{position: relative;-ms-flex-negative: 0;flex-shrink: 0}.img-sm{width: 80px;height: 80px;padding: 7px}ul.row,
        ul.row-sm{list-style: none;padding: 0}.itemside .info{padding-left: 15px;padding-right: 7px}.itemside .title{display:
        block;margin-bottom: 5px;color: #212529}p{margin-top: 0;margin-bottom: 1rem}.btn-warning{color:
        #ffffff;background-color: #ee5435;border-color: #ee5435;border-radius: 1px}.btn-warning:hover{color:
        #ffffff;background-color: #ff2b00;border-color: #ff2b00;border-radius: 1px}
    </style>
    <h2>Order Tracking</h2>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-hovered">
                <thead>
                    <th>Order ID No.</th>
                    <th>Delivery Address.</th>
                    <th>Status.</th>
                    <th>View.</th>
                </thead>
                <tbody>
                    @if(!empty($orders))
                    @forelse ($orders as $order)
            
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->buyer->address}}</td>
                        <td>{{$order->buyer->status}}</td>
                        <td>
                            <button wire:click='showModal({{$order->id}})' class="btn btn-dark btn-sm">View</button>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No Orders Found</td>
                        </tr>
                    @endforelse
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="viewOrder" maxWidth="lg">
        <x-slot name="title">
            {{__('Tech-Trendz Services')}}
        </x-slot>
        <x-slot name="content">
            <article class="card">
                <header class="card-header"> My Orders / Tracking </header>
                <div class="card-body">
                   @foreach ($orderDetails as $orderDetail)
                    <h6>Order ID: {{$orderDetail->id}}</h6>
                    <article class="card">
                        <div class="card-body row">
                            <div class="col"> <strong>Estimated Delivery time:</strong> <br>{{Carbon\Carbon::parse($orderDetail->created_at)->addDay(5)->toFormattedDateString()}}</div>
                            <div class="col"> <strong>Shipping BY:</strong> <br> Tech-Trendz, | <i class="fa fa-phone"></i>
                                +00000000 </div>
                            <div class="col"> <strong>Status:</strong> <br> {{$orderDetail->buyer->status}} </div>
                            <div class="col"> <strong>Tracking #:</strong> <br> N/A </div>
                        </div>
                    </article>
                    <div class="track">
                        <div class="step {{$confirmed}}"> <span class="icon"> <i class="fa fa-check"></i> </span> <span
                                class="text">Order confirmed</span> </div>
                        <div class="step {{$preparing}}"> <span class="icon"> <i class="nc-icon nc-box-2"></i> </span> <span class="text">
                                Preparing</span> </div>
                        <div class="step {{$shipping}} "> <span class="icon"> <i class="nc-icon nc-app"></i> </span> <span class="text">
                                To Ship</span> </div>
                        <div class="step {{$transit}}"> <span class="icon"> <i class="nc-icon nc-delivery-fast"></i> </span> <span class="text"> On the
                                way </span> </div>
                        <div class="step {{$delivered}}"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered</span> </div>
                    </div>
                    <hr>
                    <ul class="row">
                      @foreach ($orderDetail->OrderItem as $item)
                          <li class="col-md-4">
                            <figure class="itemside mb-3">
                                <div class="aside"><img src="https://mnlph.nyc3.digitaloceanspaces.com/{{$item->thumbnail}}" class="img-sm border"></div>
                                <figcaption class="info align-self-center">
                                    <p class="title">{{$item->item_name}}</p> <span class="text-muted">@money($item->amount)
                                    </span>
                                </figcaption>
                            </figure>
                        </li>
                      @endforeach
                        
                       
                    </ul>
                    <hr>
                   
                </div>
                @endforeach
            </article>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('viewOrder')" wire:loading.attr="disabled">
                {{ __('Back to Order') }}
            </x-jet-secondary-button>
    
        </x-slot>
    </x-jet-dialog-modal>
  

</div>
