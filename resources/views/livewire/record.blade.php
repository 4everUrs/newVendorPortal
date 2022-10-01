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
                                <th style="width: 120px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <p class="fw-bold">John Doe</p>
                                </td>
                                <td>
                                    <p>Software engineer</p>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-link bg-dark text-white btn-sm btn-rounded">
                                        Download
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
