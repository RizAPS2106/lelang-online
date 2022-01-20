    <!-- JQuery -->
    <script src="<?php echo base_url() ?>assets/jquery/jquery.min.js"></script>
    
    <!-- DataTables Javascript -->
    <script src="<?php echo base_url() ?>assets/datatables/js/jquery-3.5.1.js"></script>
    <script src="<?php echo base_url() ?>assets/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/datatables/js/dataTables.bootstrap4.min.js"></script>

    <!-- JQuery Mask Javascript -->
    <script src="<?php echo base_url() ?>assets/jquery-mask/jquery-3.6.0.min"></script>
    <script src="<?php echo base_url() ?>assets/jquery-mask/jquery.mask.min"></script>
    <script src="<?php echo base_url() ?>assets/jquery-mask/jquery.mask.js"></script>

    <!-- Bootstrap JavaScript-->
    <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap-select JavaScript -->
    <script src="<?php echo base_url() ?>assets/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

    <!-- Bootstrap-select JavaScript translation files -->
    <script src="<?php echo base_url() ?>assets/bootstrap-select/dist/js/i18n/defaults-*.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
          e.preventDefault();
          $("#wrapper").toggleClass("toggled");
        });
    </script>

    <!-- Format Mata Uang Script -->
    <script type="text/javascript">
        $(document).ready(function(){
            // Format mata uang.
            $( '.uang' ).mask('000.000.000', {reverse: true});
        })
    </script>

    <!-- Number Only Script -->
    <script type="text/javascript">
        function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
            return true;
        }
    </script>

    <!-- Ubah Password Toggle Script -->
    <script>
        $('#ubah_password').click(function(){
          $('#form_ubah_password').toggle();
        });
    </script>

     <!-- DataTables Script -->
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
            $('#tabel_ptg').DataTable();
            $('#tabel_msy').DataTable();
        } );    
    </script>

    <!-- Gambar Preview Script -->
    <script>
        function tampilkanPreview(gambar,idpreview){
            var gb = gambar.files;
            for (var i = 0; i < gb.length; i++){
                var gbPreview = gb[i];
                var imageType = /image.*/;
                var preview=document.getElementById(idpreview);            
                var reader = new FileReader();
                
                if (gbPreview.type.match(imageType)) {
                    preview.file = gbPreview;
                    reader.onload = (function(element) { 
                        return function(e) { 
                            element.src = e.target.result; 
                        }; 
                    })(preview);
                    reader.readAsDataURL(gbPreview);
                }else{
                    preview.file = 'gbPreview';
                    reader.onload = (function(element) { 
                        return function(e) { 
                            element.src = e.target.result; 
                        }; 
                    })(preview);
                    reader.readAsDataURL(gbPreview);
                    alert('Gambar yang dipilih tidak sesuai');
                    $('#upload_gambar').val('');
                }
               
            }    
        }
    </script>

    <!-- Tambah Data Script -->
    <script>
        $(document).ready(function(){

            $('#input_form').on("submit", function(event){  
                event.preventDefault();
                
                $.ajax({  
                    url:$('#input_url').val(),  
                    type:"POST",  
                    data:new FormData($('#input_form')[0]), 
                    processData: false,
                    contentType: false, 
                    beforeSend:function(){
                        $('#input').val("Menyimpan...");
                    },  
                    success:function(data){
                        if (data == 'Username sudah digunakan' || data == 'Konfirmasi password salah' || data == 'Gambar gagal di upload' || data == 'Harap pilih barang dahulu') {
                            $('#input').val("Simpan");
                            alert(data);
                        }else{
                            if ($('#input_url').val() == "<?php echo base_url('admin/lelang_barang/input_barang') ?>") {
                                window.location.assign("<?php echo base_url('admin/lelang_barang/index')?>");
                            }else if ($('#input_url').val() == "<?php echo base_url('admin/lelang_lelang/input_lelang') ?>") {
                                window.location.assign("<?php echo base_url('admin/lelang_lelang/index')?>");
                            }else{
                                location.reload();
                            }
                        }   
                    }
                });  
            });
        
        });    
    </script>

    <!-- Tampil Data Ubah Petugas Script -->
    <script >
        $('#tabel_ptg').on('click','.item_edit',function(){
            var id = $(this).attr('data');

            $.ajax({
                type:"GET",
                url:"<?php echo base_url('admin/data/tampil_data_ubah_petugas')?>",
                dataType:"JSON",
                data:{id:id}, 
                success:function(data){
                    $.each(data,function(id_petugas,nama,username,level){
                        $('#modal_edit').modal('show');
                        $('[name="id_petugas"]').val(data.id_petugas);
                        $('[name="nama"]').val(data.nama);
                        $('[name="username"]').val(data.username);
                        $('[name="level"]').val(data.level);
                    });
                },
            });
            return false;
        });
    </script>

    <!-- Tampil Data Ubah Masyarakat Script -->
    <script>
        $('#tabel_msy').on('click','.item_edit',function(){
            var id = $(this).attr('data');
            
            $.ajax({
                type:"GET",
                url:"<?php echo base_url('admin/data/tampil_data_ubah_masyarakat')?>",
                dataType:"JSON",
                data:{id:id}, 
                success:function(data){
                    $.each(data,function(id_masyarakat,nama,username,telepon){
                        $('#modal_edit').modal('show');
                        $('[name="id_masyarakat"]').val(data.id_masyarakat);
                        $('[name="nama"]').val(data.nama);
                        $('[name="username"]').val(data.username);
                        $('[name="telepon"]').val(data.telepon);
                    });
                },
            });
            return false;
        });
    </script>

    <!-- Ubah Data Script -->
    <script>
        $(document).ready(function(){

            $('#update_form').on("submit", function(event){  
                event.preventDefault();
                
                $.ajax({  
                    url:$('#update_url').val(),  
                    type:"POST",  
                    data:new FormData($('#update_form')[0]), 
                    processData: false,
                    contentType: false, 
                    beforeSend:function(){
                        $('#update').val("Mengubah...");
                    },  
                    success:function(data){
                        if (data == 'Username sudah digunakan' || data == 'Harap isi kolom password baru jika ingin mengubah password, jika tidak kosongkan password lama dan password baru' || data == 'Password lama salah' || data == 'Gambar gagal di upload' ) {
                            $('#update').val("Ubah");
                            alert(data);
                        }else{
                            if ($('#update_url').val() == "<?php echo base_url('admin/lelang_barang/update_barang') ?>") {
                                window.location.assign("<?php echo base_url('admin/lelang_barang/index')?>");
                            }else if ($('#update_url').val() == "<?php echo base_url('admin/lelang_lelang/update_lelang') ?>") {
                                window.location.assign("<?php echo base_url('admin/lelang_lelang/index')?>");
                            }else{
                                location.reload();
                            }
                        }   
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) { 
                        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                    }  
                });  
            });
        
        });    
    </script>

    <!-- Live Select Option Detail Tambah Lelang Script -->
    <script>
        $(document).ready(function(){

            load_data();

            function load_data(query)
            {
                $.ajax({
                    url:"<?php echo base_url('admin/lelang_lelang/detail_tambah_lelang'); ?>",
                    method:"POST",
                    data:{query:query},
                    success:function(data){
                        $('#result_select_detail_tambah_lelang').html(data);
                    }
                })
            }

            $("#select_barang").change(function(){
                var select = $(this).val();
                
                load_data(select);
            });
        });    
    </script>

</body>

</html>