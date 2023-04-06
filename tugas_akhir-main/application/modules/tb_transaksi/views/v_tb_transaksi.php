<?php if ($akun[0]->zp[6] == "0") { ?>
<?php } else { ?>

    <script>
        function cekit($idx) {
            hideForm();
            var sArr = $("#id_del_arr").val();
            if (sArr != "") {
                sArr = sArr.replace("]", "");
                sArr = sArr.replace("[", "");
            }
            var gV = document.getElementById($idx);
            if (gV.checked) {
                if (sArr == "") {
                    sArr = sArr + '"' + gV.value + '"';
                    j = 1;
                } else {
                    sArr = sArr + ',"' + gV.value + '"';
                }
            } else {
                sHp = '"' + gV.value + '"';
                sArr = sArr.replace(sHp, "");
            }
            sArr = sArr.replace(",,", ",");
            sArr = "[" + sArr + "]";
            sArr = sArr.replace(",]", "]");
            sArr = sArr.replace("[,", "[");
            if (sArr.length <= 2) {
                sArr = "";
            }
            var bCek = (sArr == "");
            $("#id_del_arr").val(sArr);
            document.getElementById("btnck").disabled = bCek;
        }

        function showForm(id = null) {
            $("#pnladd").slideDown("slow");
            $("#pnldata").slideDown("slow");
            $("#btn-tmb").hide("slow");

            if (id == null) {
                $("#id_pengajuan").val("");
                $("#pengajuan").val("");
                $("#title_addedit").html('<h2>Tambah Data : pengajuan</h2>');
                $("#btn").html('Simpan');
            }
        }

        function hideForm() {
            $("#pnladd").slideUp("slow");
            $("#pnldata").slideUp("slow");
            $("#btn-tmb").show("slow");
        }

        function editData(id, pengajuan) {
            $("#id_pengajuan").val(id);
            $("#pengajuan").val(pengajuan);
            $("#title_addedit").html('<h2>Edit Data : pengajuan</h2>');
            $("#btn").html('Update');
            showForm(id);
        }
    </script>

    <style>
        #pnladd {
            display: none;
        }

        #pnldata {
            display: none;
        }
    </style>

    <!--  <div id='breadcrumb'>
        <ul>
            <li><a href="<?php echo site_url('home') ?>" onclick="ga('send', 'event', 'Breadcrumbs', 'Level 1', 'trycss_height_width_intro')">Home</a></li>
            <li><a onclick="ga('send', 'event', 'Breadcrumbs', 'Level 2', 'trycss_height_width_intro')">Pengaturan</a></li>
            <li><a onclick="ga('send', 'event', 'Breadcrumbs', 'Level 1', 'trycss_height_width_intro')"><b> Coba </b></a></li>
            <li>  </li>
        </ul> </div> <div style="width: 100%; height:1px; border: inset purple;"></div> <div style="width: 100%; height:10px; border: 0px solid white;"></div> -->

        <h1>Form Input Transaksi</h1>
    <?php echo form_open('transaksi/add'); ?>
        <label for="nama_transaksi">Nama Transaksi:</label>
        <input type="text" name="nama_transaksi" id="nama_transaksi"><br>

        <label for="tanggal">Tanggal:</label>
        <input type="date" name="tanggal" id="tanggal"><br>

        <input type="submit" value="Simpan">
        
<?php } ?>