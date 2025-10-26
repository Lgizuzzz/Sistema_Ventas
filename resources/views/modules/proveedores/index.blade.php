@extends('layouts.main')

@section('titulo', $titulo)

@section('contenido')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Proveedores</h1>
      
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Administrar Proveedores</h5>
              <p>
                Administrar las Proveedores de nuestros productos
              </p>
              <!-- Table with stripped rows -->
              <a href="#" class="btn btn-primary">
                <i class="fa-solid fa-circle-plus"></i>
                Agregar nuevo Proveedor
              </a>
              <hr>
              <table class="table table-bordered datatable">
                <thead>
                  <tr>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Telefono</th>
                    <th class="text-center">Correo</th>
                    <th class="text-center">Direccion</th>
                    <th class="text-center">Nota</th>
                    <th class="text-center">
                      Acciones
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="text-center">
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    <td>
                      <a href="#" class="btn btn-warning">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </a>
                      <a href="#" class="btn btn-danger">
                        <i class="fa-solid fa-trash-can"></i>
                      </a>
                    </td>
                  </tr>

                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div>
          </div>
        </div>
      </div>
    </section>
    
</main>
@endsection
