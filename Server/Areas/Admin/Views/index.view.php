<?php
if(!defined('PageSecurity')){require($_SERVER['DOCUMENT_ROOT'].'/System/Classes/FileFolderSecurity.class.php');}

?>

<div class="x-content">                                                
                        <div class="x-content-inner">
                            <div class="col-md-10">
							
									<div class="row">
									
											<div class="x-block">
	
												<div class="x-block-content">                                                                                                

												<div class="row">
													<div class="col-md-3">
													<div class="widget widget-warning widget-item-icon">
														<div class="widget-item-left">
															<span class="fa fa-user"></span>
														</div>
														<div class="widget-data">
															<div class="widget-int num-count"><?php $this->aktifBasvuruSayi(); ?></div>
															<div class="widget-title">Aktif Başvuru</div>
															<div class="widget-subtitle">Onay Bekliyor...</div>
														</div>
                          
													</div>

												</div>
													<div class="col-md-3">

													<div class="widget widget-success widget-item-icon">
														<div class="widget-item-left">
															<span class="fa fa-globe"></span>
														</div>
														<div class="widget-data">
															<div class="widget-int num-count"><?php $this->onayBasvuruSayi(); ?></div>
															<div class="widget-title">Onaylanan Başvuru</div>
															<div class="widget-subtitle">Artık onlar üyemiz...</div>
														</div>
                     
													</div>

												</div>
												<div class="col-md-3">

													<div class="widget widget-danger widget-item-icon">
														<div class="widget-item-left">
															<span class="fa fa-globe"></span>
														</div>
														<div class="widget-data">
															<div class="widget-int num-count"><?php $this->redBasvuruSayi(); ?></div>
															<div class="widget-title">Red Edilen Başvuru</div>
															<div class="widget-subtitle">Üzgünüz...</div>
														</div>
                     
													</div>

												</div>
												<div class="col-md-3">

													<div class="widget widget-primary widget-item-icon">
														<div class="widget-item-left">
															<span class="fa fa-globe"></span>
														</div>
														<div class="widget-data">
															<div class="widget-int num-count"><?php $this->wpGrupSayi(); ?></div>
															<div class="widget-title">WhatsApp Grubu </div>
															<div class="widget-subtitle">...</div>
														</div>
                     
													</div>

												</div>
																								
												</div>
												
												

												
												</div>

											</div>

									   </div>
							 
                            </div>
							<!---
                            <div class="col-md-2 ">
                                <div class="x-widget-timeline ">
                                    <div class="x-widget-timelime-head">
                                        <h3>YENİ BAŞVURULAR</h3>
                                    </div>
                                    <div class="x-widget-timeline-content">
                                        <div class="item item-" style="border: 3px solid #e4ff00;">
                                            <a href="#">Maria Jackson</a> Sent you a <strong>message</strong>
                                            <span>3 minutes ago</span>
                                        </div>
                                        <div class="item item-green">
                                            <a href="#">Brian Dawson</a> Invited you to <strong>Linkedin</strong>
                                            <span>16.09.2017 1:27 pm</span>
                                        </div>
                                        <div class="item item-green">
                                            <a href="#">Hannah Jensen</a> Invited you to like her on <strong>facebook</strong>
                                            <span>16.09.2017 1:13 pm</span>
                                        </div>
                                                                               
                                        <button class="btn btn-default btn-block">Load more...</button>
                                    </div>                                        
                                </div>	
                            </div>
							-->
                        </div>

                                                                         
</div>