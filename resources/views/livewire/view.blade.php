<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <section class="w-100 mt-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="d-flex align-items-start flex-nowrap justify-content-start">
                        <img src="{{asset('dashboardPage/assets/img/logz.png')}}" class="rounded-circle d-block" width="100" height="100">
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

            <div class="row mt-5">
                <div class="col-8">
                    <div class="row">
                        <div class="col">
                            <h2 class="fw-bold fs-3">Description</h2>
                                <p>{{$post->description}}</p>
                                <p>{{$post->content}}</p>

                            <h2 class="fw-bold fs-3 mt-5">Requirements</h2>
                            <ul>
                                @if (!empty($post->PostRequirements))
                                    @foreach ($post->PostRequirements as $posts)
                                    <li>{{$posts->requirements}}</li>
                                    @endforeach
                                @endif
                               
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="row p-4 border border-secondary rounded">
                        <div class="col">
                            <h3 class="fw-bold fs-4">Job Overview</h3>
                            <div class="row mb-2">
                                <div class="col-6">Posted Date:</div>
                                <div class="col-6 text-end">{{Carbon\Carbon::parse($post->created_at)->toFormattedDateString()}}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6">Location:</div>
                                <div class="col-6 text-end">{{$post->location}}</div>
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
                                        <button wire:click="test({{$post->id}},'{{$post->type}}')" class="d-inline-block px-4 py-2 rounded bg-secondary text-white align-middle">Apply Now</button>
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
