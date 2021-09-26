<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Code Start Here-->
            
            <div class="shadow-tailwind sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="container-fluid">
                        <fieldset>
                            <legend class="text-3xl font-bold text-gray-900" style="font-weight: bold;">Features</legend>
                            <small class="text-muted">( You can choose one of the option to navigate )</small>
                        </fieldset>
                        <br>
                        <div class="row text-center">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="card mb-3 trans" style="max-width: auto;" onclick="window.location='{{ url("faq") }}'">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="https://image.freepik.com/free-vector/flat-frequently-asked-questions-background_23-2148169717.jpg" class="img-fluid rounded-start" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title badge bg-info text-dark" style="font-size: 16px;">FAQ</h5>
                                                <p class="card-text">Frequently asked question (FAQ) pages (or hubs) help your business respond to the needs of your audience more quickly and appropriately.</p>
                                                {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="card mb-3 trans" style="max-width: auto;" onclick="window.location='{{ url("banner") }}'">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="https://images-platform.99static.com/a0KDc4pTSu1OJzGE9AGTHpJX0hg=/37x100:648x711/500x500/top/smart/99designs-contests-attachments/87/87343/attachment_87343622" class="img-fluid rounded-start" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title badge bg-info text-dark" style="font-size: 16px;">CAROUSEL BANNER</h5>
                                                <p class="card-text">Frequently asked question (FAQ) pages (or hubs) help your business respond to the needs of your audience more quickly and appropriately.</p>
                                                {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <br>

                        <div class="row text-center">

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="card mb-3 trans" style="max-width: auto;" onclick="window.location='{{ url("slider") }}'">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="https://cdn.dribbble.com/users/319768/screenshots/4351086/canva-carousel.gif" class="img-fluid rounded-start mx-auto d-block" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title badge bg-info text-dark" style="font-size: 16px;">SOCIAL MEDIA SLIDER</h5>
                                                <p class="card-text">Frequently asked question (FAQ) pages (or hubs) help your business respond to the needs of your audience more quickly and appropriately.</p>
                                                {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="card mb-3 trans" style="max-width: auto;" onclick="window.location='{{ url("announcer") }}'">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="https://assets.materialup.com/uploads/13f5292f-09b2-4590-a713-6e2030ba0387/preview.gif" class="img-fluid rounded-start" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title badge bg-info text-dark" style="font-size: 16px;">CAMPAIGN POPUP</h5>
                                                <p class="card-text">Frequently asked question (FAQ) pages (or hubs) help your business respond to the needs of your audience more quickly and appropriately.</p>
                                                {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <!-- Code end Here -->
        </div>
    </div>
    
</x-app-layout>

<!-- <div class="container-fluid">
            <div class="row">
                <div class="col">1</div>
                <div class="col">1</div>
                <div class="col">1</div>
            </div>
        </div> -->


