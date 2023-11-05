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
                                        <input type="hidden" id="urlAddPengurus" value="{{ route('pengurus_process') }}">
                                        <input type="hidden" id="urlDelPengurus" value="{{ route('del_pengurus') }}">
                                        <input type="hidden" id="urlGetPengurus" value="{{ route('pengurus-list') }}">
                                        <input type="hidden" id="idSk" value="{{ $id_sk }}">
                                        @csrf
                                        <div class="col-lg-4">
                                            <label for="namaMustasyar" class="form-label">Nama</label>
                                            <input type="text" class="form-control"  id="namaMustasyar">
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
    document.addEventListener('DOMContentLoaded', function() {
        const url = document.getElementById("urlGetPengurus").value;
        const data = {
            id_sk: document.getElementById("idSk").value
        }

        listRequest(url+`?id_sk=${data.id_sk}&jenis_pengurus=Mustasyar`,'mustasyar');
        listRequest(url+`?id_sk=${data.id_sk}&jenis_pengurus=Syuriah`,'syuriah');
        listRequest(url+`?id_sk=${data.id_sk}&jenis_pengurus=Tanfidzyah`,'tanfidzyah');
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



    document.getElementById('addMustasyar').onclick = function () {
        // ajax request
        const url = document.getElementById("urlAddPengurus").value;
        const data = {
            nik: document.getElementById("nikMustasyar").value,
            nama: document.getElementById("namaMustasyar").value,
            id_sk: document.getElementById("idSk").value,
            jabatan: 'Ketua',
            jenis_pengurus: 'Mustasyar'
        }
        const options = {
            formType:"mustasyar",
            eventType:"add",
        }
        let responseApi = sendRequest(url,data,options);
    }
    document.getElementById('addSyuriah').onclick = function () {
        // ajax request
        const url = document.getElementById("urlAddPengurus").value;
        const data = {
            nik: document.getElementById("nikSyuriah").value,
            nama: document.getElementById("namaSyuriah").value,
            id_sk: document.getElementById("idSk").value,
            jabatan: document.getElementById("posisiPengurusSyuriah").value,
            jenis_pengurus: 'Syuriah'
        }
        const options = {
            formType:"syuriah",
            eventType:"add",
        }
        let responseApi = sendRequest(url,data,options);
    }
    document.getElementById('addTanfidzyah').onclick = function () {
        // ajax request
        const url = document.getElementById("urlAddPengurus").value;
        const data = {
            nik: document.getElementById("nikTanfidzyah").value,
            nama: document.getElementById("namaTanfidzyah").value,
            id_sk: document.getElementById("idSk").value,
            jabatan: document.getElementById("posisiPengurusTanfidzyah").value,
            jenis_pengurus: 'Tanfidzyah'
        }
        const options = {
            formType:"tanfidzyah",
            eventType:"add",
        }
        let responseApi = sendRequest(url,data,options);
    }




    // MUSTASYAR
    const createMustasyar = (data,token) => {
        index++;

        if(token.length > 1)
        {
            document.querySelector('input[name="_token"]').value = token;
        }

        const mustasyarForm = document.getElementById("mustasyarForm");
        const newIndex = `index-mustasyar-${index}`;

        const nama = createInputElement(
            "Nama",
            "namaMustasyar",
            "text",
            "col-md-4",
            newIndex,
            data.nama
        );
        const nik = createInputElement(
            "NIK",
            "nikMustasyar",
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
        mustasyarForm.appendChild(nama);
        mustasyarForm.appendChild(nik);
        mustasyarForm.appendChild(deleteButtonContainer);


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
                formType:"mustasyar",
                eventType:"delete",
                elementsToDelete:elementsToDelete
            }
            let responseApi = sendRequest(url,data,options);
        });

        // clear form if complete
        document.getElementById("nikMustasyar").value = "";
        document.getElementById("namaMustasyar").value = "";
    };

    // SYURIAH
    const createSyuriah = (data,token) => {
        index++;

        if(token.length > 1)
        {
            document.querySelector('input[name="_token"]').value = token;
        }

        const syuriahForm = document.getElementById("syuriahForm");
        const newIndex = `index-syuriah-${index}`;

        const nama = createInputElement(
            "Nama",
            "namaSyuriah",
            "text",
            "col-md-3",
            newIndex,
            data.nama
        );
        const nik = createInputElement(
            "NIK",
            "nikSyuriah",
            "text",
            "col-md-3",
            newIndex,
            data.nik
        );
        const posisiPengurus = createInputElement(
            "Posisi Pengurus",
            "posisiPengurusSyuriah",
            "text",
            "col-md-3",
            newIndex,
            data.jabatan
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
        syuriahForm.appendChild(nama);
        syuriahForm.appendChild(nik);
        syuriahForm.appendChild(posisiPengurus);
        syuriahForm.appendChild(deleteButtonContainer);


        // Add an event listener to the delete button
        deleteButtonContainer.addEventListener("click", function () {
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
                formType:"syuriah",
                eventType:"delete",
                elementsToDelete:elementsToDelete
            }
            let responseApi = sendRequest(url,data,options);
        });

        // clear form
        document.getElementById("nikSyuriah").value = "";
        document.getElementById("namaSyuriah").value = "";
        document.getElementById("posisiPengurusSyuriah").value = "";

    };

    // TANFIDZYAH
    const createTanfidzyah = (data,token) => {
        index++;

        if(token.length > 1)
        {
            document.querySelector('input[name="_token"]').value = token;
        }

        const TanfidzyahForm = document.getElementById("tanfidzyahForm");
        const newIndex = `index-Tanfidzyah-${index}`;

        const nama = createInputElement(
            "Nama",
            "namaTanfidzyah",
            "text",
            "col-md-3",
            newIndex,
            data.nama
        );
        const nik = createInputElement(
            "NIK",
            "nikTanfidzyah",
            "text",
            "col-md-3",
            newIndex,
            data.nik
        );
        const posisiPengurus = createInputElement(
            "Posisi Pengurus",
            "posisiPengurusTanfidzyah",
            "text",
            "col-md-3",
            newIndex,
            data.jabatan
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
        TanfidzyahForm.appendChild(nama);
        TanfidzyahForm.appendChild(nik);
        TanfidzyahForm.appendChild(posisiPengurus);
        TanfidzyahForm.appendChild(deleteButtonContainer);

        // Add an event listener to the delete button
        deleteButtonContainer.addEventListener("click", function () {
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
                formType:"tanfidzyah",
                eventType:"delete",
                elementsToDelete:elementsToDelete
            }
            let responseApi = sendRequest(url,data,options);
        });

        // clear form
        document.getElementById("nikTanfidzyah").value = "";
        document.getElementById("namaTanfidzyah").value = "";
        document.getElementById("posisiPengurusTanfidzyah").value = "";

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
