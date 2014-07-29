

            <table class = "table" border="1px">
                <thead>
            <tr class    = "header-tabel-telkom">
            <th class    = "text-center">#</th>
                    </tr>
                </thead>
                <tbody>
<?php
foreach ($data_kategori as $row) { ?>
            <tr class    = "isi-tabel-telkom">
                        <td><?php echo $row->nama_kategori; ?></td>
                    </tr>
<?php } ?>
                
                
  
                
                    

                    
                </tbody>
            </table>        