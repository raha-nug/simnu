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
                            <div class="card-header">
                                <div class="progress" style="height: 10px">
                                    <div
                                        class="progress-bar"
                                        role="progressbar"
                                        aria-valuenow="50"
                                        aria-valuemin="0"
                                        aria-valuemax="100"
                                    ></div>
                                </div>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <div
                                    class="tab-pane fade show active"
                                    id="step1"
                                    role="tabpanel"
                                    aria-labelledby="step1-tab"
                                >
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            Tambah Mustasyar
                                        </h5>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <label for="namaMustasyar" class="form-label">Nama</label>
                                                    <input type="text" class="form-control" name="namaMustasyar" id="namaMustasyar">
                                                </div>
                                                <div class="col-lg-4">
                                                    <label for="nikMustasyar" class="form-label">NIK</label>
                                                    <input type="text" class="form-control" name="nikMustasyar" id="nikMustasyar">
                                                </div>
                                                
                                                <div class="col-lg-4 gap-2 d-flex align-items-end">
                                                    
                                                    <button class="btn btn-primary" id="addMustasyar" type="button"><i class="bi bi-check-circle"></i></button>
                                                </div>
                                            </div>

                                            <div class="row" id="mustasyarForm"></div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="tab-pane fade"
                                    id="step2"
                                    role="tabpanel"
                                    aria-labelledby="step2-tab"
                                >
                                    <div class="card-body">
                                        <h5 class="card-title">Tambah Syuriah</h5>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <label for="namaSyuriah" class="form-label">Nama</label>
                                                    <input type="text" class="form-control" name="namaSyuriah" id="namaSyuriah">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="nikSyuriah" class="form-label">NIK</label>
                                                    <input type="text" class="form-control" name="nikSyuriah" id="nikSyuriah">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="posisiPengurusSyuriah" class="form-label">Posisi Pengurus</label>
                                                    <select class="form-select" id="posisiPengurusSyuriah" name="posisiPengurusSyuriah" >
                                                        <option></option>
                                                        <option value="">Rais</option>
                                                        <option value="">Katib</option>
                                                    </select>
                                                </div>
                                                
                                                <div class="col-lg-3 gap-2 d-flex align-items-end">
                                                    
                                                    <button class="btn btn-primary" id="addSyuriah" type="button"><i class="bi bi-check-circle"></i></button>
                                                </div>
                                            </div>
                                            <div class="row" id="syuriahForm"></div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="tab-pane fade"
                                    id="step3"
                                    role="tabpanel"
                                    aria-labelledby="step3-tab"
                                >
                                    <div class="card-body">
                                        <h5 class="card-title">Tambah Tanfidzyah</h5>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <label for="namaTanfidzyah" class="form-label">Nama</label>
                                                    <input type="text" class="form-control" name="namaTanfidzyah" id="namaTanfidzyah">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="nikTanfidzyah" class="form-label">NIK</label>
                                                    <input type="text" class="form-control" name="nikTanfidzyah" id="nikTanfidzyah">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="posisiPengurusTanfidzyah" class="form-label">Posisi Pengurus</label>
                                                    <select class="form-select" id="posisiPengurusTanfidzyah" name="posisiPengurusTanfidzyah" >
                                                        <option></option>
                                                        <option value="">Ketua</option>
                                                        <option value="">Sekretaris</option>
                                                    </select>
                                                </div>
                                                
                                                <div class="col-lg-3 gap-2 d-flex align-items-end">
                                                    
                                                    <button class="btn btn-primary" type="button" id="addTanfidzyah" ><i class="bi bi-check-circle"></i></button>
                                                </div>
                                            </div>
                                            <div class="row" id="tanfidzyahForm"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <button
                                    type="button"
                                    class="btn btn-primary"
                                    id="prev"
                                >
                                    <i class="bi bi-arrow-left"></i>
                                    Previous
                                </button>
                            </li>
                            <li class="list-inline-item">
                                <button
                                    type="button"
                                    class="btn btn-primary"
                                    id="next"
                                >
                                    Next
                                    <i class="bi bi-arrow-right"></i>
                                </button>
                            </li>
                            <li class="list-inline-item">
                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                    id="submit"
                                >
                                    <i class="bi bi-check-circle me-1"></i>
                                    Selesai
                                </button>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
@endsection

@section('js-page')
            <script>
            $(document).ready(function () {
                const progresNow = document.querySelector(".progress-bar");
                var currentTab = 0;
                showTab(currentTab);

                $("#next").click(function () {
                    if (validateForm()) {
                        currentTab++;
                        showTab(currentTab);
                    }
                });

                $("#prev").click(function () {
                    currentTab--;
                    showTab(currentTab);
                });

                function showTab(n) {
                    var tabs = $(".tab-pane");
                    tabs.removeClass("show active");
                    tabs.eq(n).addClass("show active");

                    var tabLinks = $(".nav-link");
                    tabLinks.removeClass("active");
                    tabLinks.eq(n).addClass("active");

                    if (n === 0) {
                        $("#prev").prop("disabled", true);
                    } else {
                        $("#prev").prop("disabled", false);
                    }

                    if (n === tabs.length - 1) {
                        $("#next").prop("disabled", true);
                        progresNow.classList.add("w-100");
                    } else if (n === tabs.length - 3) {
                        progresNow.classList.add("w-33");
                        progresNow.classList.remove("w-100");
                        progresNow.classList.remove("w-66");
                    } else {
                        $("#next").prop("disabled", false);
                        progresNow.classList.add("w-66");
                        progresNow.classList.remove("w-100");
                        progresNow.classList.remove("w-33");
                    }
                }

                function validateForm() {
                    // Add your validation logic here
                    return true;
                }
            });
        </script>
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


            
            document.getElementById('addMustasyar').onclick = function () {
                createMustasyar()
            }
            document.getElementById('addSyuriah').onclick = function () {
                createSyuriah()
            }
            document.getElementById('addTanfidzyah').onclick = function () {
                createTanfidzyah()
            }


            

            // MUSTASYAR
            const createMustasyar = () => {
                index++;
                const mustasyarForm = document.getElementById("mustasyarForm");
                const newIndex = `index-mustasyar-${index}`;

                const nama = createInputElement(
                    "Nama",
                    "namaMustasyar",
                    "text",
                    "col-md-4",
                    newIndex
                );
                const nik = createInputElement(
                    "NIK",
                    "nikMustasyar",
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
                mustasyarForm.appendChild(nama);
                mustasyarForm.appendChild(nik);
                mustasyarForm.appendChild(deleteButtonContainer);
                mustasyarForm.appendChild(saveButtonContainer);


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
                    createMustasyar()
                });
            };



            // SYURIAH
            const createSyuriah = () => {
                index++;
                const syuriahForm = document.getElementById("syuriahForm");
                const newIndex = `index-syuriah-${index}`;

                const nama = createInputElement(
                    "Nama",
                    "namaSyuriah",
                    "text",
                    "col-md-3",
                    newIndex
                );
                const nik = createInputElement(
                    "NIK",
                    "nikSyuriah",
                    "text",
                    "col-md-3",
                    newIndex
                );
                const posisiPengurus = createSelectElement(
                    "Posisi Pengurus",
                    "posisiPengurusSyuriah",
                    "col-md-3",
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
                    "col-1",
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
                syuriahForm.appendChild(nama);
                syuriahForm.appendChild(nik);
                syuriahForm.appendChild(posisiPengurus);
                syuriahForm.appendChild(deleteButtonContainer);
                syuriahForm.appendChild(saveButtonContainer);


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
                    createSyuriah()
                });
            };


            // TANFIDZYAH
            const createTanfidzyah = () => {
                index++;
                const TanfidzyahForm = document.getElementById("tanfidzyahForm");
                const newIndex = `index-Tanfidzyah-${index}`;

                const nama = createInputElement(
                    "Nama",
                    "namaTanfidzyah",
                    "text",
                    "col-md-3",
                    newIndex
                );
                const nik = createInputElement(
                    "NIK",
                    "nikTanfidzyah",
                    "text",
                    "col-md-3",
                    newIndex
                );
                const posisiPengurus = createSelectElement(
                    "Posisi Pengurus",
                    "posisiPengurusTanfidzyah",
                    "col-md-3",
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
                    "col-1",
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
                TanfidzyahForm.appendChild(nama);
                TanfidzyahForm.appendChild(nik);
                TanfidzyahForm.appendChild(posisiPengurus);
                TanfidzyahForm.appendChild(deleteButtonContainer);
                TanfidzyahForm.appendChild(saveButtonContainer);

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
                    createTanfidzyah()
                });
            };
        </script>
@endsection