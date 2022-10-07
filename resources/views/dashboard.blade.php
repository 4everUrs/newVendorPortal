<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <section class="w-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="p-3 rounded">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <div class="lh-1 text-warning text-center" style="font-size: 3rem;"> <i class="ti-server"></i> </div>
                                </div>
                                <div class="col-7">
                                    <div class="numbers lh-sm text-end">
                                        <p class="mb-0 fs-6">Capacity</p> 105GB </div>
                                </div>
                            </div>
                            <div class="footer p-0">
                                <hr class="border-secondary">
                                <div class="stats"> <i class="ti-reload"></i> Updated now </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="p-3 rounded">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <div class="lh-1 icon-big icon-success text-center" style="font-size: 3rem;"> <i class="ti-wallet"></i> </div>
                                </div>
                                <div class="col-7">
                                    <div class="numbers lh-sm text-end">
                                        <p class="mb-0 fs-6">Revenue</p> $1,345 </div>
                                </div>
                            </div>
                            <div class="footer p-0">
                                <hr class="border-secondary">
                                <div class="stats"> <i class="ti-calendar"></i> Last day </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="p-3 rounded">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <div class="lh-1 icon-big icon-danger text-center" style="font-size: 3rem;"> <i class="ti-pulse"></i> </div>
                                </div>
                                <div class="col-7">
                                    <div class="numbers lh-sm text-end">
                                        <p class="mb-0 fs-6">Errors</p> 23 </div>
                                </div>
                            </div>
                            <div class="footer p-0">
                                <hr class="border-secondary">
                                <div class="stats"> <i class="ti-timer"></i> In the last hour </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="p-3 rounded">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <div class="lh-1 icon-big icon-info text-center" style="font-size: 3rem;"> <i class="ti-twitter-alt"></i> </div>
                                </div>
                                <div class="col-7">
                                    <div class="numbers lh-sm text-end">
                                        <p class="mb-0 fs-6">Followers</p> +45 </div>
                                </div>
                            </div>
                            <div class="footer p-0">
                                <hr class="border-secondary">
                                <div class="stats"> <i class="ti-reload"></i> Updated now </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>