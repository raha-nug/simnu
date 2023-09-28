@extends('layout.master')


@section('pagetitle')
<div class="pagetitle">
  <h1>{{ $title }}</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin">Home</a></li>
      <li class="breadcrumb-item"><a href="/admin">PWNU</a></li>
      <li class="breadcrumb-item active">{{ $title }}</li>
    </ol>
  </nav>
</div>
@endsection

@section('content')
<x-form method="POST" action="/admin/pwnu" >
  <x-slot:title>
    Edit Pengurus
  </x-slot:title>
  <div class="row" id="form">
   <div class="col-md-12 mt-2 mb-3 border-bottom " id="border">
   </div>
  </div>
  
  <div class="text-start ms-1 mt-2">
    <button class="btn btn-outline-primary" id="add-pengurus" type="button">+ Tambah Pengurus</button>
  </div>
</x-form>
<script>
let index = 0;
document.getElementById('add-pengurus').onclick = function () {
    index++;
    const form = document.getElementById('form');
    const newIndex = `index-${index}`;

    // Create new elements for the pengurus form
    const createInputElement = (labelText, inputId, inputType, classType) => {
        const div = document.createElement('div');
        div.classList.add(classType, 'mt-2', 'mt-lg-3', newIndex);
        div.innerHTML = `
            <label for="${inputId}-${index}" class="form-label">${labelText}</label>
            <input type="${inputType}" class="form-control" id="${inputId}-${index}" required>`;
        return div;
    };
    const createSelectElement = (labelText, inputId, classType) => {
        const div = document.createElement('div');
        div.classList.add(classType, 'mt-2', 'mt-lg-3', newIndex);
        div.innerHTML = `
            <label for="${inputId}-${index}" class="form-label">${labelText}</label>
            <select class="form-select" id="${inputId}-${index}" required>
              <option selected disabled value="">--pilih tipe pengurus--</option>
              <option>...</option>
            </select>`;
        return div;
    };

    const nama = createInputElement('Nama', 'nama', 'text', 'col-md-3');
    const nik = createInputElement('NIK', 'nik', 'text', 'col-md-2');
    const tipePengurus = createSelectElement('Tipe Pengurus', 'tipe-pengurus', 'col-md-3'); 
    const posisiPengurus = createSelectElement('Posisi Pengurus', 'posisi-pengurus','col-md-3'); 

    const deleteButton = document.createElement('div');
    deleteButton.classList.add('col-1','d-flex','justify-content-start','justify-content-lg-center','align-items-end','mt-2','mt-lg-0', newIndex);
    
    // Create a delete button for this set of elements
    const button = document.createElement('button');
    button.classList.add('delete', 'btn', 'btn-danger', newIndex);
    button.type = 'button';
    button.innerHTML = '<i class="bi bi-x-circle"></i>';
    deleteButton.dataset.index = newIndex;
    deleteButton.appendChild(button)

    // Append the new elements to the form
    form.appendChild(nama);
    form.appendChild(nik);
    form.appendChild(tipePengurus);
    form.appendChild(posisiPengurus);
    form.appendChild(deleteButton);

    // Add an event listener to the delete button
    deleteButton.addEventListener('click', function () {
        const dataIndex = this.dataset.index;
        const elementsToDelete = document.querySelectorAll(`.${dataIndex}`);

        elementsToDelete.forEach(function (element) {
            element.remove();
        });
    });

};

   
</script>
@endsection