<?php
if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

?>



<div class="x-content">                                                
                        <div class="x-content-inner">
                            <div class="col-md-12">
						
									<div class="row">
                        <div class="col-md-12">
						
							<div class="pull-center">
                                <button class="btn btn-success" data-toggle="modal" data-target="#yeniGrupForm"><span class="fa fa-plus"></span> YENİ GRUP</button>
                            </div>
							
							
                            <div class="panel panel-default">

                                <div class="panel-heading">
                                    <h3 class="panel-title">Whatsapp Grupları</h3>
                                </div>

                                <div class="panel-body panel-body-table">

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-actions" id="gruplar">
                                            <thead>
                                                <tr>
                                                    <th width="110">Ekleme Tarih</th>
                                                    <th>Grup Adı</th>
                                                    <th>Açıklama</th>
													<th>Erişim Link</th>
													<th>Son Link Güncellemesi</th>
													<th width="240">İŞLEM</th>
                                                </tr>
                                            </thead>
                                            <tbody>                                            
                                                <?php $this->whatsappGrupListele(); ?>
 
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

<div class="modal fade" id="link-pencere" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">

      </div>
      <div class="modal-body">
            <div class="mb-title"> Grup <strong>Link Güncelle</strong></div>
            <div class="mb-content">
                <center><img src="<?php $this->AssetsPath(); ?>logo.jpg" width="150px" ></center>
                            <form class="form-horizontal">
                                                            
                                <div class="panel panel-default tabs">                            

                                    <div class="panel-body tab-content">
                                       <div class="form-group">
                                                <label class="col-md-4 col-xs-12 control-label">Grup Adı</label>
                                                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                    <input type="text" class="form-control" value="" disabled name="grup_adi">                                                    
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 col-xs-12 control-label">Grup Erişim Linki</label>
                                                <div class="col-md-6 col-xs-12">                                            
                                                    <input type="text" class="form-control" value="http://"  name="grup_katilim_link">
													<span>  son güncelleme tarihi : <span id="guncellemetarih"></span> </span>
                                                </div>
												
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 col-xs-12 control-label">Grup Açıklama</label>
                                                <div class="col-md-6 col-xs-12">                                            
                                                    <textarea class="form-control" rows="5" disabled name="grup_aciklama"></textarea>
                                                </div>
                                            </div>     

                                    </div>

                                </div>                                
                            
                            </form>
                            
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <button class="btn btn-success btn-lg mb-control-yes" >Güncelle</button>
                    <button class="btn btn-default btn-lg" data-dismiss="modal">İptal</button>
                </div>
            </div>
      </div>

    </div>
  </div>
</div>

<!-- END MESSAGE BOX-->    	
	
<div class="modal fade" id="mb-remove-row" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">

      </div>
      <div class="modal-body">
            <div class="mb-title"><span class="fa fa-times"></span> Grup <strong>Silme İşlemi</strong></div>
            <div class="mb-content">
                <p>Gerçekten <STRONG><grup_isim></grup_isim> </STRONG>Adlı Grubu Silmek istiyormusunuz?</p>                    
     
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <button class="btn btn-success btn-lg mb-control-yes" >Evet</button>
                    <button class="btn btn-default btn-lg" data-dismiss="modal">Hayır</button>
                </div>
            </div>
      </div>

    </div>
  </div>
</div>
		
<div class="modal fade" id="yeniGrupForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Grup Oluşturma Formu</h5>

      </div>
      <div class="modal-body">
        <div class="col-md-12">
                            <center><img src="<?php $this->AssetsPath(); ?>logo.jpg" width="150px" ></center>
                            <form class="form-horizontal">
                                                            
                                <div class="panel panel-default tabs">                            

                                    <div class="panel-body tab-content">
                                       <div class="form-group">
                                                <label class="col-md-4 col-xs-12 control-label">Grup Adı</label>
                                                <div class="col-md-6 col-xs-12">                                                                                                                                                        
                                                    <input type="text" class="form-control" value="" name="grup_adi">                                                    
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 col-xs-12 control-label">Grup Erişim Linki</label>
                                                <div class="col-md-6 col-xs-12">                                            
                                                    <input type="text" class="form-control" value="http://" name="grup_katilim_link">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 col-xs-12 control-label">Grup Açıklama</label>
                                                <div class="col-md-6 col-xs-12">                                            
                                                    <textarea class="form-control" rows="5" name="grup_aciklama"></textarea>
                                                </div>
                                            </div>     

                                    </div>

                                </div>                                
                            
                            </form>
                            
                        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">İptal</button>
        <button type="button" class="btn btn-success" id="grupKaydet">Kaydet</button>
      </div>
    </div>
  </div>
</div>