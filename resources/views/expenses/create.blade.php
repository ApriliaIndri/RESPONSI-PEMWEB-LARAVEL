<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Tambah Pengeluaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        body {
            font-family: "Poppins", sans-serif;
            background: linear-gradient(135deg, #6fb9cf 0%, #8fb3d8 40%, #a9aedb 70%, #baa8dd 100%);
            background-size: 100% 200%;
            background-repeat: no-repeat;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            box-sizing: border-box;
            text-align: center;
        }
        .wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
            max-width: 480px;
            width: 100%;
            padding: 0 20px;
        }
        h2 {
            font-weight: 700;
            font-size: 40px;
            margin: 0 0 30px 0;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }
        form {
            background: transparent;
            padding: 30px 40px;
            border-radius: 15px;
            width: 100%;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
            color: #333;
        }
        .form-label {
            font-weight: 600;
        }
        .form-control {
            border-radius: 10px;
        }
        .btn-submit {
            border-radius: 12px;
            padding: 10px 0;
            width: 100%;
            background-color: #66aaff;
            border: 1px solid #66aaff;
            color: white;
            font-weight: 600;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }
        .btn-submit:hover,
        .btn-submit:focus,
        .btn-submit:active {
            background-color: #3399ff;
            border-color: #3399ff;
            color: white !important;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Tambah Pengeluaran</h2>
        <form method="POST" action="{{ route('expenses.store') }}">
            @csrf
            <div class="mb-3 text-start">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" class="form-control" required>
            </div>
            <div class="mb-3 text-start">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" id="judul" name="judul" class="form-control" placeholder="Contoh: Makan siang" required>
            </div>
            <div class="mb-4 text-start">
                <label for="jumlah" class="form-label">Jumlah (Rp)</label>
                <input type="number" id="jumlah" name="jumlah" class="form-control" placeholder="Contoh: 25000" required>
            </div>
            <button type="submit" class="btn btn-submit">Simpan</button>
        </form>
    </div>
</body>
</html>
