<div>
  <x-slot name="header">
    <h2 class="h4 font-weight-bold">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>
  <div class="card">
    <div class="card-body">
      <table id="cart" class="table table-striped">
        <thead>
          <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($items as $key => $item)
          <tr>
            <td data-th="Product">
              <div class="row">
                <div class="col-sm-2 hidden-xs"><img
                    src="https://mnlph.nyc3.digitaloceanspaces.com/{{$item->VendorShop->thumbnail}}" alt="..."
                    class="img-responsive" /></div>
                <div class="col-sm-10">
                  <h4 class="nomargin">{{$item->VendorShop->item_name}}</h4>
                  <p>{{$item->VendorShop->description}}</p>
                </div>
              </div>
            </td>
            <td data-th="Price">@money($item->VendorShop->amount)</td>
            <td data-th="Quantity">
              <div class="input-group">
                <input type="number" wire:model="qty.{{$key}}" class="form-control text-center">
              </div>
      
            </td>
            <td data-th="Subtotal" class="text-center">@money($item->subtotal)</td>
            <td class="actions" data-th="">
              <button wire:click="addQty({{$item->id}},{{$key}})" class="btn btn-info btn-sm"><i
                  class="fa fa-refresh"></i></button>
              <button wire:click="removeItem({{$item->id}})" class="btn btn-danger btn-sm"><i
                  class="fa fa-trash-o"></i></button>
            </td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr class="visible-xs">
            <td colspan="3" class="hidden-xs"></td>
            <td class="text-center"><strong>@money($total)</strong></td>
          </tr>
          <tr>
            <td><a href="{{route('shop')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
            </td>
            <td colspan="2" class="hidden-xs"></td>
            {{-- <td class="hidden-xs text-center"><strong>Total $ 5.11</strong></td> --}}
            <td colspan="1"><button wire:click="checkoutShowModal" class="btn btn-success btn-block">Checkout <i
                  class="fa fa-angle-right"></i></button></td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>

  <x-jet-dialog-modal wire:model="checkoutModal" maxWidth="lg">
    <x-slot name="title">
      {{__('Tech-Trendz Services')}}
    </x-slot>
    <x-slot name="content">
      <div class="form-group">
        <p>Shipping Information</p>
        <label>Recipient</label>
        <input wire:model="recipient" class="form-control" type="text" />
        @error('recipient') <span class="text-danger">{{ $message }}</span><br> @enderror
        <label>Email</label>
        <input wire:model="email" class="form-control" type="email" />
        @error('email') <span class="text-danger">{{ $message }}</span><br> @enderror
        <label>Address</label>
        <input wire:model="address" class="form-control" type="text" />
        @error('address') <span class="text-danger">{{ $message }}</span><br> @enderror
        <label>Contact Number</label>
        <input wire:model="phone" class="form-control" type="number" />
        @error('phone') <span class="text-danger">{{ $message }}</span><br> @enderror
        <label>Payment Method</label>
        <select wire:model="payment_method" class="form-control">
          <option value="">Select Option</option>
          <option>Cash on Delivery</option>
        </select>
        @error('payment_method') <span class="text-danger">{{ $message }}</span><br> @enderror
      </div>
      <table class="table table-striped">
        <thead>
          <th>Product</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Subtotal</th>
        </thead>
        <tbody>
          @foreach ($items as $item)
          <tr>
            <td>{{$item->VendorShop->item_name}}</td>
            <td>{{$item->VendorShop->amount}}</td>
            <td>{{$item->qty}}</td>
            <td>{{$item->subtotal}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </x-slot>
    <x-slot name="footer">
      <x-jet-secondary-button wire:click="$toggle('checkoutModal')" wire:loading.attr="disabled">
        {{ __('Cancel') }}
      </x-jet-secondary-button>

      <x-jet-button class="ms-2" id="createButton" wire:click="checkout" wire:loading.attr="disabled">
        {{ __('Checkout') }}
      </x-jet-button>

    </x-slot>
  </x-jet-dialog-modal>
</div>