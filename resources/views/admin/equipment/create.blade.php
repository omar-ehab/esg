@extends('layouts.admin.app')
@section('title', 'Create Equipment')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><a href="{{ route('admin.equipment.index') }}" class="fw-light">Equipment /</a>
            Add New Equipment
        </h4>
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('admin.equipment.store') }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-sm-12 col-md-6">
                                    <label class="form-label @error('name') text-danger @enderror" for="name">
                                        Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           id="name"
                                           name="name"
                                           value="{{ old('name') }}"
                                           placeholder="Job Name"/>
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label for="image" class="form-label @error('image') text-danger @enderror">
                                        Image
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control @error('image') is-invalid @enderror" type="file"
                                           id="image"
                                           name="image" accept="image/*"/>
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <hr/>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <p>Equipment Details</p>
                                </div>
                                <div class="col-12" id="rows_container">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-6">
                                            <input type="text" name="1_key" class="form-control" placeholder="Name *">
                                        </div>
                                        <div class="col-lg-4 col-sm-6">
                                            <input type="text" name="1_first_value" class="form-control"
                                                   placeholder="Value 1 *">
                                        </div>
                                        <div class="col-lg-4 col-sm-6">
                                            <input type="text" name="1_second_value" class="form-control"
                                                   placeholder="Value 2 *">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <button class="btn btn-sm btn-primary" id="add_new_detail_row">
                                        <i class="bx bx-plus"></i>
                                    </button>
                                </div>
                            </div>

                            <hr/>
                            <button type="submit" class="btn btn-primary">
                                <i class="bx bx-save me-1"></i>
                                Save
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let counter = 2
        const newRowElements = () => {
            const nameInput = document.createElement("input");
            const valueOneInput = document.createElement("input");
            const valueTwoInput = document.createElement("input");
            const deleteButton = document.createElement("button");
            const deleteIcon = document.createElement("i");
            const column1 = document.createElement('div');
            const column2 = document.createElement('div');
            const column3 = document.createElement('div');
            const column4 = document.createElement('div');
            const inputsContainer = document.createElement("div");

            nameInput.setAttribute('type', 'text');
            valueOneInput.setAttribute('type', 'text');
            valueTwoInput.setAttribute('type', 'text');

            nameInput.setAttribute('name', `${counter}_key`);
            valueOneInput.setAttribute('name', `${counter}_first_value`);
            valueTwoInput.setAttribute('name', `${counter}_second_value`);

            nameInput.setAttribute('class', 'form-control');
            valueOneInput.setAttribute('class', 'form-control');
            valueTwoInput.setAttribute('class', 'form-control');

            nameInput.setAttribute('placeholder', 'Name');
            valueOneInput.setAttribute('placeholder', 'Value 1');
            valueTwoInput.setAttribute('placeholder', 'Value 2');

            deleteButton.setAttribute('class', 'btn btn-sm btn-danger delete-row-button')
            deleteButton.setAttribute('data-row-id', `${counter}`)
            deleteIcon.setAttribute('class', 'bx bx-trash-alt')
            deleteButton.appendChild(deleteIcon);
            deleteButton.onclick = deleteRow

            column1.setAttribute('class', 'col-lg-4 col-sm-6');
            column2.setAttribute('class', 'col-lg-3 col-sm-6');
            column3.setAttribute('class', 'col-lg-3 col-sm-6');
            column4.setAttribute('class', 'col-lg-2 col-sm-6');

            inputsContainer.setAttribute('class', 'row mt-2 align-items-center');
            inputsContainer.setAttribute('id', `${counter}`);

            column1.appendChild(nameInput);
            column2.appendChild(valueOneInput);
            column3.appendChild(valueTwoInput);
            column4.appendChild(deleteButton);

            inputsContainer.appendChild(column1)
            inputsContainer.appendChild(column2)
            inputsContainer.appendChild(column3)
            inputsContainer.appendChild(column4)

            return inputsContainer;

        }
        const deleteRow = (e) => {
            e.preventDefault();
            e.stopPropagation();
            let rowId = undefined;
            if (e.target.tagName === 'I') {
                rowId = e.target.parentNode.getAttribute('data-row-id')
            } else if (e.target.tagName === 'BUTTON') {
                rowId = e.target.getAttribute('data-row-id')
            }
            document.getElementById(rowId).remove()
            counter--;
        }
        const addRowBtn = document.getElementById('add_new_detail_row');
        const rowsContainer = document.getElementById('rows_container');
        addRowBtn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            rowsContainer.appendChild(newRowElements());
            counter++;
        });

    </script>
@endpush
