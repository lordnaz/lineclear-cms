
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SOCIAL MEDIA SLIDER CHANGER') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
            <!-- Code Start Here-->
            
            <div class="shadow-tailwind sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="container-fluid">

                        <legend class="text-3xl font-bold text-gray-900" style="font-weight: bold;">Social Media Slider Changer</legend>
                        <small class="text-muted">( Upload image for social media slider on the websites )</small>

                        <hr>
                        <br>
                            
                        <div class="row">
                            <div class="col-5">
                                <form action="/upload_slider" id="updatePopup" method="post" enctype="multipart/form-data" accept-charset='UTF-8'>

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
                                        <label for="desktopSlider" class="form-label">Upload Slider</label>
                                        <input type="file" class="form-control" name="desktopSlider" id="desktopSlider" accept="file/*" required>
                                        <small><i>Maximum file size is 20MB</i></small>
                                    </div>

                                    {{-- <div class="col-md-10 mb-3">
                                        <label for="mobileSlider" class="form-label">Upload Banner (Mobile)</label>
                                        <input type="file" class="form-control" name="mobileSlider" id="mobileSlider" accept="file/*" required>
                                        <small><i>Maximum file size is 20MB</i></small>
                                    </div> --}}

                                    {{-- <div class="col-md-10 mb-3">
                                        <label for="sort" class="form-label">External Link (Optional)</label>
                                        <input type="text" class="form-control" name="link" id="link">
                                    </div> --}}

                                    <div class="d-grid gap-2 col-md-10">
                                        <button class="btn btn-info" type="submit">Confirm</button>
                                    </div>

                                </form>
                            </div>

                            <div class="col-7">
                                
                            </div>
                        </div>

                        <div class="row" style="margin-top: 100px;">
                            <x-slider_table :lists="$slider_lists"></x-slider_table>
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

        $("#table-slider").dataTable({
        "columnDefs": [
            { "sortable": false, "targets": [2,3] }
        ]
    });

    });
</script>

