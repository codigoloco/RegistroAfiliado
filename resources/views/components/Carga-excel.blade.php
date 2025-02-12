
<div class="container">
    <div class="row">
        <div class="col-12">
            <form id="importForm" action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <button class="btn btn-success" type="button" data-modulo="/excel/importar" name='importarExcel' id="importarExcel" name="importarExcel" >Importar</button>
                    </div>
                    <div class="col-6">
                        <input class="form-control" type="file" id="fileInput" name="file" required>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
