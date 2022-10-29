<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Purchase Order') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
           <table class="table table-striped">
                <thead>
                   
                        <th>ID</th>
                        <th>Filename</th>
                        <th class="text-center">Actions</th>
           
                </thead>
                <tbody>
                    @forelse ($pos as $po)
                    <tr>
                        <td>
                            <p class="fw-bold">{{$po->po_id}}</p>
                        </td>
                        <td>
                            <p>po{{$po->po_id}}</p>
                        </td>
                        <td class="text-center">
                            <a href="https://mnlph.nyc3.digitaloceanspaces.com/{{$po->file_name}}" target="_blank" type="button"
                                class="btn btn-link bg-dark text-white btn-sm btn-rounded">
                                View / Download
                            </a>
                        </td>
                    </tr>
                    @empty  
                    <tr>
                        <td colspan="3" class="text-center">No Record Found</td>
                    </tr>
                    @endforelse
            
                </tbody>
            </table>
        </div>
    </div>
</div>
