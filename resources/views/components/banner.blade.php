
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('BANNER CHANGER') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
            <!-- Code Start Here-->
            
            <div class="shadow-tailwind sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="container-fluid">

                        <legend class="text-3xl font-medium font-bold text-gray-900" style="font-weight: bold;">Carousel Banner Changer</legend>
                        <small class="text-muted">( Upload image for carousel banner on the websites )</small>

                        <hr>
                        <br>
                            
                        <div class="row">
                            <div class="col-5">
                                <form action="/upload_banner" id="updatePopup" method="post" enctype="multipart/form-data" accept-charset='UTF-8'>

                                    @csrf

                                    <div class="col-md-10 mb-3">
                                        <div class="alert alert-warning" role="alert">
                                            Smallest Sorting Number will be the priority
                                        </div>
                                    </div>

                                    

                                    <div class="col-md-10 mb-3">
                                        <label for="sort" class="form-label">Set Sorting Value</label>
                                        <input type="number" class="form-control" name="sort" id="sort" min="1" max="10" required>
                                    </div>

                                    <div class="col-md-10 mb-3">
                                        <label for="desktopBanner" class="form-label">Upload Banner (Desktop)</label>
                                        <input type="file" class="form-control" name="desktopBanner" id="desktopBanner" accept="file/*" required>
                                    </div>

                                    <div class="col-md-10 mb-3">
                                        <label for="mobileBanner" class="form-label">Upload Banner (Mobile)</label>
                                        <input type="file" class="form-control" name="mobileBanner" id="mobileBanner" accept="file/*" required>
                                    </div>

                                    <div class="d-grid gap-2 col-md-10">
                                        <button class="btn btn-info" type="submit">Confirm</button>
                                    </div>

                                </form>
                            </div>

                            <div class="col-7">
                                
                            </div>
                        </div>

                        <div class="row" style="margin-top: 100px;">
                            <x-banner_table :lists="$banner_lists"></x-banner_table>
                        </div>
                        
                    </div>
                </div>
            </div>

            <!-- Code end Here -->
        </div>
    </div>
    
</x-app-layout>

<script>
    $( document ).ready(function() {

        $("#table-1").dataTable({
        "columnDefs": [
            { "sortable": false, "targets": [2,3] }
        ]
    });

    });
</script>

