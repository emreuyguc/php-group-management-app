<?php
if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

?>

<div class="x-content">            
                                    
                     
							    <form id="formOnay" action="" method="post"> 
                <!-- PAGE CONTENT WRAPPER -->
                         
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="panel panel-default">
							<?php $this->uyari->Show('uyari'); ?>
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Kişisel </strong> Bilgiler</h3>
                                </div>
                                <div class="panel-body">
                                     <div class="form-group">
                                                <label class="col-md-3 control-label">ŞUANKİ ŞİFRENİZ</label>
                                                <div class="col-md-9">                                            
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" class="form-control" name="sifre" value="<?=$this->profil->sifre;?>">
                                                    </div>                                            
                                                  
                                                </div>
                                            </div>
									
	     
							   </div>
							   						   <div class="form-group">

                                 <button class="btn btn-success btn-block">GÜNCELLE</button>
								 </div>
                                       
                            </div>                


                        </div>
                        

                        </div>
                  
				</form>
                            </div>
                                                 
  