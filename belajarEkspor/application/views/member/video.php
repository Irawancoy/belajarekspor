<h3 class="sidebar-title">Video Terkait</h3>
              <div class="sidebar-item categories">
                <ul>
									<li>
								<?php foreach ($video->result() as $q) : ?>
									<?php 
											$livid = $q->link_video_materi;
											$vid = explode("https://www.youtube.com/watch?v=", $livid)[1];
									?>
                            <div class="embed-video" data-id="<?php echo $vid ?>" data-controls="0" frameborder="0" width="330px" height="200"></div>
														<br>
                            
                 
								 <?php endforeach?>
									</li>
                </ul>
              </div>
            