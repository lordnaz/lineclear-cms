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
            {{ __('UPDATE FAQ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Code Start Here-->
            
            <div class="shadow-tailwind sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="container-fluid">

                        <legend class="text-3xl font-medium font-bold text-gray-900" style="font-weight: bold;">Update FAQ</legend>
                        <small class="text-muted">( Feel free to configure your own FAQ template. )</small>
                        
                        <!-- <small class="text-muted float-end">Current Level Implemented: <span class="badge rounded-pill bg-primary" style="padding: 7px;">2 Level</span></small> -->
                        <br>
                        <br>

                        <form action="/update_faq" id="updateFaq" method="post" enctype="multipart/form-data" accept-charset='UTF-8'>
                            {{@csrf_field()}}

                            <input type="hidden" name="id" value="{{$item->id}}">

                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Priority</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="number" name="number" min="0" max="100" value="{{$item->sort_no}}">
                                    <p class="mt-2 text-sm text-red-500">
                                        
                                        <div class="alert alert-info d-flex align-items-center" role="alert">
                                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
                                            <use xlink:href="#info-fill"/></svg>
                                            <div style="font-size: 14px;">
                                                <ol>
                                                    <li>1. Priority for sorting purposes, smallest number will be the top priorities on the FAQ list.</li>
                                                    <li>2. Priority also being used in question numbering.</li>
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
                                <label for="editor3" class="col-sm-2 col-form-label">Title/Question</label>
                                <div class="col-sm-10">
                                    <div id="editor3" style="height: 150px;"> </div>
                                    <input type="hidden" name="editor3">
                                </div>
                            </div>

                            <br>

                            <div class="row mb-3" id="answer_section">
                                <label for="editor4" class="col-sm-2 col-form-label">Answer</label>
                                <div class="col-sm-10">
                                    <div id="editor4" style="height: 150px;"> </div>
                                    <input type="hidden" name="editor4">
                                </div>
                            </div>

                            <div class="px-4 py-3 text-right sm:px-6">

                                <a href="{{route('faq')}}" style="text-decoration: none; cursor: pointer; margin-right: 15px;" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Back
                                </a>
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Submit
                                </button>
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

    var quill_3 = new Quill('#editor3', {
        theme: 'snow'
    });

    var quill_4 = new Quill('#editor4', {
        theme: 'snow'
    });

    var question = {!! json_encode($item->question_str) !!};
    var answer = {!! json_encode($item->answer_str) !!};

    // console.log('question: ' + question)
    // console.log('answer: ' + answer)

    quill_3.clipboard.dangerouslyPasteHTML(question);

    quill_4.clipboard.dangerouslyPasteHTML(answer);

    // set variable to get the editor value 
    var form = document.getElementById("updateFaq"); // get form by ID
    form.onsubmit = function() { // onsubmit do this first

        alert('submitted')
        var editor3 = document.querySelector('input[name=editor3]'); // set name input var
        editor3.value = quill_3.root.innerHTML; // populate name input with quill data

        var editor4 = document.querySelector('input[name=editor4]'); // set name input var
        editor4.value = quill_4.root.innerHTML; // populate name input with quill data
        return true; // submit form
    }

});

</script>

<!-- <div class="container-fluid">
            <div class="row">
                <div class="col">1</div>
                <div class="col">1</div>
                <div class="col">1</div>
            </div>
        </div> -->


