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
                                    Tambah Pengurus Lembaga
                                </h5>
                                <div class="form-group">
                                    <div class="row">
                                        <input type="hidden" id="urlAddPengurus" value="{{ route('pengurus_process') }}">
                                        <input type="hidden" id="urlDelPengurus" value="{{ route('del_pengurus') }}">
                                        <input type="hidden" id="urlGetPengurus" value="{{ route('pengurus-list') }}">
                                        <input type="hidden" id="idSk" value="{{ $id_sk }}">
                                        @csrf
                                        <div class="col-lg-3">
                                            <label for="namaMustasyar" class="form-label">Nama</label>
                                            <input type="text" class="form-control"  id="namaLembaga">
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="nikLembaga" class="form-label">NIK</label>
                                            <input type="text" class="form-control" name="nikLembaga" id="nikLembaga">
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="posisiPengurusSyuriah" class="form-label">Posisi Pengurus</label>
                                            <select class="form-select" id="posisiPengurusLembaga" name="posisiPengurusLembaga" >
                                                <option></option>
                                                @foreach ($jabatan as $value)
                                                <option value="{{$value->nama_jabatan}}">{{$value->nama_jabatan}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-3 gap-2 d-flex align-items-end">
                                            <button class="btn btn-primary" id="addLembaga" type="button"><i class="bi bi-check-circle"></i></button>
                                        </div>
                                    </div>

                                    <div class="row" id="lembagaForm"></div>

                                </div>
                            </div>
                        </div>
                        {{-- <div
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
                                                @foreach ($jabatan as $value)
                                                <option value="{{$value->nama_jabatan}}">{{$value->nama_jabatan}}</option>
                                                @endforeach
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
                                                @foreach ($jabatan as $value)
                                                <option value="{{$value->nama_jabatan}}">{{$value->nama_jabatan}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-lg-3 gap-2 d-flex align-items-end">

                                            <button class="btn btn-primary" type="button" id="addTanfidzyah" ><i class="bi bi-check-circle"></i></button>
                                        </div>
                                    </div>
                                    <div class="row" id="tanfidzyahForm"></div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a
                            href="{{ route('sk_detail') }}?sk={{ setRoute($id_sk) }}"
                            class="btn btn-primary"
                        >
                            <i class="bi bi-check-circle me-1"></i>
                            Selesai
                        </a>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>
    {{-- <x-form method='POST' action='#'>
        <x-slot:title>
            Tambah Pengurus Lembaga
        </x-slot:title>
        <div class="form-group">
            <div class="row">
                <input type="hidden" id="urlAddPengurus" value="{{ route('pengurus_process') }}">
                <input type="hidden" id="urlDelPengurus" value="{{ route('del_pengurus') }}">
                <input type="hidden" id="urlGetPengurus" value="{{ route('pengurus-list') }}">
                <input type="hidden" id="idSk" value="{{ $id_sk }}">
                @csrf
                <div class="col-lg-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="namaLembaga" id="namaLembaga">
                </div>
                <div class="col-lg-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control" name="nikLembaga" id="nikLembaga">
                </div>
                <div class="col-lg-3">
                    <label for="posisiPengurusSyuriah" class="form-label">Posisi Pengurus</label>
                    <select class="form-select" id="posisiPengurusLembaga" name="posisiPengurusLembaga" >
                        <option></option>
                        @foreach ($jabatan as $value)
                        <option value="{{$value->nama_jabatan}}">{{$value->nama_jabatan}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-4 gap-2 d-flex align-items-end">
                    <button class="btn btn-primary" id="addLembaga" type="button"><i class="bi bi-check-circle"></i></button>
                </div>
            </div>

            <div class="row" id="lembagaForm"></div>

        </div>
    </x-form> --}}
@endsection

@section('js-page')
        {{-- <script>
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
        </script> --}}
        <script>
             let index = 0;
                document.addEventListener('DOMContentLoaded', function() {
                    const url = document.getElementById("urlGetPengurus").value;
                    const data = {
                        id_sk: document.getElementById("idSk").value
                    }

                    // listRequest(url+`?id_sk=${data.id_sk}&jenis_pengurus=Mustasyar`,'mustasyar');
                    // listRequest(url+`?id_sk=${data.id_sk}&jenis_pengurus=Syuriah`,'syuriah');
                    // listRequest(url+`?id_sk=${data.id_sk}&jenis_pengurus=Tanfidzyah`,'tanfidzyah');
                });

            // Create new elements for the pengurus form
                const createInputElement = (
                    labelText,
                    inputId,
                    inputType,
                    classType,
                    newIndex,
                    data
                    ) => {
                    const div = document.createElement("div");
                    div.classList.add(classType, "mt-2", "mt-lg-3", newIndex);
                    div.innerHTML = `
                    <label for="${inputId}-${newIndex}" class="form-label">${labelText}</label>
                    <input type="${inputType}" class="form-control" id="${inputId}-${newIndex}" value="${data}" readonly>`;
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



            document.getElementById('addLembaga').onclick = function () {
                // ajax request
                const url = document.getElementById("urlAddPengurus").value;
                const data = {
                    nik: document.getElementById("nikLembaga").value,
                    nama: document.getElementById("namaLembaga").value,
                    id_sk: document.getElementById("idSk").value,
                    jabatan: document.getElementById("posisiPengurusLembaga").value,
                    jenis_pengurus: 'Lembaga'
                }
                const options = {
                    formType:"lembaga",
                    eventType:"add",
                }
                let responseApi = sendRequest(url,data,options);
            }

            // LEMBAGA
            const createLembaga = (data,token) => {
                index++;

                if(token.length > 1)
                {
                    document.querySelector('input[name="_token"]').value = token;
                }

                const lembagaForm = document.getElementById("lembagaForm");
                const newIndex = `index-lembaga-${index}`;

                const nama = createInputElement(
                    "Nama",
                    "namaLembaga",
                    "text",
                    "col-md-4",
                    newIndex,
                    data.nama
                );
                const nik = createInputElement(
                    "NIK",
                    "nikLembaga",
                    "text",
                    "col-md-4",
                    newIndex,
                    data.nik
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


                // Create a delete button for this set of elements
                const deleteButton = document.createElement("button");
                deleteButton.classList.add("delete", "btn", "btn-danger", newIndex);
                deleteButton.type = "button";
                deleteButton.innerHTML = '<i class="bi bi-x-circle"></i>';
                deleteButton.dataset.index = newIndex;
                deleteButton.dataset.pengurus = data.id;


                deleteButtonContainer.appendChild(deleteButton);

                // Append the new elements to the form
                lembagaForm.appendChild(nama);
                lembagaForm.appendChild(nik);
                lembagaForm.appendChild(deleteButtonContainer);


                // Add an event listener to the delete button
                deleteButton.addEventListener("click", function () {
                    const dataIndex = this.dataset.index;
                    const id_pengurus = this.dataset.pengurus;
                    const elementsToDelete = document.querySelectorAll(
                        `.${dataIndex}`
                    );
                    // ajax request
                    const url = document.getElementById("urlDelPengurus").value;
                    const data = {
                        id: id_pengurus
                    }
                    const options = {
                        formType:"lembaga",
                        eventType:"delete",
                        elementsToDelete:elementsToDelete
                    }
                    let responseApi = sendRequest(url,data,options);
                });

                // clear form if complete
                document.getElementById("nikLembaga").value = "";
                document.getElementById("namaLembaga").value = "";
            };

            const sendRequest = async (url,data,options) => {
                // Create a configuration object for the request
                const csrfToken = document.querySelector('input[name="_token"]').value;
                const requestOptions = {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json', // Set the content type to JSON
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify(data), // Convert the data object to a JSON string
                };

                // Make the POST request using fetch
                await fetch(url, requestOptions)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(obj => {
                    const msg = obj.msg;
                    const status = obj.success;
                    const token = obj.token;
                    if (status > 0)
                    {
                        if (options.eventType === 'delete')
                        {
                            options.elementsToDelete.forEach(function (element) {
                                element.remove();
                            });
                        }
                        else if(options.eventType === 'add')
                        {
                            const data = obj.data;
                            switch (options.formType) {
                                case "lembaga":
                                    createLembaga(data,token)
                                    break;
                                case "mustasyar":
                                    createMustasyar(data,token)
                                    break;
                                case "syuriah":
                                    createSyuriah(data,token)
                                    break;
                                case "tanfidzyah":
                                    createTanfidzyah(data,token)
                                    break;

                                default:
                                    break;
                            }
                        }

                    }
                    else
                    {
                        console.log(obj)// Parse the response as JSON
                    }

                })
                .catch(error => {
                    // Handle any errors that occurred during the fetch
                    console.error('There was a problem with the fetch operation:', error);
                    return {success:false};
                });
            }

            const listRequest = async (url,formType) => {
                const requestOptions = {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json', // Set the content type to JSON
                }
                };

                await fetch(url, requestOptions)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(obj => {
                    const status = obj.success;
                    if (status > 0)
                    {
                        const data = obj.data;
                        data.map(function (item) {
                            switch (formType.toLowerCase()) {
                                case "lembaga":
                                    createLembaga(data,token)
                                    break;
                                case "mustasyar":
                                    createMustasyar(item,"")
                                    break;
                                case "syuriah":
                                    createSyuriah(item,"")
                                    break;
                                case "tanfidzyah":
                                    createTanfidzyah(item,"")
                                    break;
                                default:
                                    break;
                            }
                        })
                    }
                    else
                    {
                        console.log(obj)// Parse the response as JSON
                    }

                })
                .catch(error => {
                    // Handle any errors that occurred during the fetch
                    console.error('There was a problem with the fetch operation:', error);
                    return {success:false};
                });
            }
        </script>
@endsection
