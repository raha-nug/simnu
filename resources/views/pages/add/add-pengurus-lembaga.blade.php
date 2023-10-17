@extends('layout.master')

@section('title',$title)
@section('username',$username)
@section('from',$from)

@section('pagetitle')
<div class="pagetitle">
  <h1>{{ $title }}</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin">Home</a></li>
      <li class="breadcrumb-item active">{{ $title }}</li>
    </ol>
  </nav>
</div>
@endsection

@section('content')
    <x-form method='POST' action='bla'>
        <x-slot:title>
            Tambah Pengurus Lembaga
        </x-slot:title>
        <div class="form-group">
            <div class="row">
                <div class="col-lg-4">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama">
                </div>
                <div class="col-lg-4">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control" name="nik" id="nik">
                </div>
                
                <div class="col-lg-4 gap-2 d-flex align-items-end">
                    
                    <button class="btn btn-primary" id="add" type="button"><i class="bi bi-check-circle"></i></button>
                </div>
            </div>

            <div class="row" id="Form"></div>
            
        </div>
    </x-form>
@endsection

@section('js-page')
        <script>
            let index = 0;
            document.getElementById('add').onclick = function () {
                const nama = document.getElementById('nama');
                const nik = document.getElementById('nik')
                if(this.innerHTML === '<i class="bi bi-three-dots-vertical"></i>'){
                    nama.hasAttribute('readonly') ? nama.removeAttribute('readonly') : nama.setAttribute('readonly','readonly')
                    nik.hasAttribute('readonly') ? nik.removeAttribute('readonly') : nik.setAttribute('readonly','readonly')
                    if(!nama.hasAttribute('readonly')){
                        nama.focus();
                        this.innerHTML = "<i class='bi bi-check-circle'></i>";
                    }
                } else{
                    nama.setAttribute('readonly','readonly')
                    nik.setAttribute('readonly','readonly')
                    this.innerHTML = "<i class='bi bi-three-dots-vertical'></i>";
                    if (!this.classList.contains('saved')) {
                        create()
                        this.classList.add('saved')
                    }
                }
            }


            

            // 
            const create = () => {
                index++;
                const Form = document.getElementById("Form");
                const newIndex = `index--${index}`;

                // Create new elements for the pengurus form
                const createInputElement = (
                    labelText,
                    inputId,
                    inputType,
                    classType
                    ) => {
                    const div = document.createElement("div");
                    div.classList.add(classType, "mt-2", "mt-lg-3", newIndex);
                    div.innerHTML = `
                    <label for="${inputId}-${newIndex}" class="form-label">${labelText}</label>
                    <input type="${inputType}" class="form-control" id="${inputId}-${newIndex}" >`;
                    return div;
                };

                const nama = createInputElement(
                    "Nama",
                    "nama",
                    "text",
                    "col-md-4"
                );
                const nik = createInputElement(
                    "NIK",
                    "nik",
                    "text",
                    "col-md-4"
                );

                const deleteButtonContainer = document.createElement("div");
                deleteButtonContainer.classList.add(
                    "col-1",
                    "d-flex",
                    "justify-content-start",
                    "align-items-end",
                    "mt-2",
                    "mt-lg-0",
                    newIndex
                );
                const saveButtonContainer = document.createElement("div");
                saveButtonContainer.classList.add(
                    "col-3",
                    "d-flex",
                    "justify-content-start",
                    "align-items-end",
                    "mt-2",
                    "mt-lg-0",
                    newIndex
                );

                // Create a delete button for this set of elements
                const deleteButton = document.createElement("button");
                deleteButton.classList.add("delete", "btn", "btn-danger", newIndex);
                deleteButton.type = "button";
                deleteButton.innerHTML = '<i class="bi bi-x-circle"></i>';
                const saveButton = document.createElement("button");
                saveButton.classList.add("save","btn", "btn-primary", newIndex);
                saveButton.type = "button";
                saveButton.innerHTML = '<i class="bi bi-check-circle"></i>';
                deleteButtonContainer.dataset.index = newIndex;
                saveButtonContainer.dataset.index = newIndex;
                deleteButtonContainer.appendChild(deleteButton);
                saveButtonContainer.appendChild(saveButton);

                // Append the new elements to the form
                Form.appendChild(nama);
                Form.appendChild(nik);
                Form.appendChild(deleteButtonContainer);
                Form.appendChild(saveButtonContainer);

                // Add an event listener to the delete button
                deleteButtonContainer.addEventListener("click", function () {
                    const dataIndex = this.dataset.index;
                    const elementsToDelete = document.querySelectorAll(
                        `.${dataIndex}`
                    );
                    const deleteClass = document.querySelectorAll('.delete')
                    elementsToDelete.forEach(function (element) {
                        if(deleteClass.length > 1){
                            deleteClass[deleteClass.length] - 1
                            element.remove();
                        }  
                    });
                    deleteClass.length == 1 ? create() : null
                });



                const idSaveButton = document.querySelector(` button.save.btn.btn-primary.${newIndex}`);
                
                idSaveButton.addEventListener("click", function () {
                    const nama = document.getElementById(`nama-${newIndex}`);
                    const nik = document.getElementById(`nik-${newIndex}`);
                    if(this.innerHTML === '<i class="bi bi-three-dots-vertical"></i>'){
                        nama.hasAttribute('readonly') ? nama.removeAttribute('readonly') : nama.setAttribute('readonly','readonly')
                        nik.hasAttribute('readonly') ? nik.removeAttribute('readonly') : nik.setAttribute('readonly','readonly')
                        if(!nama.hasAttribute('readonly')){
                            nama.focus();
                            this.innerHTML = "<i class='bi bi-check-circle'></i>";
                        }
                    } else{
                        nama.setAttribute('readonly','readonly')
                        nik.setAttribute('readonly','readonly')
                        this.innerHTML = "<i class='bi bi-three-dots-vertical'></i>";
                        if (!this.classList.contains('saved')) {
                            create()
                            this.classList.add('saved')
                        }


                    }
                });
            };
        </script>
@endsection