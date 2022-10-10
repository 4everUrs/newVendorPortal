<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
   <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($items as $item)
                <tr>
                    <div class="col mb-5">
                        <div class="card h-100">
                            @if ($item->condition == 'Brand New')
                                <div class="badge bg-primary text-white position-absolute" style="top: 0.5rem; right: 0.5rem">{{$item->condition}}</div>
                            @elseif ($item->condition == 'Used')
                                <div class="badge bg-success text-white position-absolute" style="top: 0.5rem; right: 0.5rem">{{$item->condition}}</div>
                            @else
                                <div class="badge bg-danger text-white position-absolute" style="top: 0.5rem; right: 0.5rem">{{$item->condition}}</div>
                            @endif
                
                            <!-- Product image-->
                            <img width="223px" height="223px" class="card-img-top" src="https://mnlph.nyc3.digitaloceanspaces.com/{{$item->thumbnail}}" alt="..."/>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{$item->item_name}}</h5>
                                    <!-- Product price-->
                                    @money($item->amount)
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                @auth
                                <div class="text-center"><a class="btn btn-dark mt-auto" wire:click="loadModal({{$item->id}})">View</a></div>
                                @endauth
                                @guest
                                <div class="text-center">
                                    <button class="btn btn-dark mt-auto" wire:click="loadModal({{$item->id}})">View</button>
                                </div>
                                @endguest
                
                            </div>
                        </div>
                    </div>
                </tr>
                @endforeach
            </div>
        </div>
    </section>
    <x-jet-dialog-modal wire:model="viewItem" maxWidth="lg">
        <x-slot name="title">
            {{__('Tech-Trendz Services')}}
        </x-slot>
        <x-slot name="content">
            <div class="row">
                <div class="col">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                @if (!empty($details))
                                <img width="370px" height="370px" class="d-block w-100"
                                    src="https://mnlph.nyc3.digitaloceanspaces.com/{{$details->thumbnail}}" alt="First slide">
                                @endif
                            </div>
                            @if (!empty($images))
                                @foreach ($images->images as $image)
                                <div class="carousel-item">
                                    <img width="370px" height="370px" class="d-block w-100" src="https://mnlph.nyc3.digitaloceanspaces.com/{{$image->file_name}}" alt="Second slide">
                                </div>
                                @endforeach
                            @endif
                           
                
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            @if (!empty($details))
                                Item Name: {{{$details->item_name}}}<br><br>
                                Condition:{{$details->condition}}<br><br>
                                Description: {{$details->description}}<br><br>
                                Price:@money($details->amount)
                            @endif
                           
                           
                           
                        </div>
                    </div>
                    
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('viewItem')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
            @auth
                @if (!empty($item))
                    <x-jet-button class="ms-2" id="createButton" wire:click="addToCart" wire:loading.attr="disabled">
                        {{ __('Add to cart') }}
                    </x-jet-button>
                @endif
            @endauth
            @guest
                <a class="btn btn-dark" href="{{route('login')}}">LOGIN</a>
                
            @endguest
           
    
        </x-slot>
    </x-jet-dialog-modal>
</div>
