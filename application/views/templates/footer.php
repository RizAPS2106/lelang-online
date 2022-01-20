    <!-- JQuery -->
    <script src="<?php echo base_url() ?>assets/jquery/jquery.min.js"></script>

    <!-- Bootstrap JavaScript-->
    <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <!-- Bootstrap-select JavaScript -->
    <script src="<?php echo base_url() ?>assets/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

    <!-- Bootstrap-select JavaScript translation files -->
    <script src="<?php echo base_url() ?>assets/bootstrap-select/dist/js/i18n/defaults-*.min.js"></script>
    
    <!-- DataTables Javascript -->
    <script src="<?php echo base_url() ?>assets/datatables/js/jquery-3.5.1.js"></script>
    <script src="<?php echo base_url() ?>assets/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/datatables/js/dataTables.bootstrap4.min.js"></script>

    <!-- JQuery Mask Javascript -->
    <script src="<?php echo base_url() ?>assets/jquery-mask/jquery-3.6.0.min"></script>
    <script src="<?php echo base_url() ?>assets/jquery-mask/jquery.mask.min"></script>
    <script src="<?php echo base_url() ?>assets/jquery-mask/jquery.mask.js"></script>

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

    <!-- Periksa Login Script -->
    <script>
        $(document).ready(function(){

            $('#login_form').on("submit", function(event){  
                event.preventDefault();
                
                $.ajax({  
                    url:$('#login_url').val(),  
                    type:"POST",  
                    data:new FormData($('#login_form')[0]), 
                    processData: false,
                    contentType: false, 
                    success:function(data){
                        if (data == 'Username atau password anda salah') {
                            alert(data);
                        }else{
                            if (data == 'admin/dashboard_adm') {
                                window.location.assign("<?php echo base_url('admin/dashboard_adm') ?>");
                            }else if(data == 'petugas/dashboard_ptg') {
                                window.location.assign("<?php echo base_url('petugas/dashboard_ptg') ?>");
                            }else if (data == 'dashboard') {
                                window.location.assign("<?php echo base_url('dashboard') ?>");
                            }
                        }   
                    }  
                });  
            });
        
        });    
    </script>

    <!-- Periksa Register Script -->
    <script>
        $(document).ready(function(){

            $('#register_form').on("submit", function(event){  
                event.preventDefault();
                
                $.ajax({  
                    url:$('#register_url').val(),  
                    method:"POST",  
                    data:new FormData($('#register_form')[0]), 
                    processData: false,
                    contentType: false, 
                    success:function(data){
                        if (data == 'Username sudah digunakan' || data == 'Konfirmasi password salah') {
                            alert(data);
                        }else{
                            alert(data);
                            window.location.assign("<?php echo base_url('auth') ?>");
                        }   
                    }  
                });  
            });

        });    
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
                        if (data == 'Username sudah digunakan' || data == 'Konfirmasi password salah' || data == 'Gambar gagal di upload') {
                            $('#input').val("Simpan");
                            alert(data);
                        }else{
                            if ($('#input_url').val() == "<?php echo base_url('admin/lelang_barang/input_barang') ?>") {
                                window.location.assign("<?php echo base_url('admin/lelang_barang/index') ?>");
                            }else{
                                location.reload();
                            }
                        }   
                    }  
                });  
            });
        
        });    
    </script>

    <!-- Ubah Data Script -->
    <script>
        $(document).ready(function(){

            $('#update_form').on("submit", function(event){  
                event.preventDefault();
                
                $.ajax({  
                    url:$('#update_url').val(),  
                    method:"POST",  
                    data:new FormData($('#update_form')[0]), 
                    processData: false,
                    contentType: false, 
                    beforeSend:function(){  
                        $('#update').val("Mengubah...");  
                    },  
                    success:function(data){
                        if (data == 'Username sudah digunakan' || data == 'Harap isi kolom password baru jika ingin mengubah password, jika tidak kosongkan password lama dan password baru' || data == 'Password lama salah'  || data == 'Gambar gagal di upload' || data == 'Barang sudah ada yang menawar') {
                            $('#update').val("Ubah");
                            alert(data);
                        }else{
                            if ($('#update_url').val() == "<?php echo base_url('admin/lelang_barang/update_barang') ?>") {
                                window.location.assign("<?php echo base_url('admin/lelang_barang/index')?>");
                            }else{
                                location.reload();
                            }
                        }   
                    }  
                });  
            });

        });    
    </script>

    <!-- Transaksi Data Script -->
    <script>
        $(document).ready(function(){

            $('#transaksi_form').on("submit", function(event){  
                event.preventDefault();
                
                $.ajax({  
                    url:$('#transaksi_url').val(),  
                    type:"POST",  
                    data:new FormData($('#transaksi_form')[0]), 
                    processData: false,
                    contentType: false, 
                    beforeSend:function(){
                        $('#transaksi').val("Menawar...");
                    },  
                    success:function(data){
                        if (data == 'Anda sudah menduduki posisi pertama pelelangan' || data == 'Harap isi dengan nominal yang bukan nol') {
                            $('#transaksi').val("Lakukan Penawaran");
                            alert(data);
                            $('#penawaran').val("");
                        }else{
                            location.reload();
                        }   
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