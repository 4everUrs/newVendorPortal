<div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Applications</h5>
            <table class="table table-hovered">
                <thead>
                    <th class="text-center align-middle">No</th>
                    <th class="text-center align-middle">Item Name</th>
                    <th class="text-center align-middle">Item Quantity</th>
                    <th class="text-center align-middle">Bid Amount</th>
                    <th class="text-center align-middle">Invoice</th>
                    <th class="text-center align-middle">Status</th>
                    <th class="text-center align-middle">Action</th>
                </thead>
                <tbody>
                    @foreach ($applications as $apply)
                        <tr>
                            <td class="text-center align-middle">{{$apply->id}}</td>
                            <td class="text-center align-middle">{{$apply->post->item_name}}</td>
                            <td class="text-center align-middle">{{$apply->Post->quantity}}</td>
                            <td class="text-center align-middle">@money($apply->bid_amount)</td>
                            <td class="text-center align-middle"><a href="#">{{$apply->invoice_file}}</a></td>
                            <td class="text-center align-middle">{{$apply->status}}</td>
                            <td class="text-center align-middle">
                                @if (!empty($apply->invoice_file))
                                    <button wire:click='loadModal({{$apply->id}})' class="btn btn-dark btn-sm" disabled>Send Invoice</button>
                                @else
                                    <button wire:click='loadModal({{$apply->id}})' class="btn btn-dark btn-sm">Send Invoice</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="sendInvoice">
        <x-slot name="title">
            {{__('Send invoice')}}
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                <label for="invoice">Invoice File</label>
                <input wire:model="file_name" type="file" class="form-control">
                @error('file_name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('sendInvoice')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button wire:click="send" class="ms-2" id="createButton" wire:loading.attr="disabled">
                {{ __('Send') }}
            </x-jet-button>
    
        </x-slot>
    </x-jet-dialog-modal>
</div>
