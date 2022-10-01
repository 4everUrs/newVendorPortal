<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <section class="w-100 mt-5">
        <div class="container">
            <div class="row">
                    <div class="col-lg-10 mx-auto mb-4">
                    <div class="text-center">
                        <h1>Grow your career with us</h1>
                        <p>Lorem ipsum dolor sit detudzdae amet, rcquisc adipiscing elit. Aenean socada commodo
                            ligaui egets dolor. Nullam quis ante tiam sit ame orci eget erovtiu faucid.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="row p-3 rounded bg-light d-flex align-items-center">
                        <div class="col-8">
                            <div class="d-flex align-items-center flex-nowrap justify-content-start">
                                <img src="{{asset('dashboardPage/assets/img/logz.png')}}" class="rounded-circle d-block" width="100" height="100">
                                <div class="ps-4">
                                    <h3>Looking for: Supplier</h3>
                                    <p>Lorem ipsum dolor sit detudzdae amet, rcquisc adipiscing elit. Aenean socada commodo
                                        ligaui egets dolor</p>
                                    <div class="d-flex align-items-center flex-wrap justify-content-start gap-3">
                                        <div><i class="fa-solid fa-location-dot"></i> Department</div>
                                        <div><i class="fa-solid fa-dollar-sign"></i> Price Range</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 text-end m-n1">
                            <a class="d-inline-block px-4 py-2 rounded bg-secondary text-white align-middle m-1" href="{{route('view')}}">Apply</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>