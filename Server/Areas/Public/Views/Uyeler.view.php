<?php
if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

?>
<div class="x-content">            
                                    
                        <div class="x-content-inner">
                            <div class="col-md-12">
						
									<div class="row">
                        <div class="col-md-12">
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
                            <div class="panel panel-default">

                                <div class="panel-heading">
                                    <h3 class="panel-title">Grubumuzdaki Üyeler</h3>
                                </div>

                                <div class="panel-body panel-body-table">

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-actions" id="uyeler">
                                            <thead>
                                                <tr>
                                                    <th width="110">Kayıt Tarih</th>
                                                    <th>Ad Soyad</th>
                                                    <th>Telefon Numarası</th>
                                                    <th>Yaş</th>
                                                    <th>Şehir Bölge</th>
													<th>Meslek</th>
													<th>Motosiklet Plaka</th>
													<th>Motosiklet Marka Model</th>
													<th>Motosiklet Km</th>
                                                </tr>
                                            </thead>
                                            <tbody>                                            
											<?php $this->uyeYazdir(); ?>
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
