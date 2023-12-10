<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Pengajuan Ijazah</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            max-width: 100px; /* Sesuaikan lebar logo */
            height: auto;
        }

        .content {
            margin-top: 20px;
        }

        .closing {
            margin-top: 50px;
        }

        .signature {
            margin-top: 20px;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="https://pelajarinfo.id/wp-content/uploads/2021/06/Universitas-Diponegoro-Semarang-Logo-768x768.png" alt="Logo Universitas Diponegoro">
        <h1>Surat Pengajuan Ijazah</h1>
    </div>

    <div class="content">
        <p>
            [Alamat Pengirim]
        </p>

        <p>
            [Tanggal]
        </p>

        <p>
            [Nama Penerima Ijazah]
            <br>
            [Jabatan Penerima Ijazah]
            <br>
            [Nama Universitas]
        </p>

        <p>
            Dengan hormat,
        </p>

        <p>
            Saya yang bertanda tangan di bawah ini:
        </p>

        <p>
            {{ $data['name'] }}
            <br>
            {{ $data->email }}
            <br>
            [Program Studi]
            <br>
            [Alamat]
        </p>

        <p>
            Bermaksud mengajukan permohonan pengambilan ijazah. Sehubungan dengan hal tersebut, saya akan melakukan proses administrasi yang diperlukan dan dapat diarahkan kepada pihak yang berwenang.
        </p>

        <p>
            Sebagai bahan pertimbangan, saya lampirkan kelengkapan berkas sebagai berikut:
            - [Dokumen Pendukung 1]
            - [Dokumen Pendukung 2]
            - [dan seterusnya]
        </p>

        <p>
            Atas perhatian dan kerjasamanya, saya ucapkan terima kasih.
        </p>
    </div>

    <div class="closing">
        <p>
            Hormat saya,
        </p>
    </div>

    <div class="signature">
        [Tanda tangan dan Nama Anda]
    </div>
</body>
</html>
