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
                $("#no_surat").val("");
                $("#perihal").val("");
                $("#tujuan_surat").val("");
                $("#lokasi_penelitian").val("");
                $("#tanggal_buat").val("");
                $("nim").val("");
                $("judul").val("");
                $("#title_addedit").html('<h2>Tambah Data : pengajuan</h2>');
                $("#btn").html('Simpan');
            }
        }

        function hideForm() {
            $("#pnladd").slideUp("slow");
            $("#pnldata").slideUp("slow");
            $("#btn-tmb").show("slow");
        }

        function editData(kd,no_surat,perihal,tujuan_surat,lokasi_penelitian,tanggal_buat,nim,judul) {
            console.log('ahmad tunggi')
            $("#kd_surat").val(kd);
            $("#no_surat").val(no_surat);
                $("#perihal").val(perihal);
                $("#tujuan_surat").val(tujuan_surat);
                $("#lokasi_penelitian").val(lokasi_penelitian);
                // $("#tanggal_buat").val(tanggal_buat);
                $("#nim").val(nim);
                $("#judul").val(judul);
            $("#title_addedit").html('<h2>Edit Data : pengajuan</h2>');
            $("#btn").html('Update');
            showForm(kd);
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

    <div class="body clearfix">
        <div class="x_panel col-sm-12">
            <div class="x_title">
                <h2><small>Pg: </small><b>Daftar pengajuan</b></h2>
                <ul class="nav navbar-right">
                    <li><a class="close-link" href="<?php echo base_url('home'); ?>"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <?php if (($akun[0]->zp[0] == "1") || ($akun[0]->zp[2] == "1")) { ?>
                        <div class="col-sm-12" id="pnladd">
                            <div class="col-sm-12" style="background: #D3D3D3;">
                                <form class="" action="<?php echo base_url() . 'pengajuan/simpan_data'; ?>" method="post" novalidate="">
                                    <!-- spacebar -->
                                    <div style="width: 100%; height:7px; border: 0px solid white;"></div>
                                    <span class="section" id="title_addedit">Data pengajuan</span>

                                   
                                    
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-2 col-sm-2 label-align">Nomor Surat<span class="required"> *</span></label>
                                        <div class="col-md-8 col-sm-8">
                                            <input class="form-control" id="no_surat" name="no_surat" placeholder="<?= $nosurat ?>" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-2 col-sm-2 label-align">Perihal<span class="required"> *</span></label>
                                        <div class="col-md-8 col-sm-8">
                                            <input class="form-control" data-validate-length-range="4" data-validate-words="2" id="perihal" name="perihal" placeholder="<?= $perihal ?>" readonly>
                                            <input type="hidden" id="kd_surat" name="kd_surat" >
                                        </div>
                                    </div>
                                    
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-2 col-sm-2 label-align">Tujuan Surat<span class="required"> *</span></label>
                                        <div class="col-md-8 col-sm-8">
                                            <input class="form-control" data-validate-length-range="4" data-validate-words="2" id="tujuan_surat" name="tujuan_surat" placeholder="ex. Kepala Sekolah" required="required">
                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-2 col-sm-2 label-align">Lokasi Penelitian<span class="required"> *</span></label>
                                        <div class="col-md-8 col-sm-8">
                                            <input class="form-control" data-validate-length-range="4" data-validate-words="2" id="lokasi_penelitian" name="lokasi_penelitian" placeholder="ex. SMKN 1 Duhiadaa" required="required">
                                        </div>
                                    </div>
                                    <!-- <div class="field item form-group">
                                        <label class="col-form-label col-md-2 col-sm-2 label-align">Tanggal Buat<span class="required"> *</span></label>
                                        <div class="col-md-8 col-sm-8">
                                            <input type="date" class="form-control" data-validate-length-range="4" data-validate-words="2" id="tanggal_buat" name="tanggal_buat" placeholder="ex. 2023-01-31" required="required">
                                        </div>
                                    </div> -->
                                     <!-- <div class="field item form-group">
                                        <label class="col-form-label col-md-2 col-sm-2 label-align">Nim<span class="required"> *</span></label>
                                        <div class="col-md-8 col-sm-8">
                                            <input class="form-control" data-validate-length-range="4" data-validate-words="2" id="nim" name="nim" placeholder="<= $nama ?>" required="required">
                                        </div>
                                    </div> -->
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-2 col-sm-2 label-align">Judul<span class="required"> *</span></label>
                                        <div class="col-md-8 col-sm-8">
                                            <input class="form-control" data-validate-length-range="4" data-validate-words="2" id="judul" name="judul" placeholder="ex. aplikasi kuis dosen" required="required">
                                        </div>
                                    </div>
                                    <div class="ln_solid">
                                        <div class="form-group">
                                            <!-- spacebar -->
                                            <div style="width: 100%; height:10px; border: 0px solid white;"></div>
                                            <div class="col-md-6 offset-md-2">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <button type="reset" onclick="hideForm();" class="btn btn-danger">Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- spacebar -->
                        <div id="pnldata" style="width: 100%; height:20px; border: 0px solid white;"></div>
                    <?php } ?>

                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <?php if ($akun[0]->zp[0] == "1" && $akun[0]->zp[2] == "0") { ?>
                                <td width="3%">
                                    <button type="button" id="btn-tmb" class="btn btn-primary btn-circle" onclick="showForm();"><i class="glyphicon glyphicon-plus"></i>Tambah</button>
                                </td>
                            <?php } ?>
                            <?php echo form_open('pengajuan/delete_data'); ?>
                            <input type="hidden" id="id_del_arr" name="id_del_arr" value="">
                            
                            <table id="listdata" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <?php if ($akun[0]->zp[4] == "1") { ?>
                                            <td width="3%">
                                                <button type="submit" id="btnck" disabled="disabled" class="btn btn-danger btn-circle" onclick="return confirm('Anda Yakin')"><i class="glyphicon glyphicon-trash"></i></button>
                                            </td>
                                        <?php } ?>
                                        <td width="3%"><b>No</b></td>
                                        <td><b>Nomor Surat</b></td>
                                        <td><b>Perihal</b></td>
                                        <td><b>Tujuan Surat</b></td>
                                        <td><b>Lokasi Penelitian</b></td>
                                        <td><b>Nim</b></td>
                                        <td><b>Judul</b></td>
                                        <td><b>Tanggal Buat</b></td>
                                        <td><b>#</b></td>

                                        <?php if ($akun[0]->zp[2] == "1") { ?>
                                            <?php if ($akun[0]->zp[0] == "1") { ?>
                                                <td width="3%">
                                                    <button type="button" id="btn-tmb" class="btn btn-primary btn-circle" onclick="showForm();"><i class="glyphicon glyphicon-plus"></i></button>
                                                </td>
                                            <?php } else { ?>
                                                <td width="3%"><b>Edit</b></td>
                                            <?php } ?>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0;
                                    foreach ($data as $i) {
                                        $no++; ?>
                                        <tr>
                                            <?php if ($akun[0]->zp[4] == "1") { ?>
                                                <td>
                                                    <input type="checkbox" <?= $i->ada; ?> class="chkCheckBoxId filled-in chk-col-red" value="<?php echo $i->kd_surat; ?>" name="idpengajuan[]" id="<?php echo $no; ?>" onclick="cekit(<?php echo $no; ?>)" />
                                                    <label for="<?php echo $no; ?>"></label>
                                                </td>
                                            <?php } ?>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $i->no_surat; ?></td>
                                            <td><?php echo $i->perihal; ?></td>
                                            <td><?php echo $i->tujuan_surat; ?></td>
                                            <td><?php echo $i->lokasi_penelitian; ?></td>
                                            <td><?php echo $i->nim; ?></td>
                                            <td><?php echo $i->judul; ?></td>
                                            <td><?php echo $i->tanggal_buat; ?></td>
                                            <td>
                                                <?php if ($i->sts_pembimbing==1){?>
                                                    <a class="btn btn-info" href="<?php echo base_url('') ?>">Cetak</a>
                                                    <?php }elseif($i->sts_pembimbing==2){ ?>
                                                <a class="btn btn-info" href="<?php echo base_url('') ?>">Upload</a>
                                                <?php }elseif($i->sts_pembimbing==3){ ?>
                                                <a class="btn btn-info" href="<?php echo base_url('') ?>">Cetak Surat</a>
                                                <?php }else{ 
                                                    $kd='?id='.$i->kd_surat;
                                                    ?>
                                                <a class="btn btn-info" href="<?php echo base_url('ajuan_mhs/'.$kd) ?>">Pertanyaan</a>

                                                <?php }?>
                                            </td>
                                            <?php if ($akun[0]->zp[2] == "1") { ?>
                                                <td>
                                             
                                                    <button type="button" <?= $i->ada; ?> class="btn btn-success btn-circle" onclick="editData('<?php echo $i->kd_surat; ?>', '<?php echo $i->no_surat; ?>', '<?php echo $i->perihal; ?>','<?php echo $i->tujuan_surat; ?>', '<?php echo $i->lokasi_penelitian; ?>', '<?php echo $i->tanggal_buat; ?>' ,'<?php echo $i->nim; ?>' ,'<?php echo $i->judul; ?>' );"><i class="glyphicon glyphicon-pencil"></i></button>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>