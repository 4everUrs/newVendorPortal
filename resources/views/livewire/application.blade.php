<div>
    <section class="w-100 mt-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="d-flex align-items-start flex-nowrap justify-content-start">
                        <img src="{{asset('dashboardPage/assets/img/logz.png')}}" class="rounded-circle d-block" width="100"
                            height="100">
                        <div class="ps-4">
                            <h1>Looking for: {{$post->type}}</h1>
                            <div class="d-flex align-items-center flex-wrap justify-content-start gap-3">
                                <div><i class="fa-solid fa-location-dot"></i> {{$post->location}}</div>
                                <div><i class="fa-solid fa-dollar-sign"></i> @money($post->start) - @money($post->end)</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <div class="card">
                        <div class="col">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Company Name</label>
                                    <input wire:model="name" type="text" class="form-control">
                                    <label>Company Email</label>
                                    <input wire:model="email" type="text" class="form-control">
                                    <label>Company Phone</label>
                                    <input wire:model="phone" type="text" class="form-control">
                                    <label>Company Address</label>
                                    <input wire:model="address" type="text" class="form-control">
                                    <label>Bid Amount</label>
                                    <input wire:model="bid_amount" type="number" class="form-control">
                                    <label>Bidding Proposal</label>
                                    <input wire:model="bid_proposal_file" type="file" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="row p-4 border border-secondary rounded">
                        <div class="col">
                            <h3 class="fw-bold fs-4">List Overview</h3>
                            <div class="row mb-2">
                                <div class="col-6">Posted Date:</div>
                                <div class="col-6 text-end">{{Carbon\Carbon::parse($post->created_at)->toFormattedDateString()}}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6">Location:</div>
                                <div class="col-6 text-end">{{$post->location}}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6">Description:</div>
                                <div class="col-6 text-end">{{$post->description}}</div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-6">Price Range:</div>
                                <div class="col-6 text-end">@money($post->start) - @money($post->end)</div>
                            </div>
                            <div class="row">
                                <div class="col text-center">
                                    @guest
                                    <a class="d-inline-block px-4 py-2 rounded bg-secondary text-white align-middle"
                                        href="{{route('login')}}">LOGIN</a>
                                    @endguest
                                    @auth
                                    <button wire:click="saveData"
                                        class="d-inline-block px-4 py-2 rounded bg-secondary text-white align-middle">Apply Now</button>
                                    @endauth
                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
            
        </div>
    </section>
</div>
