<!DOCTYPE html>
<html>
<head>
	<title>Data User Ngalodern</title>
	<style type="text/css">
		table {
			border-style: double;
			border-width: 3px;
			border-color: white;
			justify-content: center;
		}
		table tr .text2 {
			text-align: right;
			font-size: 13px;
		}
		table tr .text {
			text-align: center;
			font-size: 13px;
		}
		table tr td {
			font-size: 13px;
		}

        .table-border{
            border: 1px solid black;
            border-collapse: collapse;
        }

		.container {
			display: flex;
			justify-content: center;
			text-align: center !important;
		}

		.center {
			display: block;
			text-align: center !important;
		}

	</style>
</head>
<body>

	<div class="center">
	<center>
		<table>
			<tr>
				<td>
				<center><font size="4">Departemen Linguistik FIB UNPAD</font><br></center>
    			<center><font size="5"><b>NGALODERN</b></font><br></center>
    			<center><font size="2">Fakultas Ilmu Budaya Universitas Padjadjaran</font><br></center>
    			<center><font size="2"><i>Jalan Raya Bandung – Sumedang Km. 21 Jatinangor – Sumedang 45363</i></font></center>
				</td>
			</tr>
		</table>
	</center>
	
    <br>

    <center>
    <table class="table-border" border="1">
        <thead align="center">
          <tr class="fw-bolder text-muted">
            <th rowspan="2" width="150px" height="70px">Nama</th>
            <th colspan="2" width="300px">Skor</th>
            <th  colspan="2" width="300px">Level</th>
          </tr>
          <tr class="fw-bolder text-muted">
            <th>Arab</th>
            <th>Inggris</th>
            <th>Arab</th>
            <th>Inggris</th>
          </tr>
        </thead>

        @foreach ($data as $item)
        
        <tr align="center">
            <td>{{ $item->name }}</td>
            <td>200</td>
            <td>200</td>
            <td>Pemula</td>
            <td>Mahir</td>
        </tr>

        @endforeach
    </table>
    </center>
</div>
</body>
</html>