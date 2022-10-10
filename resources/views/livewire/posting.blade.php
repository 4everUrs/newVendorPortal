<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <section class="w-100 mt-5" style="background-image: url({{asset('dashboardPage/assets/img/bg.png')}})">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="text-center mb-5">
                        <h1>Grow your career with us</h1>
                        <p>Tech-Trendz Service is company that give people job that their deserve.</p>
                    </div>

                    @foreach ($posts as $post)
                    <div class="card mb-3">
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <td style="width: 10%">
                                        <img src="{{asset('dashboardPage/assets/img/logz.png')}}" class="rounded-circle d-block" width="100" height="100">
                                    </td>
                                    <td>
                                        <h3>Looking for: {{$post->type}}</h3>
                                        <p>{{$post->description}}</p>
                                        <div class="d-flex align-items-center flex-wrap justify-content-start gap-3 ">
                                            <div><i class="fa-solid fa-location-dot"></i> {{$post->location}}</div>
                                            <div><i class="fa-solid fa-dollar-sign"></i> @money($post->start) - @money($post->end)</div>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button class="btn btn-dark" wire:click="apply({{$post->id}})">View</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>