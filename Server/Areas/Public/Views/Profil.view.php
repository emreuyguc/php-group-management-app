<?php
if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

?>

<div class="x-content">            
                                    
                     
							    <form id="formOnay" action="" method="post"> 
                <!-- PAGE CONTENT WRAPPER -->
                         
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-default">
							<?php $this->uyari->Show('uyari'); ?>
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Kişisel </strong> Bilgiler</h3>
                                </div>
                                <div class="panel-body">
                                     <div class="form-group">
                                                <label class="col-md-3 control-label">Ad Soyad</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" class="form-control" name="adSoyad" value="<?=$this->profil->ad_soyad;?>">
                                                    </div>                                            
                                                    <span class="help-block">Gerçek Adınızı ve Soy isminizi giriniz</span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Telefon Numaranız:</label>    
                                                <div class="col-md-9">
														<div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-phone"></span></span>
                                                        <input type="text" class="mask_phone form-control" name="telefon" value="<?=$this->profil->telefon;?>">
                                                    </div>   
                                                    
                                                    <span class="help-block">Örnek: 90 (532) 123-45-67.</span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                            <label class="col-md-3 control-label">E-Posta Adresiniz:</label>
                                            <div class="col-md-9">
											<div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                                                        <input type="text" name="email" class="form-control" name="mail" value="<?=$this->profil->mail;?>">  
                                                    </div>    
                                      
                                                <span class="help-block">Örnek : abcdef@hot.com</span>
                                            </div>
                                        </div>
										                                            <div class="form-group">                                        
                                                <label class="col-md-3 control-label">Doğum Yılınız</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                        <input type="text" class="form-control datepicker dogumYil" value="<?=$this->profil->dogum_tarihi;?>" name="dogumTarihi" value="<?=$this->profil->dogum_tarihi;?>">                                            
                                                    </div>
                                                    <span class="help-block">Doğum yılınızı seçiniz.</span>
                                                </div>
                                            </div>
                                            
											<div class="form-group">
                                                <label class="col-md-3 control-label">Şehir / Bölge</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-home"></span></span>
                                                        <input type="text" class="form-control" name="sehir" value="<?=$this->profil->sehir;?>">
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
                                                        <input type="text" class="form-control" name="meslek" value="<?=$this->profil->meslek;?>">
                                                    </div>                                            
                                                    <span class="help-block">Şirketinizi ve Mesleğinizi veya iş - Çalışma Alanınızı Yazınız </span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Herhangi Bir Grup Üyeliğiniz Varmı ?</label>
                                                <div class="row">         

												<?php 
												
												?>
                                                <input id="evet" type="radio" name="grupKontrol" <?php $this->gkontrol('e'); ?> onClick="secim(this)">
                                                <span class="outer"><span class="inner"></span></span> EVET 

                                                <input id="hayir" type="radio" name="grupKontrol" <?php $this->gkontrol('h'); ?> onClick="secim(this)">
                                                <span class="outer"><span class="inner"></span></span> HAYIR 
												
												<div id="grupbilg">
												Bulunduğunuz Kulübün adını yazınız.
												<div class="col-md-9">  
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" class="form-control" name="grupAdi" value="<?=$this->profil->uyelik_grup_adi;?>">
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
                                                        <input type="text" class="form-control" id="plaka" name="plaka" value="<?=$this->profil->plaka;?>">
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
                                                        <input type="text" class="form-control" name="motorMarkaModel" value="<?=$this->profil->motor_marka_model;?>">
                                                    </div>   
</div>											
                                                </div>
                                            </div>
											
											<div class="form-group">
                                                <label class="col-md-3 control-label">Motorsiklet Km</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-tachometer"></span></span>
                                                        <input type="text" class="form-control" name="motorKm" value="<?=$this->profil->motor_km;?>">
                                                    </div>                                            
                                                </div>
                                            </div>
											
							
							   </div>
							   
							   <div class="form-group">
											<BR>

                                 <button class="btn btn-success btn-block">GÜNCELLE</button>
								 </div>
									   
                            </div>          
							
                                             
                                            
                        </div>

                        </div>
                  
				</form>
                            </div>
                                                 
  