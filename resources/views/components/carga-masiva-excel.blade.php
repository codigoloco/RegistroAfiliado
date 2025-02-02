<div>
    <form id="importForm" action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" id="fileInput" name="file" required>
        <button type="submit">Importar</button>
    </form>
    <source >
</div>