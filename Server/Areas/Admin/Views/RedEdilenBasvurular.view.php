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
                                    <h3 class="panel-title">Red Edilen Başvurular</h3>
                                </div>

                                <div class="panel-body panel-body-table">

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-actions">
                                            <thead>
                                                <tr>
                                                    <th width="110">Red Tarih</th>
                                                    <th>Ad Soyad</th>
                                                    <th>Telefon Numarası</th>
													<th>Red Sebebi</th>
													<th>İŞLEM</th>
                                                </tr>
                                            </thead>
                                            <tbody>                                            
                                                <?php $this->RedBasvurularListe(); ?>
 
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
	
<div class="modal fade"  tabindex="-1"  aria-hidden="true" id="message-box-info">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
		Red Başvuru İnceleniyor
      </div>
      <div class="modal-body">
            <div class="mb-title"><span class="fa fa-times"></span> Red Başvuru  <strong>İnceleniyor</strong></div>
            <div class="mb-content">
                          
					
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Ad Soyad</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="" disabled name="adSoyad">
                                                    </div>                                            
                                                </div>
                                            </div>
											
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Telefon</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="" disabled name="telefon">
                                                    </div>                                            
                                                </div>
                                            </div>
											
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Eposta</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="" disabled name="eposta">
                                                    </div>                                            
                                                </div>
                                            </div>
											
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Doğum Yılı</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="" disabled name="dogumYil">
                                                    </div>                                            
                                                </div>
                                            </div>
											 <div class="form-group">
                                                <label class="col-md-3 control-label">Şehir</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="" disabled name="sehir">
                                                    </div>                                            
                                                </div>
                                            </div>
                                            
                                     

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Meslek</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="" disabled name="meslek">
                                                    </div>                                            
                                                </div>
                                            </div>
											
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Plaka</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="" disabled name="motorPlaka">
                                                    </div>                                            
                                                </div>
                                            </div>
											
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Motor</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="" disabled name="motorModel">
                                                    </div>                                            
                                                </div>
                                            </div>
											
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Km</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="" disabled name="motorKm">
                                                    </div>                                            
                                                </div>
                                            </div>
											 <div class="form-group">
                                                <label class="col-md-3 control-label">Grup Üyeliği</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="" disabled name="grupUyelik">
                                                    </div>                                            
                                                </div>
                                            </div>

                                      

                                   
                                        
                                   
					
                            <div class="panel panel-default form-horizontal text-warning">
                                <div class="panel-body">
                                    <h3><span class="fa fa-info-circle"></span> Red Sebebi</h3>
                                    <p id="redyazi"></p>
                                </div>

                            </div>

            </div>
            <div class="mb-footer">
                <div class="pull-right">
                   
                    <button class="btn btn-danger btn-lg" data-dismiss="modal">KAPAT</button>
                </div>
            </div>
      </div>

    </div>
  </div>
</div>
