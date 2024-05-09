<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  text-align: center;
}

#customers td, #customers th {
  border: 1px solid black;
  padding: 7px;
}

#customers tr:nth-child(even){background-color: #ffff;}

#customers tr:hover {background-color: #ffff;}

#customers th {
  border: 1.5px solid black;
  padding-top: 8px;
  padding-bottom: 8px;
  text-align: center;
  background-color: white;
  color: black;
}
</style>
</head>
<body>

<h2 style="text-align: center;">Daftar Penyusutan Aset Desa Condongcatur</h2>
<h3 style="text-align: center;">
<script>
  // Membuat objek Date
  var today = new Date();

  // Mendapatkan informasi tanggal, bulan, dan tahun
  var day = today.getDate();
  var monthIndex = today.getMonth(); // Bulan dimulai dari 0
  var year = today.getFullYear();

  // Array dengan nama-nama bulan
  var monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

  // Mendapatkan nama bulan dari array
  var monthName = monthNames[monthIndex];

  // Menampilkan tanggal, bulan, dan tahun
  document.write("Tahun " + year );
</script>
</h3>

<table id="customers">
  <thead>
      <tr>
      <th>No</th>
      <th>Nama Aset</th>
      <th>Nilai Residu</th>
      <th>Umur Manfaat</th>
      <th>Biaya Depresiasi Perolehan</th>
      </tr>
  </thead>
  <tbody>
  @php
  $no=1
  @endphp 
  @foreach($data as $row)
    <tr>
      <td>{{ $no++ }}</td>
      <td>{{ $row->aset->nama_aset }}</td>
      <td>{{ $row->nilai_residu }}</td>
      <td>{{ $row->umur_manfaat }}</td>
      <td>{{ $row->biaya_perolehanDep }}</td>
    </tr>
  @endforeach
  </tbody>    
  </table>
<script>
    window.print();
</script>
</body>
</html>


