<form action="{{ route('attractions.store') }}" method="POST">
    @csrf
    <label>Nama Atrraction</label>
    <input type="text" name="name" required>
    <label>Deskripsi</label>
    <textarea name="description" ></textarea>

    <button type="submit">Simpan</button>
</form>
