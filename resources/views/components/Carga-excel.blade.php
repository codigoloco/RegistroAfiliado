<div class="container">
    <div class="row">
        <div class="col-12">
            <form id="importForm" action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-7">
                        <input class="form-control" type="file" id="fileInput" name="file" required>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-success" type="button" data-modulo="/excel/importar"
                            name='importarExcel' id="importarExcel" name="importarExcel">Importar</button>
                    </div>

                    <div class="col-3">
                        <a href="{{ route('importarExcel') }}" class="btn btn-warning" download>
                            Carga Masiva <br> Formato
                        </a>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
