<?php
if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

?>

<div class="x-content">            
                                    
                     
		
                    <div class="row">

                       <div class="panel panel-default form-horizontal">
                                <div class="panel-body">
                                    <h3><span class="fa fa-info-circle"></span> Grup Bilgi</h3>
                                </div>
                                <div class="panel-body form-group-separated">                                    
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Son Link Tarihi</label>
                                        <div class="col-md-8 col-xs-7 line-height-base"><?php echo $this->grup->son_link_tarih; ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Grup Adı</label>
                                        <div class="col-md-8 col-xs-7 line-height-base"><?php echo $this->grup->grup_adi; ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Açıklama</label>
                                        <div class="col-md-8 col-xs-7"><?php echo $this->grup->grup_aciklama; ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Üye Sayısı</label>
                                        <div class="col-md-8 col-xs-7 line-height-base"><?php echo $this->grup->uye_sayi; ?></div>
                                    </div>
									<div class="form-group">
										<label class="col-md-4 col-xs-5 control-label">İşlemler</label>
                                        <div class="col-md-8 col-xs-7 line-height-base">
											<form action="" method="post"> <button type="submit" class="btn btn-success" name="linkTalep">Güncel Link Talebi</button></form>
											<form action="" method="post"><button type="submit" class="btn btn-danger" name="iptalTalep">Üyelik İptali</button></form>
										
										</div>
                                        
                                    </div>
                                </div>
                                
                            </div>

                            </div>
                                           

</div>										   
  