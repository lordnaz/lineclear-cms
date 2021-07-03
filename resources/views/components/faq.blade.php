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
                        <fieldset>
                            <legend class="text-3xl font-medium font-bold text-gray-900" style="font-weight: bold;">FAQ Builder</legend>
                            <small class="text-muted">( Feel free to configure your own FAQ template. )</small>
                        </fieldset>
                        <br>
                        <form action="/submit_faq" id="submitFaq" method="post" enctype="multipart/form-data" accept-charset='UTF-8'>
                            {{@csrf_field()}}


                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Number</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="number" name="number">
                                    <p class="mt-2 text-sm text-red-500">
                                        Numbering for sorting purposes, smallest number will be the top priorities on the list.
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Parent ID</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="parent_id" id="parent_id" aria-label="Default select example">
                                        <!-- <option selected disabled="">Choose parent ID</option> -->
                                        <option selected value="">No parent! I am the main question.</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <p class="mt-2 text-sm text-red-500">
                                        Instruction* : Having no parent ID indicate this question is the <strong>Main Title/Question</strong>, 
                                        while if having parent ID indicate this question is a <strong>Sub-Question</strong> of a question.
                                    </p>
                                </div>
                            </div>

                            <br>

                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Title/Question</label>
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
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Answer</label>
                                <div class="col-sm-10">
                                    <div id="editor2" style="height: 150px;"> </div>
                                    <input type="hidden" name="editor2" id="editor2_val">
                                </div>
                            </div>

                            <div class="px-4 py-3 text-right sm:px-6">
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Submit
                                </button>
                            </div>
                        </form
                        
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


