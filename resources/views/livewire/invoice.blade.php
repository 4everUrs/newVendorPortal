<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click="$toggle('sendInvoice')" class="btn btn-dark btn-sm text-center align-middle">Send Invoice</button>
            <table class="table table-striped">
                <thead>
                    <th class="text-center align-middle">No</th>
                    <th class="text-center align-middle">Invoice File</th>
                    <th class="text-center align-middle">Date</th>
                    <th class="text-center align-middle">Action</th>
                </thead>
                <tbody>
                    @forelse ($invoices as $invoice)
                        <tr>
                            <td class="text-center align-middle">{{$invoice->invoice_id}}</td>
                            <td class="text-center align-middle">{{$invoice->file_name}}</td>
                            <td class="text-center align-middle">{{Carbon\Carbon::parse($invoice->created_at)->toFormattedDateString()}}</td>
                            <td class="text-center align-middle">
                                <a href="https://mnlph.nyc3.digitaloceanspaces.com/{{$invoice->file_name}}" target="__blank" class="btn btn-primary btn-sm">View</a>
                            </td>
                        </tr>
                    @empty
                        
                    @endforelse
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
                <label for="company">Company Name</label>
                <input wire:model="company_name" type="text" class="form-control">
                <label for="invoice">Invoice File</label>
                <input wire:model="file_name" type="file" class="form-control">
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('sendInvoice')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button wire:click="sendInvoice" class="ms-2" id="createButton" wire:loading.attr="disabled">
                {{ __('Send') }}
            </x-jet-button>
    
        </x-slot>
    </x-jet-dialog-modal>
</div>
