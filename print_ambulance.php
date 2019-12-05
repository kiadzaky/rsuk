    <?php ob_start();
    ?>
    <html>

    <head>
        <title>Cetak PDF</title>
        <style>
            table {
                border-collapse: collapse;
                table-layout: fixed;
                width: 630px;
            }

            table td {
                word-wrap: break-word;
                width: 20%;
            }
        </style>
    </head>

    <body>
        <?php
        // Load file functions.php  
        include "functions.php";
        if (isset($_GET['filter']) && !empty($_GET['filter'])) {
            // Cek apakah user telah memilih filter    
            $filter = $_GET['filter'];
            // Ambil data filder yang dipilih user    
            if ($filter == '1') {
                // Jika filter nya 1 (per tanggal)      
                $tgl = date('d-m-y', strtotime($_GET['tanggal']));
                echo '<b>Data Laporan Ambulance Tanggal ' . $tgl . '</b><br /><br />';
                $query = "SELECT * FROM req_ambulance JOIN ambulance ON req_ambulance.id_ambulance = ambulance.id_ambulance JOIN akun ON req_ambulance.nik = akun.nik WHERE DATE(tanggal)='" . $_GET['tanggal'] . "'";
                // Tampilkan data Laporan Ambulance sesuai tanggal yang diinput oleh user pada filter    
            } else if ($filter == '2') {
                // Jika filter nya 2 (per bulan)      
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                echo '<b>Data Laporan Ambulance Bulan ' . $nama_bulan[$_GET['bulan']] . ' ' . $_GET['tahun'] . '</b><br /><br />';
                $query = "SELECT * FROM req_ambulance JOIN ambulance ON req_ambulance.id_ambulance = ambulance.id_ambulance JOIN akun ON req_ambulance.nik = akun.nik WHERE MONTH(tanggal)='" . $_GET['bulan'] . "' AND YEAR(tanggal)='" . $_GET['tahun'] . "'";
                // Tampilkan data Laporan Ambulance sesuai bulan dan tahun yang diinput oleh user pada filter   
            } else {
                // Jika filter nya 3 (per tahun)      
                echo '<b>Data Laporan Ambulance Tahun ' . $_GET['tahun'] . '</b><br /><br />';
                $query = "SELECT * FROM req_ambulance JOIN ambulance ON req_ambulance.id_ambulance = ambulance.id_ambulance JOIN akun ON req_ambulance.nik = akun.nik WHERE YEAR(tanggal)='" . $_GET['tahun'] . "'";
                // Tampilkan data Laporan Ambulance sesuai tahun yang diinput oleh user pada filter   
            }
        } else {
            // Jika user tidak memilih filter    
            echo '<b>Semua Data Laporan Ambulance</b><br /><br />';
            $query = "SELECT * FROM req_ambulance JOIN ambulance ON req_ambulance.id_ambulance = ambulance.id_ambulance JOIN akun ON req_ambulance.nik = akun.nik ORDER BY tanggal";
            // Tampilkan semua data Laporan Ambulance diurutkan berdasarkan tanggal  
        }
        ?>
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>Jenis Penjemputan</th>
                    <th>Nama</th>
                    <th>Keluhan</th>
                    <th>Tanggal</th>
                    <th>Alamat</th>
                    <th>Link Alamat</th>
                </tr>
            </thead>
            <?php $sql = mysqli_query($conn, $query);
            // Eksekusi/Jalankan query dari variabel $query  
            $row = mysqli_num_rows($sql);
            // Ambil jumlah data dari hasil eksekusi $sql  
            if ($row > 0) {
                // Jika jumlah data lebih dari 0 (Berarti jika data ada)    
                while ($data = mysqli_fetch_array($sql)) {
                    // Ambil semua data dari hasil eksekusi $sql      
                    //   $tanggal = date('d-m-Y', strtotime($data['tgl']));
                    // Ubah format tanggal jadi dd-mm-yyyy      
                    echo "<tr>";
                    echo "<td>" . $data['ambulance'] . "</td>";
                    echo "<td>" . $data['nama'] . "</td>";
                    echo "<td>" . $data['keluhan'] . "</td>";
                    echo "<td>" . $data['tanggal'] . "</td>";
                    echo "<td>" . $data['alamat'] . "</td>";
                    echo "<td>" . $data['link'] . "</td>";
                    echo "</tr>";
                }
            } else {
                // Jika data tidak ada    
                echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
            }
            ?>
        </table>
    </body>

    </html>
    <?php
    $html = ob_get_contents();
    ob_clean();
    require_once('html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('P', 'A4', 'en');
    $pdf->WriteHTML($html);
    $pdf->Output('Data Laporan Ambulance.pdf', 'D');
    ?>