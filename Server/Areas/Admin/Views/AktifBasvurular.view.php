<?php
if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

?>

<div class="x-content">                                                
                        <div class="x-content-inner">
                            <div class="col-md-12">
						
									<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">

                                <div class="panel-heading">
                                    <h3 class="panel-title">Aktif Başvurular</h3>
                                </div>

                                <div class="panel-body panel-body-table">

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-actions">
                                            <thead>
                                                <tr>
                                                    <th width="110">Tarih</th>
                                                    <th>Ad Soyad</th>
                                                    <th>Telefon Numarası</th>
                                                    <th>Yaş</th>
                                                    <th>Şehir Bölge</th>
													<th>Meslek</th>
													<th>Motosiklet Plaka</th>
													<th>Motosiklet Marka Model</th>
													<th>Motosiklet Km</th>
                                                    <th>İŞLEM</th>
                                                </tr>
                                            </thead>
                                            <tbody>                                            
                                                <?php $this->aktifBasvurularListe(); ?>
 
                                            </tbody>
                                        </table>
                                    </div>                                

                                </div>
                            </div>                                                

                        </div>
                    </div>
							 
                            </div>

                        </div>
                                                         
</div>


<div class="modal fade" id="mb-remove-row" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
   <div class="modal-content">
            <div class="modal-header">
                	<h3>Başvuruyu Reddet</h3>
					<p>Gerçekten <b><basvuru_isim></basvuru_isim></b> Adlı başvuruyu red etmek istiyormusunuz?</p>       
            </div>
            <div class="modal-body">
              <div class="row">
               
                        <p>Red Sebebi :</p>
						<textarea class="form-control" name="redSebep"></textarea>
						 <input type="hidden" class="" value="" disabled id="redbasvuruId">		
              </div>
     		</div>
            <div class="modal-footer">
				<button class="btn btn-success btn-lg mb-control-yes" onclick="basvuru_red();">Reddet</button>
                <button class="btn btn-danger" data-dismiss="modal">Kapat</button>
            </div>
        </div>
  </div>
</div>


<div class="modal fade" id="message-box-info" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
   <div class="modal-content">
            <div class="modal-header">
                	<h3>Başvuru Onayla</h3>
					
            </div>
            <div class="modal-body">
			
              <div class="row">
                <div class="col-md-6">
				
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Ad Soyad</label>
                                                                                        
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="" disabled name="adSoyad">
                                                    </div>                                            
                                                
                                            </div>
											
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Telefon</label>
                                                                                           
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="" disabled name="telefon">
                                                    </div>                                            
                                                
                                            </div>
											
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Eposta</label>
                                                                                       
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="" disabled name="eposta">
                                                    </div>                                            
                                                
                                            </div>
											
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Doğum Yılı</label>
                                                                                           
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="" disabled name="dogumYil">
                                                    </div>                                            
                                                
                                            </div>
											 <div class="form-group">
                                                <label class="col-md-3 control-label">Şehir</label>
                                                                                            
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="" disabled name="sehir">
                                                    </div>                                            
                                                
                                            </div>
                </div>
                <div class="col-md-6">
				
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Meslek</label>
                                                                                      
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="" disabled name="meslek">
                                                    </div>                                            
                                               
                                            </div>
											
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Plaka</label>
                                                                                         
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="" disabled name="motorPlaka">
                                                    </div>                                            
                                               
                                            </div>
											
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Motor</label>
                                                                                          
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="" disabled name="motorModel">
                                                    </div>                                            
                                                
                                            </div>
											
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Km</label>
                                                                                            
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="" disabled name="motorKm">
                                                    </div>                                            
                                                
                                            </div>
											 <div class="form-group">
                                                <label class="col-md-3 control-label">Varolan Grup Üyeliği</label>
                                                                                        
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="" disabled name="grupUyelik">
                                                    </div>                                            
                                              
                                            </div>
                </div>
				
              </div>
			  <div class="row">
			  <br>
					<div class="form-group">
                        <div class="col-md-12 ">   
						<label class="control-label">Kaydedilecek WhatsApp Grubunu Seçin</label>                                                                                         
                            <select class="form-control select" id="wpGruplar">
                               
                            </select>
                            <span class="help-block">Hangi Gruba kayıt yaptıysanız üye kullanıcıya o grup linki gönderilir.</span>
                        </div>
                   </div>
                    <input type="hidden" class="" value="" disabled id="basvuruId">
              </div>
			  
			  
     		</div>
            <div class="modal-footer">
			
						<button class="btn btn-success btn-lg pull-left mb-control-yes" id="gonderBtn" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Onay Maili Gönderiliyor .." onclick="basvuru_onay();">       
                        Onayla</button>
                <button class="btn btn-danger" data-dismiss="modal">Kapat</button>
            </div>
        </div>
  </div>
</div>

		