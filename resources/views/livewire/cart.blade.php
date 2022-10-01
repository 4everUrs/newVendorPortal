<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    <div class="container">
    <table id="cart" class="table table-hover table-condensed">
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
      <tr>
        <td data-th="Product">
          <div class="row">
            <div class="col-sm-2 hidden-xs"><img src="http://placehold.it/100x100" alt="..." class="img-responsive" /></div>
            <div class="col-sm-10">
              <h4 class="nomargin">Product 1</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
        </td>
        <td data-th="Price">$5.11</td>
        <td data-th="Quantity">
          <input type="number" class="form-control text-center" value="1">
        </td>
        <td data-th="Subtotal" class="text-center">$5.11</td>
        <td class="actions" data-th="">
          <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
          <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
        </td>
      </tr>
    </tbody>
    <tfoot>
      <tr class="visible-xs">
        <td colspan="3" class="hidden-xs"></td>
        <td class="text-center"><strong>Total $ 5.11</strong></td>
      </tr>
      <tr>
        <td><a href="{{route('shop')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
        <td colspan="2" class="hidden-xs"></td>
        {{-- <td class="hidden-xs text-center"><strong>Total $ 5.11</strong></td> --}}
        <td colspan="2"><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
      </tr>
    </tfoot>
  </table>
</div>
</div>