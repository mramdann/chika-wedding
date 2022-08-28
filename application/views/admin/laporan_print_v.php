<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan Pemesanan</title>

    <style>
        table {
            border-collapse: collapse;
        }

        td,
        th {
            border: 1px solid black;
            padding: 3px;
        }
    </style>
</head>

<body>
    <center>
        <font size="5"><b>Laporan Booking <br> Chika Wedding</b></font><br>
        <font size="2"><i>Jln Ibrahim Singadilaga No. 68 Koncara Purwakarta Jawa Barat</i></font>
        <br><br>

        <font size="2">
            <table>
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Customer</th>
                        <th>Paket Dipesan</th>
                        <th>Tgl Booking</th>
                        <th>Tgl Acara</th>
                        <th>Lokasi</th>
                        <th>Harga</th>
                        <th>Jml Bayar</th>
                        <th>Pembayaran</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // print_r($booking);
                    $no = 0;
                    $status = '';
                    $st = '';
                    foreach ($data as $row) {
                        $no++;

                        $pembayaran = $this->db->get_where('tbl_pembayaran', ['id_booking' => $row->id_booking, 'status_pembayaran' => 1])->result();
                        $jlh = 0;

                        foreach ($pembayaran as $pp) {
                            $jlh += $pp->nominal;
                        }

                        if ($row->harga == $jlh) {
                            $status = 'Lunas';
                        } else {
                            $status = 'Belum Lunas';
                        }

                        echo '<tr>
                        <td>' . $no . '</td>
                        <td>' . $row->nama_lengkap . '</td>
                        <td>' . $row->nama_paket . '</td>
                        <td>' . date('d-m-Y H:i:s', strtotime($row->tgl_booking)) . '</td>
                        <td>' . date('d-m-Y', strtotime($row->tgl_acara)) . '</td>
                        <td>' . $row->lokasi . '</td>
                        <td>Rp. ' . number_format($row->harga) . '</td>
                        <td>Rp. ' . number_format($jlh) . '</td>
                        <td>' . $status . '</td>
                        <td>' . $row->status . '</td>
                    </tr>';
                    } ?>
                </tbody>
            </table>
        </font>
    </center>
    <script>
        window.print();
    </script>
</body>

</html>