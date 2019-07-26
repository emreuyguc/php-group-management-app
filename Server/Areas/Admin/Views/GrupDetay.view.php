<?php
if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

?>
<div class="x-content">                                                
                        <div class="x-content-inner">
                            <div class="col-md-12">
						
									<div class="row">
									<div class="col-md-3">
                            
                            <form action="" class="form-horizontal" method="post">
                            <div class="panel panel-default">
							<?php $this->uyari->Show('uyari'); ?>
                                <div class="panel-body">
                                    <h3><span class="fa fa-pencil"></span> GRUP ADI : <?php echo $this->grup->grup_adi; ?></h3>
									</div>
                                <div class="panel-body form-group-separated">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Grup Adı</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="<?php echo $this->grup->grup_adi; ?>" class="form-control" name="grup_adi">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Link</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="<?php echo $this->grup->grup_katilim_link; ?>" class="form-control" name="grup_katilim_link">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Detay</label>
                                        <div class="col-md-9 col-xs-7">
                                            <textarea class="form-control" rows="5" name="grup_aciklama"><?php echo $this->grup->grup_aciklama; ?></textarea>
                                        </div>
                                    </div>                                          
                                    <div class="form-group">
                                        <div class="col-md-12 col-xs-5">
                                            <button class="btn btn-primary btn-rounded pull-right" type="submit">KAYDET</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                   

                        </div>
                        <div class="col-md-9">
                            						<div class="panel panel-default">
                                <div class="panel-body">                                    
                                    <div class="row stacked">
									
                                        <div class="col-md-6">
										
                                            <div class="input-group push-down-10">
                                                <span class="input-group-addon"><span class="fa fa-search"></span></span>
                                                <input type="text" class="form-control" placeholder="Tabloda Arama Yapabilirsin .. Plaka için 99-xxx00 tarzında giriş yap" id="araPlaka">

                                            </div>                                                                
                                        </div>

                                    </div>
                                </div>                                                                
                            </div>
                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table datatable" id="uyeler">
                                            <thead>
                                                <tr>
                                                    <th>Ad Soyad</th>
													<th>Şehir</th>
													<th width="150px">Plaka</th>
													<th>Eposta</th>
													<th>Telefon</th>
                                                    <th>Doğum Yıl</th>
													<th>Meslek</th>
													<th>Marka / Km</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               <?php $this->uyeListele(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- END DEFAULT DATATABLE -->
                        </div>
                    </div>
							 
                            </div>

                        </div>
                                                         
</div>