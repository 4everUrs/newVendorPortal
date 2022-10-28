<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <section class="w-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-11 mx-auto">
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                            <tr>
                                <th>ID</th>
                                <th>Filename</th>
                                <th class="text-center">Actions</th>
                            </tr>
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
                                        <a href="https://mnlph.nyc3.digitaloceanspaces.com/{{$po->file_name}}"target="_blank" type="button" class="btn btn-link bg-dark text-white btn-sm btn-rounded">
                                            View / Download
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                
                            @endforelse
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
