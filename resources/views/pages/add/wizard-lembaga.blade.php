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
            <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <form id="form-wizard" action="#" method="post">
                        <div class="card">
                            <div class="tab-content" id="myTabContent">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            Tambah Pengurus Lembaga
                                        </h5>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <label for="namaPengurus" class="form-label">Nama</label>
                                                    <input type="text" class="form-control" name="namaPengurus" id="namaPengurus">
                                                </div>
                                                <div class="col-lg-4">
                                                    <label for="nikPengurus" class="form-label">NIK</label>
                                                    <input type="text" class="form-control" name="nikPengurus" id="nikPengurus">
                                                </div>
                                                
                                                <div class="col-lg-4 gap-2 d-flex align-items-end">
                                                    
                                                    <button class="btn btn-primary" id="addPengurus" type="button"><i class="bi bi-check-circle"></i></button>
                                                </div>
                                            </div>

                                            <div class="row" id="PengurusForm"></div>
                                            
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

@section('js-page')
        <script>
            let index = 0;


            // Create new elements for the pengurus form
                const createInputElement = (
                    labelText,
                    inputId,
                    inputType,
                    classType,
                    newIndex
                    ) => {
                    const div = document.createElement("div");
                    div.classList.add(classType, "mt-2", "mt-lg-3", newIndex);
                    div.innerHTML = `
                    <label for="${inputId}-${newIndex}" class="form-label">${labelText}</label>
                    <input type="${inputType}" class="form-control" id="${inputId}-${newIndex}" >`;
                    return div;
                };

                // Create new elements for the pengurus form
                const createSelectElement = (labelText, inputId, classType, newIndex) => {
                    const div = document.createElement("div");
                    div.classList.add(classType, "mt-2", "mt-lg-3", newIndex);
                    div.innerHTML = `
                    <label for="${inputId}-${newIndex}" class="form-label">${labelText}</label>
                    <select class="form-select" id="${inputId}-${newIndex}" >
                    <option selected disabled value="">--pilih posisi pengurus--</option>
                    <option>...</option>
                    </select>`;
                    return div;
                };


            
            document.getElementById('addPengurus').onclick = function () {
                createPengurus()
            }


            

            // Pengurus
            const createPengurus = () => {
                index++;
                const PengurusForm = document.getElementById("PengurusForm");
                const newIndex = `index-Pengurus-${index}`;

                const nama = createInputElement(
                    "Nama",
                    "namaPengurus",
                    "text",
                    "col-md-4",
                    newIndex
                );
                const nik = createInputElement(
                    "NIK",
                    "nikPengurus",
                    "text",
                    "col-md-4",
                    newIndex
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

                // Create a save button for this set of elements
                const saveButton = document.createElement("button");
                saveButton.classList.add("save","btn", "btn-primary", newIndex);
                saveButton.type = "button";
                saveButton.innerHTML = '<i class="bi bi-check-circle"></i>';


                deleteButtonContainer.dataset.index = newIndex;
                saveButtonContainer.dataset.index = newIndex;


                deleteButtonContainer.appendChild(deleteButton);
                saveButtonContainer.appendChild(saveButton);

                // Append the new elements to the form
                PengurusForm.appendChild(nama);
                PengurusForm.appendChild(nik);
                PengurusForm.appendChild(deleteButtonContainer);
                PengurusForm.appendChild(saveButtonContainer);


                // Add an event listener to the delete button
                deleteButtonContainer.addEventListener("click", function () {
                    const dataIndex = this.dataset.index;
                    const elementsToDelete = document.querySelectorAll(
                        `.${dataIndex}`
                    );
                    
                    elementsToDelete.forEach(function (element) {
                        element.remove();
                    });
                });
                
                const idSaveButton = document.querySelector(` button.save.btn.btn-primary.${newIndex}`);
                
                idSaveButton.addEventListener("click", function () {
                    createPengurus()
                });
            };

        </script>
@endsection