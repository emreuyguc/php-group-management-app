<?php
if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

?>
<!DOCTYPE html>
<html lang="tr" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title><?php $this->FullTitle(); ?></title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" href="<?php $this->AssetsPath(); ?>favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="<?php $this->AssetsPath(); ?>css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                                      
    </head>
    <body>
	<div class="page-content">
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb"
                    <li><a href="<?php $this->e_href(''); ?>"> <?php $this->AreaTitle(); ?></a></li>
                    <li><a href="#">Üye Bölgesi</a></li>
                    <li class="active">Başvuru Formu</li>
                </ul>
                <!-- END BREADCRUMB -->
				
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-user-plus"></span> BAŞVURU FORMU</h2>
                </div>
                <!-- END PAGE TITLE -->    
				<?php echo $this->uyari->Show('uyari');?>
                <form id="formOnay" action="" method="post"> 
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Kişisel </strong> Bilgiler</h3>
                                </div>
                                <div class="panel-body">
                                    <p> Grup linki ve Onay için bilgileri lütfen doğru giriniz. Bilgileriniz Sistemimize Şifrelem ile kayıt edilip Grup Dışında Kimseyle Paylaşılmamaktadır.</p>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Ad Soyad</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" class="form-control" name="adSoyad" >
                                                    </div>                                            
                                                    <span class="help-block">Gerçek Adınızı ve Soy isminizi giriniz</span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Telefon Numaranız:</label>    
                                                <div class="col-md-9">
														<div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-phone"></span></span>
                                                        <input type="text" class="mask_phone form-control" value="" name="telefon">
                                                    </div>   
                                                    
                                                    <span class="help-block">Örnek: 90 (532) 123-45-67.</span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                            <label class="col-md-3 control-label">E-Posta Adresiniz:</label>
                                            <div class="col-md-9">
											<div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                                                        <input type="text" value="" name="email" class="form-control" name="mail">  
                                                    </div>    
                                      
                                                <span class="help-block">Örnek : abcdef@hot.com</span>
                                            </div>
                                        </div>
										                                            <div class="form-group">                                        
                                                <label class="col-md-3 control-label">Doğum Yılınız</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                        <input type="text" class="form-control datepicker dogumYil" value="2017" name="dogumTarihi">                                            
                                                    </div>
                                                    <span class="help-block">Doğum yılınızı seçiniz.</span>
                                                </div>
                                            </div>
                                            
											<div class="form-group">
                                                <label class="col-md-3 control-label">Şehir / Bölge</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-home"></span></span>
                                                        <input type="text" class="form-control" name="sehir">
                                                    </div>                                            
                                                    <span class="help-block">Bulunduğunuz Şehri ve Bölgeyi / ile ayırarak giriniz.</span>
                                                </div>
                                            </div>
							   </div>
                            </div>                


                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Diğer </strong> Bilgiler</h3>
                                </div>
                                <div class="panel-body">
                                    
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Şirket / Meslek</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" class="form-control" name="meslek">
                                                    </div>                                            
                                                    <span class="help-block">Şirketinizi ve Mesleğinizi veya iş - Çalışma Alanınızı Yazınız </span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Herhangi Bir Grup Üyeliğiniz Varmı ?</label>
                                                <div class="row">         

                                                <input id="evet" type="radio" name="grupKontrol" onClick="secim(this)">
                                                <span class="outer"><span class="inner"></span></span> EVET 

                                                <input id="hayir" type="radio" name="grupKontrol" checked="" onClick="secim(this)">
                                                <span class="outer"><span class="inner"></span></span> HAYIR 
												
												<div id="grupbilg">
												Bulunduğunuz Kulübün adını yazınız.
												<div class="col-md-9">  
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" class="form-control" name="grupAdi" value="HAYIR">
                                                    </div>                                            
</div>
													</div>
                                                </div>
                                            </div>
                                            
                                          <div class="form-group">
                                                <label class="col-md-3 control-label">Motorsiklet Plakanız</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-tag"></span></span>
                                                        <input type="text" class="form-control" id="plaka" name="plaka">
                                                    </div>                                            
                                                    <span class="help-block">Şirketinizi ve Mesleğinizi veya iş - Çalışma Alanınızı Yazınız </span>
                                                </div>
                                            </div>
										<div class="form-group">
                                                <label class="col-md-3 control-label">Motorsiklet Marka  / Model - Yıl</label>
												<div class="row">
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-motorcycle"></span></span>
                                                        <input type="text" class="form-control" name="motorMarkaModel">
                                                    </div>   
</div>											
                                                </div>
                                            </div>
											
											<div class="form-group">
                                                <label class="col-md-3 control-label">Motorsiklet Km</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-tachometer"></span></span>
                                                        <input type="text" class="form-control" name="motorKm">
                                                    </div>                                            
                                                </div>
                                            </div>
											
							   </div>
							   <div class="form-group">
											<BR>
                                        <label class="col-md-3 col-xs-12 control-label">KURALLARI OKUYORUM VE KABUL EDİYORUM...</label>
                                        <div class="col-md-6 col-xs-12">                                                                                                                                        
                                            <label><div class="icheckbox_minimal-grey" style="position: relative;"><input type="checkbox" class="icheckbox"  style="position: absolute; opacity: 0;" name="kural1"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Grupta Küfür veya Argo Kullanmayacağım</label>
                                        <label><div class="icheckbox_minimal-grey " style="position: relative;"><input type="checkbox" class="icheckbox"  style="position: absolute; opacity: 0;" name="kural2"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Pornografi İçerik Atmayacağım</label>
										<label><div class="icheckbox_minimal-grey " style="position: relative;"><input type="checkbox" class="icheckbox"  style="position: absolute; opacity: 0;" name="kural3"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Saygı ve Anlayış İçerisinde Gırgır Yapabilirim</label>
										<label><div class="icheckbox_minimal-grey " style="position: relative;"><input type="checkbox" class="icheckbox"  style="position: absolute; opacity: 0;" name="kural4"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Mide bulandırıcı Videolar-Görseller Atmayacağım</label>

										
										</div>
                                 <button class="btn btn-success btn-block">GÖNDER</button>
								 </div>
									   
                            </div>          
							
                                             
                                            
                        </div>

                        </div>
                    </div>
				</form>
    </div>
        
				
				
	<script type="text/javascript" src="<?php $this->AssetsPath(); ?>js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?php $this->AssetsPath(); ?>js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php $this->AssetsPath(); ?>js/plugins/bootstrap/bootstrap.min.js"></script>
        <!-- END PLUGINS -->
        
        <!-- THIS PAGE PLUGINS -->
		
        <script type='text/javascript' src='<?php $this->AssetsPath(); ?>js/plugins/bootstrap/bootstrap-datepicker.js'></script>      
        <script type='text/javascript' src='<?php $this->AssetsPath(); ?>js/plugins/icheck/icheck.min.js'></script>
        <script type='text/javascript' src='<?php $this->AssetsPath(); ?>js/plugins/validationengine/languages/jquery.validationEngine-en.js'></script>
        <script type='text/javascript' src='<?php $this->AssetsPath(); ?>js/plugins/validationengine/jquery.validationEngine.js'></script>        
        <script type='text/javascript' src='<?php $this->AssetsPath(); ?>js/plugins/jquery-validation/jquery.validate.js'></script>                

        <script type='text/javascript' src='<?php $this->AssetsPath(); ?>js/plugins/maskedinput/jquery.maskedinput.min.js'></script>
        <!-- END THIS PAGE PLUGINS -->               

        <!-- START TEMPLATE -->

        <script type="text/javascript" src="<?php $this->AssetsPath(); ?>js/plugins.js"></script>
        <script type="text/javascript" src="<?php $this->AssetsPath(); ?>js/actions.js"></script>
        <!-- END TEMPLATE -->
        
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
    $("#grupbilg").hide();
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
		
		
        
    </body>
</html>






