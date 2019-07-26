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
                                    <h3 class="panel-title">Onaylanan Başvurular</h3>
                                </div>

                                <div class="panel-body panel-body-table">

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-actions">
                                            <thead>
                                                <tr>
                                                    <th width="110">Onay Tarih</th>
                                                    <th>Ad Soyad</th>
                                                    <th>Telefon Numarası</th>
													<th>Kaydedilen Wp Grubu</th>
													<th>İŞLEM</th>
                                                </tr>
                                            </thead>
                                            <tbody>                                            
                                                <?php $this->OnayBasvurularListe(); ?>
 
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


<div class="modal fade" id="message-box-info" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
   <div class="modal-content">
            <div class="modal-header">
                
                	<h3>Onay Başvuru İnceleniyor</h3>
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
                                                <label class="col-md-3 control-label">Grup Üyeliği</label>
                                                                                            
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="" disabled name="grupUyelik">
                                                    </div>                                            
                                                
                                            </div>
                                            
											<div class="form-group">
                                                <label class="col-md-6 control-label">Kaydedilen Whatsapp Grubu</label>
                                                                                          
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="" disabled name="onayWpGrup">
                                                    </div>                                            
                                                
                                            </div>
                </div>
              </div>
			  
			  
			  
     		</div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal">Kapat</button>
            </div>
        </div>
  </div>
</div>
		
