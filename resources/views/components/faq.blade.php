<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
    </symbol>
    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
</svg>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('FAQ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Code Start Here-->
            
            <div class="shadow-tailwind sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="container-fluid">

                        <legend class="text-3xl font-medium font-bold text-gray-900" style="font-weight: bold;">FAQ Builder</legend>
                        <small class="text-muted">( Feel free to configure your own FAQ template. )</small>
                        
                        <small class="text-muted float-end">Current Level Implemented: <span class="badge rounded-pill bg-primary" style="padding: 7px;">2 Level</span></small>
                        <br>
                        <br>

                        <form action="/submit_faq" id="submitFaq" method="post" enctype="multipart/form-data" accept-charset='UTF-8'>
                            {{@csrf_field()}}

                            <div class="row mb-3">
                                
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Parent ID</label>
                                <div class="col-sm-10">
                                    <select class="form-select form-control" name="parent_id" id="parent_id" aria-label="Default select example">
                                        <!-- <option selected disabled="">Choose parent ID</option> -->
                                        <option selected value="">No parent ID, I am the main question.</option>
                                        @foreach($parentsOnly as $main)
                                            <option value="{{ $main->id }}">{!! $main->question_str !!}</option>
                                        @endforeach
                                        <!-- <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option> -->
                                    </select>
                                    
                                    <p class="mt-2 text-sm text-red-500">
                                        <div class="alert alert-warning d-flex align-items-center" role="alert">
                                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
                                            <use xlink:href="#exclamation-triangle-fill"/></svg>
                                            <div style="font-size: 14px; margin-left: 15px;">
                                                Having no parent ID indicate this question is the Main Title/Question, 
                                                while if having parent ID indicate this question is a Sub-Question of a main question.
                                            </div>
                                        </div>
                                    </p>
                                </div>
                            </div>

                            <br>

                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Numbering</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="number" name="number" min="0" max="100">
                                    <p class="mt-2 text-sm text-red-500">
                                        
                                        <div class="alert alert-info d-flex align-items-center" role="alert">
                                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
                                            <use xlink:href="#info-fill"/></svg>
                                            <div style="font-size: 14px;">
                                                <ol>
                                                    <li>1. Numbering for sorting purposes, smallest number will be the top priorities on the FAQ list.</li>
                                                    <li>2. Numbering also being used in question numbering.</li>
                                                    <li>3. If user decide this is a "Main Question/Title" then, priority will be displayed
                                                    as the numbering. If user decide this question has parent ID, priority will be displayed as decimal numbering of its Parent ID.</li>
                                                    <li>4. For example , (Main Question --> 1. This is a Title) &nbsp; (Sub Question --> 1.1. This is a Sub-Question).</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </p>

                                </div>
                            </div>

                            <br>

                            <div class="row mb-3">
                                <label for="editor" class="col-sm-2 col-form-label">Title/Question</label>
                                <div class="col-sm-10">
                                    <div id="editor" style="height: 150px;"> </div>
                                    <input type="hidden" name="editor">

                                    <br>

                                    <div class="form-check form-switch" id="switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" style="background-size: unset;">
                                        <label class="form-check-label" for="flexSwitchCheckChecked">Have Answer?</label>
                                    </div>
                                </div>
                            </div>

                            <br>

                            <div class="row mb-3" id="answer_section">
                                <label for="editor2" class="col-sm-2 col-form-label">Answer</label>
                                <div class="col-sm-10">
                                    <div id="editor2" style="height: 150px;"> </div>
                                    <input type="hidden" name="editor2">
                                </div>
                            </div>

                            <div class="px-4 py-3 text-right sm:px-6">
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Submit
                                </button>
                            </div>
                        </form>

                        <x-jet-section-border />

                        <legend class="text-3xl font-medium font-bold text-gray-900" style="font-weight: bold;">FAQ Previews</legend>
                        <small class="text-muted">( FAQ template previews. )</small>
                        <br>
                        <br>

                        <p class="mt-2 text-sm text-red-500">
                                        
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                <use xlink:href="#exclamation-triangle-fill"/></svg>
                                <div style="font-size: 14px; margin-left: 15px;">
                                    Deleting parent item will delete its child also.
                                </div>
                            </div>
                        </p>

                        <div class="row">
                            @foreach($parents as $parent)
                                @if ($parent->parent_id == null || $parent->parent_id == "")

                                    <div class="accordion" id="accordionPanelsStayOpenExample">
                                        <div class="accordion-item" style="border: none">
                                            <h2 class="accordion-header" id="panelsStayOpen-heading_{{$parent->id}}">
                                            <button class="accordion-button collapsed" 
                                            type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse_{{$parent->id}}" 
                                            aria-expanded="true" aria-controls="panelsStayOpen-collapse_{{$parent->id}}"
                                            style="font-weight: bold;  box-shadow: unset; color: black">
                                                {{$parent->sort_no}}. &nbsp; &nbsp;{!! $parent->question_str !!} 
                                            </button>
                                            </h2>
                                            <a href="{{route('edit_faq', $parent->id)}}" class="float-end btn btn-outline-info" style="margin-left: 15px;">edit</a>
                                            <a href="{{route('delete_parent', $parent->id)}}" class="float-end btn btn-outline-danger">Delete</a>
                                            <div id="panelsStayOpen-collapse_{{$parent->id}}" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading_{{$parent->id}}">
                                                <!-- <hr> -->
                                                @if ($parent->answer_str == null || $parent->answer_str == "")
                                                    
                                                @else
                                                    
                                                    <div class="accordion-body">
                                                        <p>{!! $parent->answer_str !!}</p> 
                                                    </div>
                                                @endif

                                                @foreach($parents as $child)

                                                    @if ($child->parent_id == $parent->id)
                                                        <div class="accordion-item" style="border: none">
                                                            <h2 class="accordion-header" id="panelsStayOpen-heading_{{$child->id}}">
                                                            <button class="accordion-button collapsed" 
                                                            type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse_{{$child->id}}" 
                                                            aria-expanded="true" aria-controls="panelsStayOpen-collapse_{{$child->id}}"
                                                            style="font-weight: bold; background-color: white; box-shadow: unset; color: black">
                                                                {{$parent->sort_no}}.{{$child->sort_no}}. &nbsp; &nbsp;{!! $child->question_str !!}  
                                                                &nbsp; &nbsp; (PARENT ID: {{$child->parent_id}}) &nbsp; &nbsp; (PRIORITY: {{$child->sort_no}}) 
                                                            </button>
                                                            </h2>
                                                            <a href="{{route('edit_faq', $child->id)}}" class="float-end btn btn-outline-info" style="margin-left: 15px;">edit</a>
                                                            <a href="{{route('delete_child', $child->id)}}" class="float-end btn btn-outline-danger">Delete</a>
                                                            <div id="panelsStayOpen-collapse_{{$child->id}}" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading_{{$child->id}}">
                                                            @if ($child->answer_str == null || $child->answer_str == "")
                                                    
                                                            @else
                                                                <div class="accordion-body">
                                                                    <p>{!! $child->answer_str !!}</p> 
                                                                </div>
                                                            @endif
                                                            </div>
                                                        </div>
                                                        
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            
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
    var quill = new Quill('#editor', {
        theme: 'snow'
    });

    var quill_2 = new Quill('#editor2', {
        theme: 'snow'
    });

    // var quill_3 = new Quill('#editor3', {
    //     theme: 'snow'
    // });

    // var quill_4 = new Quill('#editor4', {
    //     theme: 'snow'
    // });

    // set variable to get the editor value 
    var form = document.getElementById("submitFaq"); // get form by ID
    form.onsubmit = function() { // onsubmit do this first
        var editor = document.querySelector('input[name=editor]'); // set name input var
        editor.value = quill.root.innerHTML; // populate name input with quill data

        var editor2 = document.querySelector('input[name=editor2]'); // set name input var
        editor2.value = quill_2.root.innerHTML; // populate name input with quill data
        // console.log(quill.root.innerHTML);
        return true; // submit form
    }

    // set variable to get the editor value 
    /*var form = document.getElementById("updateFaq"); // get form by ID
    form.onsubmit = function() { // onsubmit do this first
        var editor = document.querySelector('input[name=editor3]'); // set name input var
        editor3.value = quill_3.root.innerHTML; // populate name input with quill data

        var editor2 = document.querySelector('input[name=editor4]'); // set name input var
        editor4.value = quill_4.root.innerHTML; // populate name input with quill data
        // console.log(quill.root.innerHTML);
        return true; // submit form
    }*/

    // var selectedOption = $('#parent_id').find(":selected").val();
    
    $('#switch').hide();

    $('#parent_id').change(function () {
        var item = $(this).find(":selected").text();
        var itemVal = $(this).find(":selected").val();

        if(itemVal == null || itemVal == "" || itemVal == undefined){
            $('#switch').hide();
            $('#answer_section').hide();
            $('#flexSwitchCheckChecked').prop('checked', false);
            // $('#editor2_val').val("");
        }else{
            $('#switch').show();

        }

    });

    $('#answer_section').hide();

    // set toggle event for switch 
    $('#flexSwitchCheckChecked').change(function() {
        // this will contain a reference to the checkbox   
        if (this.checked) {
            $('#answer_section').show();
        } else {
            $('#answer_section').hide();
        }
    });
});

</script>

<!-- <div class="container-fluid">
            <div class="row">
                <div class="col">1</div>
                <div class="col">1</div>
                <div class="col">1</div>
            </div>
        </div> -->


