<?php
if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

?>

<div class="x-content">                                                
                        <div class="x-content-inner">
                            <div class="col-md-12">
						
									<div class="row">
                        <div class="col-md-12">
                            
                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table datatable">
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
													<th>Eklenen Wp Grubu</th>
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

