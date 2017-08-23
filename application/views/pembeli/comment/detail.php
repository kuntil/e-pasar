

<!-- Main content -->
    <section class="content">
      <div class="row">
		
		<!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
              <div class="box-header with-bcomment">
              <h3 class="box-title"> Komentar Produk</h3>
            </div>
				<div class="box-body">							
					<?php foreach($comment as $comment) {?>
					
								<div id="results">
								
								<div class="col-sm-12">
									<div class="panel panel-primary post panel-shadow">
										<div class="post-heading">
											<div class="pull-left image">
													<?php if ($comment->image){?>
														<img src="<?php echo base_url();?>upload/person/<?php echo $comment->image?>" class="img-circle avatar" alt="user profile image">
													<?php } else { ?>
														<img class="avatar" src="http://bootdey.com/img/Content/user_1.jpg" alt="avatar">
													<?php }  ?>
											</div>
											<div class="pull-left meta">
												<div class="title h5">
													<a href="#"><b><?php echo $comment->buyer_name?></b></a>
													<span class="label label-success">Pembeli</span>
												</div>
												<h6 class="text-muted time">1 minute ago</h6>
											</div>
										</div> 
										<div class="post-description"> 
											<p><?php echo $comment->message?></p>
											<div class="stats">
												<!--a href="<?php echo base_url()?>comment/like?qid=<?php echo $comment->qid?>&&product_id=<?php echo $this->input->get('id')?>" class="btn btn-default stat-item">
													<i class="fa fa-thumbs-up icon"></i>
													<?php
													//$count_like_comment = $this->m_comment_product->record_count_like_comment($comment->qid);
													//$count_like_comment = $count_like_comment[0];
													//echo $count_like_comment['like'];
													?>
												</a-->
												<a href="#" class="btn btn-default stat-item">
													<i class="fa fa-share icon"></i>
													<?php
													$count_comment_sub = $this->m_comment_sub_product->record_count($comment->qid);
													echo $count_comment_sub ;
													?>
												</a>
											</div>
										</div>
										<div class="post-footer">
											<?php echo form_open("comment_sub/insert");?>
											<div class="input-group"> 
												<input type="hidden" name="page" value="<?php echo $this->uri->segment(1); ?>">
												<input type="hidden" name="product_id" value="<?php echo $this->input->get('id'); ?>">
												<input type="hidden" name="comment_id" value="<?php echo $comment->qid?>">
												<input class="form-control" name="message" placeholder="Add a comment" type="text">
												<span class="input-group-addon">
													<!--a href="#"><i class="fa fa-edit"></i></a-->  
													<button type="submit"><i class="fa fa-edit"></i></button>
												</span>
											</div>
											<?php echo form_close();?>
			<?php
			$sub_comment = $this->m_comment_sub_product->comment_sub_store($comment->qid);
			$no_store = 0;
			$no_buyer = 0;
			foreach ($sub_comment as $sub_comment) {
												
						if($sub_comment->store_id) {
										$store = $this->m_comment_sub_product->comment_sub_get_store($comment->qid);
										$store = $store[$no_store++];	
											?>
											<ul class="comments-list">
												<li class="comment">
													<a class="pull-left" href="#">
														<?php if ($store['image']){?>
															<img class="avatar" src="<?php echo base_url();?>upload/store/<?php echo $store['image']?>" class="img-circle avatar" alt="user profile image">
														<?php } else { ?>
															<img class="avatar" src="<?php echo base_url();?>upload/store/no_image.png" alt="avatar">
														<?php }  ?>
													</a>
													<div class="comment-body">
														<div class="comment-heading">
															<h4 class="user"><?php echo $store['store_name']?></h4>
															<span class="label label-warning">Penjual</span>
															<h5 class="time">5 minutes ago</h5>
														</div>
														<p><?php echo $store['message']?></p>
													</div>
												</li>
											</ul>
						<?php
							} else { 
										$buyer = $this->m_comment_sub_product->comment_sub_get_buyer($comment->qid);
										$buyer = $buyer[$no_buyer++];		
											?>
											<ul class="comments-list">
												<li class="comment">
													<a class="pull-left" href="#">
															<?php if ($buyer['image']){?>
															<img src="<?php echo base_url();?>upload/person/<?php echo $buyer['image']?>" class="img-circle avatar" alt="user profile image">
														<?php } else { ?>
															<img class="avatar" src="http://bootdey.com/img/Content/user_1.jpg" alt="avatar">
														<?php }  ?>
													</a>
													<div class="comment-body">
														<div class="comment-heading">
															<h4 class="user"><?php echo $buyer['buyer_name']?></h4>
															<span class="label label-success">Pembeli</span>
															<h5 class="time">5 minutes ago</h5>
														</div>
														<p><?php echo $buyer['message']?></p>
													</div>
												</li>
											</ul>
								
						<?php				
							} 					
				}
				?>
										</div>
									</div>
								</div>								
							<div class="col-sm-12"></div>
							<div class="col-sm-12"></div>
							<div class="col-sm-12"></div>
							<div class="col-sm-12"></div>
							<div class="col-sm-12"></div>
							<div class="col-sm-12"></div>
							<div class="col-sm-12"></div>
							<div class="col-sm-12"></div>
							<div class="col-sm-12"></div>
							<div class="col-sm-12"></div>
							<div class="col-sm-12"></div>
							<div class="col-sm-12"></div>
							<div class="col-sm-12"></div>
								
								
								</div>
					
					
				<?php } ?> 
				</div>
				
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
	  
    </section>

    <!-- /.content -->
  <!-- /.content-wrapper -->
  <!--footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.6
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer-->