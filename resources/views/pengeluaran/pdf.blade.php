<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ=" crossorigin="anonymous" />
	<title>Print Pemasukan</title>
	{{-- <link rel="shortcut icon" href="{{ asset('assets/images/icon.png') }}"> --}}
	<style>
	    @page, body {margin-bottom: 10px;, padding-top: 10px; padding-bottom: 10px;}
	    table {font-size: 13px; margin-bottom: 20px;}
	    .tipe-title {font-weight: bold; margin: 10px 0px; font-size: 14px;}
	    .tipe-deskripsi {text-align: justify; margin-bottom: 4px; font-size: 13px;}
	    #header, #footer {position: fixed; left: 0; right: 0; color: #333; font-size: 0.9em;}
        #header {top: -20px; border-bottom: 0.1pt solid #aaa; text-align: right;}
        #header img {position: absolute; top: -3px; left: 0;}
	    #footer {bottom: 0; border-top: 0.1pt solid #aaa; text-align: right;}
	    .page-number {font-size: 12px;}
	</style>
</head>
<body>
    <div class="text-center mt-5 mb-5">
        <h2>Daftar Pemasukan Kas Masjid</h2>
    </div>
    <table class="table" width="100%" border="1" style="margin-top: 20px;">
    <thead>
    
    <th scope="col">Id Pengeluaran</th>
    <th scope="col">Id Jenis</th>
    <th scope="col">Jumlah Pengeluaran</th>
    <th scope="col">Tanggal Pengeluaran</th>
   
</thead>
<tbody>
    @foreach ($pengeluaran as $pengeluarans)
        <tr>
         
            <td>{{ $pengeluarans->id_pengeluaran}}</td>
            <td>{{ $pengeluarans->jenis != null ? $pengeluarans->jenis->id_jenis : '-' }}</td>
            <td>{{ $pengeluarans->jumlah_pengeluaran }}</td>
            <td>{{ $pengeluarans->tanggal_pengeluaran }}</td>
        </tr>
    @endforeach
</tbody>
    </table>
    <small class="mt-5">printed: {{ now() }} by: {{ auth()->user()->name }}</small>
</body>
</html>