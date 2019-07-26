<?php
if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}
?>
<div class="x-content-footer">
                        Copyright © 2019 . E.U.U WebSoftware
                    </div>
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Çıkış <strong> Yapmakta Kararlımısın</strong> ?</div>
                    <div class="mb-content">
                        <p>Gerçekten gitmek istediğine eminmisin.</p>                    
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="<?php $this->e_href('Cikis'); ?>" class="btn btn-success btn-lg">Evet ,Beni Buradan Çıkar</a>
                            <button class="btn btn-default btn-lg mb-control-close">Hayır , İşlerim Var</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- END PRELOADS -->                  
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="<?php $this->AssetsPath(); ?>js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?php $this->AssetsPath(); ?>js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php $this->AssetsPath(); ?>js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <?php $this->IncludeCustomJs(); ?>
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
     
        <script type="text/javascript" src="<?php $this->AssetsPath(); ?>js/actions.js"></script>
		<?php
		if($this->Area->Page == 'Profil'){
			?>
			<script type="text/javascript">
            var jvalidate = $("#formOnay").validate({
                ignore: [],
                rules: {                                            
                        adSoyad: {
                                required: true,
                                minlength: 3
                        },
                        telefon: {
                                required: true,
                                minlength: 12
                        },
                        dogumTarihi: {
                                required: true,
                                minlength: 4
                        },
                        email: {
                                required: true,
                                email: true
                        },
						meslek: {
                                required: true
                        },
                        plaka: {
                                required: true
                        },
                        motorMarkaModel: {
                                required: true
                        },
						motorKm: {
                                required: true
                        },
						sehir: {
							 required: true
                        },
						kural1: {
							 required: true
                        },
						kural2: {
							 required: true
                        },
						kural3: {
							 required: true
                        },
						kural4: {
							 required: true
                        }
                    }                                        
                });                                    


      $('.dogumYil').datepicker({
         minViewMode: 2,
         format: 'yyyy'
       });
	   
	   $("#plaka").mask('99-?******');
	   
$( document ).ready(function() {
    		var myelement = $(e).attr('id');
		if(myelement == 'evet'){
			$("input[name='grupAdi']").val('');
			$("#grupbilg").show();
		}
		else{
			$("input[name='grupAdi']").val('HAYIR');
			$("#grupbilg").hide();
		}
});

	function secim(e){
		var myelement = $(e).attr('id');
		if(myelement == 'evet'){
			$("input[name='grupAdi']").val('');
			$("#grupbilg").show();
		}
		else{
			$("input[name='grupAdi']").val('HAYIR');
			$("#grupbilg").hide();
		}
			
	}
  </script>
			
			<?php
			
		}
		
		?>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->         
    </body>
</html>








