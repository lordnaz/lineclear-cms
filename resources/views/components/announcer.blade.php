
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ANNOUNCER / POPUP ENABLER') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
            <!-- Code Start Here-->
            
            <div class="shadow-tailwind sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="container-fluid">

                        <legend class="text-3xl font-medium font-bold text-gray-900" style="font-weight: bold;">POPUP Enabler</legend>
                        <small class="text-muted">( On/Off the toggle to enable popup )</small>
                        
                        <form action="/update_popup" id="updatePopup" method="post" enctype="multipart/form-data" accept-charset='UTF-8'>
                            {{@csrf_field()}}

                            <!-- <br> -->
                            <!-- <br> -->
                            <div class="row mb-3">

                                <fieldset>
                                    <!-- <legend class="text-base font-medium text-gray-900">Enabled?</legend> -->
                                    <div class="mt-4 space-y-4">
                                        <div class="flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="comments" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="comments" class="font-medium text-gray-700">Enabled?</label>
                                                <p class="text-gray-500">Tick to enable the announcer popup | Untick to off</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-4 space-y-4">
                                        <label for="formFile" class="form-label">Upload Image</label>
                                        <!-- <input class="form-control" name="formFile" type="file" id="formFile"> -->
                                        <input type="file" class="form-control" name="formFile" id="formFile" accept="file/*">
                                    </div>
                                    
                                    <br>
                                    
                                    <div class="mt-4 space-y-4">
                                        <label for="preview" class="form-label">Image Preview</label>
                                        <img src="{{$imageURL}}" class="img-fluid border border-dark" alt="...">
                                    </div>

                                    <div class="px-4 py-3 text-right sm:px-6">
                                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Update
                                        </button>
                                    </div>
                                </fieldset>

                            </div>


                        </form>
                       

                    </div>
                </div>
            </div>

            <!-- Code end Here -->
        </div>
    </div>
    
</x-app-layout>

<script>
    $( document ).ready(function() {

        var status = {!! json_encode($active) !!};

        if(status == 1){
            $('#comments').prop('checked', true);
        }else{
            $('#comments').prop('checked', false);
        }

    });
</script>

